@extends('index')

@section('contenido')
	<h1>Alta Generos</h1>
	<br>
	{{Form::open(['route' =>'guardageneros'])}}
	{{Form::token()}}

	<center><table>
		<tr>
			<td><br>Idgenero </td>
			<td>@if($errors->first('idgen'))
					<i> {{ $errors->first('idgen') }} </i>
				@endif <br>
				<div class="col-lg-30">
					{!! Form::text('idgen',$idsiig,['readonly'], ['class' => 'form-control' ,'placeholder']) !!}
				</div>	
			</td>
			<td></td>
			<td> </td>
		</tr>
		<tr>
			<td><br> Genero </td>
			<td>@if($errors->first('genero'))
					<i> {{ $errors->first('genero') }} </i>
				@endif 	<br>
				<div class="col-lg-30">
					{!! Form::text('genero',$value = null, ['class' => 'form-control', 'placeholder' => 'genero']) !!}
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

@stop	
	