<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PDV - Admistrativo</title>
<link rel="stylesheet" type="text/css" href="estilo_adm.css" />

</head>

<body>

<style>
p {
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	margin-left: 10px;
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
    <input type="submit" name="btnchecar" id="btnchecar" value="Enviar" />
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
		echo "<input name=\"txtDataInteira\" type=\"text\" value=\"$dias\"/>";
	
	}
	 ?>
  </p>
  <p>Horários:
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
						
						
					echo '<option value="9:00">9:00</option> '	;
                    echo '<option value="10:00">10:00</option> ';
					echo '<option value="11:00">11:00</option> ';
					echo '<option value="12:00">12:00</option> ';
					echo '<option value="14:00">14:00</option> ';
					
					  
			}
			else
			{	
				
						$xml = simplexml_load_file($dia."_".$mes."_".$Ano.".xml");
						
						
						foreach($xml->calendario as $dados)
 		   			    {
							if(	$dados->horario1 == '')
							{
								echo '<option value="9:00">9:00</option> '	;
							}
							
							if(	$dados->horario2 == '')
							{
								echo '<option value="10:00">10:00</option> '	;
							}
							
							if(	$dados->horario3 == '')
							{
								echo '<option value="11:00">11:00</option> '	;
							}
							
							if(	$dados->horario4 == '')
							{
								echo '<option value="12:00">12:00</option> '	;
							}
							
							if(	$dados->horario5 == '')
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
  <p>Assunto: 
    <label>
      <input type="text" name="txtAssunto" id="txtAssunto" />
    </label>
  </p>
  <p>Tel: 
    <label>
      <input type="text" name="txtTel" id="txtTel" />
    </label>
    <br />
  </p>
  <p>CEP :
    <input name="txtCEP" type="text" />
</p>
  <p>
    Rua :
    <input name="txtRua" type="text" />
  </p>
  <p>
    Numero:
    <input name="txtNum" type="text" />
  </p>
  <p>
    Bairro: 
    <input name="txtBairro" type="text" />
  </p>
  <p>
    Cidade: 
    <input name="txtCidade" type="text" />
  </p>
  <p>
    Estado: 
    <input name="txtEstado" type="text" />
  </p>
  <p>
    <input type="submit" name="btnOk" id="btnOk" value="Cadastrar" />
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>

<?php
$CEP= $_POST["txtCEP"];
$Rua= $_POST["txtRua"];
$Num= $_POST["txtNum"];
$Bairro= $_POST["txtBairro"];
$Cidade= $_POST["txtCidade"];
$Estado= $_POST["txtEstado"];
$Telefone = $_POST["txtTel"];
$Assunto = $_POST["txtAssunto"];
$valor= $_POST["cmbHorarios"];

$texto = $Rua.",".$Num.",".$Bairro.",".$Cidade.",".$Estado.",".$CEP;
error_reporting(0);

if($valorLotado == 5)
{
	echo "O dia selecionado está lotado";
}
if( (strlen($_POST["txtAssunto"]) > 0) &&(strlen($_POST["cmbHorarios"]) > 0) && (strlen($_POST["txtTel"]) > 0) &&(strlen($_POST["txtCEP"]) > 0) && (strlen($_POST["txtRua"]) > 0) && (strlen($_POST["txtNum"]) > 0) && (strlen($_POST["txtBairro"]) > 0) && (strlen($_POST["txtCidade"]) > 0) && (strlen($_POST["txtEstado"]) > 0))
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
									$assunto3 =  "";
							
								
		
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
									$Horario1 = "9:00" ;
									$texto1 = $texto;
									$tel1 = $Telefone;
									$assunto1 = $Assunto;
					
								break;
								
								case "10:00":
									
									$Horario2 = "10:00";
									$texto2 = $texto;
									$tel2 = $Telefone;
									$assunto2 = $Assunto;
								break;
								
								case "11:00":
		
									$Horario3 = "11:00";
									$texto3 = $texto;	
									$tel3 = $Telefone;
									$assunto3 = $Assunto;
							
								break;
								
								case "12:00":
		
									$Horario4 =	"12:00";
									$texto4 = $texto;
									$tel4 = $Telefone;
									$assunto4 = $Assunto;
					
								break;
								
								case "14:00":
								
									$Horario5 = "14:00";
									$texto5 = $texto;
									$tel5 = $Telefone;
									$assunto5 = $Assunto;
									
									
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
						
						
						echo "<script>alert (\"Seu evento foi cadastrado com sucesso\")</script>";
						
						
					  
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
									$Horario1 = "9:00" ;
									$Horario2 = $dados->horario2;
									$Horario3 = $dados->horario3;	
									$Horario4 =	$dados->horario4;
									$Horario5 = $dados->horario5;
									
									$texto1 = $texto;
									$texto2 = $dados->rua2;
									$texto3 = $dados->rua3;
									$texto4 = $dados->rua4;
									$texto5 = $dados->rua5;
									
									$tel1 = $Telefone;
									$tel2 = $dados->tel2;
									$tel3 = $dados->tel3;
									$tel4 = $dados->tel4;
									$tel5 = $dados->tel5;
									
									$assunto1 = $Assunto;
									$assunto2 = $dados->assunto2;
									$assunto3 = $dados->assunto3;
									$assunto4 = $dados->assunto4;
									$assunto5 = $dados->assunto5;
									
									
								break;
								
								case "10:00":
									$Horario1 = $dados->horario1;
									$Horario2 = "10:00";
									$Horario3 = $dados->horario3;	
									$Horario4 =	$dados->horario4;
									$Horario5 = $dados->horario5;
									
									$texto1 = $dados->rua1;
									$texto2 = $texto;
									$texto3 = $dados->rua3;
									$texto4 = $dados->rua4;
									$texto5 = $dados->rua5;
									
									$tel1 = $dados->tel1;
									$tel2 = $Telefone;
									$tel3 = $dados->tel3;
									$tel4 = $dados->tel4;
									$tel5 = $dados->tel5;
									
									$assunto1 = $dados->assunto1;
									$assunto2 = $Assunto;
									$assunto3 = $dados->assunto3;
									$assunto4 = $dados->assunto4;
									$assunto5 = $dados->assunto5;
								break;
								
								case "11:00":
									$Horario1 = $dados->horario1;
									$Horario2 = $dados->horario2;
									$Horario3 = "11:00";	
									$Horario4 =	$dados->horario4;
									$Horario5 = $dados->horario5;
									
									$texto1 = $dados->rua1;
									$texto2 = $dados->rua2;
									$texto3 = $texto;
									$texto4 = $dados->rua4;
									$texto5 = $dados->rua5;
									
									$tel1 = $dados->tel1;
									$tel2 = $dados->tel2;
									$tel3 = $Telefone;
									$tel4 = $dados->tel4;
									$tel5 = $dados->tel5;
									
									$assunto1 = $dados->assunto1;
									$assunto2 = $dados->assunto2;
									$assunto3 = $Assunto;
									$assunto4 = $dados->assunto4;
									$assunto5 = $dados->assunto5;
								break;
								
								case "12:00":
									$Horario1 = $dados->horario1;
									$Horario2 = $dados->horario2;
									$Horario3 = $dados->horario3;	
									$Horario4 =	"12:00";
									$Horario5 = $dados->horario5;
									
									$texto1 = $dados->rua1;
									$texto2 = $dados->rua2;
									$texto3 = $dados->rua3;
									$texto4 = $texto;
									$texto5 = $dados->rua5;
									
									$tel1 = $dados->tel1;
									$tel2 = $dados->tel2;
									$tel3 = $dados->tel3;
									$tel4 = $Telefone;
									$tel5 = $dados->tel5;
									
									$assunto1 = $dados->assunto1;
									$assunto2 = $dados->assunto2;
									$assunto3 = $dados->assunto3;
									$assunto4 = $Assunto;
									$assunto5 = $dados->assunto5;
								break;
								
								case "14:00":
									$Horario1 = $dados->horario1;
									$Horario2 = $dados->horario2;
									$Horario3 = $dados->horario3;	
									$Horario4 =	$dados->horario4;
									$Horario5 = "14:00";
									
									$texto1 = $dados->rua1;
									$texto2 = $dados->rua2;
									$texto3 = $dados->rua3;
									$texto4 = $dados->rua4;
									$texto5 = $texto;
									
									$tel1 = $dados->tel1;
									$tel2 = $dados->tel2;
									$tel3 = $dados->tel3;
									$tel4 = $dados->tel4;
									$tel5 = $Telefone;
									
									$assunto1 = $dados->assunto1;
									$assunto2 = $dados->assunto2;
									$assunto3 = $dados->assunto3;
									$assunto4 = $dados->assunto4;
									$assunto5 = $Assunto;
									
									
								break;
							}
							
					  		$VlSenhas = $dados->senha;
							$VlSenhas = $VlSenhas + 1;
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
						
						echo "<script>alert (\"Seu evento foi cadastrado com sucesso\")</script>";
					}
}

?>
                        
                      
                        
                        
                        </div>
				</div>
		</div>
        
        <div id="menu">
        <div id="bt1"> <a href="calendar_adm.php" class="especial"> Calendário </a> </div>
        <div id="bt2"> <a href="cadastrar_adm.php"class="especial"> Cadastrar </a> </div>
        <div id="bt3"> <a href="#" class="moreespecial"> Consultar End. </a> </div>
        <div id="bt4"> <a href="#" class="evenmoreespecial"> Excluir Cadastro </a> </div>
        <div id="bt5"> <a href="#" class="especial"> Pendentes </a> </div>        
        
        </div>      
        
        
</div>



</body>
</html>
