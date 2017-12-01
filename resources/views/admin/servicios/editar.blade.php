@extends('master')
@section('titulo','Editar Servicios')

@section('contenido')
	<div class="container text-center">
		<h1>Editar Servicio</h1>
		@include('parciales.errores')
		{!!Form::model($servicio,['route'=>['servicios.update',$servicio->id],'method'=>'PUT'])!!}
			@include('admin.servicios.form')
			<a class="btn btn-danger" href="{{ route('servicios.index') }}">Cancelar</a>
			{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
		<hr>
	</div>
@endsection