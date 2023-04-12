<?php

namespace App\Http\Controllers;
use App\Models\Library;
use App\Models\Tag;
use App\Models\Language;
use App\Models\Bookmark;
use App\Models\LibraryLanguage;
use App\Models\LibraryTag;
use App\Models\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


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
        $tag_names = Tag::select("name")->get();
        $language_names = Language::select("name")->get();

        //Getting all tags
        $tags_dic = Tag::select('tags.name')
        ->distinct()
        ->join('library_tags', 'library_tags.tag_id', '=', 'tags.tag_id')
        ->where('library_tags.library_id', '=', $id)
        ->get();
        
        $tags = Array();
        // Extract the 'name' values into a new array
        foreach($tags_dic as $tag){
            array_push($tags,$tag['name']);
        }

        $tags = implode("<=>",$tags);


        //Getting all the languages
        $languages_dic = Language::select('languages.name')
        ->distinct()
        ->join('library_languages', 'library_languages.language_id', '=', 'languages.language_id')
        ->where('library_languages.library_id', '=', $id)
        ->get();

        $languages = Array();
        // Extract the 'name' values into a new array
        foreach($languages_dic as $language){
            array_push($languages,$language['name']);
        }

        $languages = implode("<=>",$languages);

        return view('libraries/update', ["library"=>$library,"tag_names"=>$tag_names,"language_names"=>$language_names, "tags"=>$tags, "languages"=>$languages]);
    }

    public function view_library($id){
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

        $libraryId = 10182;
        $accountId = 1;
        
        $bookmark = Bookmark::select('last_version')
            ->join('libraries', 'libraries.library_id', '=', 'bookmarks.library_id')
            ->where('libraries.library_id', $id)
            ->where('bookmarks.account_id', Auth::user()->id)
            ->first();

        return view('libraries/view', ["library"=>$view_library,"download"=>$download, "tags" => $tags, "languages" => $languages, "license" => $license, "bookmark" => $bookmark]);

    }

    public function delete(Request $req){
        $id = $req->library_id;

        Version::where('library_id', $id)->delete();

        $user = Auth::user();
        $record = Library::find($id);
        $name = $record->name;
        $message = $name." has been deleted";
        $link = "/library/all";

        if ($user->is_admin) {
            $link="library/all";
        } else {
            $link="user/libraries";
        }

        //Delete Tags
        LibraryTag::where('library_id', $id)->delete();
        //Delete Language
        LibraryLanguage::where('library_id', $id)->delete();

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
        $results = Library::search($searchKey)->paginate(20000);
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

        // Delete all occurances of tags and library so that they may get renew
        LibraryTag::where('library_id', $current_library->library_id)->delete();
        LibraryLanguage::where('library_id', $current_library->library_id)->delete();

        
        // Update Tag
        Log::info($req->tag);
        if (!empty($req->tag)) {
            Log::info($req->tag);

            $tags_list = $req->tag;
            $tags_list = explode("<=>", $tags_list);

            foreach($tags_list as $tag){
                LibraryControl::add_tag_to_account($tag, $current_library->library_id);
            }
        }

        // Update Language
        Log::info($req->language);
        if (!empty($req->language)) {
            Log::info($req->language);
            $languages_list = $req->language;
            $languages_list = explode("<=>", $languages_list);

            foreach($languages_list as $languages){
                LibraryControl::add_language_to_account($languages, $current_library->library_id);
            }
        }
        

        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }

    // This function is used to register the tag to the library
    public function add_tag_to_account($tagName, $library_id){
        $tag_existance = Tag::where('name', $tagName)->first();
        
        // Checks if the tag alr exist
        if ($tag_existance) {
            $tag_id = $tag_existance->tag_id;
        } else {
            $tag_new = new Tag;
            $tag_new->name = $tagName;
            $tag_new->save();

            // Its still called ID
            $tag_id = $tag_new->tag_id;
        }
        Log::Info($tag_id);
        $library_tag_new = new LibraryTag;
        $library_tag_new->library_id = $library_id;
        $library_tag_new->tag_id = $tag_id;
        $library_tag_new->save();

    }

    // This function is used to register the Language to the account
    public function add_language_to_account($languageName, $library_id){
        $language_existance = Language::where('name', $languageName)->first();
        
        // Checks if the language alr exist
        if ($language_existance) {
            $language_id = $language_existance->language_id;
        } else {
            $language_new = new Language;
            $language_new->name = $languageName;
            $language_new->save();
            //Newly created IDs are still id
            $language_id = $language_new->id;
        }


        $library_language_new = new LibraryLanguage;
        $library_language_new->library_id = $library_id;
        $library_language_new->language_id = $language_id;
        $library_language_new->save();
        
    }

    public function add(Request $req){
        
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
        $new_library->link = $req->link;
        $new_library->command = $req->command;
        $new_library->license = $req->license;
        
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
            $link="user/libraries";
        }
        $message=$new_library->name." has been added!";
        
        // Add Tag
        Log::info($req->tag);
        if (!empty($req->tag)) {
            Log::info($req->tag);

            $tags_list = $req->tag;
            $tags_list = explode("<=>", $tags_list);

            foreach($tags_list as $tag){
                LibraryControl::add_tag_to_account($tag, $new_library->library_id);
            }
        }

        // Add Language
        Log::info($req->language);
        if (!empty($req->language)) {
            Log::info($req->language);

            $languages_list = $req->language;
            $languages_list = explode("<=>", $languages_list);

            foreach($languages_list as $languages){
                LibraryControl::add_language_to_account($languages, $new_library->library_id);
            }
        }
        

        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }

    public function all_downloads($id){
        $library = Library::find($id);
        $results = Version::where('library_id', $id)
                   ->orderBy('created_at', 'desc')
                   ->get();
        

        return view('libraries/all_download', ["library"=>$library, "results"=>$results]);
    }

    public function view_add_library(){
        # Get all the Tag names
        $tag_names = Tag::select("name")->get();
        $language_names = Language::select("name")->get();
        return view('libraries/add', ["tag_names"=>$tag_names, "language_names"=>$language_names]);
    }

    public function view_my_libraries(){
        $id = Auth::user()->id;
        $results = Library::where("creator_id",'=',$id)->get();
        $amount = count($results);
        return view('libraries/user/my_libraries', ['results'=>$results, "amount"=>$amount]);
    }
}


