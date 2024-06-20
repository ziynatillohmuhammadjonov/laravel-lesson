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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::view('/', 'welcome');

Route::redirect('/home', '/', '302');

Route::fallback(function () {
    return 'Fallback route';//Agar marshruutga hech biri javob beramsa u ishga tushadi. Buni oxiriga yozish kerak. Aks xolda u ostidadigliri ishlatmay qo'yadi.

});
