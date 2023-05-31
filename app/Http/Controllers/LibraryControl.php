<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BookmarkControl;
use App\Http\Controllers\RatingControl;
use App\Models\Library;
use App\Models\Bookmark;
use App\Models\A_Library;
use App\Models\A_Version;
use App\Models\Tag;
use App\Models\Language;
use App\Models\Comparison;
use App\Models\LibraryLanguage;
use App\Models\LibraryTag;
use App\Models\Version;
use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class LibraryControl extends Controller
{
    public function download($filename){
        $data = Version::findorfail($filename);
        $data_extension = $data->file_extension;
        $path = storage_path('app/uploads/'.$filename.".".$data_extension);

        
        $timestamp = $data->created_at;
        $date = Carbon::parse($timestamp)->format('dmy');

        
        if (!File::exists($path)) {
            abort(404);
        }

        $headers = [
            'Content-Type' => File::mimeType($path),
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        return response()->download($path, $filename."_".$date.".".$data_extension, $headers);
    }

    public function upload(Request $req){
        //validation
        $req->validate([
            'library_file' => 'required|mimes:zip,rar|max:2048'
        ]);

        //Uploading the file
        $file=$req->file('library_file');
        

        //Storing information
        $new_version = new Version;
        $new_version->library_id = $req->library_id;
        $new_version->version_number = $req->version;
        $new_version->description = $req->file_description;
        $new_version->file_extension = $file->getClientOriginalExtension();
        $new_version->save();

        $filename = $new_version->version_id.".".$file->getClientOriginalExtension();
        $file->storeAs('/uploads', $filename);

        //Check if is_file empty
        $current_library = Library::find($req->library_id);
        if($current_library->is_file == 0){
            $current_library->is_file = 1;
            $current_library->save();
        }
        // Updates library also
        $current_library->touch();

        //Uploading the file
        $file=$req->file('library_file');
        $filename = $new_version->version_id.".".$file->getClientOriginalExtension();
        $file->storeAs('/uploads', $filename);

        $message= "File has been successfully added to ".$current_library->name;
        $link = "library/request/".$current_library->library_id;
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

    public function view_library($id, $show_update=false){
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

        if(Auth::user()){
            $user_rating = Rating::select('ratings.*', 'users.username', 'users.picture')
            ->join('users', 'ratings.account_id', '=', 'users.id')
            ->where('library_id', $id)
            ->where("account_id", Auth::user()->id)
            ->first();
        } else {
            $user_rating = null;
        }


        return view('libraries/view', ["library"=>$view_library,"download"=>$download, "tags" => $tags, "languages" => $languages, "license" => $license, "bookmark" => $bookmark,"avg_rating"=>$avg_rating, "avg_rating_count"=>$avg_rating_count,"ratings"=>$ratings,"user_rating"=>$user_rating, "show_update"=>$show_update]);

    }

    public function delete(Request $req){
        $id = $req->library_id;
        
        // Bookmark delete
        $bookmarks = Bookmark::where('library_id', '=', $id)->get();
        $bookmark_control = new BookmarkControl;

        foreach($bookmarks as $bookmark){
            $bookmark_control->delete_pure($bookmark->id);
        }

        // Rating Delete
        $ratings = Rating::where('library_id', '=', $id)->get();
        $rating_control = new RatingControl;

        foreach($ratings as $rating){
            $rating_control->delete_pure($rating->id);
        }

        // Version delete
        $curr_versions = Version::where('library_id', $id)->get();

        foreach($curr_versions as $version){
            $version_archive = new A_Version;
            $version_archive->version_id = $version->version_id;
            $version_archive->library_id = $version->library_id;
            $version_archive->version_number = $version->version_number;
            $version_archive->description = $version->description;
            $version_archive->created_at = $version->created_at;
            $version_archive->updated_at = $version->updated_at;
            $version_archive->file_extension = $version->file_extension;
            $version_archive->save();
        }

        Version::where('library_id', $id)->delete();

        // Comparison table delete
        Comparison::where('library_id', $id)->delete();

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

        $archive_record = new A_Library;
        $archive_record->library_id = $record->library_id;
        $archive_record->name = $record->name;
        $archive_record->description = $record->description;
        $archive_record->license = $record->license;
        $archive_record->views = $record->views;
        $archive_record->command = $record->command;
        $archive_record->link = $record->link;
        $archive_record->is_file = $record->is_file;
        $archive_record->creator_id = $record->creator_id;
        $archive_record->updated_at = $record->updated_at;
        $archive_record->created_at = $record->created_at;
        $archive_record->save();

        // Delete Record
        $record->delete();

        return view("confirmations/after", ["message"=>$message, "link"=>$link]);
    }


    public function delete_pure(Request $req){
        $id = $req->library_id;

        $bookmarks = Bookmark::where('library_id', '=', $id)->get();
        $bookmark_control = new BookmarkControl;

        foreach($bookmarks as $bookmark){
            $bookmark_control->delete_pure($bookmark->id);
        }

        $ratings = Rating::where('library_id', '=', $id)->get();
        $rating_control = new RatingControl;

        foreach($ratings as $rating){
            $rating_control->delete_pure($rating->id);
        }

        // Version delete
        $curr_versions = Version::where('library_id', $id)->get();

        foreach($curr_versions as $version){
            $version_archive = new A_Version;
            $version_archive->version_id = $version->version_id;
            $version_archive->library_id = $version->library_id;
            $version_archive->version_number = $version->version_number;
            $version_archive->description = $version->description;
            $version_archive->created_at = $version->created_at;
            $version_archive->updated_at = $version->updated_at;
            $version_archive->file_extension = $version->file_extension;
            $version_archive->save();
        }

        Version::where('library_id', $id)->delete();

        // Comparison table delete
        Comparison::where('library_id', $id)->delete();


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

        $archive_record = new A_Library;
        $archive_record->library_id = $record->library_id;
        $archive_record->name = $record->name;
        $archive_record->description = $record->description;
        $archive_record->license = $record->license;
        $archive_record->views = $record->views;
        $archive_record->command = $record->command;
        $archive_record->link = $record->link;
        $archive_record->is_file = $record->is_file;
        $archive_record->creator_id = $record->creator_id;
        $archive_record->updated_at = $record->updated_at;
        $archive_record->created_at = $record->created_at;
        $archive_record->save();

        // Delete Record
        $record->delete();

    }

    public function show_all(){
        $results=Library::paginate(10);
        $pagination = true;
        $amount=count(Library::all());
        return view('libraries/search_result', ["results"=>$results, "amount"=>$amount, "pagination"=>$pagination]);
    }

    public function search(Request $req){
        /*
        $results = DB::table('library')
        ->where('name', $req->searchKey)
        ->select('name', 'description')
        ->get();
        */
        $searchKey = $req->searchKey;

        $tagQuery = Library::whereHas('tags', function ($query) use ($searchKey) {
            $query->where('name', 'like', '%'.$searchKey.'%');
        });
        
        $languageQuery = Library::whereHas('languages', function ($query) use ($searchKey) {
            $query->where('name', 'like', '%'.$searchKey.'%');
        });
        
        $results = $tagQuery->union($languageQuery)->get();

        $search_results = Library::search($searchKey)->get();

        foreach($search_results as $sr){
            $curr_library = new Library();

            $curr_library->library_id = $sr->library_id;
            $curr_library->name = $sr->name;
            $curr_library->description = $sr->description;
            $curr_library->license = $sr->license;
            $curr_library->views = $sr->views;
            $curr_library->command = $sr->command;
            $curr_library->link = $sr->link;
            $curr_library->is_file = $sr->is_file;
            $curr_library->creator_id = $sr->creator_id;
            $curr_library->updated_at = $sr->updated_at;
            $curr_library->created_at = $sr->created_at;

            $results->push($curr_library);
        }
        
        $results = $results->unique('library_id')->sortByDesc('views');

        $amount=count($results);

        return view('libraries/search_result', ["results"=>$results, "amount"=>$amount, 'searchKey'=>$searchKey]);
    } 


    public function update(Request $req){
        $current_library = Library::findOrFail($req->library_id);
        $current_library->name = $req->name;
        $current_library->description = $req->description;
        $current_library->link = $req->link;
        $current_library->license = $req->license;
        $current_library->command = $req->command;

        $current_library->save();
        $message = $current_library->name." has been successfully update";
        $link = "library/request/".$current_library->library_id;

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

        //Uploading the file
        $file=$req->file('library_file');



        //Storing information
        $new_version = new Version;
        $new_version->library_id = $new_library->library_id;
        $new_version->version_number = $req->version;
        $new_version->description = $req->file_description;
        $new_version->file_extension = $file->getClientOriginalExtension();
        $new_version->save();

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

    public function search_by_tag($id){
        $tag = Tag::find($id);
        $results =  $tag->librariesWithTagId($id);
        $amount = $results->count();
        $searchKey = null;

        return view('libraries/search_result', ["results"=>$results, "amount"=>$amount, 'searchKey'=>$searchKey]);
    }

    public function search_by_lang($id){
        $language = Language::find($id);
        $results =  $language->librariesWithLanguageId($id);
        $amount = $results->count();
        $searchKey = null;
    
        return view('libraries/search_result', ["results"=>$results, "amount"=>$amount, 'searchKey'=>$searchKey]);
    }

    public function search_by_license(Request $req){
        $results = Library::where('license','=',$req->license)->get();
        $amount = $results->count();
        $searchKey = null;
    
        return view('libraries/search_result', ["results"=>$results, "amount"=>$amount, 'searchKey'=>$searchKey]);
    }

    public function show_randomize(){
        $results=Library::inRandomOrder()->paginate(10);
        $pagination = true;
        $amount=count(Library::all());
        return view('libraries/search_result', ["results"=>$results, "amount"=>$amount, "pagination"=>$pagination]);
    }
    
}


