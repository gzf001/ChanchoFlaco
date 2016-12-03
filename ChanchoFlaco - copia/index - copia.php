<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Chancho Flaco</title>

    <!-- Bootstrap -->



    <link href="css/bootstrap.min.css" rel="stylesheet">
  


  <link rel="stylesheet" href="css/bootstrap-datepicker3.css"/>
    <style>
@import url('https://fonts.googleapis.com/css?family=Oswald:400,700');


</style> 
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


<link rel="stylesheet" href="css/estilo.css"/>

    </head>
  <body>

 

    <!-- ======================= LOGIN ============================ -->

          <!-- iniciar sesion -->


          <span id="pantalla-iniciarsesion">
              <?php  include("inc/iniciarsesion.php");
			  
				session_start(); //session_start() crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie  
				
				include_once "conexion.php"; //es la sentencia q usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente. 
				
				/*Función verificar_login() --> Vamos a crear una función llamada verificar_login, esta se encargara de hacer una consulta a la base de datos para saber si el usuario ingresado es correcto o no.*/ 

				function verificar_login($email, $password, &$result) 
			    { 
			        $sql = “SELECT Id FROM usuario WHERE Email = ‘$email’ and Pass = ‘$password’”;
			
			        $rec = mysql_query($sql);
			
			        $count = 0;
			
			        while($row = mysql_fetch_object($rec)) 
			        { 
			            $count++; 
			            $result = $row; 
			        }
			
			        if($count == 1) 
			        { 
			            return 1; 
			        } 
			        else 
			        { 
			            return 0; 
			        }
			    }

				/*Luego haremos una serie de condicionales que identificaran el momento en el boton de login es presionado y cuando este sea presionado llamaremos a la función verificar_login() pasandole los parámetros ingresados:*/ 

				if(!isset($_SESSION['userid'])) //para saber si existe o no ya la variable de sesión que se va a crear cuando el usuario se logee 
				{ 
				    if(isset($_POST['login'])) //Si la primera condición no pasa, haremos otra preguntando si el boton de login fue presionado 
				    { 
				        if(verificar_login($_POST['user'],$_POST['password'],$result) == 1) //Si el boton fue presionado llamamos a la función verificar_login() dentro de otra condición preguntando si resulta verdadero y le pasamos los valores ingresados como parámetros. 
				        { 
				            /*Si el login fue correcto, registramos la variable de sesión y al mismo tiempo refrescamos la pagina index.php.*/ 
				            $_SESSION['userid'] = $result->idusuario; 
				            header("location:index.php"); 
				        } 
				        else 
				        { 
				            echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>'; //Si la función verificar_login() no pasa, que se muestre un mensaje de error. 
				        } 
				    } 
				?> 
				<form action="" method="post" class="login"> 
				    <div><label>Username</label><input name="user" type="text" ></div> 
				    <div><label>Password</label><input name="password" type="password"></div> 
				    <div><input name="login" type="submit" value="login"></div> 
				</form> 
				<?php 
				} else { 
				    // Si la variable de sesión ‘userid’ ya existe, que muestre el mensaje de saludo. 
				    echo 'Su usuario ingreso correctamente.'; 
				    echo '<a href="logout.php">Logout</a>'; 
				} 
			  ?>
          </span> <!-- FIN iniciar sesion -->

          <!--registrarse  -->

          <span id="pantalla-registrarse">  
                <?php  include("inc/registrarse.php");   ?>
          </span> <!-- FIN registrarse -->


          <!--recuperar contraseña  -->

          <span id="pantalla-recuperar">  
                <?php  include("inc/recuperar.php");   ?>
          </span> <!-- FIN recuperar contraseña -->

<!-- ======================= LOGIN ============================ -->


    <!--consejos -->

<span id="pantalla-consejos" class="pantalla">
    
  <?php  include("inc/consejos.php");   ?>
</span>

<!-- consejos-- >



   <!-- ==================== MENU ================== --> 
 <span id="menu-pantallas">
    <?php  include("inc/menu.php");   ?>
 </span>
    <!-- ==================== MENU ================== -->



   
<!-- ======================== CONTENIDO ======================== -->





<span id="contenido">



<!-- ============== ingresos =========== -->

<span id="pantalla-ingresos" class="pantalla">
       
        <?php  include("inc/ingresos.php");   ?> 

        <!-- calendario datepicker ingresos -->

        <div class="container calendario-ingresos" style="padding-top:10%;">
          <div class="row">
            <div class="col-xs-12" id="calendario-ingresos"></div>
          </div>  
        </div> 
        <!-- calendario datepicker ingresos -->  

        <?php  include("inc/categoriaingresos.php");   ?> <!-- seleccionar una categoria--> 
      
 </span> <!--pantalla ingresos -->

<!-- ============== ingresos =========== -->



<!-- ============== gastos =========== -->
        <span id="pantalla-gasto" class="pantalla">

        <?php  include("inc/gastos.php");   ?>


        <!-- calendario datepicker gastos -->

        <div class="container calendario-gastos" style="padding-top:10%;">
          <div class="row">
            <div class="col-xs-12" id="calendario-gastos"></div>
          </div>  
        </div> 

        <!-- calendario datepicker gastos -->



        <?php  include("inc/categoriagastos.php");   ?> <!-- seleccionar una categoria--> 


        </span> <!-- fin gastos -->
<!-- ============== gastos =========== -->


<!-- diccionario -->

    <span id="pantalla-diccionario" class="pantalla">
        <?php  include("inc/diccionario.php");   ?>
    </span> 

<!--fin diccionario --> 


<!-- triunfos -->
<span id="pantalla-triunfos" class="pantalla">
          <?php  include("inc/triunfos.php");   ?>
</span>

<!-- triunfos -->

<!--estadisticas -->

<span id="pantalla-estadisticas" class="pantalla">
  
   <?php  include("inc/balance.php");   ?>
</span>

<!-- estadisticas-- >


  <!--agenda -->

<span id="pantalla-agenda" class="pantalla">
    
  <?php  include("inc/agenda.php");   ?>
</span>

<!-- agenda-- >


    <!--agenda dia -->

<span id="pantalla-agendadia" class="pantalla">
    
  <?php  include("inc/agendadia.php");   ?>
</span>

<!-- agenda dia-- >

   </span><!-- fin contenido -->

   <!-- ======================== CONTENIDO ======================== -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>






<script>
$(document).ready(function() {

// OCULTAR PANTALLAS

$("#pantalla-ingresos").hide();
$("#pantalla-gasto").hide();
$("#pantalla-diccionario").hide();
$("#pantalla-triunfos").hide();
$("#contenido").hide(); // al realizarse el login estas pantallas se muestran
$("#menu-pantallas").hide(); // al realizarse el login estas pantallas se muestran
$("#pantalla-registrarse").hide();
$("#pantalla-recuperar").hide();

//$("#pantalla-iniciarsesion").hide(); //eliminar al terminar



  var altomenu =  $(".barra-menu").height();

  $("#contenido").css('margin-top', altomenu);


function scrolltop(){
 $("#menu-contenedor").css('margin-top', altomenu);
      $('body, html').animate({ scrollTop: 0 }, 1);

}


   $(".hamburguesa").click(function(event) {
scrolltop();
     
   });




   
 
});


</script>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="js/ingresos.js"></script>
<script type="text/javascript" src="js/gastos.js"></script>
<script type="text/javascript" src="js/agenda.js"></script>
<script type="text/javascript" src="js/consejos.js"></script>
  </body>
</html>

