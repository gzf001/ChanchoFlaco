<?php

	include_once "../conexion.php";
	
	function Ingresos($fecha){
		
		echo "<div class='row distribucion' style='margin-bottom:5%;'><div class='col-xs-12 text-center bolder txt-celeste' style='font-size: 7vw;'>Ingresos</div></div><div class='row'> <div class='col-xs-12'><img class='img-responsive' src='../img/separador-negro.png' alt=''></div></div>";
		
		list($dia, $mes, $anio) =  split('[/.-]', $fecha);
		
		$sql = "SELECT ingresoGasto.Nombre AS Ingreso, categoria.Nombre as Categoria, ingresoGasto.Monto FROM ingresoGasto INNER JOIN categoria ON categoria.Codigo = ingresoGasto.CategoriaCodigo WHERE categoria.Ingreso = 1 AND ingresoGasto.Fecha = '$anio-$mes-$dia';";
		
		$rec = mysql_query($sql);
		
		if($rec != NULL)
		{		
			if(mysql_num_rows($rec) > 0 ){
				
				while($row = mysql_fetch_array($rec)){
					
					echo "<div class='row distribucion'><div class='col-xs-6'><div class='col-xs-12 text-left bolder' style='font-size: 6vw;'>$row[0]</div><div class='col-xs-12 text-left'>$row[1]</div></div><div class='col-xs-6 text-right bolder' style='font-size: 6vw;'>$$row[2]</div></div>";
					
					echo "<div class='row'><div class='col-xs-12'><img class='img-responsive center-block' src='../img/separador-negro.png' alt='' style='opacity:.2;'></div></div>";
				}
			}
		}
		else
		{
			$texto = "No hay ingresos en este día";
			
			echo "<div class='row distribucion'><div class='col-xs-6'><div class='col-xs-12 text-left bolder' style='font-size: 6vw;'>$texto</div><div class='col-xs-12 text-left'></div></div><div class='col-xs-6 text-right bolder' style='font-size: 6vw;'></div></div>";
		}
		
		mysql_free_result($rec);
		
		mysql_close();
	}
	
	function Gastos($fecha){
		
		echo "<div class='row distribucion' style='margin-bottom:5%;'><div class='col-xs-12 text-center bolder txt-rojo' style='font-size: 7vw;'>Gastos</div></div><div class='row'><div class='col-xs-12'><img class='../img-responsive' src='../img/separador-negro.png' alt=''></div></div>";
		
		list($dia, $mes, $anio) =  split('[/.-]', $fecha);
		
		$sql = "SELECT ingresoGasto.Nombre AS Ingreso, categoria.Nombre as Categoria, ingresoGasto.Monto FROM ingresoGasto INNER JOIN categoria ON categoria.Codigo = ingresoGasto.CategoriaCodigo WHERE categoria.Ingreso = 0 AND ingresoGasto.Fecha = '$anio-$mes-$dia';";
		
		$rec = mysql_query($sql);
		
		if(mysql_num_rows($rec) > 0 )
		{
			while($row = mysql_fetch_array($rec)){
				
				echo "<div class='row distribucion'><div class='col-xs-6'><div class='col-xs-12 text-left bolder' style='font-size: 6vw;'>$row[0]</div><div class='col-xs-12 text-left'>$row[1]</div></div><div class='col-xs-6 text-right bolder' style='font-size: 6vw;'>$$row[2]</div></div>";
				
				echo "<div class='row'><div class='col-xs-12'><img class='img-responsive center-block' src='../img/separador-negro.png' alt='' style='opacity:.2;'></div></div>";
			}
		}
		else
		{
			$texto = "No hay gastos en este día";
			
			echo "<div class='row distribucion'><div class='col-xs-6'><div class='col-xs-12 text-left bolder' style='font-size: 6vw;'>$texto</div><div class='col-xs-12 text-left'></div></div><div class='col-xs-6 text-right bolder' style='font-size: 6vw;'></div></div>";
		}
		
		mysql_free_result($rec);
		
		mysql_close();
	}
	
	/*echo "<script language='javascript'>alert('aqui');</script>";*/
	if(isset($_POST['date']))
	{		
		$fecha = $_POST['date'];
		
		Gastos($fecha);
		
		Ingresos($fecha);
	}					
?>