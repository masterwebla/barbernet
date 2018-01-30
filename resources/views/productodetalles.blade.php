@extends('master')
@section('titulo','Detalles del producto')

@section('contenido')
	<div class="container text-center">
		<h1>Detalles del Producto</h1>
		<div class="row">
			<div class="col-md-5">
				<img src="{{ asset('images/'.$producto->imagen.'') }}" class="img-responsive">
			</div>
			<div class="col-md-7">
				<h2>{{$producto->nombre}}</h2>
				<p>{{$producto->descripcion}}</p>
				<h4>${{number_format($producto->precio)}}</h4>
				<a class="btn btn-success" href="#">Agregar Carrito <i class="fa fa-shopping-cart"></i></a>
			</div>
		</div>
		
		<a class="btn btn-primary" href="{{ route('inicio') }}">Volver</a>
		<hr>
	</div>
@endsection