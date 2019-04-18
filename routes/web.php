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

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('public')->group(function(){
    Route::get('apartments','PublicController@index')->name('apartments.public');
    Route::get('apartments/{apartment}','PublicController@show')->name('apartments.show');
});

Route::prefix('profile')->group(function () {
    //Rutas para botones del perfil de usuario
    Route::get('apartments','ProfileController@apartments')->name('profile.manage');
    Route::get('edit','ProfileController@editProfile')->name('profile.edit');
    Route::get('{name}','ProfileController@index')->name('profile.index');
});

//CRUD APARTAMENTOS
Route::prefix('apartments')->group(function() {
    Route::get('show/{apartment}','ApartmentController@show')->name('apartment.showapartment');
    Route::get('create','ApartmentController@create')->name('apartment.createapartment');
    Route::post('store','ApartmentController@store')->name('apartment.storeapartment');
    Route::delete('delete/{apartment}','ApartmentController@destroy')->name('apartment.deleteapartment');
    Route::get('{apartment}/edit','ApartmentController@edit')->name('apartment.editapartment');
    Route::put('{apartment}/update','ApartmentController@update')->name('apartment.updateapartment');
});

//Rutas para alquilar apartamento
Route::prefix('rent')->group(function(){
   Route::post('store/{apartment}','RentController@store')->name('rent.apartment');
});

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('set_language/{lang}', 'Controller@setLanguage')->name('set_language');

