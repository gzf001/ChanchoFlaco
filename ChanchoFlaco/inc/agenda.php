<!DOCTYPE html>
<html lang="es">
  <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Chancho Flaco</title>

		<!-- Bootstrap -->

		<link href="../css/bootstrap.min.css" rel="stylesheet">
	  
		<link rel="stylesheet" href="../css/bootstrap-datepicker3.css"/>
	  
		<style>
			@import url('https://fonts.googleapis.com/css?family=Oswald:400,700');
		</style> 
	 
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<link rel="stylesheet" href="../css/estilo.css"/>

  </head>
  <body>
	<?php  include("menu.php");?>

	<div class="container calendario-agenda contenido">
		<div class="row">
			<div class="col-xs-12" id="calendario-agenda"></div>
		</div>  
	</div>

	<div id="diadia" class="contenido">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 yellow btn-back-diadia"><a href="#"><img src="../img/flecha-volver.png" alt=""></a><strong style="font-size: 5vw;">Volver</strong></div>
			</div>
			<div class="row">
				<div class="container">
					<div class="col-xs-2">
						<img class="img-responsive center-block" src="../img/diamante.png" alt="">
					</div>
					<div id="fechaDiadia" name="fechaDiaDia" class="col-xs-8 text-center bolder" style="font-size: 6vw; padding-top: 2%;"></div>
					<div class="col-xs-2">
						<img  class="img-responsive center-block" src="../img/diamante.png" alt="">
					</div>
				</div>
			</div>             
			<div class="row">
				<div class="col-xs-12">
					<img class="img-responsive center-block" src="../img/estrella-diadia.png" alt="">
				</div>
			</div>
		</div>
		<div class="agregar-diadia distribucion">
			<div class="container">
				<div class="row distribucion-menu">
					<div class="col-xs-6   text-center gasto-btn-diadia">
						<img class="btn-gastos center-block img-responsive" src="../img/gasto.png" alt="" >
						<p class="txt-blanco" style="font-weight: 800;  font-size: 5vw;">GASTO</p>
					</div>
					<div class="col-xs-6  text-center ingreso-btn-diadia">
						<img class="btn-ingresos center-block img-responsive" src="../img/ingreso.png" alt="" >
						<p class="txt-blanco" style="font-weight: 800;  font-size: 5vw;">INGRESO</p>
					</div>
				</div>
			</div> 
		</div>
		<div class="container">			
			<div id="resultado" />
			<div class="row">
				<div class="col-xs-12"><img class="img-responsive center-block"src="../img/separador-negro.png" alt="" style="opacity:.2;"></div>
			</div>
		</div>
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->

	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>
	<script src="../js/menu.js"></script>
	<script src="../js/agenda.js"></script>
	
   </body>
</html>




