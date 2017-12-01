@extends('master')
@section('titulo','Listado de Cupones')

@section('contenido')
	<div class="container text-center">
		<h1>Listado de Cupones</h1>
		<a class="btn btn-primary" href="{{route('cupones.create')}}">Crear Nuevo</a>
		<br><br>
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Codigo</th>
					<th>Porcentaje</th>
					<th>Fecha Caducidad</th>
					<th>Editar</th>
					<th>Borrar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($cupones as $cupon)
					<tr>
						<td>{{$cupon->id}}</td>
						<td>{{$cupon->codigo}}</td>
						<td>{{$cupon->porcentaje}}</td>
						<td>{{$cupon->fecha_caducidad}}</td>
						<td>
							<a href="{{route('cupones.edit',$cupon->id)}}" class="btn btn-warning">
								<i class="fa fa-pencil-square fa-2x"></i>
							</a>
						</td>
						<td>
							{!!Form::open(['route' => ['cupones.destroy', $cupon->id]]) !!}
		        				<input type="hidden" name="_method" value="DELETE">
		        				<button onClick="return confirm('Eliminar cupon?')" class="btn btn-danger">
		        					<i class="fa fa-trash-o fa-2x"></i>
		        				</button>
		        			{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{$cupones->links()}}
	</div>
@endsection