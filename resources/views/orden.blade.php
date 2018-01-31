@extends('master')
@section('titulo', 'Detalles del Pedido')

@section('contenido')
<div class="container">
	<div class="page-header text-center">
		<h1><i class="fa fa-shopping-cart"></i> Detalles de la Orden</h1>
	</div>
	<div>
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<h3 class="text-center">Mis Datos</h3>
				<div class="table-responsive">		
					<table class="table table-striped table-hover table-bordered">
						<tr><td><strong>Nombre</strong></td><td>{{ Auth::user()->name }}</td></tr>
						<tr><td><strong>Email</strong></td><td>{{ Auth::user()->email }}</td></tr>
					</table>
				</div>
			</div>			
		</div>
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<h3 class="text-center">Mis Productos</h3>
				<div class="table-responsive">			
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr class="text-center">
								<td><strong>Producto</strong></td>
								<td><strong>Cantidad</strong></td>
								<td><strong>Precio</strong></td>
							</tr>	
						</thead>
						<tbody>
							<?php $total = 0; ?>
							@foreach ($productos as $producto)
								<tr>
									<td>{{$producto->producto->nombre}}</td>
									<td>{{$producto->cantidad}}</td>
									<td class="text-right">${{number_format($producto->precio*$producto->cantidad,0)}}</td>
									<?php $total+= $producto->precio*$producto->cantidad; ?>
								</tr>	
							@endforeach					
						</tbody>			
					</table>
					<h3 class="text-center">Total: ${{number_format($total,0)}}</h3>
				</div>
			</div>
		</div>		
	</div>	
</div>
@endsection