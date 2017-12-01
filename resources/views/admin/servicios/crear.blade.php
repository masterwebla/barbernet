@extends('master')
@section('titulo','Crear Servicio')

@section('contenido')
	<div class="container text-center">
		<h1>Crear Nuevo Servicio</h1>
		@include('parciales.errores')
		{!!Form::open(['route'=>'servicios.store'])!!}
			@include('admin.servicios.form')
			<a class="btn btn-danger" href="{{ route('servicios.index') }}">Cancelar</a>
			{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
		<hr>
	</div>
@endsection