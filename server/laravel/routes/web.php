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



Route::resource('wine', 'WineController');
Route::resource('maker', 'MakerController');
Route::resource('profile', 'ProfileController', ['only' => ['show', 'create', 'store', 'edit', 'update', 'destroy']]);
Route::resource('review', 'ReviewController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);

Route::get('/','HomeController@index');
Route::get('home', 'HomeController@index');
Auth::routes();

