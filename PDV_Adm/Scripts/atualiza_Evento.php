<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<style>
p {
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
}

</style>


<body>
<form name="formMes" action="" method="post">


<p>


<?php
error_reporting(0);
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
		echo $dias;


		$Axml = $dia."_".$mes."_".$Ano.".xml";
		
         			
					
				
						
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
</body>
</html>
