@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Editar Producto</h1>
		{!! Form::open(['route' => ['products.update', $product], 'method' => 'PUT']) !!}
		<div class="form-group">
			{!! Form::label('title', 'Título') !!}
			{!! Form::text('title', $product->title, ['class' => 'form-control', 'placeholder' => 'Título del Producto', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('pricing', 'Precio') !!}
			{!! Form::number('pricing', $product->pricing, ['class' => 'form-control', 'placeholder' => 'Precio de tu producto en centavos de dólar', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('description', 'Descripción') !!}
			{!! Form::textarea('description', $product->description, ['class' => 'form-control', 'placeholder' => 'Título del Producto', 'required']) !!}
		</div>
		<div class="form-group text-right">
			<a href="{{ route('products.index') }}">Regresar al listado</a>
			{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}			
		</div>
		{!! Form::close() !!}
	</div>
@endsection
