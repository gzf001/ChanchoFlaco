 $(document).ready(function(){

//SELECCIONAR CATEGORIA //

$(".calendario-ingresos").hide();
$("#seleccionar-categoria").hide();

 $("#categoria-ingresos").click(function(event) {
 $(".campotexto-categoria").css('background-image', 'url(img/campo-texto-fecha.png)');
  $("#seleccionar-categoria").show();
  $("#ingresos").hide();


 });


$(".seleccion-categoria").click(function(event) {

var valorradio = $(this).find(':radio');

  valorradio[0].click();

 
  $("input[name=categoria-ingresos]").val(valorradio.val());

  $("#seleccionar-categoria").hide();
  $("#ingresos").show();
});
 

// SELECCIONAR CATEGORIA//

// CALENDARIO INGRESOS

  $('#calendario-ingresos').datepicker({ 
 autoclose: false
    });

   $('#calendario-ingresos').datepicker({
    startDate: "-1y",
    todayHighlight: false
    }).on('changeDate', function(e){
      $('#calendar-ingresos').val(e.format('dd - MM - yyyy'))
  $(".calendario-ingresos").toggle();
  $("#ingresos").show();
      return false;
    });

$("#calendar-ingresos").click(function(event) {

  $(".calendario-ingresos").toggle();
  $("#ingresos").hide();





 return false;
});

// CALENDARIO INGRESOS



$(".btn-cancelar-ingresos").click(function(event) {

$("#pantalla-ingresos").hide();
$("#pantalla-estadisticas").show();
});


$(".ingreso-btn-estadisticas").click(function(event) {


$(".calendario-ingresos").hide();
$("#seleccionar-categoria").hide();
  $("#ingresos").show();

   $(".campotexto-categoria").css('background-image', 'url(img/campo-texto-categoria.png)');
   if($(".campotexto-categoria").val().length > 0){
  $(".campotexto-categoria").css('background-image', 'url(img/campo-texto-fecha.png)');
}
});


$(".gasto-btn-estadisticas").click(function(event) {


 $(".calendario-gastos").hide();
$("#seleccionar-categoria-gastos").hide();
  $("#gastos").show();

  $(".campotexto-categoria-gastos").css('background-image', 'url(img/campo-texto-categoria.png)');
  if($(".campotexto-categoria-gastos").val().length > 0){
  $(".campotexto-categoria-gastos").css('background-image', 'url(img/campo-texto-fecha.png)');
}

});




$(".ingreso-btn-diadia").click(function(event) {


$(".calendario-ingresos").hide();
$("#seleccionar-categoria").hide();
  $("#ingresos").show();

   $(".campotexto-categoria").css('background-image', 'url(img/campo-texto-categoria.png)');
   if($(".campotexto-categoria").val().length > 0){
  $(".campotexto-categoria").css('background-image', 'url(img/campo-texto-fecha.png)');
}
});


$(".gasto-btn-diadia").click(function(event) {


 $(".calendario-gastos").hide();
$("#seleccionar-categoria-gastos").hide();
  $("#gastos").show();

  $(".campotexto-categoria-gastos").css('background-image', 'url(img/campo-texto-categoria.png)');
  if($(".campotexto-categoria-gastos").val().length > 0){
  $(".campotexto-categoria-gastos").css('background-image', 'url(img/campo-texto-fecha.png)');
}

});


    }); 

