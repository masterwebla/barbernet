@extends('master')
@section('titulo','Listado de Servicios')

@section('contenido')
	<div class="container text-center">
		<h1>Listado de Servicios</h1>
		<a class="btn btn-primary" href="{{route('servicios.create')}}">Crear Nuevo</a>
		<br><br>
		{!!Form::open(['route'=>'servicios.index','method'=>'get','class'=>'navbar-form'])!!}
			<div class="form-group">
				{!!Form::text('nombre',null,[
							'class'=>'form-control',
							'placeholder'=>'Buscar servicio...'
						])
				!!}
			</div>
			<div class="form-group">
				{!!Form::number('precio',null,[
							'class'=>'form-control',
							'placeholder'=>'Buscar precio...'
						])
				!!}
			</div>
			<button class="btn btn-success" type="submit">Filtrar</button>
			<a href="{{ route('servicios.index') }}" class="btn btn-warning">Limpiar</a>
		{!!Form::close()!!}
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Duracion</th>
					<th>Estado</th>
					<th>Editar</th>
					<th>Borrar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($servicios as $servicio)
					<tr>
						<td>{{$servicio->nombre}}</td>
						<td>${{number_format($servicio->precio,0,'', '.')}}</td>
						<td>{{$servicio->duracion}}</td>
						<td>{{$servicio->estado->nombre}}</td>
						<td>
							<a href="{{route('servicios.edit',$servicio->id)}}" class="btn btn-warning">
								<i class="fa fa-pencil-square fa-2x"></i>
							</a>
						</td>
						<td>
							{!!Form::open(['route' => ['servicios.destroy', $servicio->id]]) !!}
		        				<input type="hidden" name="_method" value="DELETE">
		        				<button onClick="return confirm('Eliminar servicio?')" class="btn btn-danger">
		        					<i class="fa fa-trash-o fa-2x"></i>
		        				</button>
		        			{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{$servicios->links()}}
	</div>
@endsection