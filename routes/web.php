<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
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

Route::match(['get', 'post'], '/', [ProductController::class, 'index'])->name('home');
Route::match(['get', 'post'], '/category', [ProductController::class, 'category'])->name('category');
Route::match(['get', 'post'], '/{category_id}/category', [ProductController::class, 'category'])->name('categoryById');

Route::match(['get', 'post'], '/register', [ClientController::class, 'register'])->name('register');
Route::match(['get', 'post'], '/client/register', [ClientController::class, 'registerClient'])->name('registerClient');
Route::match(['get', 'post'], '/client/login', [UserController::class, 'login'])->name('login');
Route::get('/client/logout', [UserController::class, 'logout'])->name('logout');


Route::match(['get', 'post'], '/{product_id}/cart/add', [ProductController::class, 'addToCart'])->name('addToCart');
Route::match(['get', 'post'], '/cart', [ProductController::class, 'showCart'])->name('showCart');
Route::match(['get', 'post'], '/{index}/remove', [ProductController::class, 'removeFromCart'])->name('removeFromCart');
