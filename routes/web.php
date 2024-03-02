<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

Route::get('/', [ListingController::class, 'getListings']);

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

// Show listing detail page
Route::get('/list-detail/{id}', [ListingController::class, 'getOne']);

// Show add listing form
Route::get('/listing/create', [ListingController::class, 'create'])->middleware('auth');

//Add listing detail
Route::post('/listing/add', [ListingController::class, 'add'])->middleware('auth');

// Show edit form
Route::get('/listing/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update listing data
Route::put('/listing/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete list data
Route::delete('/listing/{list}', [ListingController::class, 'delete'])->middleware('auth');

// Show users Listing
Route::get('/listing/manage', [ListingController::class, 'getMyLists']);
