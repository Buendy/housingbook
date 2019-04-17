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

Route::get('apartments','PublicController@index')->name('apartments.public');
Route::get('apartments/{apartment}','PublicController@show')->name('apartments.show');

Route::prefix('profile')->group(function () {
    //Rutas para botones del perfil de usuario
    Route::get('','ProfileController@index')->name('profile.index');
    Route::get('apartments','ProfileController@apartments')->name('profile.manage');
    Route::get('edit','ProfileController@editProfile')->name('profile.edit');

    //CRUD APARTAMENTOS
    Route::get('show/{apartment}','ApartmentController@show')->name('profile.showapartment');
    Route::get('create','ApartmentController@create')->name('profile.createapartment');
    Route::post('store','ApartmentController@store')->name('profile.storeapartment');
    Route::delete('delete/{apartment}','ApartmentController@destroy')->name('profile.deleteapartment');
    Route::get('{apartment}/edit','ApartmentController@edit')->name('profile.editapartment');
    Route::put('{apartment}/update','ApartmentController@update')->name('profile.updateapartment');
});


Route::get('set_language/{lang}', 'Controller@setLanguage')->name('set_language');

