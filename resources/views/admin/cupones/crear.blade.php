@extends('master')
@section('titulo','Crear Cupones')

@section('contenido')
	<div class="container text-center">
		<h1>Crear Nuevo Cupón</h1>
		@include('parciales.errores')
		{!!Form::open(['route'=>'cupones.store'])!!}
			<div class="form-group">
				{!!Form::label('Codigo')!!}
				{!!Form::text('codigo', null, [
						'class'=>'form-control',
						'placeholder'=>'Codigo...'
					])
				!!}
			</div>
			<div class="form-group">
				{!!Form::label('Porcentaje')!!}
				{!!Form::number('porcentaje', null, [
						'class'=>'form-control',
						'placeholder'=>'Porcentaje...'
					])
				!!}
			</div>
			<div class="form-group">
				{!!Form::label('Fecha')!!}
				{!!Form::date('fecha_caducidad', null, [
						'class'=>'form-control',
						'placeholder'=>'Codigo...'
					])
				!!}
			</div>
			<a class="btn btn-danger" href="{{ route('cupones.index') }}">Cancelar</a>
			{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
	</div>
@endsection