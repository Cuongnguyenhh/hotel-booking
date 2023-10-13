<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user', function(){
    return view('HomeView');
});
Route::post('sign-up',[UserController::class,'register'])->name('register');
Route::post('login',  [UserController::class, 'login'])->name('login');
Route::get('logout',  [UserController::class, 'logout']);
