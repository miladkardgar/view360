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

Route::get('/cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

Route::get('/admin/login', ['as' => 'login', 'uses' => 'UsersController@login']);
Route::post('/admin/login/check', 'UsersController@authenticate');
Route::post('/admin/register/store', 'UsersController@store');
Route::get('/admin/password-recovery', 'UsersController@passwordRecovery');
Route::get('/estate/list', ['as' => 'estateList', 'uses' => 'EstatesController@estateList']);


Route::post('login', 'UsersUIController@authenticate');
Route::post('register', ['as' => 'index2', 'uses' => 'UsersUIController@store']);
Route::post('/contact/{id}/store', 'FileContactController@store');

Route::post('ajax/cityList', 'EstatesController@getArea');

Route::get('about', 'UsersUIController@about');
Route::get('profile', 'UsersUIController@profile');
Route::post('/profile/update/{id}', 'UsersUIController@updateProfile');
Route::get('contact', 'UsersUIController@contact');
Route::get('login', 'UsersUIController@login');
Route::get('register', 'UsersUIController@register');
Route::get('submit', 'UsersUIController@submit');
Route::get('preview', 'UsersUIController@preview');
Route::get('logout', 'UsersUIController@logout');
Route::post('contact/submit', 'UsersUIController@contactSubmit');

Route::get('{page}/{id}', ['as' => "detail", 'uses' => 'UsersUIController@detail']);
Route::group(array('domain' => '{subdomain}.view360.ir'), function () {
    Route::get('{page}/{id}', function ($subdomain, $page, $id) {
        $name = \Illuminate\Support\Facades\DB::table('files')
            ->where('sub_domain', $subdomain)
            ->orWhere('id',$subdomain)
            ->get();
        if (isset($name[0]->id) && $page == $name[0]->data_id && $id == $name[0]->id && $name[0]->sub_domain == $subdomain) {
            return redirect()->route('detail', ['page' => $name[0]->data_id, 'id' => $name[0]->id]);
        } else {
            return abort(404);
        }
    });
    Route::get('/', function ($subdomain) {
        $name = \Illuminate\Support\Facades\DB::table('files')
            ->where('sub_domain', $subdomain)
            ->orWhere('id',$subdomain)
            ->get();
        if (isset($name[0]->id)) {
            return redirect()->route('detail', ['page' => $name[0]->data_id, 'id' => $name[0]->id]);
        } else {
            return abort(404);
        }
    });
});

Route::get('/', ['as' => 'index', 'uses' => 'UsersUIController@index']);






Route::group(['middleware' => ['auth', 'role']], function () {
    Route::get('/admin', 'HomeController@dashboard');

    Route::get('/admin/users/add', 'UsersController@addUser');
    Route::get('/admin/users/list', 'UsersController@usersList');
    Route::get('/admin/users/list/changeStatus/{id}/{val}', 'UsersController@changeStatus');

    Route::post('/admin/users/list/changeRole', 'UsersController@changeRole');
    Route::post('/admin/users/list/changeRole/update', 'UsersController@update');

    Route::post('/admin/users/list/changePassword', 'UsersController@changePassword');
    Route::post('/admin/users/list/changePassword/update/{id}', 'UsersController@changePasswordUpdate');

    Route::post('/admin/users/list/changeInfo', 'UsersController@changeInfo');
    Route::post('/admin/users/list/changeInfo/update/{id}', 'UsersController@changeInfoUpdate');

    Route::get('/admin/users/permissions', 'UsersController@usersPermissions');
    Route::get('/admin/users/setting', 'UsersController@usersSetting');
    Route::post('/admin/users/store', ['as' => 'panel', 'uses' => 'UsersUIController@store']);
    Route::get('/admin/estate/list', 'EstatesController@list');

    Route::post('/admin/estate/list/deleteFore', 'EstatesController@deleteFore')->name('removeEstate');

    Route::get('/admin/estate/list/changeStatus/{id}/{val}', 'EstatesController@changeStatus');
    Route::get('/admin/estate/subdomains', 'EstatesController@subdomains');
    Route::post('/admin/estate/subdomains', 'EstatesController@subdomainsStore');

    Route::get('/admin/estate/setting', 'EstatesController@setting');
    Route::get('/admin/estate/setting/city/changeStatus/{id}/{val}', 'EstatesController@changeStatusCites');
    Route::post('/admin/estate/setting/city/addCity', 'EstatesController@addCity');
    Route::post('/admin/estate/setting/city/addCity/store/{id}', 'EstatesController@addStore');

    Route::post('/admin/estate/setting/storeAttr', 'EstatesController@storeAttr');
    Route::get('/admin/estate/setting/removeAttr/{id}', 'EstatesController@deleteAttr');
    Route::get('/admin/estate/setting/getCityListSetting', 'EstatesController@getCityListSetting');


    Route::post('/admin/estate/setting/fileType', 'EstatesController@fileTypeSetting');

    Route::post('/admin/estate/getInfo', 'EstatesController@getInfo');
    Route::post('/admin/estate/getCityList', 'EstatesController@getCityList');
    Route::post('/admin/estate/getArea', 'EstatesController@getArea');

    Route::get('/admin/estate/add/{id}', 'EstatesController@add');
    Route::post('/admin/estate/add', 'EstatesController@store');

    Route::get('/admin/estate/edit/{data_id}/{id}', 'EstatesController@edit');
    Route::patch('/admin/estate/update/{file}', 'EstatesController@update');
    Route::get('/admin/estate/update/deleteImages/{id}', 'EstatesController@deleteImage');

    Route::get('/admin/setting/about', 'OptionController@about');
    Route::post('/admin/setting/about/store', 'OptionController@aboutStore');
    Route::get('/admin/setting/contact', 'OptionController@contact');
    Route::get('/admin/setting/contact/view/{id}', 'OptionController@contactView');
    Route::get('/admin/setting/setting', 'OptionController@setting');
    Route::patch('/setting/setting/update/{option}', 'OptionController@update');
    Route::post('/upload_image', 'OptionController@uploadImage');


});


