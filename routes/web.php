<?php

use App\Http\Controllers\Auth\LoginCotroller;
use App\Http\Controllers\Auth\RegisterCotroller;
use App\Http\Controllers\CMS\HomeController;
use App\Http\Controllers\CMS\PostController;
use App\Http\Controllers\CMS\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware('isAdmin')->group(function () {
});
Route::get('/',[HomeController::class,'index'])->name('Menu');
Route::get('/admin/Dashboard',[HomeController::class,'Dashboard'])->name('Dashboard');
Route::get('/admin/login',[RegisterCotroller::class,'index'])->name('register.admin');

