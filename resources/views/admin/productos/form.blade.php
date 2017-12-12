			<div class="form-group">
				{!!Form::label('Nombre')!!}
				{!!Form::text('nombre', null, [
						'class'=>'form-control',
						'required'=>'required', 
						'placeholder'=>'Nombre...'
					])
				!!}
			</div>
			<div class="form-group">
				{!!Form::label('Precio')!!}
				{!!Form::number('precio', null, [
						'class'=>'form-control',
						'required'=>'required', 
						'placeholder'=>'Precio...'
					])
				!!}
			</div>
			<div class="form-group">
				{!!Form::label('Descripcion')!!}
				{!!Form::textarea('descripcion', null, [
						'class'=>'form-control',
						'placeholder'=>'Descripcion...'
					])
				!!}
			</div>
			<div class="form-group">
				{!!Form::label('Cantidad')!!}
				{!!Form::number('cantidad', null, [
						'class'=>'form-control',
						'required'=>'required', 
						'placeholder'=>'Cantidad...'
					])
				!!}
			</div>
			<div class="form-group">
		        <label>Estados</label>
		        {!! Form::select('idestado', $estados, null, ['class' => 'form-control',
		        	'placeholder'=>'Seleccione el estado',
		        	'required'=>'required'
		        ]) !!}
		    </div>

			<div class="form-group">
				{!!Form::label('Puntos')!!}
				{!!Form::number('puntos', null, [
						'class'=>'form-control',
						'required'=>'required', 
						'placeholder'=>'Puntos...'
					])
				!!}
			</div>
			<div class="form-group">
				{!!Form::label('Imagen Principal (800 * 600 px)')!!}
				<input type="file" name="imagen">
			</div>