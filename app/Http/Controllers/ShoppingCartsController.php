<?php

namespace App\Http\Controllers;

use App\ShoppingCart;
use Illuminate\Http\Request;
use App\PayPal;
use App\Mail\OrderCreated;
use Illuminate\Support\Facades\Mail;
use App\Order;

class ShoppingCartsController extends Controller
{	
	public function __construct()
	{
		$this->middleware('shoppingcart');
	}
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index(Request $request)
	{
		$shopping_cart = $request->shopping_cart;
		
		$paypal = new PayPal($shopping_cart);
		$payment = $paypal->generate();
		return redirect($payment->getApprovalLink());
		$products = $shopping_cart->products()->get();
		$total = $shopping_cart->total();
		return view('shopping_carts.index', ['products' => $products, 'total' => $total]);
	}
	
	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
		//
	}
	
	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(Request $request)
	{
		//
	}
	
	/**
	* Display the specified resource.
	*
	* @param  \App\ShoppingCart  $shoppingCart
	* @return \Illuminate\Http\Response
	*/
	public function show($id)
	{
		$shopping_cart = ShoppingCart::where('customid', $id)->first();
		$order = $shopping_cart->order();
		return view('shopping_carts.completed', ['shopping_cart' => $shopping_cart, 'order' => $order] );
	}
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\ShoppingCart  $shoppingCart
	* @return \Illuminate\Http\Response
	*/
	public function edit(ShoppingCart $shoppingCart)
	{
		//
	}
	
	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  \App\ShoppingCart  $shoppingCart
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, ShoppingCart $shoppingCart)
	{
		//
	}
	
	/**
	* Remove the specified resource from storage.
	*
	* @param  \App\ShoppingCart  $shoppingCart
	* @return \Illuminate\Http\Response
	*/
	public function destroy(ShoppingCart $shoppingCart)
	{
		//
	}
}
