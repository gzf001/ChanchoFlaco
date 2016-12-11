$("#diadia").hide();

$('#calendario-agenda').datepicker({
	startDate: "-1y",
	todayHighlight: false
}).on('changeDate', function(e){
	
	/*$.ajax({
		data:  {
				'date' : e.format('dd-mm-yyyy')
		},
		url:   'listaGasto.php',
		type:  'post',
		beforeSend: function (){
			
			$("#gastos-diadia").html("Procesando, espere por favor...");
			
			},
		success: function (response) {
			
			$("#gastos-diadia").html(response);
			
			}
        });*/

	$.ajax({
		data:  {
				'date' : e.format('dd-mm-yyyy')
		},
		url:   'listaIngreso.php',
		type:  'post',
		beforeSend: function (){
			
			$("#ingresos-diadia").html("Procesando, espere por favor...");
			
		},
		success: function (response) {
			
			$("#resultado").html(response);
			
			}
        });

	$('#fechaDiadia').html(e.format('dd-mm-yyyy'))

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



