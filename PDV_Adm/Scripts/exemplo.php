<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="Calendario3.css" />

<title>Calendário</title>

</head>

<body>

<a href="#" id="ant" class="linkespecial">Anterior</a> | <a href="#" id="prox"class="linkespecial">Proximo</a><br />
<div id="valor"></div>
<div id="tabela"></div>

<script>
mydate = new Date();
mymonth = mydate.getMonth();
var f = mymonth+1;


myyear = mydate.getYear();
var y = myyear+1;

$('#ant').click(function(){
	f = f- 1;
	//$("#valor").text(f)
	if( f<1 )
	{
		y = y-1;
	}

});

$('#prox').click(function(){
	f =f+ 1;
	//$("#valor").text(f)
	
	if( f>12 )
	{
		y = y+1;
	}
});

$(document).ready(function(){
     atualiza();
});

function atualiza(){
	$.get('atualiza.php?x='+f, function(resultado){
	$('#tabela').html(resultado);
	
	
})


	setTimeout('atualiza()', 2000);
}


</script>
</body>
</html>