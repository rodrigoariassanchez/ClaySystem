@extends('index')

@section('contenido')
	<br><br>
	<center><h1>Reporte de usuarios</h1></center>
	<br><br><br>
	<center>
	<div class="table-responsive">
	<table border='1' class="table table-hover">
	<thead>
		<tr>
			<td>Clave</td><td>Foto</td><td>Nombre</td><td>Calle y numero</td><td>Telefono</td><td>Operaciones</td>
		</tr>
	</thead>
	@foreach($consulta as $c)
	<tr><td>{{$c->idus}}</td>
	<td><img src="{{asset('archivos/'.$c->archivo)}}" height="50" width="50" class="img-rounded">
	</td>

	<td>{{$c->nombre}} {{$c->apellido}}</td>
	<td>{{$c->calle}} ,#{{$c->numero}}</td>
	<td>{{$c->telefono}}</td>
	<td>
	@if($c->activo == 'Si')
		<a href="{{URL::action('usuariocontroller@modificaus',['idus'=>$c->idus])}}">
		Modificar</a> 
		@if( Session::get('sesiontipo')=="administrador")
			<a href="{{URL::action('usuariocontroller@eliminau',['idus'=>$c->idus])}}">
			Eliminar</a>
		@endif
	@else
		<a href="{{URL::action('usuariocontroller@restaurau',['idus'=>$c->idus])}}">
		Restaurar</a>
	@endif
	</td>
	</tr>
	
	@endforeach

	</table>

	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3764.660611151842!2d-99.4796216855904!3d19.340528048631146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d20a14878a64eb%3A0x65bdb503fdce37bc!2sUniversidad%20Tecnol%C3%B3gica%20del%20Valle%20de%20Toluca!5e0!3m2!1ses-419!2smx!4v1576253255449!5m2!1ses-419!2smx" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe><br><br><br>
	</div>
	</center>
@stop
