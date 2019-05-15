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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/apartments','ApartmentController@search')->name('search');
Route::get('/apartments/category/{Category}','ApartmentController@searchCategory')->name('searchCategory');

Route::prefix('public')->group(function(){
    Route::get('apartments','PublicController@index')->name('apartments.public');
    Route::get('apartments/{apartment}','PublicController@show')->name('apartments.show');
});

Route::prefix('profile')->group(function () {
    //Rutas para botones del perfil de usuario
    //Route::get('apartments','ProfileController@apartments')->name('profile.manage');
    //Route::get('edit','ProfileController@editProfile')->name('profile.edit');
    Route::get('{name}','ProfileController@index')->name('profile.index');
});


Route::prefix('apartments')->group(function() {
//    Route::get('show/{apartment}','ApartmentController@show')->name('apartment.showapartment');
    //Route::post('store','ApartmentController@store')->name('apartment.storeapartment');
    //Route::delete('delete/{apartment}','ApartmentController@destroy')->name('apartment.deleteapartment');
//    Route::get('{apartment}/edit','ApartmentController@edit')->name('apartment.editapartment');
//    Route::put('{apartment}/update','ApartmentController@update')->name('apartment.updateapartment');
});


Route::prefix('dashboard')->group(function(){
    Route::get('', 'DashboardController@index')->name('dashboard');
    Route::get('user/show', 'dashboard\UserController@show')->name('user.show');
    Route::get('user/edit', 'dashboard\UserController@edit')->name('user.edit');
    Route::put('{user}/update', 'dashboard\UserController@update')->name('user.update');
    Route::get('user/telegram','dashboard\UserController@telegram')->name('user.telegram');
    Route::get('user/telegram/tutorial','dashboard\UserController@tutorial')->name('user.tutorial');
    Route::get('user/password','dashboard\UserController@password')->name('user.password');
    Route::put('{user}/telegram/update','dashboard\UserController@telegramUpdate')->name('user.telegramupdate');
    Route::put('{user}/password/update','dashboard\UserController@passwordUpdate')->name('user.passwordupdate');

    Route::get('apartment/show/{apartment}','dashboard\ApartmentController@show')->name('apartment.showapartment');
    Route::get('apartment/index', 'dashboard\ApartmentController@index')->name('apartment.index');
    Route::get('apartment/create','dashboard\ApartmentController@create')->name('apartment.createapartment');
    Route::post('apartment/store','dashboard\ApartmentController@store')->name('apartment.storeapartment');
    Route::delete('apartment/delete/{apartment}','dashboard\ApartmentController@destroy')->name('apartment.deleteapartment');
    Route::get('apartment/{apartment}/edit','dashboard\ApartmentController@edit')->name('apartment.editapartment');
    Route::put('apartment/{apartment}/update','dashboard\ApartmentController@update')->name('apartment.updateapartment');

    Route::get('invoices/index', 'dashboard\InvoiceController@index')->name('invoice.index');
    Route::get('invoices/invoices', 'dashboard\InvoiceController@invoices')->name('invoice.invoices');
    Route::post('invoices/download', 'dashboard\InvoiceController@download')->name('invoice.download');

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
