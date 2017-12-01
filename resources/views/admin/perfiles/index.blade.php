@extends('master')
@section('titulo','Listado de Perfiles')

@section('contenido')
	<div class="container text-center">
		<h1>Listado de Perfiles</h1>
		<a class="btn btn-primary" href="{{route('perfiles.create')}}">Crear Nuevo</a>
		<br><br>
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Editar</th>
					<th>Borrar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($perfiles as $perfil)
					<tr>
						<td>{{$perfil->id}}</td>
						<td>{{$perfil->nombre}}</td>
						<td>
							<a href="{{route('perfiles.edit',$perfil->id)}}" class="btn btn-warning">
								<i class="fa fa-pencil-square fa-2x"></i>
							</a>
						</td>
						<td>
							{!!Form::open(['route' => ['perfiles.destroy', $perfil->id]]) !!}
		        				<input type="hidden" name="_method" value="DELETE">
		        				<button onClick="return confirm('Eliminar perfil?')" class="btn btn-danger">
		        					<i class="fa fa-trash-o fa-2x"></i>
		        				</button>
		        			{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{$perfiles->links()}}
	</div>
@endsection