<?php 
require("proteger.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PDV - Admistrativo</title>
<link rel="stylesheet" type="text/css" href="estilo_adm.css" />


<script type="text/javascript" src="jquery-1.7.2.min.js"></script>

<script type="text/javascript" src="jquery.corner.js"></script>

		<script type="text/javascript" src="jquery-impromptu.2.0.js"></script>

		<script type="text/javascript" src="common.js"></script>

</head>

<body>
<div id="paginaLogin"> <?php include("acesso.php");?></div>

<style>
p {
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	margin-left: 350px;
}

p.classe {
	font-family:Verdana, Geneva, sans-serif;
	font-weight:bold;
	
}

.espaco {
	margin-left: 90px;
}

.espaco2 {
	margin-left: 420px;
}

.espaco3 {
	margin-left: 80px;
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
                        
                        <form action="" method="post">


  <p>
    <label for="cmbHorarios"></label>
  <p class="classe">Data: 
  <label for="txtData"></label>
  <input type="text" name="txtData" id="txtData" />
  <label for="txtCopiar"></label>
  </p>
  <p> 
    <input type="submit" name="btnchecar" id="btnchecar" value="Enviar" class="espaco"/>
  </p>
  <p>
    <label for="cmbData"></label>
    <?php
	error_reporting(0);
	if(strlen($_POST["txtData"]) > 0)
	{	
		$dataData = explode("/",$_POST["txtData"]);
		$dia = $dataData[0];
		$mes = $dataData[1];
		$Ano = $dataData[2];
		$dias = $dia."/".$mes."/".$Ano;
		
		//$_POST["txtDataInteira"].values = $dias;
		echo "<div id='dia2'><input name=\"txtDataInteira\" type=\"text\" value=\"$dias\"/></div>";
	
	}
	 ?>
  </p>
  <p class="espaco2">Horários:
  <select name="cmbHorarios" id="cmbHorarios">
    <?php 
		
		error_reporting(0);
	if(strlen($_POST["txtData"]) > 0)
	{	
		$dataData = explode("/",$_POST["txtData"]);
		$dia = $dataData[0];
		$mes = $dataData[1];
		$Ano = $dataData[2];
		$dias = $dia."/".$mes."/".$Ano;

		


		
		$Axml = $dia."_".$mes."_".$Ano.".xml";
		
			if (!file_exists($Axml))
			{
						
						
					echo 'Dia totalmente livre';
					
					  
			}
			else
			{	
				
						$xml = simplexml_load_file($dia."_".$mes."_".$Ano.".xml");
						
						
						foreach($xml->calendario as $dados)
 		   			    {
							if(	strlen($dados->horario1) > 0)
							{
								echo '<option value="9:00">9:00</option> '	;
							}
							
							if(	strlen($dados->horario2) > 0)
							{
								echo '<option value="10:00">10:00</option> '	;
							}
							
							if(	strlen($dados->horario3) > 0)
							{
								echo '<option value="11:00">11:00</option> '	;
							}
							
							if(	strlen($dados->horario4) > 0)
							{
								echo '<option value="12:00">12:00</option> '	;
							}
							
							if(	strlen($dados->horario5) > 0)
							{
								echo '<option value="14:00">14:00</option> '	;
							}
									
								$valorLotado = $dados->senha;
					  		
						}
						
			}
			
			$valor= $_POST["cmbHorarios"];
			$_POST["txtData"] = $dias;
	}
	
	?>
  </select>
  </p>
  <p>    <br />
  </p>
  <p>
    <input type="submit" name="btnOk" id="btnOk" value="Consultar" class="espaco3"/>
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>

<?php

$valor= $_POST["cmbHorarios"];

$texto = $Rua.",".$Num.",".$Bairro.",".$Cidade.",".$Estado.",".$CEP;
error_reporting(0);



if(strlen($_POST["txtDataInteira"]) > 0)
{
		$valordata2 = $_POST["txtDataInteira"];
		$dataData2 = explode("/",$valordata2);
		$dia = $dataData2[0];
		$mes = $dataData2[1];
		$Ano = $dataData2[2];
		
		$dias = $dia."/".$mes."/".$Ano;


		$Axml = $dia."_".$mes."_".$Ano.".xml";
		
         			
					
				
						
						$xml = simplexml_load_file($dia."_".$mes."_".$Ano.".xml");
						$valorI=-1;
						$Assunto = "";
						$Telefone = "";
						
						foreach($xml->calendario as $dados)
 		   			    {
							
							switch($valor)
							{
								case "9:00":
								
									
									
									$EnderecoCompleto = $dados->rua1;
									$Assunto = $dados->assunto1;
									$Telefone = $dados->tel1;
	
									
									
								break;
								
								case "10:00":
									$EnderecoCompleto = $dados->rua2;
									$Assunto = $dados->assunto2;
									$Telefone = $dados->tel2;
								break;
								
								case "11:00":
									$EnderecoCompleto = $dados->rua3;
									$Assunto = $dados->assunto3;
									$Telefone = $dados->tel3;
								break;
								
								case "12:00":
									$EnderecoCompleto = $dados->rua4;
									$Assunto = $dados->assunto4;
									$Telefone = $dados->tel4;
								break;
								
								case "14:00":
									$EnderecoCompleto = $dados->rua5;
									$Assunto = $dados->assunto5;
									$Telefone = $dados->tel5;
									
									
								break;
							}
							
					  	
						}
					
					 
						
					
						$googlemaps = "<iframe width='425' height='350' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='http://maps.google.com.br/maps?hl=pt-BR&amp;q=".$EnderecoCompleto."&amp;ie=UTF8&amp;hq=&amp;hnear=".$EnderecoCompleto."&amp;t=h&amp;ll=-23.976528,-46.315184&amp;spn=0.027449,0.036478&amp;z=14&amp;iwloc=A&amp;output=embed'></iframe><br /><small><a href='http://maps.google.com.br/maps?hl=pt-BR&amp;q=".$EnderecoCompleto."&amp;ie=UTF8&amp;hq=&amp;hnear=".$EnderecoCompleto."&amp;t=h&amp;ll=-23.976528,-46.315184&amp;spn=0.027449,0.036478&amp;z=14&amp;iwloc=A&amp;source=embed' style='color:#F00;text-align:left'>Exibir mapa ampliado</a></small>";
						
						
				 echo  ' </br>  <p class="classe">Assunto : '.$Assunto.'</br> Telefone : '.$Telefone.' </p> </br> <div id="mapa">'.$googlemaps.'</div>'; 
					
}

?>

                        
                        
                        
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
