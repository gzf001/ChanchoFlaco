 $(document).ready(function() {


function ocultarContenido(){
  if ($("#menu-contenedor").hasClass('mostrar-menu')) {
  $(".contenido").hide();
  // $(".contenido").removeClass('mostrar');

};

      if ($("#menu-contenedor").hasClass('ocultar-menu')) {
      //$(".contenido").removeClass('ocultar');
      $(".contenido").show();
};
}



$(".hamburguesa").click(function(event) {

 $(".hamburguesa").toggleClass('menu');
      $(".hamburguesa").toggleClass('menu-hover');
      $("#menu-contenedor").toggleClass('ocultar-menu');
      $("#menu-contenedor").toggleClass('mostrar-menu');
      ocultarContenido();

});

	 



 var altomenu =  $(".barra-menu").height();

  $(".contenido").css('margin-top', altomenu);


function scrolltop(){
 $("#menu-contenedor").css('margin-top', altomenu);
      $('body, html').animate({ scrollTop: 0 }, 1);

}


   $(".hamburguesa").click(function(event) {
scrolltop();
     
   });



 });
