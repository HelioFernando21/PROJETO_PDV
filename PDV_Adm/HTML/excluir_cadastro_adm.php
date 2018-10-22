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


</head>

<body>

<div id="paginaLogin"> <?php include("acesso.php");?></div>

<style>
p {
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	margin-left: 350px;
}

.espaco {
	margin-left: 90px;
}

.espaco2 {
	margin-left: 420px;
}

.espaco3 {
	margin-left: 87px;
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
  <p>Data: 
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
		
		echo "<div id='dia2'><input name=\"txtDataInteira\" type=\"text\" value=\"$dias\"/> </div>";
	
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
    <input type="submit" name="btnOk" id="btnOk" value="Excluir" class="espaco3"/>
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
		
         			
					
					if (!file_exists($Axml))
					{
								$Horario1 = "" ;
									$texto1 = "";
									$tel1 = "";
									$assunto1 = "";
					
					
									
									$Horario2 = "";
									$texto2 = "";
									$tel2 = "";
									$assunto2 = "";
		
									$Horario3 = "";
									$texto3 = "";
									$tel3 = "";	
									$assunto3 = "";
							
								
		
									$Horario4 =	"";
									$texto4 = "";
									$tel4 = "";
									$assunto4 = "";
					
								
								
									$Horario5 = "";
									$texto5 = "";
									$tel5 = "";
									$assunto5 = "";
						
						
					
							switch($valor)
							{
								case "9:00":
									$Horario1 = "" ;
									$texto1 = "";
									$tel1 = "";
									$assunto1 = "";
					
								break;
								
								case "10:00":
									
									$Horario2 = "";
									$texto2 = "";
									$tel2 = "";
									$assunto2 = "";
								break;
								
								case "11:00":
		
									$Horario3 = "";
									$texto3 = "";
									$tel3 ="";
									$assunto3 = "";
							
								break;
								
								case "12:00":
		
									$Horario4 =	"";
									$texto4 = "";
									$tel4 = "";
									$assunto4 = "";
					
								break;
								
								case "14:00":
								
									$Horario5 = "";
									$texto5 = "";
									$tel5 = "";
									$assunto5 = "";									
									
								break;
							}
							
					  	$VlSenhas = 1;
					 $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>"; //Cabeçalho principal para geração o arquivo	
					
						$xml .= "\n<banco>";
						$xml .= "\n\t<calendario>";
						$xml .= "\n\t\t<data>".$dias."</data>";
						$xml .= "\n\t\t<senha>".$VlSenhas."</senha>";
						$xml .= "\n\t\t<horario1>".$Horario1."</horario1>";
						$xml .= "\n\t\t<horario2>".$Horario2."</horario2>";	
						$xml .= "\n\t\t<horario3>".$Horario3."</horario3>";	
						$xml .= "\n\t\t<horario4>".$Horario4."</horario4>";	
						$xml .= "\n\t\t<horario5>".$Horario5."</horario5>";	
						$xml .= "\n\t\t<rua1>".$texto1."</rua1>";
						$xml .= "\n\t\t<rua2>".$texto2."</rua2>";
						$xml .= "\n\t\t<rua3>".$texto3."</rua3>";
						$xml .= "\n\t\t<rua4>".$texto4."</rua4>";
						$xml .= "\n\t\t<rua5>".$texto5."</rua5>";
						$xml .= "\n\t\t<tel1>".$tel1."</tel1>";
						$xml .= "\n\t\t<tel2>".$tel2."</tel2>";
						$xml .= "\n\t\t<tel3>".$tel3."</tel3>";
						$xml .= "\n\t\t<tel4>".$tel4."</tel4>";
						$xml .= "\n\t\t<tel5>".$tel5."</tel5>";
						$xml .= "\n\t\t<assunto1>".$assunto1."</assunto1>";
						$xml .= "\n\t\t<assunto2>".$assunto2."</assunto2>";
						$xml .= "\n\t\t<assunto3>".$assunto3."</assunto3>";
						$xml .= "\n\t\t<assunto4>".$assunto4."</assunto4>";
						$xml .= "\n\t\t<assunto5>".$assunto5."</assunto5>";
						$xml .= "\n\t</calendario>";
						$xml .= "\n</banco>";
						
					
						//Abre o arquivo e força a criação caso não exista, a opção w permite sobrescrer o conteudo
						$abrir = fopen($Axml,"w+");
						
						//Gravar o arquivo xml
						$gravar = fwrite($abrir,$xml);
						
						
						echo "<script>alert (\"Seu evento foi excluído com sucesso\")</script>";
						
						
					  
					}
					else
					{	
				
						
						$xml = simplexml_load_file($dia."_".$mes."_".$Ano.".xml");
						$valorI=-1;
						
						foreach($xml->calendario as $dados)
 		   			    {
							
							switch($valor)
							{
								case "9:00":
									$Horario1 = "" ;
									$Horario2 = $dados->horario2;
									$Horario3 = $dados->horario3;	
									$Horario4 =	$dados->horario4;
									$Horario5 = $dados->horario5;
									
									$texto1 = "";
									$texto2 = $dados->rua2;
									$texto3 = $dados->rua3;
									$texto4 = $dados->rua4;
									$texto5 = $dados->rua5;
									
									$tel1 = "";
									$tel2 = $dados->tel2;
									$tel3 = $dados->tel3;
									$tel4 = $dados->tel4;
									$tel5 = $dados->tel5;
									
									$assunto1 = "";
									$assunto2 = $dados->assunto2;
									$assunto3 = $dados->assunto3;
									$assunto4 = $dados->assunto4;
									$assunto5 = $dados->assunto5;
									
									
								break;
								
								case "10:00":
									$Horario1 = $dados->horario1;
									$Horario2 = "";
									$Horario3 = $dados->horario3;	
									$Horario4 =	$dados->horario4;
									$Horario5 = $dados->horario5;
									
									$texto1 = $dados->rua1;
									$texto2 = "";
									$texto3 = $dados->rua3;
									$texto4 = $dados->rua4;
									$texto5 = $dados->rua5;
									
									$tel1 = $dados->tel1;
									$tel2 = "";
									$tel3 = $dados->tel3;
									$tel4 = $dados->tel4;
									$tel5 = $dados->tel5;
									
									$assunto1 = $dados->assunto1;
									$assunto2 = "";
									$assunto3 = $dados->assunto3;
									$assunto4 = $dados->assunto4;
									$assunto5 = $dados->assunto5;
								break;
								
								case "11:00":
									$Horario1 = $dados->horario1;
									$Horario2 = $dados->horario2;
									$Horario3 = "";	
									$Horario4 =	$dados->horario4;
									$Horario5 = $dados->horario5;
									
									$texto1 = $dados->rua1;
									$texto2 = $dados->rua2;
									$texto3 = "";
									$texto4 = $dados->rua4;
									$texto5 = $dados->rua5;
									
									$tel1 = $dados->tel1;
									$tel2 = $dados->tel2;
									$tel3 = "";
									$tel4 = $dados->tel4;
									$tel5 = $dados->tel5;
									
									$assunto1 = $dados->assunto1;
									$assunto2 = $dados->assunto2;
									$assunto3 = "";
									$assunto4 = $dados->assunto4;
									$assunto5 = $dados->assunto5;
								break;
								
								case "12:00":
									$Horario1 = $dados->horario1;
									$Horario2 = $dados->horario2;
									$Horario3 = $dados->horario3;	
									$Horario4 =	"";
									$Horario5 = $dados->horario5;
									
									$texto1 = $dados->rua1;
									$texto2 = $dados->rua2;
									$texto3 = $dados->rua3;
									$texto4 = "";
									$texto5 = $dados->rua5;
									
									$tel1 = $dados->tel1;
									$tel2 = $dados->tel2;
									$tel3 = $dados->tel3;
									$tel4 = "";
									$tel5 = $dados->tel5;
									
									$assunto1 = $dados->assunto1;
									$assunto2 = $dados->assunto2;
									$assunto3 = $dados->assunto3;
									$assunto4 = "";
									$assunto5 = $dados->assunto5;
								break;
								
								case "14:00":
									$Horario1 = $dados->horario1;
									$Horario2 = $dados->horario2;
									$Horario3 = $dados->horario3;	
									$Horario4 =	$dados->horario4;
									$Horario5 = "";
									
									$texto1 = $dados->rua1;
									$texto2 = $dados->rua2;
									$texto3 = $dados->rua3;
									$texto4 = $dados->rua4;
									$texto5 = "";
									
									$tel1 = $dados->tel1;
									$tel2 = $dados->tel2;
									$tel3 = $dados->tel3;
									$tel4 = $dados->tel4;
									$tel5 = "";
									
									
									$assunto1 = $dados->assunto1;
									$assunto2 = $dados->assunto2;
									$assunto3 = $dados->assunto3;
									$assunto4 = $dados->assunto4;
									$assunto5 = "";
									
									
									
								break;
							}
							
					  		$VlSenhas = $dados->senha;
							$VlSenhas = $VlSenhas - 1;
						}
					
					  $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>"; //Cabeçalho principal para geração o arquivo	
					
						$xml .= "\n<banco>";
						$xml .= "\n\t<calendario>";
						$xml .= "\n\t\t<data>".$dias."</data>";
						$xml .= "\n\t\t<senha>".$VlSenhas."</senha>";
						$xml .= "\n\t\t<horario1>".$Horario1."</horario1>";
						$xml .= "\n\t\t<horario2>".$Horario2."</horario2>";	
						$xml .= "\n\t\t<horario3>".$Horario3."</horario3>";	
						$xml .= "\n\t\t<horario4>".$Horario4."</horario4>";	
						$xml .= "\n\t\t<horario5>".$Horario5."</horario5>";	
						$xml .= "\n\t\t<rua1>".$texto1."</rua1>";
						$xml .= "\n\t\t<rua2>".$texto2."</rua2>";
						$xml .= "\n\t\t<rua3>".$texto3."</rua3>";
						$xml .= "\n\t\t<rua4>".$texto4."</rua4>";
						$xml .= "\n\t\t<rua5>".$texto5."</rua5>";
						$xml .= "\n\t\t<tel1>".$tel1."</tel1>";
						$xml .= "\n\t\t<tel2>".$tel2."</tel2>";
						$xml .= "\n\t\t<tel3>".$tel3."</tel3>";
						$xml .= "\n\t\t<tel4>".$tel4."</tel4>";
						$xml .= "\n\t\t<tel5>".$tel5."</tel5>";
						$xml .= "\n\t\t<assunto1>".$assunto1."</assunto1>";
						$xml .= "\n\t\t<assunto2>".$assunto2."</assunto2>";
						$xml .= "\n\t\t<assunto3>".$assunto3."</assunto3>";
						$xml .= "\n\t\t<assunto4>".$assunto4."</assunto4>";
						$xml .= "\n\t\t<assunto5>".$assunto5."</assunto5>";
						$xml .= "\n\t</calendario>";
						$xml .= "\n</banco>";
						
					
						//Abre o arquivo e força a criação caso não exista, a opção w permite sobrescrer o conteudo
						$abrir = fopen($Axml,"w");
						
						//Gravar o arquivo xml
						$gravar = fwrite($abrir,$xml);
						
						//Apos ter gerado o XML redirecionar o arquivo index 
						//header ("location: index.php");
						
						echo "<script>alert (\"Seu evento foi excluído com sucesso\")</script>";
					}
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
