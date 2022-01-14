<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pages\HomeController;
use App\Http\Controllers\pages\orders\OrderController;
use App\Http\Controllers\pages\users\UserProfileController;
use App\Http\Controllers\pages\products\ProductIndexController;
use App\Http\Controllers\pages\categorys\CategoryIndexController;
use Illuminate\Http\Request;

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
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Auth::routes();


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false,   // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

Route::middleware('auth')->group(function(){

    Route::resource('/', HomeController::class);

    Route::resource('/categories', CategoryIndexController::class);

    Route::resource('/products', ProductIndexController::class);
    Route::get('/product/cart/{id}', [ProductIndexController::class , 'addToCart']);


    Route::get('/cart', [ProductIndexController::class , 'getCart']);
    Route::delete('/cart/{product}', [ProductIndexController::class , 'getRemoveItem']);
    Route::get('/cart/destroy', [ProductIndexController::class , 'getDestroy']);


    Route::resource('/users', UserProfileController::class)->middleware('super_admin');

    Route::resource('/orders', OrderController::class);

  

});



