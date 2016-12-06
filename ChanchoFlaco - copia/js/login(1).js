$(document).ready(function() {


$("#btn-registrarse").click(function(event) {
	$("#pantalla-iniciarsesion").hide();
	$("#pantalla-registrarse").show();
});



$("#btn-cancelar").click(function(event) {
	$("#pantalla-iniciarsesion").show();
	$("#pantalla-registrarse").hide();
});

$("#olvidecontraseña-txt").click(function(event) {
	$("#pantalla-iniciarsesion").hide();
	$("#pantalla-recuperar").show();
});


$("#btn-cancelar-recuperar").click(function(event) {
	$("#pantalla-iniciarsesion").show();
	$("#pantalla-recuperar").hide();
});
});
