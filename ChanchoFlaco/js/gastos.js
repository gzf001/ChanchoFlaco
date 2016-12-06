  $(document).ready(function(){
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
       $(".calendario-gastos").hide();
  $("#gastos").show();

      return false;
    });

    $("#calendar-gastos").click(function(event) {

  $(".calendario-gastos").show();
  $("#gastos").hide();


 return false;
});

        $(".btn-cancelar-gastos").click(function(event) {
          event.preventDefault();
    history.back(1);
    });

        $(".seleccion-categoria-gastos").click(function(event) {

var valorradio = $(this).find(':radio');

  valorradio[0].click();

 
  $("input[name=categoria-gastos]").val(valorradio.val());

  $("#seleccionar-categoria-gastos").hide();
  $("#gastos").show();

});


 $("#categoria-gastos").click(function(event) {
$(".campotexto-categoria-gastos").css('background-image', 'url(../img/campo-texto-fecha.png)');
 $("#seleccionar-categoria-gastos").show();
 $("#gastos").hide();
$(".calendario-gastos").hide();

});


          if($(".campotexto-categoria-gastos").val().length > 0){
  $(".campotexto-categoria-gastos").css('background-image', 'url(../img/campo-texto-fecha.png)');
}



function obtenerVariables( name ){
  var regexS = "[\\?&]"+name+"=([^&#]*)";
  var regex = new RegExp ( regexS );
  var tmpURL = window.location.href;
  var results = regex.exec( tmpURL );
  if( results == null )
    return"";
  else
    return results[1];
}

var valor = obtenerVariables( 'num' );

$("#calendar-gastos").val(decodeURI(valor));
  });