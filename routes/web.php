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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', 'SearchController@search')->name('search');
Route::view('/about', 'about')->name('about');
Route::view('/inventory', 'user/inventory')->name('inventory');

Route::get('/users', function () {
    if (Auth::check()) return Redirect::route('users.show', Auth::user());
    else abort(404);
});
Route::resource('users', 'UserController')->only(['show', 'edit', 'update', 'destroy']);

Route::resource('items', 'ItemController');

Route::name('requests.')->prefix('requests')->group(function() {
    Route::get('/{rent_request}', 'RentRequestController@show')->name('show');
});
