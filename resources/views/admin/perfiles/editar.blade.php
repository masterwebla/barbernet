@extends('master')
@section('titulo','Editar Perfiles')

@section('contenido')
	<div class="container text-center">
		<h1>Editar Perfil</h1>
		@include('parciales.errores')
		{!!Form::model($perfil,['route'=>['perfiles.update',$perfil->id],'method'=>'PUT'])!!}
			<div class="form-group">
				{!!Form::label('Nombre')!!}
				{!!Form::text('nombre', null, [
						'class'=>'form-control',
						'placeholder'=>'Nombre del perfil...'
					])
				!!}
			</div>
			<a class="btn btn-danger" href="{{ route('perfiles.index') }}">Cancelar</a>
			{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
	</div>
@endsection