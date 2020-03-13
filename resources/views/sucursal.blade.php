<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
</head>

<body>
<h1>Sucursal</h1>
	<br>
	{{Form::open(['route' =>'guardasucursales'])}}
	{{Form::token()}}

	<center><table>
		<tr>
			<td><br>Idsu </div></td>
			<td>@if($errors->first('idsu'))
					<i> {{ $errors->first('idsu') }} </i>
				@endif <br>
				<div class="col-lg-30">
					{!! Form::text('idsu',$idsig,['readonly'], ['class' => 'form-control', 'placeholder']) !!}
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
					{!! Form::text('nombre',$value = null, ['class' => 'form-control', 'placeholder']) !!}
				</div>	
			</td>
			<td><br> Telefono </td>
			<td>@if($errors->first('telefono'))
					<i> {{ $errors->first('telefono') }} </i>
				@endif <br>
				<div class="col-lg-30">
					{!! Form::text('telefono',$value = null, ['class' => 'form-control', 'placeholder' => 'telefono']) !!}
				</div>	
			</td>
		</tr>
		<tr>
			<td><br>Responsable </td>
			<td>@if($errors->first('responsable'))
					<i> {{ $errors->first('responsable') }} </i>
				@endif <br>
           	 	<div class="col-lg-30">
                	{!! Form::text('responsable', $value = null, ['class' => 'form-control', 'placeholder' => 'responsable']) !!}
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
</body>
</html>