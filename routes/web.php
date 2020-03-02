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


Route::group(['prefix' => 'user','middleware' => 'auth'], function () {
	Route::get('home','StoreController@index');

    Route::resource('gear','GearController');
	Route::resource('course','CourseController');
	Route::resource('usertrip','UserTripController');
	Route::resource('partnertrip','PartnerTripController')->only(['index','show']);
});

Route::group(['prefix' => 'partner','middleware' => 'auth:partner'], function () {
	Route::get('home','StoreController@index');

    Route::resource('gear','GearController');
	Route::resource('course','CourseController');
	Route::resource('usertrip','UserTripController')->only(['index','show']);
	Route::resource('partnertrip','PartnerTripController');
});

/*Admin*/
Route::group(['prefix' => 'admin','middleware' => 'auth:admin'], function () {
	Route::view('/','admin/index');

    Route::resource('admin-account','AdminController');
    Route::resource('user-account','UserController');
    Route::resource('partner-account','PartnerController');

    Route::resource('gear','GearController');
	Route::resource('course','CourseController');
	Route::resource('usertrip','UserTripController');
	Route::resource('partnertrip','PartnerTripController');

	Route::get('/manage/agency','ManageController@showAgencyList');
	Route::get('/manage/facility','ManageController@showFacilityList');

	Route::get('/manage/agency/create','ManageController@showAgencyForm');
	Route::get('/manage/facility/create','ManageController@showFacilityForm');

	Route::post('/manage/agency/store','ManageController@storeAgency');
	Route::post('/manage/facility/store','ManageController@storeFacility');
});