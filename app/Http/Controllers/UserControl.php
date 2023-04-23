<?php
namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Http\Controllers\LibraryControl;
use App\Http\Controllers\BookmarkControl;
use App\Http\Controllers\RatingControl;
use App\Models\Bookmark;
use App\Models\Rating;
use App\Models\User;
use App\Models\A_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Library;
use App\Models\Tag;
use App\Models\Version;
use App\Models\Language;
use App\Models\LibraryLanguage;
use App\Models\LibraryTag;
use Illuminate\Support\Facades\Hash;

class UserControl extends Controller
{
    public function update(Request $req){
        $current_user = User::findOrFail($req->id);

        $validatedData = $req->validate([
            'username' => [
                'required',
                'string',
                Rule::unique('users')->ignore($current_user->id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($current_user->id),
            ],
        ]);


        $current_user->username = $req->username;
        $current_user->email = $req->email;
        $current_user->save();

        $message = $current_user->username." has been successfully updated";
        
        if(Auth::user()->is_admin){
            $link = "admin/users/all";
        } else {
            $link = "/user/view/".$current_user->id;
        };

    
        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }

    public function show_all(){
        $results = User::all();
        $amount=count(User::all());
        return view('users/search_result', ["results"=>$results, "amount"=>$amount]);
    }


    public function delete(Request $req){
        $id = $req->account_id;

        $record = User::find($id); 
        $username = $record->username;
        $message = $username." has been deleted and every library owned by them";
        $link = "admin/users/all";

        //Find all library
        $libraries = Library::where('creator_id',"=",$record->id)->get();

        //Delete tag
        LibraryTag::join('libraries', 'library_tags.library_id', '=', 'libraries.library_id')
        ->where('creator_id', '=', $record->id)
        ->delete();

        //Delete language
        LibraryLanguage::join('libraries', 'library_languages.library_id', '=', 'libraries.library_id')
        ->where('creator_id', '=', $record->id)
        ->delete();

 
        $libraryControl = new LibraryControl;

        foreach($libraries as $library){
            $request = new Request([
                'library_id' => $library->library_id,
            ]);

            $libraryControl->delete_pure($request);
        }

        // Bookmark delete
        $bookmarks = Bookmark::where('account_id', '=', $id)->get();
        $bookmark_control = new BookmarkControl;

        foreach($bookmarks as $bookmark){
            $bookmark_control->delete_pure($bookmark->id);
        }

        // Rating Delete
        $ratings = Rating::where('account_id', '=', $id)->get();
        $rating_control = new RatingControl;

        foreach($ratings as $rating){
            $rating_control->delete_pure($rating->id);
        }


        // Archiving
        $record_archive = new A_User;
        $record_archive->id = $record->id;
        $record_archive->username = $record->username;
        $record_archive->email = $record->email;
        $record_archive->email_verified_at = $record->email_verified_at;
        $record_archive->password = $record->password;
        $record_archive->two_factor_secret = $record->two_factor_secret;
        $record_archive->two_factor_recovery_codes = $record->two_factor_recovery_codes;
        $record_archive->two_factor_confirmed_at = $record->two_factor_confirmed_at;
        $record_archive->remember_token = $record->remember_token;
        $record_archive->current_team_id = $record->current_team_id;
        $record_archive->profile_photo_path = $record->profile_photo_path;
        $record_archive->created_at = $record->created_at;
        $record_archive->updated_at = $record->updated_at;
        $record_archive->is_admin = $record->is_admin;
        
        $record_archive->save();

        // Delete Record
        $record->delete();

        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }

    public function search(Request $req){
        $searchKey = $req->searchKey;
        $results = User::search($searchKey)->paginate(20000);
        $amount=count($results);

        return view('users/search_result', ["results"=>$results, "amount"=>$amount, 'searchKey'=>$searchKey]);

    }

    public function admin_view_update($id){
        $user = USER::findOrFail($id);

        if($user->is_admin && Auth::user()->id != $id){
            $message = "Updating a Admin User is prohibited";
            $link = "/admin/users/all";
            return view("confirmations/after", ["message"=>$message, "link"=>$link]);
        }

        return view('users/update', ["user"=>$user]);
    }

    public function view_update(){
        $id = Auth::user()->id;
        $user = USER::findOrFail($id);

        if($user->is_admin && Auth::user()->id != $id){
            $message = "Updating a Admin User is prohibited";
            $link = "/admin/users/all";
            return view("confirmations/after", ["message"=>$message, "link"=>$link]);
        }

        return view('users/update', ["user"=>$user]);
    }


    public function user_view($id){

        $user = User::find($id);

        $username = $user->username;

        $email = $user->email;
        $picture = $user->picture;
        $is_admin = $user->is_admin;
        $libraries = Library::where("creator_id",'=',$id)->get();

        $ratings = Rating::where("account_id",'=',$id)->get();
        
        $rating_count = Rating::where('account_id', '=', $id)->count();
        $bookmark_count = Bookmark::where('account_id', '=', $id)->count();
        $library_count = Library::where('creator_id', '=', $id)->count();

        return view('users/view', ["username"=>$username, "email"=>$email, "libraries"=>$libraries, "account_id"=>$id, "picture"=>$picture,'ratings'=>$ratings,"is_admin"=>$is_admin, "rating_count"=>$rating_count, "bookmark_count"=>$bookmark_count, "library_count"=>$library_count]);
    }

    public function update_picture(Request $req){
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->picture = $req->picture;
        $user->save();

        return redirect("/user/view/".$id);
    }

    public function view_update_picture($id){
        // User NEEDS to be admin or the currently logged in
        if(Auth::user()->id == $id){
            $link = "/user/view/".$id;
            return view('users.profile_change', ["link" => $link]);
        } else {
           return redirect('/home');
        }

    }

    public function register(Request $req){
        $req->validate([
            'username' => [
                'required',
                'unique:users,username',
                'regex:/^[a-zA-Z0-9]+$/',
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email',
            ],
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ], [
            'username.regex' => 'Username can only contain alphanumeric characters.',
        ]);

        $new_user = new User;
        $new_user->username = $req->username;
        $new_user->email = $req->email;
        $new_user->password = Hash::make($req->password);
        $new_user->is_admin = $req->has('is_admin') ? 1 : 0;
        $new_user->save();

        $link = "user/view/".$new_user->id;
        $message = $new_user->username." has been created";
        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }

    public function change_password(Request $req){
        $user = Auth::user();
        $req->validate([
            'old_password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        return $fail('The old password you entered is incorrect.');
                    }
                },
            ],
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        $curr_user = User::find(Auth::user()->id);
        $curr_user->password = Hash::make($req->password);
        $curr_user->save();

        $link = "user/view/".Auth::user()->id;
        $message = "Password successfully changed.";
        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }
}
