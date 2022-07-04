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
});

//show login form
Route::get('/login/show', function () {
    return view('auth/login');
});

//login
Route::post('/login', [UserController::class, 'login'])->name('user@login');

//create user
Route::post('/register', [UserController::class, 'store'])->name('register@store');

Route::POST('/logout',  [UserController::class, 'logout'])->name('user@logout');


Route::get('/user/{user}/userDestroy', [UserController::class, 'destroy'])->name('user@destroy');

Route::get('/user/{user}/profile', [UserController::class, 'showProfile'])->name('user@showProfile');

Route::get('/user/displayUsers', [UserController::class, 'index'])->name('users@index');

Route::get('/user/showAddUser', [UserController::class, 'showAddUser'])->name('users@showAddUser');


Route::POST('/user/addUser', [UserController::class, 'addUser'])->name('users@addUser');


//update user
Route::post('/user/{user}/update', [UserController::class, 'update'])->name('user@update');


Route::get('/', [ProductController::class, 'index']);

Route::get('/productShow/{product}', [ProductController::class, 'show'])->name('product@show');

Route::post('/product', [ProductController::class, 'store'])->name('product@store');

Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product@update');

Route::DELETE('/product/productDestroy/{product}', [ProductController::class, 'destroy'])->name('product@destroy');

Route::get('/product/productCreate', [ProductController::class, 'create'])->name('product@create');

Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product@edit');



// Auth::routes();

