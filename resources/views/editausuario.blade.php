@extends('index')

@section('contenido')
<center><h1>Modifica Usuario</h1></center>
	<br>
	{{Form::open(['route' =>'editausuario','files' => true])}}
	{{Form::token()}}

	<center><table>
		<tr>
			<td><br>Id </div></td>
			<td>@if($errors->first('idus'))
					<i> {{ $errors->first('idus') }} </i>
				@endif <br>
				<div class="col-lg-30">
					{!! Form::text('idus',$consulta->idus,['readonly'], ['class' => 'form-control', 'placeholder']) !!}
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
					{!! Form::text('nombre',$consulta->nombre, ['class' => 'form-control', 'placeholder']) !!}
				</div>	
			</td>
			<td><br> Apellido </td>
			<td>@if($errors->first('apellido'))
					<i> {{ $errors->first('apellido') }} </i>
				@endif <br>
				<div class="col-lg-30">
					{!! Form::text('apellido',$consulta->apellido, ['class' => 'form-control', 'placeholder']) !!}
				</div>	
			</td>
		</tr>
		<tr>
			<td><br>Correo </td>
			<td>@if($errors->first('correo'))
					<i> {{ $errors->first('correo') }} </i>
				@endif <br>
           	 	<div class="col-lg-30">
                	{!! Form::text('correo', $consulta->correo, ['class' => 'form-control', 'placeholder']) !!}
           	 	</div>	
			</td>
			<td><br>Contraseña </td>
			<td>@if($errors->first('contrasena'))
					<i> {{ $errors->first('contrasena') }} </i>
				@endif <br>
				<div class="col-lg-30">
                	{!! Form::text('contrasena',$consulta->contrasena,['class' => 'form-control', 'placeholder']) !!}
            	</div>	
			</td>
		</tr>
		<tr>
			<td><br>Telefono </td>
			<td>@if($errors->first('telefono'))
					<i> {{ $errors->first('telefono') }} </i>
				@endif <br>
				<div class="col-lg-30">
                	{!! Form::text('telefono', $consulta->telefono, ['class' => 'form-control', 'placeholder']) !!}
           	 	</div>	
			</td>
			<td><br>Calle </td>
			<td>@if($errors->first('calle'))
					<i> {{ $errors->first('calle') }} </i>
				@endif <br>
				<div class="col-lg-30">
                	{!! Form::text('calle', $consulta->calle, ['class' => 'form-control', 'placeholder']) !!}
           	 	</div>	
			</td>
		</tr>
		<tr>
			<td><br>Numero </td>
			<td>@if($errors->first('numero'))
					<i> {{ $errors->first('numero') }} </i>
				@endif <br>
				<div class="col-lg-30">
                	{!! Form::text('numero', $consulta->numero, ['class' => 'form-control', 'placeholder']) !!}
           	 	</div>
			</td>
			<td><br>Municipio </td>
			<td>@if($errors->first('municipio'))
					<i> {{ $errors->first('municipio') }} </i>
				@endif <br>
				<div class="col-lg-30">
                	{!! Form::text('municipio', $consulta->municipio, ['class' => 'form-control', 'placeholder']) !!}
           	 	</div>
			</td>
		</tr>
		<tr>
			<td><br>Estado </td>
			<td>@if($errors->first('estado'))
					<i> {{ $errors->first('estado') }} </i>
				@endif <br>
				<div class="col-lg-30">
                	{!! Form::text('estado', $consulta->estado, ['class' => 'form-control', 'placeholder']) !!}
           	 	</div>	
			</td>
			<td><br>Codigo Postal </td>
			<td>@if($errors->first('cp'))
					<i> {{ $errors->first('cp') }} </i>
				@endif <br>
				<div class="col-lg-30">
                	{!! Form::text('cp', $consulta->cp, ['class' => 'form-control', 'placeholder']) !!}
           	 	</div>
			</td>
		</tr>
		<tr>
			<img src="{{asset('archivos/'.$consulta->archivo)}}" height="150" width="150">
			<br>
			<td>@if($errors->first('archivo')) 
				<i> {{ $errors->first('archivo') }} </i> 
    			@endif	<br>
				Seleccione foto: 
			</td>
			<td colspan="3">
				<br><div class="col-lg-20">{!! Form::file('archivo') !!}</div>
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