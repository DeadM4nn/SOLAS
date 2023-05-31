<?php


namespace App\Http\Controllers;
use App\Models\Library;
use App\Models\Tag;
use App\Models\Language;
use App\Models\LibraryLanguage;
use App\Models\LibraryTag;
use App\Models\A_Bookmark;
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
        ->orderBy('created_at', 'desc')
        ->first();

        $new_bookmark = new Bookmark;
        $new_bookmark->library_id = $req->library_id;
        $new_bookmark->account_id = Auth::user()->id; 

        // Finds out the latest version
        if(isset($latest_version->version_number)){
            $new_bookmark->last_version = $latest_version->version_number;
        }

        $new_bookmark->save();


        $message = "The library is bookmarked";
        //$link = "library/request/".$req->library_id;
        $link = "user/bookmark";

        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }

    public function delete(Request $req){

        if(isset($req->bookmark_id)){
            $bookmark = Bookmark::find($req->bookmark_id);
        }else{
            $bookmark = Bookmark::select()
            ->where('library_id', $req->library_id)
            ->where('account_id', Auth::user()->id)
            ->first();
        }

        $bookmark_archived = new A_Bookmark;

        // Copies the content
        $bookmark_archived->id = $bookmark->id;
        $bookmark_archived->account_id = $bookmark->account_id;
        $bookmark_archived->library_id = $bookmark->library_id;
        $bookmark_archived->date_created = $bookmark->date_created;
        $bookmark_archived->last_version = $bookmark->last_version;
        $bookmark_archived->save();
        $bookmark->delete();

        $message = "Bookmark has been deleted";
        $link = "library/request/".$req->library_id;

        if(isset($req->goto)){
            $link = $req->goto;
        }


        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }

    public function delete_pure($id){

        $bookmark = Bookmark::find($id);

        $bookmark_archived = new A_Bookmark;

        // Copies the content
        $bookmark_archived->id = $bookmark->id;
        $bookmark_archived->account_id = $bookmark->account_id;
        $bookmark_archived->library_id = $bookmark->library_id;
        $bookmark_archived->date_created = $bookmark->date_created;
        $bookmark_archived->last_version = $bookmark->last_version;
        $bookmark_archived->save();

        // Deletes it
        $bookmark->delete();

    }

    public function view(){
        $data = Bookmark::where('account_id', '=', auth()->user()->id)->join('libraries', 'libraries.library_id', '=', 'bookmarks.library_id')->get();

        $data = $data->map(function ($item) {

            //For each bookmark, get the equivalent version number
            $download_latest = Version::where('library_id', $item->library_id)
                ->orderBy('created_at', 'desc')
                ->distinct('library_id')
                ->first();
            
            //Check for discrepency
            if($download_latest == null){
                $item->up_to_date = true;
            } else {
                if(isset($download_latest->version_number)){
                    if($item->last_version == $download_latest->version_number){
                        $item->up_to_date = true;
                        $item->latest_download = $download_latest->version_number;
                    } else {
                        $item->up_to_date = false;
                        $item->latest_download = $download_latest->version_number;
                    }    
                }else{
                    $item->up_to_date = true;
                }
            }
            return $item;
        });

        return view('users/bookmarks', ["data"=>$data]);
    }

    public function update_latest_version($id){
        $curr_bookmark = Bookmark::where('library_id','=', $id)
        ->where("account_id",'=',Auth::user()->id)
        ->first();


        //Take the latest version to be notified later on
        $last_version = Version::where('library_id', $id)
        ->orderBy('created_at', 'desc')
        ->first()->version_number;


        $curr_bookmark->last_version = $last_version;
        $curr_bookmark->save();



        $url = url('/library/request/'.$id);
        return redirect($url);

    }

    public function check_for_updates(){
//        if(Auth::user()){
//            
//        }
        $account = Auth::user()->id;

        // Get all libraries that is bookmarked by the user with the library info
        $data = Bookmark::where('account_id', '=', auth()->user()->id)->join('libraries', 'libraries.library_id', '=', 'bookmarks.library_id')->get();

        $data = $data->map(function ($item) {

            //For every bookmark, find the latest download version
            $download_latest = Version::where('library_id', $item->library_id)
                ->orderBy('created_at', 'desc')
                ->distinct('library_id')
                ->first();
            
            // Check for discrepency
            // If bookmark contains the same version as latest, then dont notify
            if($download_latest == null){
                $item->up_to_date = true;
            } else {


                if(isset($download_latest->version_number)){
                    if($item->last_version == $download_latest->version_number){
                        $item->up_to_date = true;
                        $item->latest_download = $download_latest->version_number;
                    } else {

                        // Else notify
                        $item->up_to_date = false;
                        $item->latest_download = $download_latest->version_number;
                    }    
                }else{
                    $item->up_to_date = true;
                }
            }
            return $item;
        });
        $count = $data->where('up_to_date', false)->count();

        return $count;
    }
}
