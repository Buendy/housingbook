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

Route::get('/', 'PublicController@welcome');

Route::get('/home', 'HomeController@index');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/apartments','ApartmentController@search')->name('search');
Route::get('/apartments/category/{Category}','ApartmentController@searchCategory')->name('searchCategory');
Route::post('/apartments/filter','ApartmentController@filter')->name('filterApartments');

Route::post('/apartments/{apartment}/comment','CommentController@store')->name('postComment');

Route::prefix('public')->group(function(){
    Route::get('apartments','PublicController@index')->name('apartments.public');
    Route::get('apartments/{apartment}','PublicController@show')->name('apartments.show');
});

Route::prefix('profile')->group(function () {
    //Rutas para botones del perfil de usuario
    Route::get('{name}','ProfileController@index')->name('profile.index');
});

Route::prefix('dashboard')->group(function(){
    Route::get('', 'DashboardController@index')->name('dashboard');
    Route::get('index', 'DashboardController@indexAjax')->name('dashboard.index');
    Route::get('user/show', 'dashboard\UserController@show')->name('user.show');
    Route::get('user/edit', 'dashboard\UserController@edit')->name('user.edit');
    Route::put('{user}/update', 'dashboard\UserController@update')->name('user.update');
    Route::get('user/telegram','dashboard\UserController@telegram')->name('user.telegram');
    Route::get('user/telegram/tutorial','dashboard\UserController@tutorial')->name('user.tutorial');
    Route::get('user/password','dashboard\UserController@password')->name('user.password');
    Route::put('{user}/telegram/update','dashboard\UserController@telegramUpdate')->name('user.telegramupdate');
    Route::put('{user}/password/update','dashboard\UserController@passwordUpdate')->name('user.passwordupdate');

    Route::prefix('apartment')->group(function() {
        Route::get('show/{apartment}','dashboard\ApartmentController@show')->name('apartment.showapartment');
        Route::get('index', 'dashboard\ApartmentController@index')->name('apartment.index');
        Route::get('create','dashboard\ApartmentController@create')->name('apartment.createapartment');
        Route::post('store','dashboard\ApartmentController@store')->name('apartment.storeapartment');
        Route::delete('delete/{apartment}','dashboard\ApartmentController@destroy')->name('apartment.deleteapartment');
        Route::get('{apartment}/edit','dashboard\ApartmentController@edit')->name('apartment.editapartment');
        Route::put('{apartment}/update','dashboard\ApartmentController@update')->name('apartment.updateapartment');
    });

    Route::prefix('invoices')->group(function(){
        Route::get('index', 'dashboard\InvoiceController@index')->name('invoice.index');
        Route::get('invoices', 'dashboard\InvoiceController@invoices')->name('invoice.invoices');
        Route::post('download', 'dashboard\InvoiceController@download')->name('invoice.download');
    });
});

//Rutas para alquilar apartamento
Route::prefix('rent')->group(function(){
    Route::get('store/{apartment}','RentController@store')->name('rent.apartment');
    Route::post('confirm/{apartment}','RentController@validation')->name('apartment.validate');
});


Route::get('set_language/{lang}', 'Controller@setLanguage')->name('set_language');

Route::get('/activity', 'TelegramController@updatedActivity');

// RUTAS PARA PAYPAL
Route::post('paypal/confirm', 'RentController@confirm')->name('paypal-confirm');
Route::post('paypal/pay', 'PaymentController@payPaypal')->name('paypal-pay');
Route::get('paypal/status', 'PaymentController@getStatus')->name('paypal-status');
