@extends('layouts.app')
@section('content')
	<header class="text-center">
		<h1>Compra Completada</h1>
	</header>
	<div class="container">
		<div class="">
			<h3>Tu pago fue procesado <span>{{ $order->status }}</span></h3>
			<p>Corrobora los detalles de envio:</p>
			<div class='row '>
				<div class="col-xs-6">Correo</div>
				<div class="col-xs-6">{{ $order->email }}</div>
				
				<div class="col-xs-6">Dirección</div>
				<div class="col-xs-6">{{ $order->address() }}</div>
				
				<div class="col-xs-6">Código postal</div>		
				<div class="col-xs-6">{{ $order->postal_code }}</div>
				
				<div class="col-xs-6">Estado y País</div>		
				<div class="col-xs-6">{{ "$order->state $order->country_code" }}</div>
				<div class="text-center">
					<a href="{{ url('/compras/'.$shopping_cart->customid) }}">Link Permanente de tu compra</a>
				</div>
			</div>
		</div>
	</div>
@endsection
