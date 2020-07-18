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


Auth::routes();
Route::group(['middleware' => ['guest']], function () {
    Route::get('/', 'SiteController@index')->name('index');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'SiteController@home')->name('home');
    Route::get('/get/{group}/contact', 'SiteController@getContact')->name('getContact');
    Route::post('/add/group', 'SiteController@addGroup')->name('addGroup');
    Route::post('/add/contact', 'SiteController@addContact')->name('addContact');

});





