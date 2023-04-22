<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use App\Models\A_Rating;
use App\Http\Controllers\LibraryControl;
use App\Models\Library;
use App\Models\Version;
use App\Models\Bookmark;
use App\Models\Tag;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RatingControl extends Controller
{
    public function add(Request $req){
        $new_rating = new Rating;
        $new_rating->comment = $req->comment;
        $new_rating->rating = $req->rating;
        $new_rating->library_id = $req->library_id;
        $new_rating->account_id = Auth::user()->id;
        $new_rating->save();

        $link = "library/request/".$req->library_id;
        $message = "You have successfully rated this library.";
        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }

    public function update(Request $req){

        if(isset($req->link)){
            $link = $req->link;
        } else {
            $link = "library/request/".$req->library_id;
        }

        $curr_rating = Rating::find($req->rating_id);
        $curr_rating->comment = $req->comment;
        $curr_rating->rating = $req->rating;
        $curr_rating->save();

        $link = "library/request/".$req->library_id;
        $message = "You have successfully updated the rating for this library.";
        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }

    public function delete(Request $req){

        $curr_rating = Rating::find($req->rating_id);

        // Archiving purposes
        $rating_archive = new A_Rating;
        $rating_archive->id = $curr_rating->id;
        $rating_archive->library_id = $curr_rating->library_id;
        $rating_archive->account_id = $curr_rating->account_id;
        $rating_archive->rating = $curr_rating->rating;
        $rating_archive->comment = $curr_rating->comment;
        $rating_archive->created_at = $curr_rating->created_at;
        $rating_archive->updated_at = $curr_rating->updated_at;
        $rating_archive->save();

        $curr_rating->delete();

        if(isset($req->link)){
            $link = $req->link;
        } else {
            $link = "library/request/".$req->library_id;
        }
        


        $message = "You have successfully removed your rating for this library.";
        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }

    public function delete_pure($rating_id){
        $curr_rating = Rating::find($rating_id);

        // Archiving purposes
        $rating_archive = new A_Rating;
        $rating_archive->id = $curr_rating->id;
        $rating_archive->library_id = $curr_rating->library_id;
        $rating_archive->account_id = $curr_rating->account_id;
        $rating_archive->rating = $curr_rating->rating;
        $rating_archive->comment = $curr_rating->comment;
        $rating_archive->created_at = $curr_rating->created_at;
        $rating_archive->updated_at = $curr_rating->updated_at;
        $rating_archive->save();

        $curr_rating->delete();
    }

    public function go_to_update($id){

        $current_library = Library::find($id);
        $download = Version::where('library_id', $id)->latest()->first();

        //Getting all tags
        $tags = Tag::select('tags.name', 'tags.tag_id')
        ->distinct()
        ->join('library_tags', 'library_tags.tag_id', '=', 'tags.tag_id')
        ->where('library_tags.library_id', '=', $id)
        ->get();

        //Getting all languages
        $languages = Language::select('languages.name', 'languages.language_id')
        ->distinct()
        ->join('library_languages', 'library_languages.language_id', '=', 'languages.language_id')
        ->where('library_languages.library_id', '=', $id)
        ->get();

        //Setting license
        if(empty($current_library->license)){
            $license = "Unspecified";
        } else {
            $license = $current_library->license;
        }

        if(is_null($download)){
            $download = "";
        } else {
            $download = $download->version_id;
        }

        //Checks if the record exists
        if(is_null($current_library)){
            $message = "We have no record of that library.";
            $link = "/home";
            return view("confirmations/after", ["message"=>$message, "link"=>$link]);
        }

        $current_library->views = $current_library->views+1;
        $current_library->save();

        $view_library = Library::find($id);

        $bookmark = null;
        
        if(Auth::user()){
            $bookmark = Bookmark::select('last_version')
            ->join('libraries', 'libraries.library_id', '=', 'bookmarks.library_id')
            ->where('libraries.library_id', $id)
            ->where('bookmarks.account_id', Auth::user()->id)
            ->first();
        }

        $avg_rating = round(Rating::where('library_id', $id)->avg('rating'));
        $avg_rating_count = Rating::where('library_id', $id)->count();
        $ratings = Rating::select('ratings.*', 'users.username', 'users.picture')
        ->join('users', 'ratings.account_id', '=', 'users.id')
        ->where('library_id', $id)
        ->get();
        $user_rating = Rating::select('ratings.*', 'users.username', 'users.picture')
        ->join('users', 'ratings.account_id', '=', 'users.id')
        ->where('library_id', $id)
        ->where("account_id", Auth::user()->id)
        ->first();

        $show_update = true;
        return view('libraries/view', ["library"=>$view_library,"download"=>$download, "tags" => $tags, "languages" => $languages, "license" => $license, "bookmark" => $bookmark,"avg_rating"=>$avg_rating, "avg_rating_count"=>$avg_rating_count,"ratings"=>$ratings,"user_rating"=>$user_rating, "show_update"=>$show_update]);

    }
}
