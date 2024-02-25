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

// Show Login Form.
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Show Register/Create Form.
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Register new user
Route::post('/user/register', [UserController::class, 'register'])->middleware('guest');

// Login existing user
Route::post('/user/login', [UserController::class, 'loginUser'])->middleware('guest');

// Logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
