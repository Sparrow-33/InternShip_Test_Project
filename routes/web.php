<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'index']);
Route::get('/product/productShow/{product}', [ProductController::class, 'show'])->name('product@show');


Route::get('/app', function () {
    return view('layout/app');
});

Route::get('/register', function () {
    return view('auth/register');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/profile', function () {
    return view('user/profile');
});

Route::post('/product', [ProductController::class, 'store']);
Route::DELETE('/product/{product}', [ProductController::class, 'destroy'])->name('product@destroy');

Route::get('/product/productCreate',[ProductController::class, 'create']);