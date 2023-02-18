<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\libraryController;
use App\HTTP\Controllers\HomeController;
use App\HTTP\Controllers\Auth\LoginController;

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

Auth::routes();
Route::redirect("/","/home");
Route::get("/home",[HomeController::class,"index"]);
