<?php

namespace App\Http\Controllers;
use App\Models\Library;
use Illuminate\Http\Request;

class LibraryControl extends Controller
{
    public function show_all(){
        $results=Library::all();
        return view('libraries/search_result', ["results"=>$results]);
    }

    public function search(Request $req){
        $results = DB::table('library')
        ->where('name', $req->searchKey)
        ->select('name', 'description')
        ->get();

        /*$results = Library::search($req->searchKey)
        ->get();*/

        return view('libraries/search_result', ["results"=>$results]);
    }
}
