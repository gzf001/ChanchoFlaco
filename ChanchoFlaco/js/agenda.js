$(document).ready(function() {


$("#pantalla-agendadia").hide()
$('#pantalla-agenda').hide();





   $('#calendario-agenda').datepicker({
    startDate: "-1y",
    todayHighlight: false
    }).on('changeDate', function(e){
      $('#fechaDiadia').html(e.format('dd - MM - yyyy'))
      $("#pantalla-agenda").hide();
$("#pantalla-agendadia").show()

      return false;
    });




$("#calendario-agenda .table-condensed thead tr:nth-child(2)").after('<tr><th colspan="10"><img class="img-responsive center-block"  src="img/estrella-agenda.png" alt=""></th></tr>');




$(".btn-back-diadia").click(function(event) {
$("#pantalla-agenda").show();
$("#pantalla-agendadia").hide();
});




$(".gasto-btn-diadia").click(function(event) {

var fechaDiadia = $("#fechaDiadia").html();
$("#pantalla-agendadia").hide();
$("#pantalla-gasto").show();
$('#calendar-gastos').val(fechaDiadia);
});

$(".ingreso-btn-diadia").click(function(event) {
	var fechaDiadia = $("#fechaDiadia").html();
$("#pantalla-agendadia").hide();
$("#pantalla-ingresos").show();
$('#calendar-ingresos').val(fechaDiadia);
});

});


