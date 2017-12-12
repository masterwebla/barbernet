@extends('master')
@section('titulo','Listado de Productos')

@section('contenido')
	<div class="container text-center">
		<h1>Listado de Productos</h1>
		<a class="btn btn-primary" href="{{route('productos.create')}}">Crear Nuevo</a>
		<br><br>
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Estado</th>
					<th>Editar</th>
					<th>Borrar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($productos as $producto)
					<tr>
						<td>{{$producto->nombre}}</td>
						<td>${{number_format($producto->precio,0,'', '.')}}</td>
						<td>{{$producto->cantidad}}</td>
						<td>{{$producto->estado->nombre}}</td>
						<td>
							<a href="{{route('productos.edit',$producto->id)}}" class="btn btn-warning">
								<i class="fa fa-pencil-square fa-2x"></i>
							</a>
						</td>
						<td>
							{!!Form::open(['route' => ['productos.destroy', $producto->id]]) !!}
		        				<input type="hidden" name="_method" value="DELETE">
		        				<button onClick="return confirm('Eliminar producto?')" class="btn btn-danger">
		        					<i class="fa fa-trash-o fa-2x"></i>
		        				</button>
		        			{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{$productos->links()}}
	</div>
@endsection