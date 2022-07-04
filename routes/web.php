<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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



Route::get('/app', function () {
    return view('layout/app');
});

Route::get('/register', function () {
    return view('auth/register');
})->middleware('guest');

//show login form
Route::get('/login/show', function () {
    return view('auth/login');
})->name('login');

//login
Route::post('/login', [UserController::class, 'login'])->name('user@login');

//create user
Route::post('/register', [UserController::class, 'store'])->name('register@store');

Route::POST('/logout',  [UserController::class, 'logout'])->name('user@logout');

Route::get('/user/{user}/userDestroy', [UserController::class, 'destroy'])->name('user@destroy')->middleware('auth');

Route::get('/user/{user}/profile', [UserController::class, 'showProfile'])->name('user@showProfile')->middleware('auth');

Route::get('/user/displayUsers', [UserController::class, 'index'])->name('users@index')->middleware('auth');

Route::get('/user/showAddUser', [UserController::class, 'showAddUser'])->name('users@showAddUser')->middleware('auth');


Route::POST('/user/addUser', [UserController::class, 'addUser'])->name('users@addUser')->middleware('auth');

//update user
Route::post('/user/{user}/update', [UserController::class, 'update'])->name('user@update')->middleware('auth');

Route::get('/', [ProductController::class, 'index']);

Route::get('/productShow/{product}', [ProductController::class, 'show'])->name('product@show');

Route::post('/product', [ProductController::class, 'store'])->name('product@store')->middleware('auth');

Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product@update')->middleware('auth');

Route::DELETE('/product/productDestroy/{product}', [ProductController::class, 'destroy'])->name('product@destroy')->middleware('auth');

Route::get('/product/productCreate', [ProductController::class, 'create'])->name('product@create')->middleware('auth');

Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product@edit')->middleware('auth');



// Auth::routes();


