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
    startDate: "+1d",
    todayHighlight: false
    }).on('changeDate', function(e){
      $('#calendar-ingresos').val(e.format('DD dd M  '))

      return false;
    });

$("#calendar-ingresos").click(function(event) {

  $(".calendario-ingresos").toggle();
  $("#ingresos").hide();

$(".day").click(function(event) {
 
  $(".calendario-ingresos").toggle();
  $("#ingresos").show();

});
 return false;
});

// CALENDARIO INGRESOS

    }); 

