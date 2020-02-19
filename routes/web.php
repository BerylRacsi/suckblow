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

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/login/partner', 'Auth\LoginController@showPartnerLoginForm')->name('login.partner');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');
Route::get('/register/partner', 'Auth\RegisterController@showPartnerRegisterForm')->name('register.partner');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/partner', 'Auth\LoginController@partnerLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');
Route::post('/register/partner', 'Auth\RegisterController@createPartner')->name('register.partner');

Route::view('/home', 'home')->middleware('auth');
Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin');
});

Route::group(['middleware' => 'auth:partner'], function () {
    Route::view('/partner', 'partner');
});

Route::resource('gear','GearController');
Route::resource('course','CourseController');
Route::resource('usertrip','UserTripController');
Route::resource('partnertrip','PartnerTripController');