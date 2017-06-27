@extends('layouts.app')
@section('content')
	<div class="big-padding text-center blue-grey white-text">
		<h1>Productos</h1>
	</div>
	<div class="container">
		<a href="{{ route('products.create') }}" class="btn btn-info">Registrar Nuevo Producto</a><br><br>
		<table class='table table-striped table-bordered table-hover table-condensed'>
		  <thead>
		    <tr>
		      <th>ID</th>
			  <th>Titulo</th>
			  <th>Descripcion</th>
			   <th>Precio</th>
				<th>Acciones</th>
		    </tr>
		  </thead>
		  <tbody>
			@foreach ($products as $product)
				<tr>
			      	<td>{{ $product->id }}</td>
					<td>{{ $product->title }}</td>
					<td>{{ $product->description }}</td>
					<td>{{ $product->pricing }}</td>
					<td>
						<a href="{{ url('/products/'.$product->id) }}" class="btn btn-warning btn-sm">Ver</a> 
          				<a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-wrench"></span></a> 
          				<a href="{{ route('products.destroy', $product->id) }}" onclick="return confirm('¿Seguro que deaseas eliminarlo?')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
			    </tr>	
			@endforeach		    
		  </tbody>
		</table>
	</div>

@endsection
