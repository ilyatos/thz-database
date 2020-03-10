<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'StorageController@index')->name('home');

//Auth::routes();

//Route::middleware('auth')
//    ->group(static function () {
//        Route::get('home', 'StorageController@index')->name('home');
//    });
