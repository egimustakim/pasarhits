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

//front-end

Route::get('/', function () {
    return view('home');
});

Route::prefix('customer')->group(function () {
    Route::get('/login', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
    Route::post('/login', 'Auth\CustomerLoginController@login')->name('customer.login.submit');
    Route::get('/profile', 'CustomerController@profile')->name('customer.profile');
    Route::group(['middleware' => 'auth:customer'], function () {
        Route::get('/profile', 'CustomerController@profile')->name('customer.profile');
        Route::get('/logout', 'Auth\CustomerLoginController@logout')->name('customer.logout');;
    });
});

//social login
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

//back-end

Auth::routes([
    'register' => false,
]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('rlaadmin', 'RlaadminController@index')->name('rlaadmin');
    Route::prefix('rlaadmin')->group(function () {
        Route::resource('/categories', 'CategoryController');
        Route::resource('/colors', 'ColorController');
        Route::resource('/brands', 'BrandController');
        Route::resource('/colors', 'ColorController');
        Route::resource('/materials', 'MaterialController');
        // wilayah
        Route::get('/provinces', 'CountryController@provinces');
        Route::get('/districts', 'CountryController@districts');
        Route::get('/regencies', 'CountryController@regencies');
        Route::get('/villages', 'CountryController@villages');
        Route::get('/json-regencies', 'CountryController@regenciesjson');
        Route::get('/json-districts', 'CountryController@districtsjson');
        Route::get('/json-villages', 'CountryController@villagesjson');
        // wilayah
        Route::resource('/roles', 'RoleController');
        Route::post('/roleassign', 'RoleController@roleassign')->name('role.assign');
        Route::get('/shipping', 'ShippingController@index');
        Route::post('/shipping/addprovider', 'ShippingController@addprovider');
        Route::resource('/users', 'UserController');
        Route::get('/fetchdata', 'UserController@fetchdata')->name('fetchdata');
    });
});


Route::get('punyarole', 'RoleController@punyarole');
// Route::get('/home', 'HomeController@index')->name('home');
