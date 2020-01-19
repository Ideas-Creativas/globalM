<?php

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

    Route::view('/', 'frontend/index');
    Route::view('/motos', 'frontend/motos');
    Route::view('/postventa', 'frontend/postventa');
    Route::view('/contacto', 'frontend/contacto');
    // Admin
    Route::prefix('admin')->group(function() {
        Auth::routes();
        Route::resource('/', 'AdminController');
        Route::resource('/banners', 'BannersController')->middleware('auth');
        Route::resource('/marcas', 'MarcasController')->middleware('auth');
        Route::resource('/motos', 'MotosController')->middleware('auth');
    });


 


//Route::get('/home', 'HomeController@index')->name('home');

/* Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/