<?php 
require("proteger.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PDV - Admistrativo</title>
<link rel="stylesheet" type="text/css" href="estilo_adm.css" />
<link rel="stylesheet" type="text/css" href="Calendario3.css" />
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>

</head>

<body>
<div id="paginaLogin"> <?php include("acesso.php");?></div>

<style>
p {
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
}

</style>

<div id="main">

	<div id="nome">
	</div>
		<div id="conteudo">
			<div id="contem">
				<div id="home">
				<a href="index_adm.php"> <img src="../Arquivos/bt_home.png" /> </a>
				</div>
					<div id="dia"></div>
						<div id="refresh">
                        
                        <a href="#" id="ant" class="linkespecial"> << Anterior</a> | <a href="#" id="prox"class="linkespecial">Proximo >> </a><br />
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
                        
                         </div>
				</div>
		</div>
        
        <div id="menu">
        <div id="bt1"> <a href="calendario_adm.php" class="especial"> Calendário </a> </div>
        <div id="bt2"> <a href="cadastrar_even_adm.php" class="especial"> Cadastrar </a> </div>
        <div id="bt3"> <a href="consultar_end_adm.php" class="moreespecial"> Consultar End. </a> </div>
        <div id="bt4"> <a href="excluir_cadastro_adm.php" class="evenmoreespecial"> Excluir Cadastro </a> </div>
        <div id="bt5"> <a href="pendentes_adm.php" class="especial"> Pendentes </a> </div>        
        
        </div>      
        
        
</div>



</body>
</html>
