<?php

namespace App\Http\Controllers;
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

class UserControl extends Controller
{
    public function update(Request $req){
        $current_user = User::findOrFail($req->id);
        $current_user->username = $req->username;
        $current_user->email = $req->email;
        $current_user->save();

        $message = $current_user->username." has been successfully updated";
        
        if(Auth::user()->is_admin){
            $link = "admin/users/all";
        } else {
            $link = "/user";
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

    public function user_view(){

        $username = Auth::user()->username;
        $id = Auth::user()->id;
        $email = Auth::user()->email;

        $libraries = Library::where("creator_id",'=',$id)->get();

        return view('users/view', ["username"=>$username, "email"=>$email, "libraries"=>$libraries, "account_id"=>$id]);
    }


}
