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
        Route::get('/json-category', 'CategoryController@categoryjson');
        Route::resource('/colors', 'ColorController');
        Route::resource('/brands', 'BrandController');
        Route::resource('/colors', 'ColorController');
        // wilayah
        Route::get('/provinces', 'CountryController@provinces')->name('provinces');
        Route::get('/districts', 'CountryController@districts')->name('districts');
        Route::get('/regencies', 'CountryController@regencies')->name('regencies');
        Route::get('/villages', 'CountryController@villages')->name('villages');
        Route::get('ongkir', 'CountryController@ongkir')->name('ongkir');
        Route::get('/json-regencies', 'CountryController@regenciesjson');
        Route::get('/json-districts', 'CountryController@districtsjson');
        Route::get('/json-villages', 'CountryController@villagesjson');
        // wilayah
        Route::resource('/materials', 'MaterialController');
        Route::resource('/permissions', 'PermissionController');
        Route::get('/json-permissions', 'PermissionController@permissionJson');
        Route::get('/permissionlist/{id}', 'PermissionController@permissionList');
        Route::post('/permissionassign', 'PermissionController@permissionAssign')->name('permissionassign');
        Route::resource('/products', 'ProductController');
        Route::get('/productadd', 'ProductController@productadd')->name('productadd');
        Route::get('/roprovinces', 'RajaongkirController@getProvinces')->name('roprovinces');
        Route::get('/rodistricts', 'RajaongkirController@getDistricts')->name('rodistricts');
        Route::get('/roregencies', 'RajaongkirController@getRegencies')->name('roregencies');
        Route::get('/rovillages', 'RajaongkirController@getVillages')->name('rovillages');
        Route::resource('/roles', 'RoleController');
        Route::post('/roleassign', 'RoleController@roleassign')->name('role.assign');
        Route::get('/shipping', 'ShippingController@index')->name('shipping');
        Route::post('/shipping/addprovider', 'ShippingController@addprovider');
        Route::resource('/users', 'UserController');
        Route::get('/fetchdata', 'UserController@fetchdata')->name('fetchdata');
        //Testing
        Route::get('/testing', 'TestController@testing')->name('testing');
        Route::get('/viewtest', 'TestController@viewtest')->name('viewtest');
    });
});
// Route::get('/home', 'HomeController@index')->name('home');
