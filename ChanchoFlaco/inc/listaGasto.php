<?php

	include_once "../conexion.php";
	
	/*echo "<script language='javascript'>alert('aqui');</script>";*/
	if(isset($_POST['date']))
	{
		$fecha = $_POST['date'];
		
		list($dia, $mes, $anio) =  split('[/.-]', $fecha);
		
		$sql = "SELECT ingresoGasto.Nombre AS Ingreso, categoria.Nombre as Categoria, ingresoGasto.Monto FROM ingresoGasto INNER JOIN categoria ON categoria.Codigo = ingresoGasto.CategoriaCodigo WHERE categoria.Ingreso = 0 AND ingresoGasto.Fecha = '$anio-$mes-$dia';";
		
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
			$texto = "No hay gastos en este día";
			
			echo "<div class='row distribucion'><div class='col-xs-6'><div class='col-xs-12 text-left bolder' style='font-size: 6vw;'>$texto</div><div class='col-xs-12 text-left'></div></div><div class='col-xs-6 text-right bolder' style='font-size: 6vw;'></div></div>";
		}

		mysql_free_result($rec);
		
		mysql_close();
	}					
?>