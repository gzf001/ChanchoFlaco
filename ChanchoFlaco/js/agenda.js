
$("#diadia").hide();



   $('#calendario-agenda').datepicker({
    startDate: "-1y",
    todayHighlight: false
    }).on('changeDate', function(e){
      $('#fechaDiadia').html(e.format('dd - MM - yyyy'))
      $(".calendario-agenda").hide();
$("#diadia").show()

      return false;
    });



$('body').on('click','.gasto-btn-diadia',function(event) {
var fechaDiadia = $("#fechaDiadia").html();
window.location="gastos.php?num="+fechaDiadia;
obtenerVariables();

});


$('body').on('click','.ingreso-btn-diadia',function(event) {
var fechaDiadia = $("#fechaDiadia").html();
window.location="ingresos.php?num="+fechaDiadia;
obtenerVariables();

});	



