// CATEGORIAS - GASTOS

	$(".calendario-gastos").hide();
 	$("#seleccionar-categoria-gastos").hide();

 $('#calendario-gastos').datepicker({ 
 autoclose: false
    });

   $('#calendario-gastos').datepicker({
    startDate: "-1y",
    todayHighlight: false
    }).on('changeDate', function(e){
      $('#calendar-gastos').val(e.format('dd - MM - yyyy'))
       $(".calendario-gastos").toggle();
  $("#gastos").show();

      return false;
    });

    $("#calendar-gastos").click(function(event) {

  $(".calendario-gastos").toggle();
  $("#gastos").hide();


 return false;
});


$("#categoria-gastos").click(function(event) {
$(".campotexto-categoria-gastos").css('background-image', 'url(img/campo-texto-fecha.png)');
 $("#seleccionar-categoria-gastos").show();
 $("#gastos").hide();


});

$(".seleccion-categoria-gastos").click(function(event) {

var valorradio = $(this).find(':radio');

  valorradio[0].click();

 
  $("input[name=categoria-gastos]").val(valorradio.val());

  $("#seleccionar-categoria-gastos").hide();
  $("#gastos").show();

});

$(".btn-cancelar-gastos").click(function(event) {

$("#pantalla-gasto").hide();
$("#pantalla-estadisticas").show();
});

$(".cat-gastos").click(function(event) {
$(".campotexto-categoria-gastos").css('background-image', 'url(img/campo-texto-fecha.png)');


});

