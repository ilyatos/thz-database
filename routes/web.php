<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    if (Auth::check()) {
        return redirect('home');
    }

    return view('welcome');
});

Auth::routes();

Route::middleware('auth')
    ->group(function () {
        Route::get('home', 'HomeController@index')->name('home');
        Route::get('about', 'HomeController@about')->name('about');
        Route::resource('spectra', 'SpectrumController');
        Route::resource('categories', 'CategoryController');
        Route::get('categories/{category}/spectra', 'CategoryController@spectra')->name('category.spectra');
    });
