<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
 integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
 	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//netdna.bootstrap.com/font-awesome/4.7.0/css/font-awesome.css">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
  <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
     <div class="container">
        <div class="row text-center login-page">
	   <div class="col-md-12 login-form">
	      {{Form::open(['route' => 'valida'])}}
		  {{Form::token()}} 			
	         <div class="row">
		    <div class="col-md-12 login-form-header">
		       <p class="login-form-font-header">Clay<span>System's</span><p>
		    </div>
		</div>
		<div class="row">
		   <div class="col-md-12 login-from-row">
		   	@if($errors->first('correo')) 
				<i> {{ $errors->first('correo') }} </i> 
			@endif	<br>
		      Correo: {{Form::text('correo'),['class' => 'form-control', 'placeholder'] }}
		   </div>
		</div>
		<div class="row">
		   <div class="col-md-12 login-from-row">
		    @if($errors->first('password')) 
				<i> {{ $errors->first('password') }} </i> 
			@endif	<br>
			Password: {{Form::password('password'),['class' => 'form-control', 'placeholder' => 'password']}}
		   </div>
		</div>
		
		<div class="row">
		   	<div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Ingresa', ['class' => 'btn btn-lg btn-info pull-center'] ) !!}
            </div>
        	</div>
		</div>
	</div>
     </div>
  </div>
</body>
</html>