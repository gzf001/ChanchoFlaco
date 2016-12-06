 $(document).ready(function() {

 
 

 	   function mostrarOcultarAgregar(){

    	$(".gasto-ingreso").toggleClass('ocultar-menu');
    	$(".gasto-ingreso").toggleClass('mostrar-menu'); //bnts mas menos

    

    }

 	    function mostrarOcultarMenu(){
 $(".hamburguesa").toggleClass('menu');
      $(".hamburguesa").toggleClass('menu-hover');
      $("#menu-contenedor").toggleClass('ocultar-menu');
      $("#menu-contenedor").toggleClass('mostrar-menu'); // menu en general


    };


function ocultarContenido(){
  if ($("#menu-contenedor").hasClass('mostrar-menu')) {
  $("#contenido").addClass('ocultar');
   $("#contenido").removeClass('mostrar');

};

      if ($("#menu-contenedor").hasClass('ocultar-menu')) {
      $("#contenido").removeClass('ocultar');
      $("#contenido").addClass('mostrar');
};
}

function ocultarPantallasInactivas(){

var $this = $(this).parent().find('span');
    $("#contenido span").not($this).hide();
}

function limpiarForm(){
  var formulario = $(".pantalla").find('input.formulario');

formulario.val("");
}




    $(".hamburguesa").click(function btnmenu(event) {

     
   

   $("#contenido").find('.pantalla').removeClass('activo');
     mostrarOcultarMenu();

	
     $(".gasto-ingreso").hide();

     if ($(".agregar").hasClass('ocultar-menu')) {
     	$(".agregar").addClass('mostrar-menu');
     	$(".agregar").removeClass('ocultar-menu');
     	$(".agregar").show();
     };

     ocultarContenido();
     

    });


    




    $(".agregar").click(function(event) {

 		

  	   
 		if ($(".agregar").hasClass('ocultar-menu')) {
			$(".gasto-ingreso").show();
			$(".agregar").hide();
 	mostrarOcultarAgregar();
 		};


   
		     ocultarContenido();
			

		
		
    });



    $(".gasto, .ingreso").click(function(event) {
   			mostrarOcultarMenu();
   			mostrarOcultarAgregar();
   			
    });




$(".ingreso-btn").click(function(event) {
 ocultarPantallasInactivas();

$("#pantalla-ingresos").show();
mostrarOcultarMenu();
limpiarForm();

});



$(".gasto-btn").click(function(event) {
 ocultarPantallasInactivas();
limpiarForm();
 
$("#pantalla-gasto").show();
mostrarOcultarMenu();
     ocultarContenido();

});



$(".btn-diccionario").click(function(event){
   ocultarPantallasInactivas();
   limpiarForm();
  $("#pantalla-diccionario").show();
  mostrarOcultarMenu();
       ocultarContenido();

});


$(".btn-triunfos").click(function(event){
   ocultarPantallasInactivas();
   limpiarForm();
  $("#pantalla-triunfos").show();
  mostrarOcultarMenu();
       ocultarContenido();

});


$(".btn-balance").click(function(event){
   ocultarPantallasInactivas();
   limpiarForm();
  $("#pantalla-estadisticas").show();
  mostrarOcultarMenu();
       ocultarContenido();

});



$(".ingreso-btn-estadisticas").click(function(event) {
  ocultarPantallasInactivas();
   $("#pantalla-ingresos").show();
        ocultarContenido();

});

$(".gasto-btn-estadisticas").click(function(event) {
  ocultarPantallasInactivas();
   $("#pantalla-gasto").show();
        ocultarContenido();

});
  }); //document ready