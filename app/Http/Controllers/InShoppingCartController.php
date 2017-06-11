<?php

namespace App\Http\Controllers;

use App\InShoppingCart;
use Illuminate\Http\Request;
use App\ShoppingCart;

class InShoppingCartController extends Controller
{
	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(Request $request)
	{
		$shopping_cart_id = \Session::get('shopping_cart_id');
		
		$shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);
		
		$response = InShoppingCart::create([
			'shopping_cart_id' 	=>	$shopping_cart->id,
			'product_id'		=>	$request->product_id
		]);
		
		if(false){
			return redirect('/in_shopping_carts');;
		}else{
			return back();
		}
	}
	
	/**
	* Remove the specified resource from storage.
	*
	* @param  \App\InShoppingCart  $inShoppingCart
	* @return \Illuminate\Http\Response
	*/
	public function destroy(InShoppingCart $inShoppingCart)
	{
		//
	}
}
