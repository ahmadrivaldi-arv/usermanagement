<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[UserController::class,'home'])->middleware('auth');
Route::get('/user-login',[UserController::class,'login'])->name('login')->middleware('guest');
Route::get('/user-register',[UserController::class,'register'])->middleware('guest');

// update & delete handler
Route::get('/user-remove/{user:id}',[UserController::class,'remove'])->middleware('auth');
Route::get('/user-update/{user:id}',[UserController::class,'update'])->middleware('auth');

// user login & register handler
Route::post('/user-login',[UserController::class,'auth']);
Route::post('/user-update',[UserController::class,'update_store']);
Route::post('/user-register',[UserController::class,'register_store']);
Route::post('/user-logout',[UserController::class,'user_logout']);
