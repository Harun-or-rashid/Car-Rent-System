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



Auth::routes(['verify' => true]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->middleware('auth')->name('logout');
Route::get('/login', '\App\Http\Controllers\Auth\LoginController@showLogin')->middleware('guest')->name('login');
Route::get('/register', '\App\Http\Controllers\Auth\LoginController@showRegister')->middleware('guest')->name('register');

Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('home.search');
Route::get('/contact', 'HomeController@contact_us')->name('home.contact');
Route::post('/message', 'HomeController@message')->name('home.message');
Route::get('/car/{id}', 'HomeController@car_details')->name('home.car_details');
Route::post('/car/book', 'CarOwner\CarRequestController@book_car')->name('car_request.book');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth', 'authAdmin', 'verified'])->group(function() {
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/message', 'MessageController@index')->name('message.index');
    Route::get('/message/{id}', 'MessageController@show')->name('message.details');

    Route::prefix('user')->name('users.')->group(function() {
        Route::get('/', 'CarOwnerUserController@index')->name('index');
        Route::get('/create', 'CarOwnerUserController@create')->name('create');
        Route::post('/store', 'CarOwnerUserController@store')->name('store');
        Route::get('/edit/{id}', 'CarOwnerUserController@edit')->name('edit');
        Route::post('/update/{id}', 'CarOwnerUserController@update')->name('update');
        Route::get('/delete/{id}', 'CarOwnerUserController@delete')->name('delete');
    });

    Route::prefix('category')->name('category.')->group(function() {
        Route::get('/', 'CategoryController@index')->name('index');
        Route::get('/create', 'CategoryController@create')->name('create');
        Route::post('/store', 'CategoryController@store')->name('store');
        Route::get('/delete/{slug}', 'CategoryController@delete')->name('delete');
        Route::get('/edit/{slug}', 'CategoryController@edit')->name('edit');
        Route::post('/update/{slug}', 'CategoryController@update')->name('update');
    });

    Route::prefix('cars')->name('cars.')->group(function() {
        Route::get('/', 'CarController@index')->name('index');
        Route::get('/create', 'CarController@create')->name('create');
        Route::post('/store', 'CarController@store')->name('store');
        Route::get('/delete/{id}', 'CarController@delete')->name('delete');
        Route::get('/edit/{id}', 'CarController@edit')->name('edit');
        Route::post('/update/{id}', 'CarController@update')->name('update');
    });

});





Route::namespace('CarOwner')->prefix('car-owner')->name('carOwner.')->middleware(['auth', 'authCarOwner', 'verified'])->group(function() {

    Route::get('/', 'COController@index')->name('index');

    Route::prefix('cars')->name('cars.')->group(function() {
        Route::get('/', 'CarController@index')->name('index');
        Route::get('/create', 'CarController@create')->name('create');
        Route::post('/store', 'CarController@store')->name('store');
        Route::get('/delete/{id}', 'CarController@delete')->name('delete');
        Route::get('/edit/{id}', 'CarController@edit')->name('edit');
        Route::post('/update/{id}', 'CarController@update')->name('update');
    });

    Route::prefix('car-request')->name('car_request.')->group(function() {
        Route::get('/', 'CarRequestController@all_requests')->name('index');
        Route::get('/running', 'CarRequestController@running_requests')->name('running');
        Route::get('/pending', 'CarRequestController@pending_requests')->name('pending');
        Route::get('/completed', 'CarRequestController@completed_requests')->name('completed');
        Route::get('/canceled', 'CarRequestController@canceled_requests')->name('canceled');
        Route::get('/view/{id}', 'CarRequestController@view_request_details')->name('details');
        Route::post('/update/{id}', 'CarRequestController@update')->name('update');
    });

});
