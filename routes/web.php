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

/*
Route::get('/', function () {
return view('public.welcome');
});
*/
Route::get('/', 'MainController@index');

Route::resource('products', 'ProductsController');
Route::get('products/{id}/destroy',[
    'uses'  => 'ProductsController@destroy',
    'as'    => 'products.destroy'
  ]);

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
