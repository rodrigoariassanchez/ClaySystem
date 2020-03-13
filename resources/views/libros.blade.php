@extends('index')

@section('contenido')
<div id="">
<h1>Alta Libros</h1>
	<br>
	{{Form::open(['route' =>'guardalibro'])}}
	{{Form::token()}}

	<center><table>
		<tr>
			<td><br>Idli </td>
			<td>@if($errors->first('idli'))
					<i> {{ $errors->first('idli') }} </i>
				@endif <br>
				<div class="col-lg-10">
					{!! Form::text('idli',$idsigg,['readonly'], ['class' => 'form-control', 'placeholder']) !!}
				</div>	
			</td>
			<td></td>
			<td> </td>
		</tr>
		<tr>
			<td><br> Nombre libro </td>
			<td>@if($errors->first('nomli'))
					<i> {{ $errors->first('nomli') }} </i>
				@endif 	<br>
				<div class="col-lg-30">
					{!! Form::text('nomli',$value = null, ['class' => 'form-control is-valid', 'placeholder' => 'nomli']) !!}
				</div>	
			</td>
			<td><br> Editorial </td>
			<td>@if($errors->first('editorial'))
					<i> {{ $errors->first('editoial') }} </i>
				@endif <br>
				<div class="col-lg-30">
					{!! Form::text('editorial',$value = null, ['class' => 'form-control', 'placeholder' => 'editorial']) !!}
				</div>	
			</td>
		</tr>
		<tr>
			<td><br>Autor </td>
			<td>@if($errors->first('autor'))
					<i> {{ $errors->first('autor') }} </i>
				@endif <br>
           	 	<div class="col-lg-30">
                	{!! Form::text('autor', $value = null, ['class' => 'form-control', 'placeholder' => 'autor']) !!}
           	 	</div>	
			</td>
			<td><br>Genero </td>
			<td>@if($errors->first('idgen'))
					<i> {{ $errors->first('idgen') }} </i>
				@endif <br>
				<div class="col-lg-30">
                	{!! Form::text('idgen', $value = null, ['class' => 'form-control', 'placeholder' => 'idgen']) !!}
            	</div>	
			</td>
		</tr>
		<tr>
			<td><br>Paginas </td>
			<td>@if($errors->first('paginas'))
					<i> {{ $errors->first('paginas') }} </i>
				@endif <br>
				<div class="col-lg-5">
                	{!! Form::text('paginas', $value = null, ['class' => 'form-control', 'placeholder' => 'paginas']) !!}
           	 	</div>	
			</td>
			<td><br>Año de Edicion </td>
			<td>@if($errors->first('anoedi'))
					<i> {{ $errors->first('anoedi') }} </i>
				@endif <br>
				<div class="col-lg-10">
                	{!! Form::text('anoedi', $value = null, ['class' => 'form-control', 'placeholder' => '06-Ene-1998']) !!}
           	 	</div>	
			</td>
		</tr>
		<tr>
			<td><br>Precio </td>
			<td>@if($errors->first('precio'))
					<i> {{ $errors->first('precio') }} </i>
				@endif <br>
				<div class="col-lg-10">
                	{!! Form::text('precio', $value = null, ['class' => 'form-control', 'placeholder' => 'precio']) !!}
           	 	</div>
			</td>
			<td><br>Clasificacion </td>
			<td><br><select name = 'idclas'>
				@foreach($clasificaciones as $c)
					<option value  ='{{$c->idclas}}'>{{$c->tipoclasi}}</option>
				@endforeach
           	 	
			</td>
		</tr>
		<tr>
			<td><br>Estatus </td>
			<td>@if($errors->first('estado'))
					<i> {{ $errors->first('estado') }} </i>
				@endif <br>
				<div class="col-lg-30">
                	{!! Form::text('estado', $value = null, ['class' => 'form-control', 'placeholder' => 'estado']) !!}
           	 	</div>
			</td>
		</tr>
	</table></center>
	<br><br>
		<div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('aceptar', ['class' => 'btn btn-lg btn-info pull-center'] ) !!}
            </div>
        </div>
</div>
@stop