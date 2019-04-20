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



Route::get('/admin/login', ['as' => 'login', 'uses' => 'UsersController@login']);
Route::post('/admin/login/check', 'UsersController@authenticate');
Route::post('/admin/register/store', 'UsersController@store');
Route::get('/admin/password-recovery', 'UsersController@passwordRecovery');


Route::post('login', 'UsersUIController@authenticate');
Route::post('register', 'UsersUIController@store');
Route::get('/estate/list', 'EstatesController@estateList');
Route::post('/contact/{id}/store', 'FileContactController@store');

Route::post('ajax/cityList', 'EstatesController@getArea');

Route::get('/', ['as'=>'index','uses'=>'UsersUIController@index']);
Route::get('about', 'UsersUIController@about');
Route::get('contact', 'UsersUIController@contact');
Route::get('login', 'UsersUIController@login');
Route::get('register', 'UsersUIController@register');
Route::get('submit', 'UsersUIController@submit');
Route::get('preview', 'UsersUIController@preview');
Route::get('{page}/{id}', 'UsersUIController@detail');
Route::get('logout', 'UsersUIController@logout');
Route::post('contact/submit', 'UsersUIController@contactSubmit');


Route::group(['middleware' => ['auth','role']], function () {
    Route::get('/admin/logout/', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::get('/admin', 'HomeController@dashboard');

    Route::get('/admin/users/add', 'UsersController@addUser');
    Route::get('/admin/users/list', 'UsersController@usersList');
    Route::post('/admin/users/list/changeStatus', 'UsersController@changeStatus');
    Route::post('/admin/users/list/changeRole', 'UsersController@changeRole');
    Route::post('/admin/users/list/changeRole/update', 'UsersController@update');
    Route::get('/admin/users/permissions', 'UsersController@usersPermissions');
    Route::get('/admin/users/setting', 'UsersController@usersSetting');
    Route::post('/admin/users/store', 'UsersUIController@store');

    Route::get('/admin/estate/list', 'EstatesController@list');
    Route::get('/admin/estate/list/changeStatus/{id}/{val}', 'EstatesController@changeStatus');

    Route::get('/admin/estate/setting', 'EstatesController@setting');

    Route::post('/admin/estate/setting/storeAttr', 'EstatesController@storeAttr');
    Route::get('/admin/estate/setting/removeAttr/{id}', 'EstatesController@deleteAttr');
    Route::get('/admin/estate/setting/getCityListSetting', 'EstatesController@getCityListSetting');

    Route::post('/admin/estate/getInfo', 'EstatesController@getInfo');
    Route::post('/admin/estate/getCityList', 'EstatesController@getCityList');
    Route::post('/admin/estate/getArea', 'EstatesController@getArea');

    Route::get('/admin/estate/add/{id}', 'EstatesController@add');
    Route::post('/admin/estate/add', 'EstatesController@store');

    Route::get('/admin/estate/edit/{id}', 'EstatesController@edit');
    Route::patch('/admin/estate/update/{file}', 'EstatesController@update');

    Route::get('/admin/setting/about', 'OptionController@about');
    Route::post('/admin/setting/about/store', 'OptionController@aboutStore');
    Route::get('/admin/setting/contact', 'OptionController@contact');
    Route::get('/admin/setting/contact/view/{id}', 'OptionController@contactView');
    Route::get('/admin/setting/setting', 'OptionController@setting');
    Route::patch('/setting/setting/update/{option}', 'OptionController@update');

});


