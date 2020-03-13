@extends('index')

@section('contenido')
	<center><h1>Alta clasificacion</h1></center>
	<br>
	{{Form::open(['route' =>'editaclasifica'])}}
	{{Form::token()}}

	<center><table>
			<tr>
				<td>
					<center><br>Idclasificacion</center>
				</td>
				<td>@if($errors->first('idclas'))
						<i> {{ $errors->first('idclas') }} </i>
					@endif <br>	
					<div class="col-lg-20">
						{!! Form::text('idclas',$consulta->idclas,['readonly'], ['class' => 'form-control' , 'placeholder']) !!}
						
					</div>		
				</td>
			</tr>
			<tr>
				<td>Tipo clasificacion</td>
				<td>@if($errors->first('tipoclasi'))
					<i> {{ $errors->first('tipoclasi') }} </i>
				@endif 	<br>
				<div class="col-lg-40">
					{!! Form::text('tipoclasi',$consulta->tipoclasi, ['class' => 'form-control', 'placeholder']) !!}
           	 	</div>
					
				</td>
			</tr>
		</table>
	</center>
	<br><br>
	<center>
		<div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('aceptar', ['class' => 'btn btn-lg btn-info pull-center'] ) !!}
            </div>
        </div>
    </center>

@stop