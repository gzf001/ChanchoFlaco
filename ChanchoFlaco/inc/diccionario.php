<!DOCTYPE html>
<html lang="es">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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


  <div id="diccionario" class="contenido distribucion">
  
  <div class="container">
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1">
        
        <img class="img-responsive" src="../img/titulo-diccionario.png" alt="" style="padding-top:15%;">
      </div>
    </div>

        <div class="row">
      <div class="col-xs-10 col-xs-offset-1">
        
        <img class="img-responsive" src="../img/il-diccionario.png" alt="" style="padding-top:15%;">
      </div>
    </div>
     
        <form action="buscar.php" accept-charset="utf-8" method="POST" style="padding-top:15%;" id="buscar_resultado" name="buscar_resultado">


      <div class="row ">
       <div class="col-xs-12">  
       <div class="form-group">  
          <input id="busquedadiccionario" name="busquedadiccionario" class="campo-texto campo-texto-tipogasto formulario" type="text" placeholder="Escribe tu gasto: celular, comida, etc" >
        </div>
       </div>
      </div> 


      
      <div class="row ">
        <div class="col-xs-5 col-xs-offset-3" > <button id="resultadoCampoBusqueda"  class="btn-negro">Buscar</button></div>
      
      </div>


<div id="botonera-busqueda" class="container distribucion">
  
  <div class="row">
    <div class="col-xs-12">
        <div class="btn-abc">A</div>
        <div class="btn-abc">B</div>
        <div class="btn-abc">C</div>
        <div class="btn-abc">D</div>
        <div class="btn-abc">E</div>
        <div class="btn-abc">F</div>
        <div class="btn-abc">G</div>
        <div class="btn-abc">H</div>
        <div class="btn-abc">I</div>
        <div class="btn-abc">J</div>
        <div class="btn-abc">K</div>
        <div class="btn-abc">L</div>
        <div class="btn-abc">M</div>
        <div class="btn-abc">N</div>
        <div class="btn-abc">Ñ</div>
        <div class="btn-abc">O</div>
        <div class="btn-abc">P</div>
        <div class="btn-abc">Q</div>
        <div class="btn-abc">R</div>
        <div class="btn-abc">S</div>
        <div class="btn-abc">T</div>
        <div class="btn-abc">U</div>
        <div class="btn-abc">V</div>
        <div class="btn-abc">W</div>
        <div class="btn-abc">X</div>
        <div class="btn-abc">Y</div>
        <div class="btn-abc">Z</div>
    </div>
  </div>

</div>        
        
        </form>        

      


   <div class="row">
      <div class="col-xs-12">
        
        <img class="img-responsive center-block" src="../img/separador-diccionario.png" alt="" style="padding-top:15%;">
      </div>
    </div> 
    
  <div class="row">
    <div id="resultado" class="col-xs-12"></div>
  </div>

  </div> <!-- Contenedor -->


</div>



    <!-- Include all compiled plugins (below), or include individual files as needed -->

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


    <script src="../js/menu.js"></script>

    <script>

  $(document).ready(function(){

   

$("#buscar_resultado").submit(function(event) {
    $.ajax({
    url: $(this).attr('action'),
    type: 'POST',
    data: $(this).serialize(),


    success: function(data) {
      $("#resultado").html(data);
      //alert(data);
    }

  })
 
  return false;
  
});


 

$(".btn-abc").click(function(event) {

var btnAbc = $(this).html();


    $.ajax({
    url: 'buscarAbc.php',
    type: 'POST',
    data: ({btnAbc}),


    success: function(data) {
      $("#resultado").html(data);

    }

  })
 
  return false;

});




});






</script>

    </body>
</html>