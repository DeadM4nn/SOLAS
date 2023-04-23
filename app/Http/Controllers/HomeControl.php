<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\DB;

use App\Http\Controllers\BookmarkControl;
use App\Http\Controllers\RatingControl;
use App\Models\Library;
use App\Models\User;
use App\Models\Bookmark;
use App\Models\A_Library;
use App\Models\A_Version;
use App\Models\Tag;
use App\Models\Language;
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



class HomeControl extends Controller
{
    function view_home(){
                
        $library_count = Library::count();
        $user_count = User::count();
        $popular = Library::orderBy('views', 'desc')->take(3)->get();
        $discover = Library::inRandomOrder()->take(3)->get();

        return view('home', ['library_count'=>$library_count, 'user_count'=>$user_count, "popular"=>$popular,"discover"=>$discover]);
    }
}
