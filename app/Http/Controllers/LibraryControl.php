<?php

namespace App\Http\Controllers;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryControl extends Controller
{
    public function view_library($id){
        $current_library = Library::find($id);
        
        //Checks if the record exists
        if(is_null($current_library)){
            $message = "We have no record of that library.";
            $link = "/home";
            return view("confirmations/after", ["message"=>$message, "link"=>$link]);
        }

        $current_library->views = $current_library->views+1;
        $current_library->save();

        $view_library = Library::find($id);
        return view('libraries/view', ["library"=>$view_library]);

    }

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

    public function add(Request $req){
        $user = Auth::user();
        $new_library = new Library;
        $new_library->name = $req->name;
        $new_library->description = $req->description;
        $new_library->creator_id = $user->id;
        $new_library->save();


        if ($user->is_admin) {
            $link="library/all";
        } else {
            $link="users/library";
        }
        $message=$new_library->name." has been added!";
        

        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }
}
