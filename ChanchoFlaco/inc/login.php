<?php

	session_start();
	include_once "conexion.php";

	function verificar_login($email,$password,&$result) {
		
		$sql = "SELECT id FROM usuario WHERE Email = '$email' and pass = '$password'";
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

	if(!isset($_SESSION['userid']))
	{
		if(isset($_POST['login']))
		{
			if(verificar_login($_POST['email'],$_POST['password'],$result) == 1)
			{
				$_SESSION['userid'] = $result->idusuario;
										
				header("location:inc/consejos.php");
			}
			else
			{
				echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>';
			}
		}
	}
?>

	<div id="inicio-sesion">

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">				
					<img class="img-responsive" src="img/copihues.png" alt="">
				</div>
			</div>

			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">		
					<img class="img-responsive" src="img/titulo-iniciar-sesion.png" alt="" style="padding-top:15%;">
				</div>
			</div>

			<form action="" method="post" style="padding-top:15%;">
				<div class="row ">
					<div class="col-xs-12">  
						<div class="form-group">  
							<input class="campo-texto campo-texto-tipogasto" type="name" placeholder="ingresa tu email" name="email" id="inicionombre">
							<input class="campo-texto campo-texto-tipogasto" type="password" placeholder="ingresa tu contraseña" name="password" id="iniciopass" style="margin-top:5%;">
						</div>
					</div>
				</div> 

				<div class="row">
					<div class="col-xs-12 txt-blanco txt-normal">
						<input id="recuerdame" type="radio"> <label for="recuerdame" class="txt-normal" style="font-size: 4.3vw;">Recuerdame</label> 
						<a href="inc/recuperar.php"><span id="olvidecontraseña-txt" class="pull-right" style="font-size: 4.3vw;">olvide mi contraseña</span></a>
					</div>
				</div>

				<div class="row distribucion ">
					<div class="center-block col-xs-5"><button id="btn-registrarse" type="reset" class="btn-negro" onclick="javascript:window.location='/inc/registrarse.php'">Registrarse</button></div>
					<div class="center-block col-xs-5 pull-right"><button name="login" value="login" id="btn-iniciar" type="submit" class="btn-negro">Iniciar</button></div>
				</div>  
			</form>   
		</div>
		
	</div>