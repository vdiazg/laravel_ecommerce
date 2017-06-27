@extends('layouts.app')

@section('content')
	<div class="container text-center">
		
		@foreach ($products as $product)
			<div class="row">		
				@include('products.product', ['product' => $product])	
			</div>
			<br>
		@endforeach		
		<div class="">
			{{ $products->links() }}
		</div>
		
	</div>
@endsection
