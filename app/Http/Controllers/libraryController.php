<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Library;

class libraryController extends Controller
{
    public function show_all(){
        $results=Library::all();
        return view('result_pages/library_search', ["results"=>$results]);
    }

    public function search(Request $req){
        /*$results = DB::table('library')
        ->where('name', $req->searchKey)
        ->select('name', 'description')
        ->get();*/

        $results = Library::search($req->searchKey)
        ->get();

        return view('result_pages/library_search', ["results"=>$results]);
    }

    public function delete(Request $req){
        // Get a list of all that has the id (One record)
        $id = $req->library_id;
        $record = Library::find($id);
        $name = $record->name;
        $message = $name." has been deleted";
        $link = "admin/library/all";

        // Delete Record
        $record->delete();

        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }
}

