<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/profile', [ProfileController::class, 'profile']);
Route::get('/user/create', [UserController::class,'create']);
Route::post('/user/store', [UserController::class,'store'])->name('user.store');
Route::get('/users', [UserController::class, 'index'])->name('user.index');