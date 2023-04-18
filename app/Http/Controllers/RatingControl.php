<?php

namespace App\Http\Controllers;
use App\Models\Rating;
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
        $curr_rating->delete();

        $link = "library/request/".$req->library_id;
        $message = "You have successfully removed your rating for this library.";
        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }
}
