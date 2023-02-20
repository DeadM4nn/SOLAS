<?php

namespace App\Http\Controllers;
use App\Models\Library;
use App\Models\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LibraryControl extends Controller
{


    public function upload(Request $req){
        //validation
        $req->validate([
            'library_file' => 'required|mimes:zip,rar|max:2048'
        ]);

        //Storing information
        $new_version = new Version;
        $new_version->library_id = $req->library_id;
        $new_version->version_number = $req->version;
        $new_version->description = $req->file_description;
        $new_version->save();

        //Check if is_file empty
        $current_library = Library::find($req->library_id);
        if($current_library->is_file == 0){
            $current_library->is_file = 1;
            $current_library->save();
        }


        //Uploading the file
        $file=$req->file('library_file');
        $filename = $new_version->version_id.".".$file->getClientOriginalExtension();
        $file->storeAs('uploads', $filename);

        $message=$req->version_number." has been successfully added";
        $link="library/all";
        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }

    public function view_library_update($id){
        $library = Library::findOrFail($id);
        return view('libraries/update', ["library"=>$library]);
    }

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

    public function update(Request $req){
        $current_library = Library::findOrFail($req->library_id);
        $current_library->name = $req->name;
        $current_library->description = $req->description;
        $current_library->link = $req->link;
        $current_library->command = $req->command;

        $current_library->save();
        $message = $current_library->name." has been successfully update";
        $link = "library/all";
        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }

    public function add(Request $req){
        
        /*
        $req->validate([
            'command' => 'required_without_all:link, library_file',
            'link' => 'required_without_all:command, library_file',
            'library_file' => 'required_without_all:command|file',
        ], [
            'required_without_all' => 'Please provide in either the Link, Command or upload the file of your library.',

        ]);*/

        if(isset($req->library_file))
        $req->validate([
            'library_file' => 'required|mimes:zip,rar|max:2048',
            'file_description' => 'required|filled',
            'version' => 'required',
        ], [
            'file_description.required' => 'Please provide a file description. (Required when uploading a file)',
            'version.required' => 'Please provide a version number. (Required when uploading a file)',
        ]);

        $user = Auth::user();
        $new_library = new Library;
        $new_library->name = $req->name;
        $new_library->description = $req->description;
        $new_library->creator_id = $user->id;
        $new_library->link = $user->link;
        $new_library->command = $user->command;
        
        if(isset($req->library_file)){
            $new_library->is_file = 1;
        }

        $new_library->save();

        //Storing information
        $new_version = new Version;
        $new_version->library_id = $new_library->library_id;
        $new_version->version_number = $req->version;
        $new_version->description = $req->file_description;
        $new_version->save();

        //Uploading the file
        $file=$req->file('library_file');
        $filename = $new_version->version_id.".".$file->getClientOriginalExtension();
        $file->storeAs('uploads', $filename);


        if ($user->is_admin) {
            $link="library/all";
        } else {
            $link="users/library";
        }
        $message=$new_library->name." has been added!";
        

        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }

    public function all_downloads($id){
        $library = Library::find($id);
        $results = Version::where('library_id', $id)
                   ->orderBy('created_at', 'desc')
                   ->get();
        

        return view('libraries/all_download', ["library"=>$library, "results"=>$results]);
    }
}


