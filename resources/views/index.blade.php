@extends('master')
@section('titulo','Bienvenido a Barbernet')

@section('contenido')
	@include('parciales.carrusel')

	<div class="container">
		<div id="demo" class="text-center">
			@foreach($productos as $producto)
				<div class="white-panel">
					<h2 class="text-center">{{$producto->nombre}}</h2>
					<img class="imgcatalogo" src="{{asset('images/'.$producto->imagen.'')}}">
					<h3>${{number_format($producto->precio,0,'','.')}}</h3>
					<p>
						<a class="btn btn-info" href="{{ route('producto-detalles',$producto->id) }}">Ver mas</a>
						<a class="btn btn-success" href="{{ route('carrito-agregar',$producto->id) }}">Comprar <i class="fa fa-shopping-cart"></i></a>
					</p>
				</div>				
			@endforeach
		</div>	
	</div>
@endsection