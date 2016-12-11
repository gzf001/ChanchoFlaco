<meta http-equiv="content-type" content="text/html; UTF-8" />
<?php
error_reporting(E_ALL ^ E_NOTICE);
//creamos la conexion a la base de datos

require_once "../conexion2.php";
$db = new BaseDatos();
$link=$db->conectar();


//Variable de búsqueda
$consultaBusqueda = $_POST['busquedadiccionario'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";


//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {

	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
$consulta = mysqli_query($link, "SELECT * FROM diccionario
	     WHERE Nombre LIKE '%$consultaBusqueda%'");

   
	 	 //OR Abc LIKE '%'.$consultaBusqueda.'%'");

	//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0) {
		$mensaje = '<h1 class="bolder text-center">No existen resultados para esa busqueda</h1>';
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		echo '<h1 class="text-center bolder"> Resultados para <strong>'.$consultaBusqueda.'</strong> </h1>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
	
		while($resultados = mysqli_fetch_array($consulta)) {

		echo '<div class="container distribucion">';
			echo '<div class="row">';
				//echo '<div class="col-xs-4">';
				//	echo $resultados['Abc'];
				//echo '</div>';

				echo '<div class="col-xs-4 font-size: 4vw; bolder">';
					echo utf8_decode($resultados['Nombre']);
				echo '</div>';

				echo '<div class="col-xs-8" style="font-size: 2.8vw;">';
					echo utf8_decode($resultados['Descripcion']);
				echo '</div>';

				echo  '<img class="img-responsive center-block" src="../img/separador-negro.png" alt="" style="opacity:.2;">';

			echo '</div>';
		echo '</div>';	
/*
			
			$nombre = $resultados['Abc'];
			$apellido = $resultados['Nombre'];
			$edad = $resultados['Descripcion'];

			//Output
			$mensaje = '
			<p>
			<strong>Nombre:</strong> ' . $nombre . '<br>
			<strong>Apellido:</strong> ' . $apellido . '<br>
			<strong>Edad:</strong> ' . $edad . '<br>
			</p>';

*/
		};//Fin while $resultados

	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;


?>