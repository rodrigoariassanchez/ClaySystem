<html lang="en">
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <link rel="stylesheet" type="text/css" href="index_style.css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/index_style.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">  
  <link rel="stylesheet" href="//netdna.bootstrap.com/font-awesome/4.7.0/css/font-awesome.css">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
  <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
  <link href="assets/styles.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" type="text/css" href="tabla.css">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body background="fon.jpg" >
<div id="formu">
  <div id ='encabezado'> 
  </div>
  @include('menu-lateral')

  <div id = 'cuerpo' class="container">
    @yield('contenido')  

  </div>
  <div class = "fb-comments" data-href = "https://www.facebook.com/109496923875127/posts/111966956961457/" data-width = "300" data-numposts = "5" > </div>
</div>
</body>
</html>

