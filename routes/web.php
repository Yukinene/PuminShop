<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', function () {
    return view('home');
})->name('home');


Route::get('/cart', [\App\Http\Controllers\CartController::class,"cart"])
    ->name('cart');
Route::get('/add-to-cart/{id}', [\App\Http\Controllers\ProductController::class,"addToCart"])
    ->name('add-cart');
Route::get('/remove/{id}', [\App\Http\Controllers\ProductController::class,"removeFromCart"])
    ->name('remove');
Route::get('/orders', [\App\Http\Controllers\OrderController::class,"index"])
    ->name('orders.index')->middleware('auth');


Route::get('/change-qty/{id}',  [\App\Http\Controllers\ProductController::class,"changeQty"])->name('change_qty');

Route::resource('orders',\App\Http\Controllers\OrderController::class);
Route::resource('logs',\App\Http\Controllers\LogController::class)->middleware('auth');
Route::resource('users',\App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('/products', \App\Http\Controllers\ProductController::class);

require __DIR__.'/auth.php';
