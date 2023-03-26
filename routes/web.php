<?php

use App\HTTP\Controllers\LibraryControl;
use App\HTTP\Controllers\UserControl;
use Illuminate\Support\Facades\Route;

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
Route::post('/library/delete', [LibraryControl::class,"delete"]);
Route::post('/library/search', [LibraryControl::class,"search"]);
Route::get('/library/add', [LibraryControl::class,"view_add_library"]);
Route::post('/library/add/process', [LibraryControl::class,"add"]);
Route::post('/library/update/process', [LibraryControl::class,"update"]);
Route::get('/library/request/{id}', [LibraryControl::class,"view_library"]);
Route::get('library/update/{id}', [LibraryControl::class,"view_library_update"]);
Route::post('/library/upload', [LibraryControl::class,"upload"]);
Route::get('library/{id}/downloads', [LibraryControl::class,"all_downloads"]);

Route::get('/downloads/{filename}', function ($filename) {
    $path = storage_path('app/uploads/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    $response->header("Content-Disposition", "attachment; filename=$filename");
    return $response;
})->name('download');

Route::redirect("/","home");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});


//Route::get("/home","home")->name("home");
Route::view("/dashboard","home")->name("dashboard");

// User Pages
Route::get('/admin/users/all', [UserControl::class,"show_all"]);
Route::post('/admin/users/delete', [UserControl::class,"delete"]);
