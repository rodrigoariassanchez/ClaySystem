

<div id="menu">
    <header>
      <div class="menu-bar">
        <img src="{{asset('archivos/'.Session::get('sesionarchivo'))}}" height="50" width="50">
        {{Session::get('sesionname')}} </b>

        <a href="{{URL::action('accesocontroller@cerrarsesion')}}">Cerrar Session</a>
    
      </div>
      <br><br>
    <ul class="nav">
        <li>
            <h6>Usuarios</h6>
            <ul>
              <li><a href="{{URL::action('usuariocontroller@usuarios')}}"><h6>Alta Usuarios</h6></a></li>
              <li><a href="{{URL::action('usuariocontroller@reporteusuarios')}}"><h6>Reporte Usuarios</h6></a></li>
            </ul>
        </li>
        <li>
            <h6>Libros</h6>
            <ul>
              <li><a href="{{URL::action('libroscontroller@libros')}}"><h6>Alta libros</h6></a></li>
              <li><a href="{{URL::action('libroscontroller@reportelibros')}}"><h6>Reporte libros</h6></a></li>
            </ul>
        </li>
        <li>
            <h6>Generos</h6>
            <ul>
              <li><a href="{{URL::action('generocontroller@generos')}}"><h6>Alta generos</h6></a></li>
              <li><a href=""><h6>Reporte generos</h6></a></li>
            </ul>
        </li>
        <li>
            <h6>Clasificacion</h6>
            <ul>
              <li><a href="{{URL::action('clasificacioncontroller@clasificaciones')}}"><h6>Alta Clasificacion</h6></a></li>
              <li><a href="{{URL::action('clasificacioncontroller@reporteclasificaciones')}}"><h6>Reporte Clasificacion</h6></a></li>
            </ul>
        </li>
        <li>
            <h6>Sucursales</h6>
            <ul>
              <li><a href="{{URL::action('sucursalcontroller@sucursales')}}"><h6>Alta Sucursales</h6></a></li>
              <li><a href="{{URL::action('sucursalcontroller@reportesucursal')}}"><h6>Reporte Sucursales</h6></a></li>
            </ul>
        </li>
        <li>
          <a href="{{URL::action('indexcontroller@comentarios')}}">Comentarios</a>
        </li>
    </ul>
    </header> 

  </div>
