<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
</head>

<body>
	<h1>Alta Usuario</h1>
	<br>
	{{Form::open(['route' =>'guardagenero'])}}
	{{Form::token()}}

	<center><table>
		<tr>
			<td><br>Idgenero </div></td>
			<td>@if($errors->first('idgen'))
					<i> {{ $errors->first('idgen') }} </i>
				@endif <br>
				<div class="col-lg-30">
					{!! Form::text('idgen',$idsiig,['readonly'], ['class' => 'form-control', 'placeholder' => 'idgen']) !!}
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

</body>
</html>