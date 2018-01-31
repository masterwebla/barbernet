@extends('master')
@section('titulo','Carrito de Compras')

@section('contenido')
	<div class="container text-center">
		<div class="page-header">
			<h1><i class="fa fa-shopping-cart"></i> Carrito de Compras</h1>
		</div>
		@if($carrito)
			<div>
				<a href="{{ route('carrito-vaciar') }}" class="btn btn-danger"><i class="fa fa-trash"></i> Vaciar Carrito</a><br><br>
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Producto</th>
							<th>Precio</th>
							<th>Cantidad</th>
							<th>Subtotal</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($carrito as $producto)
							<tr>
								<td><img src="{{ asset('images/'.$producto->imagen.'') }}" width="50" class="img-thumbnail"></td>
								<td>{{$producto->nombre}}</td>
								<td>${{number_format($producto->precio,0)}}</td>

								<td>
									<input type="number" min="1" max="{{$producto->cantidad}}" id="producto_{{$producto->id}}" value="{{$producto->cantcompra}}">
									<a class="btn btn-warning act" data-href="{{ route('carrito-actualizar', $producto->id) }}" data-id="{{ $producto->id }}">
										<i class="fa fa-refresh"></i>
									</a>
								</td>



								<td>${{number_format($producto->precio * $producto->cantcompra,0)}}</td>
								<td><a class="btn btn-danger" href="{{ route('carrito-borrar',$producto->id) }}"><i class="fa fa-remove"></i></a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		@else
			<h2><span class="label label-danger">No hay productos en el carrito :(</span></h2>

		@endif
		<div class="text-center">
			<a class="btn btn-primary" href="{{ route('inicio') }}"><i class="fa fa-chevron-circle-left"></i> Seguir Comprando</a>
			@if($carrito)
				<a class="btn btn-success" href="{{ route('ordenar') }}">Ordenar <i class="fa fa-chevron-circle-right"></i></a>
			@endif

		</div>

		<hr>

	</div>
@endsection