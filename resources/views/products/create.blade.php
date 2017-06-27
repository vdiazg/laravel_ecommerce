@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Nuevo Producto</h1>
		{!! Form::open(['route' => 'products.store', 'method' => 'POST', 'files' => true]) !!}
		<div class="form-group">
			{!! Form::label('title', 'Título') !!}
			{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título del Producto', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('pricing', 'Precio') !!}
			{!! Form::number('pricing', null, ['class' => 'form-control', 'placeholder' => 'Precio de tu producto en centavos de dólar', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('cover', 'Imagen') !!}
			{!! Form::file('cover') !!}
		</div>
		<div class="form-group">
			{!! Form::label('description', 'Descripción') !!}
			{!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Título del Producto', 'required']) !!}
		</div>
		<div class="form-group text-right">
			<a href="{{ route('products.index') }}">Regresar al listado</a>
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}			
		</div>
		{!! Form::close() !!}
	</div>
@endsection
