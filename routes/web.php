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



Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/logout/', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::get('/admin', 'HomeController@dashboard');

    Route::get('/admin/users', 'UsersController@addUser');
    Route::get('/admin/users/list', 'UsersController@usersList');
    Route::post('/admin/users/list/changeStatus', 'UsersController@changeStatus');
    Route::post('/admin/users/list/changeRole', 'UsersController@changeRole');
    Route::post('/admin/users/list/changeRole/update', 'UsersController@update');
    Route::get('/admin/users/permissions', 'UsersController@usersPermissions');
    Route::get('/admin/users/setting', 'UsersController@usersSetting');

    Route::get('/admin/estate/add', 'EstatesController@add');
    Route::get('/admin/estate/list', 'EstatesController@list');
    Route::get('/admin/estate/setting', 'EstatesController@setting');

    Route::post('/admin/estates/ajax/getInfo', 'EstatesController@getInfo');
    Route::post('/admin/estates/ajax/getCityList', 'EstatesController@getCityList');
    Route::post('/admin/estates/ajax/getArea', 'EstatesController@getArea');

    Route::get('/admin/setting/about', 'OptionController@about');
    Route::post('/admin/setting/about/store', 'OptionController@aboutStore');
});

Route::get('/admin/login', ['as' => 'login', 'uses' => 'UsersController@login']);
Route::post('/admin/login/check', 'UsersController@authenticate');
Route::post('/admin/register/store', 'UsersController@store');
Route::get('/admin/password-recovery', 'UsersController@passwordRecovery');

Route::get('/', 'UsersUIController@index');
Route::get('about','UsersUIController@about');
Route::get('contact','UsersUIController@contact');
Route::get('login','UsersUIController@login');
Route::get('register','UsersUIController@register');
Route::get('submit','UsersUIController@submit');
Route::get('preview','UsersUIController@preview');
Route::get('detail/{page}/{id}','UsersUIController@detail');
