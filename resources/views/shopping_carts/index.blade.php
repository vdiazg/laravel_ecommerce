@extends('layouts.app')
@section('content')
	<div class="text-center">
		<h1>Tu Carrito de compras</h1>
	</div>
	<div class="container">
		<table class='table table-striped table-bordered table-hover table-condensed'>
			<thead>
				<tr>
					<th>Producto</th>
					<th>Precio</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($products as $product)
					<tr>
						<td>{{ $product->title }}</td>
						<td>{{ $product->pricing }}</td>
					</tr>
				@endforeach
				<tr>
					<td>Total</td>
					<td>{{ $total }}</td>
				</tr>
			</tbody>
		</table>
		<div class="text-right">
			@include('shopping_carts.form')
		</div>
	</div>
	
@endsection
