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

Auth::routes();

Route::get('about', 'AboutController')->name('about');

Route::middleware('auth')
    ->group(static function () {
        Route::get('/', 'IndexController')->name('index');
        Route::resource('experiments', 'ExperimentController');
        Route::resource('systems', 'SystemController')->only('create', 'store');
    });
