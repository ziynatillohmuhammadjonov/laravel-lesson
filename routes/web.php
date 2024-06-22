<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TeachersControllerRoutes;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TeachersController;

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

Route::get('/', [SiteController::class,'index'])->name('home');
Route::get('/users', [SiteController::class,'users'])->name('users');
Route::get('/home', [SiteController::class,'home'])->name('home');
Route::get('/about', [SiteController::class,'about'])->name('about');
Route::get('/message/create', [SiteController::class,'create'])->name('create');
Route::post('/message/store', [SiteController::class,'store'])->name('store');

Route::get('/components', [SiteController::class,'components'])->name('components');

// Route::get('/teachers', [TeachersController::class,'create']);
// Route::post('/teachers', [TeachersController::class, 'store']);

// Resurs kontrollerni ishlatish uchun
Route::resource('/teachers', TeachersControllerRoutes::class);
Route::resource('/posts', PostController::class);
