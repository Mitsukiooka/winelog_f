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
    return view('home');
});

Route::resource('wine', 'wineController');
Route::resource('maker', 'makerController');
Route::resource('profile', 'profileController', ['only' => ['show', 'create', 'store', 'edit', 'update', 'destroy']]);

Route::get('/','HomeController@index');
Auth::routes();

