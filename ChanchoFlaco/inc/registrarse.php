<?php

	include_once "../conexion.php";

	function verificarExistencia($email) {

		$sql = "SELECT id FROM usuario WHERE Email = '$email';";

		$rec = mysql_query($sql);

		$count = 0;

		while($row = mysql_fetch_object($rec))
		{				
			$count++;

			$result = $row;
		}

		if($count == 1)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	if(isset($_POST['registro']))
	{
		if(verificarExistencia($_POST['email']) == 1)
		{
			echo '<div class="error">El mail ingresado ya existe.</div>';
		}
		else
		{
			$validacion = 1;

			$sexoCodigo = 0;

			if($_POST['email'] == '')
			{
				echo '<div class="error">Debe imgresar el email</div>';

				$validacion = 0;
			}

			if($_POST['registropass'] == '')
			{
				echo '<div class="error">Debe ingresar una contraseña</div>';

				$validacion = 0;
			}

			if($_POST['hombre'] != 1 and $_POST['mujer'] != 2)
			{
				echo '<div class="error">Debe seleccionar el sexo</div>';

				$validacion = 0;
			}	

			if($validacion == 1)
			{	
				$sql = "SELECT MAX(id) FROM usuario;";

				$resultado = mysql_query($sql);

				$fila = mysql_fetch_row($resultado);
	
				if($_POST['hombre'] == 1)
				{
					$sexoCodigo = 1;
				}
				else
				{
					$sexoCodigo = 2;
				}
			
				$email = $_POST['email'];
				
				$pass = $_POST['registropass'];
				
				$edad = 0;

				if($_POST['registroedad'] != '')
				{
					$edad = $_POST['registroedad'];
				}
	
				if($edad > 0)
				{
					$sql = "INSERT INTO Usuario(Id, SexoCodigo, Email, Edad, Pass)VALUES($fila[0] + 1, $sexoCodigo, '$email', $edad, '$pass');";
				}
				else
				{
					$sql = "INSERT INTO Usuario(Id, SexoCodigo, Email, Pass)VALUES($fila[0] + 1, $sexoCodigo, '$email', '$pass');";	
				}
												
				mysql_query($sql);
				
				echo '<div class="error">Registro exitoso, será derivado al inicio de sesión</div>';
				
				echo "<meta http-equiv='Refresh' content='1;url=../index.php'>";
			}
		}
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
	<div id="registrarse">

		<div class="container-fluid">

			<div class="row">

				<div class="col-xs-10 col-xs-offset-1">

					<img class="img-responsive" src="/img/copihues.png" alt="" >

				</div>

			</div>

			<div class="row">

				<div class="col-xs-10 col-xs-offset-1">

					<img class="img-responsive" src="/img/titulo-registro.png" alt="" style="padding-top:15%;">

				</div>

			</div>

			<form action="" method="post" style="padding-top:15%;">

				<div class="row">

					<div class="col-xs-12">

						<div class="form-group">  

							<input class="campo-texto campo-texto-tipogasto" type="email" placeholder="ingresa tu email" name="email" id="registronombre">

							<input class="campo-texto campo-texto-tipogasto" type="password" placeholder="ingresa tu contraseña" name="registropass" id="registropass" style="margin-top:5%;">

							<input class="campo-texto campo-texto-tipogasto" type="number" placeholder="ingresa tu Edad" name="registroedad" id="registroedad" style="margin-top:5%;">

						</div>

					</div>

				</div> 

				<div class="row">

					<div class="col-xs-12 txt-blanco txt-normal">

						<input id="hombre" name="hombre" type="radio" value="1"><label for="hombre" class="txt-normal" style="font-size: 4.3vw;">Hombre</label> 

						<span class="pull-right"><input id="mujer" name="mujer" type="radio" value="2"><label for="mujer" class="txt-normal" style="font-size: 4.3vw;">Mujer</label></span>

					</div>

				</div>

				<div class="row distribucion">

					<div class="center-block col-xs-5"><button id="btn-cancelar" type="reset" class="btn-negro" onclick="javascript:window.location='../index.php'">Cancelar</button></div>

					<div class="center-block col-xs-5 pull-right"><button name="registro" id="btn-registrarse-registro" type="submit" class="btn-negro">Registrarse</button></div>

				</div>  

			</form>        

		</div>

	</div>

</html>