@extends('index')

@section('contenido')

	<center><h1>Alta Usuario</h1></center>
	<br>
	{{Form::open(['route' =>'guardausuario','files' => true])}}
	{{Form::token()}}

	<div class="alert alert-success alert-dismissable col-lg-30"> 
  		<button type="button" class="close" data-dismiss="alert">&times;</button>
  		<strong>Exelente</strong> Dato Guardado correctamente.
	</div>
	<center><table>
		<tr>
			<td><br>Id </div></td>
			<td>@if($errors->first('idus'))
					<i> {{ $errors->first('idus') }} </i>
				@endif <br>
				<div class="col-lg-30">
					{!! Form::text('idus',$idsig,['readonly'], ['class' => 'form-control', 'placeholder']) !!}
				</div>	
			</td>
			<td></td>
			<td> </td>
		</tr>
		<tr>
			<td><br> Nombre </td>
			<td>@if($errors->first('nombre'))
					<i> {{ $errors->first('nombre') }} </i>
				@endif 	<br>
				<div class="col-lg-30">
					{!! Form::text('nombre',$value = null, ['class' => 'form-control', 'placeholder' => 'nombre']) !!}
				</div>	
			</td>
			<td><br> Apellido </td>
			<td>@if($errors->first('apellido'))
					<i> {{ $errors->first('apellido') }} </i>
				@endif <br>
				<div class="col-lg-30">
					{!! Form::text('apellido',$value = null, ['class' => 'form-control', 'placeholder' => 'apellido']) !!}
				</div>	
			</td>
		</tr>
		<tr>
			<td><br>Correo </td>
			<td>@if($errors->first('correo'))
					<i> {{ $errors->first('correo') }} </i>
				@endif <br>
           	 	<div class="col-lg-30">
                	{!! Form::text('correo', $value = null, ['class' => 'form-control', 'placeholder' => 'correo']) !!}
           	 	</div>	
			</td>
			<td><br>Contraseña </td>
			<td>@if($errors->first('contrasena'))
					<i> {{ $errors->first('contrasena') }} </i>
				@endif <br>
				<div class="col-lg-30">
                	{!! Form::password('contrasena',['class' => 'form-control', 'placeholder' => 'contrasena', 'type' => 'password']) !!}
            	</div>	
			</td>
		</tr>
		<tr>
			<td><br>Telefono </td>
			<td>@if($errors->first('telefono'))
					<i> {{ $errors->first('telefono') }} </i>
				@endif <br>
				<div class="col-lg-30">
                	{!! Form::text('telefono', $value = null, ['class' => 'form-control', 'placeholder' => 'telefono']) !!}
           	 	</div>	
			</td>
			<td><br>Calle </td>
			<td>@if($errors->first('calle'))
					<i> {{ $errors->first('calle') }} </i>
				@endif <br>
				<div class="col-lg-30">
                	{!! Form::text('calle', $value = null, ['class' => 'form-control', 'placeholder' => 'calle']) !!}
           	 	</div>	
			</td>
		</tr>
		<tr>
			<td><br>Numero </td>
			<td>@if($errors->first('numero'))
					<i> {{ $errors->first('numero') }} </i>
				@endif <br>
				<div class="col-lg-30">
                	{!! Form::text('numero', $value = null, ['class' => 'form-control', 'placeholder' => 'numero']) !!}
           	 	</div>
			</td>
			<td><br>Municipio </td>
			<td>@if($errors->first('municipio'))
					<i> {{ $errors->first('municipio') }} </i>
				@endif <br>
				<div class="col-lg-30">
                	{!! Form::text('municipio', $value = null, ['class' => 'form-control', 'placeholder' => 'municipio']) !!}
           	 	</div>
			</td>
		</tr>
		<tr>
			<td><br>Estado </td>
			<td>@if($errors->first('estado'))
					<i> {{ $errors->first('estado') }} </i>
				@endif <br>
				<div class="col-lg-30">
                	{!! Form::text('estado', $value = null, ['class' => 'form-control', 'placeholder' => 'estado']) !!}
           	 	</div>	
			</td>
			<td><br>Codigo Postal </td>
			<td>@if($errors->first('cp'))
					<i> {{ $errors->first('cp') }} </i>
				@endif <br>
				<div class="col-lg-30">
                	{!! Form::text('cp', $value = null, ['class' => 'form-control', 'placeholder' => 'cp']) !!}
           	 	</div>
			</td>
		</tr>
		<tr>
			<td>@if($errors->first('archivo')) 
				<i> {{ $errors->first('archivo') }} </i> 
    			@endif	<br>
				Seleccione foto: 
			</td>
			<td colspan="3">
				<br><div class="col-lg-30">{!! Form::file('archivo') !!}</div>
			</td>
		</tr>

	</table></center>
	<br><br>
	<center>
		<div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('aceptar', ['class' => 'btn btn-lg btn-info pull-center'] ) !!}
            </div>
        </div>
    </center>
@stop