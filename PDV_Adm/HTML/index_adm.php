<?php 
require("proteger.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PDV - Admistrativo</title>
<link rel="stylesheet" type="text/css" href="estilo_adm.css" />

</head>

<body>
<div id="paginaLogin"> <?php include("acesso.php");?></div>
<?php
error_reporting(0);
date_default_timezone_set("Brazil/East");

$numeroMes = $_GET['x'];
//$numeroAno = $_GET['y'];
//echo $_GET['x'];



		$dia = "";
		$dia = date("d");
	//	$dia = $dia;

		$mes = date("m");
		$Ano = date("Y");
		
		$dia = $dia + 12;
		$dia = $dia - 12;
		
		$mes = $mes + 12;
		$mes = $mes - 12;
		
		$Ano = $Ano + 12;
		$Ano = $Ano - 12;
		
		
		$dias = $dia."/".$mes."/".$Ano;
		


		$Axml = $dia."_".$mes."_".$Ano.".xml"; 
		
		$mesLetra = '';
		switch($mes)
		{
			case '1': $mesLetra = "Janeiro";
			break;
			
			case '2': $mesLetra = "Fevereiro";
			break;
			
			case '3': $mesLetra = "Março";
			break;
			
			case '4': $mesLetra = "Abril";
			break;
			
			case '5': $mesLetra = "Maio";
			break;
			
			case '6': $mesLetra = "Junho";
			break;
			
			case '7': $mesLetra = "Julho";
			break;
			
			case '8': $mesLetra = "Agosto";
			break;
			
			case '9': $mesLetra = "Setembro";
			break;
			
			case '10': $mesLetra = "Outubro";
			break;
			
			case '11': $mesLetra = "Novembro";
			break;
			
			case '12': $mesLetra = "Dezembro";
			break;
		}
?>
<style>
p {
	font-family:Verdana, Geneva, sans-serif;
	font-size:20px;
	margin: 50px;
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
					<div id="dia"><p><?php echo $dia.' de '.$mesLetra.' de '.$Ano; ?></p></div>
						<div id="refresh">
                        
                        
                        <form name="formMes" action="" method="post">


<p>


<?php

		
         			
					
				
						
						$xml = simplexml_load_file($dia."_".$mes."_".$Ano.".xml");
						$valorI=-1;
						
						foreach($xml->calendario as $dados)
 		   			    {
							
						
									
									
									$EnderecoCompleto1 = $dados->assunto1;
	
									
									
						
									$EnderecoCompleto2 = $dados->assunto2;
						
									$EnderecoCompleto3 = $dados->assunto3;
							
									$EnderecoCompleto4 = $dados->assunto4;
								
									$EnderecoCompleto5 = $dados->assunto5;
									
									
	
									
									
						
									$tel1 = $dados->tel1;
						
									$tel2 = $dados->tel2;
							
									$tel3 = $dados->tel3;
								
									$tel4 = $dados->tel4;
									
									$tel5 = $dados->tel5;
									
							
							
					  	
						}
						
						
						if ( $EnderecoCompleto1 =='' )
						{
							echo '</br>'.'9:00  Horário Livre';
						}
						else
						{
							echo '</br>'.'9:00 - Assunto: '. $EnderecoCompleto1.',   Telefone: '.$tel1;
						}
						
						if ( $EnderecoCompleto2 =='' )
						{
							echo '</br>'.'10:00  Horário Livre';
						}
						else
						{
							echo '</br>'.'10:00 - Assunto: '. $EnderecoCompleto2.',   Telefone: '.$tel2;
						}
						
						if ( $EnderecoCompleto3 =='' )
						{
							echo '</br>'.'11:00  Horário Livre';
						}
						else
						{
							echo '</br>'.'11:00 - Assunto: '. $EnderecoCompleto3.',   Telefone: '.$tel3;
						}
						
						if ( $EnderecoCompleto4 =='' )
						{
							echo '</br>'.'12:00  Horário Livre';
						}
						else
						{
							echo '</br>'.'12:00 - Assunto: '. $EnderecoCompleto4.',   Telefone: '.$tel4;
						}
						
						if ( $EnderecoCompleto5 =='' )
						{
							echo '</br>'.'14:00  Horário Livre';
						}
						else
						{
							echo '</br>'.'14:00 - Assunto: '. $EnderecoCompleto5.',   Telefone: '.$tel5;
						}
						
						


?>

</p>
                       
                        
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

<meta http-equiv='refresh' content='2;url=index_adm.php'>
</html>
