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

	<div id="gastos" class="contenido">
	
		<?php

			include_once "../conexion.php";

			if(isset($_POST['save']))
			{
				$validacion = 1;
					
				if($_POST['gasto-nombre'] == '')
				{				
					echo "<div>Debe ingresar una breve descripción del gasto</div>";
					
					$validacion = 0;
				}
				
				if($_POST['date'] == '')
				{
					echo "<div>Debe ingresar la fecha del gasto</div>";
					
					$validacion = 0;
				}
				
				if($_POST['categoria-gastos'] == '')
				{
					echo "<div>Debe seleccionar una categoría</div>";
					
					$validacion = 0;
				}
				
				if($_POST['monto'] == '')
				{
					echo "<div>Debe ingresar el valor del gasto</div>";
					
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
					
					$nombre = $_POST['gasto-nombre'];
					
					$fechaPost = $_POST['date'];
					
					list($dia, $mes, $anio) =  split('[/.-]', $fechaPost);
					
					$categoria = $_POST['categoria-gastos'];
					
					$codigoCategoria = 0;
					
					if($categoria == 'Arriendo')
					{
						$codigoCategoria = 6;
					}
					elseif($categoria == 'Básicos')
					{
						$codigoCategoria = 7;
					}
					elseif($categoria == 'Locomoción')
					{
						$codigoCategoria = 8;
					}
					elseif($categoria == 'Crédito')
					{
						$codigoCategoria = 9;
					}
					elseif($categoria == 'Ocio')
					{
						$codigoCategoria = 10;
					}
					else
					{
						$codigoCategoria = 11;
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
					<img class="img-responsive" src="../img/titulo-agregar-gastos.png" alt="" style="padding-top:15%;">
				</div>
			</div>
			<form action="" method="post" style="padding-top:15%;">
				<div class="row ">
					<div class="col-xs-12">  
						<div class="form-group">  
							<input class="campo-texto campo-texto-tipogasto" name="gasto-nombre" type="text" placeholder="Escribe tu gasto: celular, comida, etc">
						</div>
					</div>
				</div> 

				<div class="row distribucion">
					<div class="col-xs-6">  
						<div class="form-group"> 
							<input class="form-control campotexto-grueso" id="calendar-gastos" name="date" placeholder="MM/DD/AAA" type="text" readonly="readonly" >  
						</div>    
					</div>
					<div class="col-xs-6">  
						<div class="form-group"> 
							<input class="form-control campotexto-categoria-gastos" id="categoria-gastos" name="categoria-gastos" type="text" readonly="readonly" value="">
						</div>    
					</div>
				</div>      
 
				<div class="row distribucion">
					<div class="col-xs-12">  
						<div class="form-group"> 
							<span class="input-group-addon">$</span> 
							<input id="monto" name="monto" class="campo-texto espacio-signo-dolar" type="number">
						</div>
					</div>
				</div> 
  
				<div class="row distribucion">
					<div class="col-xs-5 pull-left btn-cancelar-gastos"> <button type="reset" class="btn-negro">Cancelar</button></div>
					<div class="col-xs-5 pull-right"><button type="submit" name="save" class="btn-negro pull-right">Guardar</button></div>
				</div>  	
			</form>        
		</div>	
	</div>

	<!-- calendario datepicker gastos -->

	<div class="container calendario-gastos contenido" style="padding-top:10%;">
	  <div class="row">
		<div class="col-xs-12" id="calendario-gastos"></div>
	  </div>  
	</div> 

	<!-- calendario datepicker gastos -->
	<div id="seleccionar-categoria-gastos" class="container contenido">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">
				<img class="img-responsive" src="../img/titulo-categoria.png" alt="" style="padding-top:5%; padding-bottom:5%;">
			</div>
		</div>

		<!-- AQUI VA EL FORM -->

		<form action="">

			<div class="row seleccion-categoria-gastos">
				<div class="col-xs-4"><input class="cat-gastos" id="Arriendo-divi" name="Arriendo-divi" type="radio" value="Arriendo"><label id="Arriendo-divi-img" for="Arriendo-divi"></label></div>
				<div class="col-xs-8"><p class="selec-cat-titulo">Arriendo/Dividendo</p><p class="select-cat-bajada">(arriendo dividendo hipoteca)</p></div> 
			</div>

			<div class="row seleccion-categoria-gastos">
			  <div class="col-xs-4"><input class="cat-gastos" id="alimentacion" name="alimentacion" type="radio" value="Básicos"><label id="alimentacion-img" for="alimentacion"></label></div>
			  <div class="col-xs-8"><p class="selec-cat-titulo">Basicos</p><p class="select-cat-bajada">(gastos basicos: vestimenta, alimentación, etc.)</p></div> 
			</div>

			<div class="row seleccion-categoria-gastos">
			  <div class="col-xs-4"><input class="cat-gastos" id="locomocion" name="locomocion" type="radio" value="Locomoción"><label id="locomocion-img" for="locomocion"></label></div>
			  <div class="col-xs-8"><p class="selec-cat-titulo">Locomoción</p><p class="select-cat-bajada">(locomoción: bencina, micro, etc.)</p></div> 
			</div>

			<div class="row seleccion-categoria-gastos">
			  <div class="col-xs-4"><input class="cat-gastos" id="Tarjetas" name="Tarjetas" type="radio" value="Crédito"><label id="Tarjetas-img" for="Tarjetas"></label></div>
			  <div class="col-xs-8"><p class="selec-cat-titulo">Credito/Prestamos</p> <p class="select-cat-bajada">(Tarjetas de credito, prestamos, etc.)</p></div> 
			</div>

			<div class="row seleccion-categoria-gastos">
			  <div class="col-xs-4"><input class="cat-gastos" id="Ocio" name="Ocio" type="radio" value="Ocio"><label id="Ocio-img" for="Ocio"></label></div>
			  <div class="col-xs-8"><p class="selec-cat-titulo">Ocio</p><p class="select-cat-bajada">(Ocio, entretencion, cine, musica, etc.)</p></div> 
			</div>

			<div class="row seleccion-categoria-gastos">
			  <div class="col-xs-4"><input class="cat-gastos" id="otros-gastos" name="otros-gastos" type="radio" value="Otros"><label id="otros-img" for="otros-gastos"></label></div>
			  <div class="col-xs-8"><p class="selec-cat-titulo">Otros Gastos</p><p class="select-cat-bajada">(otros gastos, imprevistos, etc.)</p></div> 
			</div>

		</form>

		<!-- AQUI VA EL FORM -->
	</div>

	<!--seleccion categoria gastos -->


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->

	<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>


	<script src="../js/menu.js"></script>
	<script src="../js/gastos.js"></script>

  </body>
</html>