<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::get('/user/login', [UserController::class, 'login'])->name('user.login');;
Route::get('/user/register', [UserController::class, 'register'])->name('user.register');
Route::post('/user/login', [UserController::class, 'loginCheck'])->name('user.check');
Route::post('/user/store', [UserController::class, 'UserStore'])->name('user.store');
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/user/home', [UserController::class, 'home'])->name('user.home');
Route::get('/admin/dash', [UserController::class, 'AdminDash'])->name('admin.dash');