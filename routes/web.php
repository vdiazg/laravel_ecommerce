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

Route::get('/carrito', 'ShoppingCartsController@index');
Route::post('/carrito', 'ShoppingCartsController@checkout');
Route::get('/payment/store', 'PaymentsController@store');

Route::resource('products', 'ProductsController');
Route::get('products/{id}/destroy',[
    'uses'  => 'ProductsController@destroy',
    'as'    => 'products.destroy'
  ]);

Route::resource('in_shopping_carts', 'InShoppingCartController', [
	'only' => ['store', 'destroy']
]);

Route::resource('compras', 'ShoppingCartsController', [
	'only' => ['show']
]);

Route::resource('orders', 'OrdersController', [
	'only' => ['index', 'update']
]);

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('products/images/{filename}', function($filename){
	$path = storage_path("app/images/$filename");
	if(!\File::exists($path)) abort(404);
	$file = \File::get($path);
	$type = \File::mimeType($path);
	$response = Response::make($file, 200);
	$response->header("Content-Type", $type);
	return $response;
});
