$(document).ready(function(){

	$(".calendario-ingresos").hide();
	$("#seleccionar-categoria").hide();

	$('#calendario-ingresos').datepicker({ 
		autoclose: false
    });

	$('#calendario-ingresos').datepicker({
		startDate: "-1y",
		todayHighlight: false
    }).on('changeDate', function(e){
		
			$('#calendar-ingresos').val(e.format('dd - mm - yyyy'));
			$(".calendario-ingresos").hide();
			$("#ingresos").show();
      return false;
    });

    $("#calendar-ingresos").click(function(event) {

		$(".calendario-ingresos").show()
		$("#ingresos").hide();
	});

    $(".btn-cancelar-ingresos").click(function(event) {
          event.preventDefault();
		  history.back(1);
    });

    $("#categoria-ingresos").click(function(event) {
		
		$(".campotexto-categoria").css('background-image', 'url(../img/campo-texto-fecha.png)');
		$("#seleccionar-categoria").show();
		$("#ingresos").hide();
		$(".calendario-ingresos").hide();
	});

	$(".seleccion-categoria").click(function(event) {

		var valorradio = $(this).find(':radio');

		valorradio[0].click();

		$("input[name=categoria-ingresos]").val(valorradio.val());

		$("#seleccionar-categoria").hide();
		
		$("#ingresos").show();
	});

	if($(".campotexto-categoria").val().length > 0){

	 $(".campotexto-categoria").css('background-image', 'url(../img/campo-texto-fecha.png)');
	}

	function obtenerVariables( name ){

	  var regexS = "[\\?&]"+name+"=([^&#]*)";

	  var regex = new RegExp ( regexS );

	  var tmpURL = window.location.href;

	  var results = regex.exec( tmpURL );

	  if( results == null ){
		  
		  return "";	  
	  }
	  else{
		  
		  return results[1];  
	  }	  
	}

	var valor = obtenerVariables( 'num' );

	$("#calendar-ingresos").val(decodeURI(valor));


});