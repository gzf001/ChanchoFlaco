<?php

	include_once "../conexion.php";
	
	function total($ingresoGasto)
	{
		$ingresos = "SELECT IFNULL(SUM(ingresoGasto.Monto),0) FROM ingresoGasto INNER JOIN categoria ON categoria.Codigo = ingresoGasto.CategoriaCodigo WHERE Categoria.Ingreso = $ingresoGasto;";
		
		$resultadoIngreso = mysql_query($ingresos);
		
		$totalIngreso = mysql_fetch_row($resultadoIngreso);
		
		return $totalIngreso[0];
	}
	
	function ultimo($ingresoGasto)
	{
		$resultado = "SELECT categoria.Nombre, ingresoGasto.Monto FROM ingresoGasto INNER JOIN categoria ON categoria.Codigo = ingresoGasto.CategoriaCodigo WHERE categoria.Ingreso = $ingresoGasto ORDER BY ingresoGasto.Id DESC LIMIT 1;";
		
		$auxiliarResultado = mysql_query($resultado);
		
		$resultados = mysql_fetch_row($auxiliarResultado);
		
		return $resultados;
	}
?>
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
  	<?php  include("menu.php");   ?>
		<div id="estadisticas" class="contenido">
			<div class="agregar-estadisticas">
				<div class="container">
					<div class="row distribucion-menu">
						<div class="col-xs-6 text-center gasto-btn-estadisticas">
							<a href="gastos.php"><img class="btn-gastos center-block img-responsive" src="../img/gasto.png" alt=""></a>
							<p  class="txt-blanco" style="font-weight: 800;  font-size: 5vw;">GASTO</p>
						</div>
						<div class="col-xs-6  text-center ingreso-btn-estadisticas">
							<a href="ingresos.php"><img class="btn-ingresos center-block img-responsive" src="../img/ingreso.png" alt=""></a>
							<p  class="txt-blanco" style="font-weight: 800;  font-size: 5vw;">INGRESO</p>
						</div>
					</div>
				</div> 
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="saldo col-xs-6">
						<img class="img-responsive center-block" src="../img/saldo-logotipo.png" alt="" style="padding-top:5%;">
						<div class="text-center bolder txt-amarillo" style="font-size: 4vw; padding-top: 9%;">TU SALDO ES:</div><br/>
						<?php
							
							$saldo = total(1) - total(0);
						
							echo "<div class='text-center bolder txt-blanco' style='color: white; font-size: 6.5vw;'><span name='saldo'>$saldo.-<span/></div>"
						?>
					</div>
					<div class=" col-xs-6  gasto-ingreso-total">
						<div id ="gastostitulo" class="text-center txt-amarillo bolder titulos-balance" style="padding-top: 10%;">GASTOS</div> 
						
						<?php
							
							$totalGasto = total(0);
							
							echo "<div class='text-center txt-negro bolder datos-balance'>$totalGasto.-</div>"
						
						?>				
					
						<div id="ingresostitulo" class="text-center txt-amarillo bolder titulos-balance" style="padding-top: 10%;">INGRESOS</div>     
						
						<?php
							
							$totalIngreso = total(1);
							
							echo "<div class='text-center txt-negro bolder datos-balance'>$totalIngreso.-</div>"
						
						?>
					</div>
				</div>
				<div class="row">
					<div class=" col-xs-6  ultimo-ingreso">
						<img class="center-block " src="../img/ultimo-ingreso-titulo.png" alt="" style="width: 43vw; padding-top: 2vh">
						<div class="titulos-balance txt-blanco text-center" style="padding-top: 5vh;">ULTIMO INGRESO</div>
						<?php
						
							$concepto = ultimo(1);
							
							echo "<div class='text-center bolder' style='font-size: 3vw;'>$concepto[0]</div><br/><div class='text-center bolder txt-blanco' style='color: white; font-size: 6.5vw; padding-top: 3vh;'>$$concepto[1].-</div>"
							
						?>
					</div>
					<div class=" col-xs-6  ultimo-gasto">
						<img class="center-block " src="../img/ultimo-gasto-titulo.png" alt="" style="width: 43vw; padding-top: 2vh">
						<div class="titulos-balance txt-blanco text-center" style="padding-top: 5vh;">ULTIMO GASTO</div><br/><br/>
						<?php
						
							$concepto = ultimo(0);
							
							echo "<div class='text-center bolder' style='font-size: 3vw;'>$concepto[0]</div><div class='text-center bolder txt-blanco' style='color: white; font-size: 6.5vw; padding-top: 3vh'>$$concepto[1].-</div>"
							
						?>						
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 estado-financiero">
						<img class="center-block img-responsive " src="../img/estado-financiero-titulo.png" alt="" style="; padding-top: 2vh">
						<?php
						
							$saldo = total(1) - total(0);
							
							if($saldo > 0)
							{
								echo "<div class='text-center txt-negro bolder' style='font-size: 6.5vw; padding-top: 3vh'>SALDO A FAVOR</div>";
							}
							elseif($saldo == 0)
							{
								echo "<div class='text-center txt-negro bolder' style='font-size: 6.5vw; padding-top: 3vh'>SITUACION EQUILIBRADA</div>";
							}
							else
							{
								echo "<div class='text-center txt-negro bolder' style='font-size: 6.5vw; padding-top: 3vh'>SOBREENDEUDADO</div>";
							}																				
						?>
						
					</div>            
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/menu.js"></script>
  </body>
</html>