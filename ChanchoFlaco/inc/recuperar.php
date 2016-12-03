<!DOCTYPE html>
<html lang="es">
  <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Chancho Flaco</title>

		<!-- Bootstrap -->

		<link href="/css/bootstrap.min.css" rel="stylesheet">
	  
		<link rel="stylesheet" href="/css/bootstrap-datepicker3.css"/>
	  
		<style>
			@import url('https://fonts.googleapis.com/css?family=Oswald:400,700');
		</style> 
	 
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<link rel="stylesheet" href="/css/estilo.css"/>

  </head>
  <body>
	  <div id="recuperar">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">        
					<img class="img-responsive" src="/img/cabezaepollo.png" alt="" >
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">      
					<img class="img-responsive center-block" src="/img/titulo-recuperar.png" alt="" style="padding-top:15%;">
					<p class="txt-amarillo text-center" style="font-size: 3.5vw;">RECUPERAR TU CONTRASEÑA</p>
				</div>
			</div>   
			<form action="" style="padding-top:15%;">
				<div class="row ">
					<div class="col-xs-12">  
						<div class="form-group">  
							<input class="campo-texto campo-texto-tipogasto" type="name" placeholder="ingresa tu email" name="registronombre" id="registronombre">
						</div>
					</div> 
					<div class="row distribucion">
						<div class="center-block col-xs-5"><button id="btn-cancelar-recuperar" type="reset" class="btn-negro" onclick="javascript:window.location='../index.php'">Cancelar</button></div>
						<div class="center-block col-xs-5 pull-right"><button id="btn-recuperar" type="submit" class="btn-negro">Iniciar</button></div>
					</div>
				</div>
			</form>
		</div>
	</div>
  </body>
</html>