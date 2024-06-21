<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
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

Route::get('/test/{id}/name/{name?}', function ($id, $name = null) {
    return view('test', compact('id', 'name'));
});

Route::get('/user', function () {
    return 'User routesi';
})->name('user');

Route::get('/users/id/{id}/name/{name}', function ($id, $name){
    return view('users', compact('id','name'));
})->name('users');


// Routlarni guruhlash.
Route::prefix('site')->name('site.')->group(function () {
    Route::get('/post', function(){
        return '/post - routeri';
    })->name('post');
    Route::get('/students', function () {
        return '/students - routeri';
    })->name('students');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', function(){
        return '/users - routeri';
    })->name('users');

    Route::get('/checkotus', function(){
        return '/checkouts - routeri';
    })->name('checkouts');
});

// Route::view('/', 'welcome');

// Route::redirect('/home', '/', '302');

// Route::get('/test', TestController::class);


// //CRUD (Creat, Read, Update, Delete)
// Route::get('/posts', [PostController::class, 'index'])->name('posts');
// Route::get('posts/create',[PostController::class, 'create'])->name('posts.create');
// Route::post('posts',[PostController::class, 'store'])->name('posts.store');
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Route::get('/posts/{post}/edit}', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
// Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('posts.delete');
// Route::get('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');




// Route::fallback(function () {
//     return 'Fallback route';//Agar marshruutga hech biri javob beramsa u ishga tushadi. Buni oxiriga yozish kerak. Aks xolda u ostidadigliri ishlatmay qo'yadi.

// });
