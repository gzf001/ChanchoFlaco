$(document).ready(function() {


 $('#pantalla-agenda').hide();


 $('#calendario-agenda').datepicker({ 
 autoclose: false
    });

   $('#calendario-agenda').datepicker({
    startDate: "+1d",
    todayHighlight: false
    });

var dia = "#calendario-agenda .datepicker .datepicker-days .table tbody tr td.day";


$("#calendario-agenda .datepicker .datepicker-days .table thead tr:nth-child(2)").after('<tr><th colspan="10"><img class="img-responsive center-block"  src="img/estrella-agenda.png" alt=""></th></tr>');


$(dia).append('<br><span class="ingr"></span><span class="gas"></span>');

$("#calendario-agenda .datepicker .datepicker-days .table thead tr:nth-child(2) th.prev").click(function(event) {
	$(dia).append('<br><span class="ingr"></span><span class="gas"></span>');
});


});


