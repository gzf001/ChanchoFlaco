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
	
	<div id="ingresos" class="contenido">
		<?php

			include_once "../conexion.php";

			if(isset($_POST['save']))
			{
				$validacion = 1;
					
				if($_POST['ingreso-nombre'] == '')
				{				
					echo "<div>Debe ingresar una breve descripción del ingreso</div>";
					
					$validacion = 0;
				}
				
				if($_POST['date'] == '')
				{
					echo "<div>Debe ingresar la fecha del ingreso</div>";
					
					$validacion = 0;
				}
				
				if($_POST['categoria-ingresos'] == '')
				{
					echo "<div>Debe seleccionar una categoría</div>";
					
					$validacion = 0;
				}
				
				if($_POST['monto'] == '')
				{
					echo "<div>Debe ingresar el valor del ingreso</div>";
					
					$validacion = 0;
				}
				
				$monto = (double)$_POST['monto'];
				
				if($monto <= 0){
					
					echo "<div>El monto debe ser superior a 0 (cero)</div>";
					
					$validacion = 0;
				}
				
				if($validacion == 1)
				{	
					$sql = "SELECT MAX(id) FROM ingresogasto;";
									
					$resultado = mysql_query($sql);

					$fila = mysql_fetch_row($resultado);
					
					$nombre = $_POST['ingreso-nombre'];
					
					$fechaPost = $_POST['date'];
					
					list($dia, $mes, $anio) =  split('[/.-]', $fechaPost);
					
					$categoria = $_POST['categoria-ingresos'];
					
					$codigoCategoria = 0;
					
					if($categoria == 'Pololos')
					{
						$codigoCategoria = 1;
					}
					elseif($categoria == 'Sueldo')
					{
						$codigoCategoria = 2;
					}
					elseif($categoria == 'Arriendo')
					{
						$codigoCategoria = 3;
					}
					elseif($categoria == 'Partime')
					{
						$codigoCategoria = 4;
					}
					else
					{
						$codigoCategoria = 5;
					}
			
					$sql = "INSERT INTO ingresogasto(Id, CategoriaCodigo, Fecha, Nombre, Monto)VALUES($fila[0] + 1, $codigoCategoria, '$anio-$mes-$dia', '$nombre', $monto);";
																			
					mysql_query($sql);
					
					echo '<div>Registro exitoso!!</div>';
				}
			}			
		?>
		<div class="container">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
					<img class="img-responsive" src="../img/titulo-agregar-ingresos.png" alt="" style="padding-top:15%;">
				</div>
			</div>
 
			<form action="" method="post" style="padding-top:15%;">
				<div class="row ">
					<div class="col-xs-12">  
						<div class="form-group">  
							<input id="ingreso-nombre" name="ingreso-nombre" class="campo-texto campo-texto-tipogasto formulario" type="text" placeholder="Escribe tu ingresos: sueldos, prestamos, etc">
						</div>
					</div>
				</div> 

				<div class="row distribucion">
					<div class="col-xs-6">  
						<div class="form-group"> 
							<input id="calendar-ingresos" name="date" class="form-control campotexto-grueso formulario" placeholder="MM/DD/AAA" type="text" readonly="readonly">  
						</div>    
					</div>
					
					<div class="col-xs-6">  
						<div class="form-group"> 
							<input class="form-control campotexto-categoria" id="categoria-ingresos" name="categoria-ingresos" type="text" readonly="readonly" value="">  
						</div>    
					</div>
				</div>      
 
				<div class="row distribucion">
					<div class="col-xs-12">  
						<div class="form-group"> 
							<span class="input-group-addon">$</span> 
							<input class="campo-texto espacio-signo-dolar formulario" id="monto" name="monto" type="number">
						</div>
					</div>
				</div>

				<div class="row distribucion">
					<div class="col-xs-5 pull-left btn-cancelar-ingresos" style="padding: 0px; margin-left: 5%;"><button id="cancel" class="btn-negro">Cancelar</button></div>
					<div class="col-xs-5 pull-left" style="padding: 0px; margin-left: 5%;"><button type="submit" name="save" class="btn-negro">Guardar</button></div>
				</div>	  
	
			</form>
			
		</div>
		
	</div>

	<!-- calendario datepicker ingresos -->

	<div class="container calendario-ingresos contenido" style="padding-top:10%;">
	  <div class="row">
		<div class="col-xs-12" id="calendario-ingresos"></div>
	  </div>  
	</div> 
	<!-- calendario datepicker ingresos -->  

	<div id="seleccionar-categoria" class="container contenido" >
	
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">
				<img class="img-responsive" src="../img/titulo-categoria.png" alt="" style="padding-top:5%; padding-bottom:5%;">
			</div>
		</div> 
	
		<!-- AQUI VA EL FORM -->

		<form action="">
			
			<div class="row seleccion-categoria">
			  <div class="col-xs-4"><input id="pololos" name="pololos" type="radio" value="Pololos"><label id="pololos-img" for="pololos"></label></div>
			  <div class="col-xs-8"><p class="selec-cat-titulo">Pololitos</p><p class="select-cat-bajada">(platita por trabajos extra)</p></div> 
			</div>

			<div class="row seleccion-categoria">
			  <div class="col-xs-4"><input id="sueldo" name="sueldo" type="radio" value="Sueldo"><label id="sueldo-img" for="sueldo"></label></div>
			  <div class="col-xs-8"><p class="selec-cat-titulo">Sueldo</p><p class="select-cat-bajada">(platita que entra por la peguita)</p></div> 
			</div>

			<div class="row seleccion-categoria">
			  <div class="col-xs-4"><input id="arriendo" name="arriendo" type="radio" value="Arriendo"><label id="arriendo-img" for="arriendo"></label></div>
			  <div class="col-xs-8"><p class="selec-cat-titulo">Arriendo</p><p class="select-cat-bajada">(arriedo de casas, propiedades,o maquinas)</p></div> 
			</div>

			<div class="row seleccion-categoria">
			  <div class="col-xs-4"><input id="partime" name="partime" type="radio" value="Part-time"><label id="partime-img" for="partime"></label></div>
			  <div class="col-xs-8"><p class="selec-cat-titulo">Part-Time</p><p class="select-cat-bajada">(Trabajo extra por pocas horas)</p></div> 
			</div>

			<div class="row seleccion-categoria">
			  <div class="col-xs-4"><input id="otros" name="otros" type="radio" value="Otros"><label id="otros-img" for="otros"></label></div>
			  <div class="col-xs-8"><p class="selec-cat-titulo">Otras</p><p class="select-cat-bajada">(entradas de platita)</p></div> 
			</div>

		</form>

	<!-- AQUI VA EL FORM -->
	</div>

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->

	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>
	<script src="../js/menu.js"></script>
	<script src="../js/ingresos.js"></script>
	

  </body>
</html>