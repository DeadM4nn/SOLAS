<?php


namespace App\Http\Controllers;
use App\Models\Library;
use App\Models\Tag;
use App\Models\Language;
use App\Models\LibraryLanguage;
use App\Models\LibraryTag;
use App\Models\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Bookmark;

class BookmarkControl extends Controller
{
    public function add(Request $req){
        //Take the latest version to be notified later on
        $latest_version = Version::where('library_id', $req->library_id)
        ->orderBy('created_at', 'asc')
        ->first();

        $new_bookmark = new Bookmark;
        $new_bookmark->library_id = $req->library_id;
        $new_bookmark->account_id = Auth::user()->id; 
        $new_bookmark->last_version = $latest_version->version_number;
        $new_bookmark->save();


    }
}
