@extends('master')
@section('titulo','Crear Producto')

@section('contenido')
	<div class="container text-center">
		<h1>Crear Nuevo Producto</h1>
		@include('parciales.errores')
		{!!Form::open(['route'=>'productos.store','files' => true])!!}
			@include('admin.productos.form')
			<a class="btn btn-danger" href="{{ route('productos.index') }}">Cancelar</a>
			{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
		<hr>
	</div>
@endsection