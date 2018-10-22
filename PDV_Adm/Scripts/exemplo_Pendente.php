<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>




</head>

<body>

<div id="valor"></div>
<div id="tabela"></div>

<script>
var f = 1;

$(document).ready(function(){
     atualiza();
});

function atualiza(){
	$.get('atualiza_Pendente.php?x='+f, function(resultado){
	$('#tabela').html(resultado);
	
	
})


	setTimeout('atualiza()', 10000);
}


</script>
</body>
</html>