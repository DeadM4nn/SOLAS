<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\libraryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/search/results', function () {
    return view('result_pages/library_search');
});

Route::get('/home', function () {
    return view('misc/solas_home');
});

Route::get('/', [libraryController::class, "search_result"]);


Auth::routes();

Route::get('/what', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::POST('library/search', [libraryController::class, "search"]);
Route::get('library/all', [libraryController::class, "show_all"]);
