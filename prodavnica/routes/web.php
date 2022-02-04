<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PhotoController;
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

//login
Route::get('/', function () {
    return view('auth.register');
});

//CRUD CATEGORIES AND PRODUCTS
Route::resource('/categories', CategoryController::class)->middleware('is_loged');
Route::resource('/products', ProductController::class)->middleware('is_loged');

Route::group(['middleware' => 'is_admin'], function()
{
    Route::delete('photo_delete/{id}', [PhotoController::class, 'deletePhoto'])->name('photo_delete');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::resource('/categories', CategoryController::class,  ['except' => ['index']]);
    Route::resource('/products', ProductController::class, ['except' => ['index']]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[ProductController::class, 'index'] )->name('dashboard');
