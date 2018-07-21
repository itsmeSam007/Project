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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('auth/facebook', 'FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'FacebookController@handleFacebookCallback');

Route::get('/customer', 'CustomerController@customer')->middleware('auth');
Route::get('/vendor', 'CustomerController@vendor')->middleware('auth');
Route::post('/saveCustomer', 'CustomerController@saveData')->middleware('auth');