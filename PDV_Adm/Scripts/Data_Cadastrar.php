<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>
<a href="#" id="ant">Anterior</a> 
<div id="valor"></div>
<div id="tabela"></div>
<input name="txtDataData" type="text" id="txtDataData" />
<script>

var f;




$('#ant').click(function(){
	f ="oi";
});



$(document).ready(function(){
     atualiza();
});

function atualiza(){
	$.get('Cadastrar_Event_Calen.php?x='+f, function(resultado){
	$('#tabela').html(resultado);
	
	
})


	setTimeout('atualiza()', 2000);
}


</script>
<body>
</body>
</html>