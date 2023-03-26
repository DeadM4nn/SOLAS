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
}
