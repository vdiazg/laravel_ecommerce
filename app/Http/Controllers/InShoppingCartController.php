<?php

namespace App\Http\Controllers;

use App\InShoppingCart;
use Illuminate\Http\Request;
use App\ShoppingCart;

class InShoppingCartController extends Controller
{
	public function __construct()
	{
		$this->middleware('shoppingcart');
	}
	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(Request $request)
	{
		$shopping_cart = $request->shopping_cart;
		
		$response = InShoppingCart::create([
			'shopping_cart_id' 	=>	$shopping_cart->id,
			'product_id'		=>	$request->product_id
		]);
		if($request->ajax())
		{
			return response()->json([
				'products_count' => InShoppingCart::productCount($shopping_cart->id)
			]);
		}
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
