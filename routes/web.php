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

Route::get('/twofactor', 'BeforeController@authorization')->name('twofactor');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/change-password', 'HomeController@changePassword')->name('change.password');
Route::post('/change-pass', 'HomeController@passwordChanged')->name('password.changed');


//Two-Factor-Auth
Route::get('/home/security', 'HomeController@twoFactor')->name('security');
Route::post('/home/security/create', 'HomeController@createTwofactor')->name('security.create');
Route::post('/home/google/verify', 'BeforeController@verifyTwofactor')->name('two.verify');
Route::post('/home/google/disable', 'HomeController@disableTwofactor')->name('disable.2fa');
