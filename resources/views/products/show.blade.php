@extends('layouts.app')
@section('content')
	<div class="container text-center">
		<div class="card product text-left">
			@if (Auth::check() && $product->user_id == Auth::user()->id)
				<a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-wrench"></span></a> 
				<a href="{{ route('products.destroy', $product->id) }}" onclick="return confirm('¿Seguro que deaseas eliminarlo?')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
			@endif
			<h1>{{ $product->title }}</h1>
			<hr>
			<div class="row">
				<div class="col-sm-6 col-xs-12"></div>
				<div class="col-sm-6 col-xs-12">
					<p><strong>Descripción</strong></p><br>
					<p>{{ $product->description}}</p>
					<p>
						{!! Form::open(['url' => '/in_shopping_carts', 'method' => 'POST', 'class' => 'inline-block']) !!}
						<input type="hidden" name="product_id" value="{{ $product->id }}">
						<input type="submit" value="Agregar al Carrito" class="btn btn-info">
						{!! Form::close() !!}
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection
