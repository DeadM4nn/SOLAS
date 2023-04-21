<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comparison;
use Illuminate\Support\Facades\Auth;

class ComparisonControl extends Controller
{
    public function add(Request $req){
        $new_compare = new Comparison;
        $new_compare->library_id = $req->library_id;
        $new_compare->account_id = Auth::user()->id;
        $new_compare->save();


        $link = "user/compare";
        $message = "Library added to comparison";
        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }


    public function delete($id){
        $curr_compare = Comparison::find($id)->delete();

        $link = "user/compare";
        $message = "Library removed from comparison list.";
        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }

    public function view_comparisons(){
        $data = Comparison::join('libraries', 'libraries.library_id', '=', 'comparisons.library_id')
        ->where('comparisons.account_id', '=', Auth::user()->id)
        ->get();

        return view("compare/comparison_table", ["data"=>$data]);
    }

    public function clear_all(){
        $data = Comparison::where('account_id', Auth::user()->id)->delete();

        $link = "user/compare";
        $message = "Cleared out the comparison list";
        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }

    public function update_all(Request $req){
        for($i = 0; $i < count($req->notes); $i++){
            $curr_compare = Comparison::find($req->compare_ids[$i]);
            if($req->notes[$i] == null){
                $curr_compare->note = "";
            } else {
                $curr_compare->note = $req->notes[$i];
            }

            $curr_compare->save();
        }

        $link = "user/compare";
        $message = "Changes saved";
        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }
}
