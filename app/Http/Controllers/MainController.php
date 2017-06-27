<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class MainController extends Controller
{
	public function index()
	{
		$products = Product::latest()->simplePaginate(2);
		return view('home', ['products'=> $products]);
	}
}
