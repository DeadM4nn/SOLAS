<?php

namespace App\Http\Controllers;
use App\Models\Library;
use Illuminate\Http\Request;

class LibraryControl extends Controller
{
    public function delete(Request $req){
        // Get a list of all that has the id (One record)
        $id = $req->library_id;
        $record = Library::find($id);
        $name = $record->name;
        $message = $name." has been deleted";
        $link = "/library/all";

        // Delete Record
        $record->delete();

        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }

    public function show_all(){
        $results=Library::paginate(10);
        $amount=count(Library::all());
        return view('libraries/search_result', ["results"=>$results, "amount"=>$amount]);
    }

    public function search(Request $req){
        /*
        $results = DB::table('library')
        ->where('name', $req->searchKey)
        ->select('name', 'description')
        ->get();
        */
        $searchKey = $req->searchKey;
        $results = Library::search($searchKey)
        ->paginate(10);;
        $amount=count($results);

        return view('libraries/search_result', ["results"=>$results, "amount"=>$amount, 'searchKey'=>$searchKey]);
    }
}
