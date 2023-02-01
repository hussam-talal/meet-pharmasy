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


Route::get('/', function () {
    return view('welcome');
});

Route::resource('product', App\Http\Controllers\ProductController::class);
Route::get('productss/soft/delete/{id}', [App\Http\Controllers\ProductController::class, 'softDelete'])
    ->name('soft.delete');
Route::get('productss/trash', [App\Http\Controllers\ProductController::class, 'trashedProducts'])
    ->name('product.trash');
Route::get('productss/back/trash/{id}', [App\Http\Controllers\ProductController::class, 'backDelete'])
    ->name('back.trash');
Route::get('productss/back/trash/databass/{id}', [App\Http\Controllers\ProductController::class, 'backforEver'])
    ->name('back.trash.databass');
Route::get('search_ajax', [App\Http\Controllers\ProductController::class, 'search_ajax'])
    ->name('search_ajax');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
