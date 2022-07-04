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

Route::get('/login', function () {
    return view('auth/login');
});

Route::POST('/logout',  [UserController::class, 'logout'])->name('user@logout');

Route::DELETE('/user/{user}', [UserController::class, 'destroy'])->name('user@destroy');


Route::get('/profile', function () {
    return view('user/profile');
});

//show login form
Route::get('/login', function () {
    return view('login');
});

//login
Route::post('/login', 'UserController@login');
//display all u
Route::get('/users/displayUsers', [UserController::class, 'index']);

//create user
Route::post('/register', [UserController::class, 'store'])->name('register@store');


Route::get('/', [ProductController::class, 'index']);

Route::get('/product/productShow/{product}', [ProductController::class, 'show'])->name('product@show');

Route::post('/product', [ProductController::class, 'store']);

Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product@edit');

Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product@update');

Route::DELETE('/product/{product}', [ProductController::class, 'destroy'])->name('product@destroy');

Route::get('/product/productCreate', [ProductController::class, 'create']);




// Auth::routes();

