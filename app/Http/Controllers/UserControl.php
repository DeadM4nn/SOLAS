<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        //Delete version
        Version::join('libraries', 'versions.library_id', '=', 'libraries.library_id')
        ->where('creator_id', '=', $record->id)
        ->delete();

        //Delete Library
        Library::where('creator_id', '=', $record->id)
        ->delete();
 

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
