@extends('master')
@section('titulo','Editar productos')

@section('contenido')
	<div class="container text-center">
		<h1>Editar Producto</h1>
		@include('parciales.errores')
		{!!Form::model($producto,['route'=>['productos.update',$producto->id],'method'=>'PUT','files' => true])!!}
			@include('admin.productos.form')
			<a class="btn btn-danger" href="{{ route('productos.index') }}">Cancelar</a>
			{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
		<hr>
	</div>
@endsection