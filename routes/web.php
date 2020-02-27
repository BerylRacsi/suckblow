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

/*User*/
Route::view('/home', 'home')->middleware('auth');

/*Partner*/
Route::group(['middleware' => 'auth:partner'], function () {
    Route::view('/partner', 'partner');
});

/*Admin*/
Route::group(['prefix' => 'admin','middleware' => 'auth:admin'], function () {
	Route::get('/','AdminPanelController@index');

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
/*Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin');
});*/

