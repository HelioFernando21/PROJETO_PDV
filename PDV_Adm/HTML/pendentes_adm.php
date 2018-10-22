<?php 
require("proteger.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PDV - Admistrativo</title>
<link rel="stylesheet" type="text/css" href="estilo_adm.css" />
<link href="Calendario3.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript" src="jquery-1.7.2.min.js"></script>

</head>

<body>
<div id="paginaLogin"> <?php include("acesso.php");?></div>

<style>
p {
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
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
					<div id="dia"></div>
						<div id="refresh">
                        
                        
                        <form name="formMes" action="" method="post">
<form id="form1" name="form1" method="post" action="">
  <p>
    <?php
error_reporting(0);
date_default_timezone_set("Brazil/East");
$numeroMes = $_GET['x'];
//$numeroAno = $_GET['y'];




		
		
					
				
						
						$xml = simplexml_load_file("pendentes.xml");
					
						
						foreach($xml->calendario as $dados)
 		   			    {
										
							
						$i = 0;
									$texto1 = $dados->pendentes;
									$textos = explode("/txt/",$texto1);
									$i = $dados->senha;
						
					  	
						}
						$valor = -1;
						$completo = '';
						do
						{
							$valor++;
							$parte = explode(",,",$textos[$valor]);
							if( strlen($parte[0]) > 0)
							{
								$numero = $valor ;
							$completo = $completo. '</br>'.$numero.' </br> '.'Responsável: '.$parte[8] .' </br> '.'Endereço: '.$parte[0].', '.$parte[1].' </br> '.'Bairro: '.$parte[2].' </br> '.'Cidade: '.$parte[3].' </br> '.'Estado: '.$parte[4]. ' </br> '.'Telefone: '.$parte[6].' </br> '.' Data: '.$parte[7].' </br> '.'--------------------'.' </br> ';
							
							}
						}
						while($valor < $i+1);
						
						echo $completo;


?>
  </p>
  <p>
    <label>
      Confirmar: <input name="txtConfirmar" type="text" />
      
    </label>
  </p>
  <p>
    <input type="submit" name="btnConfirmar" id="btnConfirmar" value="Confirmar" />
    <?php
		$alt = $_POST["txtConfirmar"];
		
				
				if(strlen($_POST["txtConfirmar"]) > 0)
				{
	
					if(is_numeric($alt))
					{
			            $Axml = "pendentes.xml";
						$texto1 = '';
						$valor = -1;
						$alt = $alt-1;
						do
						{
							$valor++;
							if( $valor == 0 )
							{
								$texto1 = $textos[$valor];
							}
							else
							{
								if( $valor <>  $_POST["txtConfirmar"] )
								{
									$texto1 = $texto1.'/txt/'.$textos[$valor];
								
								}
							}
						}
						while($valor < $i);
						$i = $i - 1;
						//echo $texto1;
						
					
					  $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>"; //Cabeçalho principal para geração o arquivo	
					
						$xml .= "\n<banco>";
						$xml .= "\n\t<calendario>";
						$xml .= "\n\t\t<senha>".$i."</senha>";
						$xml .= "\n\t\t<pendentes>".$texto1."</pendentes>";
						$xml .= "\n\t</calendario>";
						$xml .= "\n</banco>";
						
					
						//Abre o arquivo e força a criação caso não exista, a opção w permite sobrescrer o conteudo
						$abrir = fopen($Axml,"w");
						
						//Gravar o arquivo xml
						$gravar = fwrite($abrir,$xml);
						
						echo "<script>alert (\"Seu evento pendente foi excluído com sucesso\")</script>";
					}
				}
	?>
  </p>
</form>
<meta http-equiv='refresh' content='10;url=pendentes_adm.php'>
                        
                        
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
