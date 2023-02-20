<?php

use App\HTTP\Controllers\LibraryControl;
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
Route::view('/library/add', 'libraries/add');
Route::post('/library/add/process', [LibraryControl::class,"add"]);
Route::get('/library/request/{id}', [LibraryControl::class,"view_library"]);

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
