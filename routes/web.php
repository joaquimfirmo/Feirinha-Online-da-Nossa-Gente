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

/*Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/compra-realizada', function () {
    return view('sucessfulPurchase');
})->name('sucessful-purchase');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ProductController@index')->name('index');


Route::get('/user', 'UserController@index')->name('user');

Route::get('/detalhes-produto/{id}', 'ProductController@productDetailsHome')->name('product-details-home');


Route::get('/user/cadastrar-produto', 'ProductController@create')->name('product-create');
Route::get('/user/detalhes-produto/{id}', 'ProductController@show')->name('product-details');

Route::get('/user/editar-produto/{id}', 'ProductController@edit')->name('product-edit');
Route::post('/user/update-produto/{id}', 'ProductController@update')->name('product-update');

Route::post('/user/product-save', 'ProductController@store')->name('product-save');


Route::delete('/user/product-delete', 'ProductController@destroy')->name('delete');
