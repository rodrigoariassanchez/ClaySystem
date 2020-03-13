@extends('index')

@section('contenido')
	<br><br><br><br>
	<center><h1>Reporte de Clasificaciones</h1></center>
	<br><br><br>
	<center>
	<div>
	<table border='1' class="table table-hover">
	<thead>
		<tr>
			<td>Clave</td><td> Tipo de <br> clasificacion </td><td>Operaciones</td>
		</tr>
	</thead>
	@foreach($consulta as $cl)
	<tr><td>{{$cl->idclas}}</td>
	<td>{{$cl->tipoclasi}}</td>
	<td>
	@if($cl->activo == 'Si')
		<a href="{{URL::action('clasificacioncontroller@modificaclas',['idclas'=>$cl->idclas])}}">
		Modificar</a> 
		@if( Session::get('sesiontipo')=="administrador")
		<a href="{{URL::action('clasificacioncontroller@eliminaclas',['idclas'=>$cl->idclas])}}">
		Eliminar</a>
		@endif
	@else
		<a href="{{URL::action('clasificacioncontroller@restauraclas',['idclas'=>$cl->idclas])}}">
		Restaurar</a>
	@endif
	</td>
	</tr>
	
	@endforeach

	</table>
	</div>
	</center>
@stop
