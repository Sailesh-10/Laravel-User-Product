<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware;

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

Route::get('/', [UserController::class, 'dash'])->name('welcome');
Route::get('/user/login', [UserController::class, 'login'])->name('user.login');
Route::get('/user/register', [UserController::class, 'register'])->name('user.register');
Route::post('/user/login', [UserController::class, 'loginCheck'])->name('user.check');
Route::post('/user/store', [UserController::class, 'UserStore'])->name('user.store');
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/user/home', [UserController::class, 'home'])->name('user.home')->middleware('login');
Route::get('/admin/dash', [UserController::class, 'AdminDash'])->name('admin.dash')->middleware('login');
Route::get('/product/show', [ProductController::class, 'show'])->name('product.show');
Route::get('/product/add', [ProductController::class, 'add'])->name('product.add');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}/update', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/picture/{id}/edit', [ProductController::class, 'ChangePicture'])->name('picture.edit');
Route::put('/picture/{id}/update', [ProductController::class, 'UpdatePicture'])->name('picture.update');
Route::get('/user/{id}/fav', [UserController::class, 'UserProduct'])->name('user.fav');