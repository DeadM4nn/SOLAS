<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use App\Models\A_Rating;
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
}
