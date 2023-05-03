<?php
//php artisan optimize:clear -> If components aint working right.
use App\HTTP\Controllers\LibraryControl;
use App\HTTP\Controllers\UserControl;
use App\HTTP\Controllers\HomeControl;
use App\Models\Library;
use App\Models\User;
use App\HTTP\Controllers\RatingControl;
use App\HTTP\Controllers\BookmarkControl;
use App\HTTP\Controllers\ComparisonControl;
use Illuminate\Support\Facades\Route;
use App\HTTP\Middleware\AdminMiddleware;
use App\HTTP\Middleware\UserMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home');
});

Route::get('/library/all', [LibraryControl::class,"show_all"]);
Route::get('/library/request/{id}', [LibraryControl::class,"view_library"]);
Route::get('library/{id}/downloads', [LibraryControl::class,"all_downloads"]);

Route::get('/downloads/{filename}', [LibraryControl::class,"download"])->name('download');

Route::redirect("/","home");

// User Admin Pages
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin/users/all', [UserControl::class,"show_all"]);
    Route::post('/admin/users/delete', [UserControl::class,"delete"]);
    Route::post('/admin/users/search', [UserControl::class,"search"]);
    Route::get('/admin/users/update/{id}', [UserControl::class,"admin_view_update"]);
    Route::post('/admin/users/update_process', [UserControl::class,"update"]);
    Route::view('/admin/users/add', 'users.register');
    Route::post('/admin/users/add/process', [UserControl::class,"register"]);
});

Route::middleware([UserMiddleware::class])->group(function () {
    //Library Pages
    Route::post('/library/upload', [LibraryControl::class,"upload"]);
    Route::get('library/update/{id}', [LibraryControl::class,"view_library_update"]);
    Route::post('/library/delete', [LibraryControl::class,"delete"]);
    Route::get('/library/add', [LibraryControl::class,"view_add_library"]);
    Route::post('/library/add/process', [LibraryControl::class,"add"]);
    Route::post('/library/update/process', [LibraryControl::class,"update"]);
    Route::view('/user/password/change', 'users.change_password');
    Route::post('/user/password/change/process',  [UserControl::class,"change_password"]);
    

    // User Personal Pages
    Route::get('/user/view/{id}', [UserControl::class,"user_view"]);
    Route::get('user/update/', [UserControl::class,"view_update"]);
    Route::post('user/update_process/', [UserControl::class,"update"]);
    Route::get('user/libraries', [LibraryControl::class, 'view_my_libraries']);
});

Route::get('tag/search/{id}', [LibraryControl::class, 'search_by_tag']);
Route::get('language/search/{id}', [LibraryControl::class, 'search_by_lang']);
Route::post('license/search/', [LibraryControl::class, 'search_by_license']);

//User Specific Pages

Route::get('/home', [HomeControl::class, 'view_home'])->name('home');
Route::view('test','ratings-panel');
//Route::get("/home","home")->name("home");
Route::view("/dashboard","home")->name("dashboard");



Route::post('/user/bookmark/add', [BookmarkControl::class,"add"]);
Route::post('/user/bookmark/remove', [BookmarkControl::class,"delete"]);
Route::get('/user/bookmark', [BookmarkControl::class, "view"]);

Route::post('/user/rating/add', [RatingControl::class, "add"]);
Route::post('/user/rating/update', [RatingControl::class, "update"]);
Route::post('/user/rating/delete', [RatingControl::class, "delete"]);

Route::post('/user/compare/add', [ComparisonControl::class, "add"]);
Route::post('/user/compare/update', [ComparisonControl::class, "update_all"]);
Route::get('/user/compare/delete/{id}', [ComparisonControl::class, "delete"]);
Route::get('/user/compare', [ComparisonControl::class, "view_comparisons"]);
Route::get('/user/compare/clear', [ComparisonControl::class, "clear_all"]);

Route::get('/discover', [LibraryControl::class,"show_randomize"]);

Route::get('user/bookmark/libraryupdate/{id}', [BookmarkControl::class,"update_latest_version"]);

Route::post('user/picture/update/process', [UserControl::class, "update_picture"]);
Route::get('/user/picture/update/{id}', [UserControl::class, "view_update_picture"]);

Route::get('user/rating/update/{id}', [RatingControl::class, "go_to_update"]);

//Actually no middleware
Route::post('/library/search', [LibraryControl::class,"search"]);