<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Documento sem título</title>
</head>

<body>


<style>

p {
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
}

</style>



<form action="" method="post">
  <p>Nome: 
    <label>
      <input type="text" name="txtNome" id="txtNome" />
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
error_reporting(0);
date_default_timezone_set("Brazil/East");
$CEP= $_POST["txtCEP"];
$Rua= $_POST["txtRua"];
$Num= $_POST["txtNum"];
$Bairro= $_POST["txtBairro"];
$Cidade= $_POST["txtCidade"];
$Estado= $_POST["txtEstado"];
$Telefone = $_POST["txtTel"];
$Nome = $_POST["txtNome"];

$dia = date("d");
$mes = date("m");
$ano = date("Y");
$data = $dia."/".$mes."/".$ano;


$texto = $Rua.",,".$Num.",,".$Bairro.",,".$Cidade.",,".$Estado.",,".$CEP.",,".$Telefone.",,".$data.",,".$Nome;
error_reporting(0);


if( (strlen($_POST["txtNome"]) > 0) &&(strlen($_POST["txtTel"]) > 0) &&(strlen($_POST["txtCEP"]) > 0) && (strlen($_POST["txtRua"]) > 0) && (strlen($_POST["txtNum"]) > 0) && (strlen($_POST["txtBairro"]) > 0) && (strlen($_POST["txtCidade"]) > 0) && (strlen($_POST["txtEstado"]) > 0))
{
		
	


		$Axml = "pendentes.xml";
		
         			
					
					if (!file_exists($Axml))
					{
								
									$texto1 = "/txt/".$texto;
					
					
					
							
							
					  	$VlSenhas = 0;
					 $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>"; //Cabeçalho principal para geração o arquivo	
					
						$xml .= "\n<banco>";
						$xml .= "\n\t<calendario>";
						$xml .= "\n\t\t<senha>".$VlSenhas."</senha>";
						$xml .= "\n\t\t<pendentes>".$texto1."</pendentes>";
						$xml .= "\n\t</calendario>";
						$xml .= "\n</banco>";
						
					
						//Abre o arquivo e força a criação caso não exista, a opção w permite sobrescrer o conteudo
						$abrir = fopen($Axml,"w+");
						
						//Gravar o arquivo xml
						$gravar = fwrite($abrir,$xml);
						
						
						echo "<script>alert (\"Seu evento foi enviado com sucesso\")</script>";
						
						
					  
					}
					else
					{	
				
						
						$xml = simplexml_load_file("pendentes.xml");
						$valorI=-1;
						
						foreach($xml->calendario as $dados)
 		   			    {
							
							$texto1 = '';		
							$texto2 = $dados->pendentes;
							$texto1 = $texto2;
							$texto1 = $texto1."/txt/".$texto;
					  		$VlSenhas = $dados->senha;
							$VlSenhas = $VlSenhas + 1;
						}
						
					
					  $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>"; //Cabeçalho principal para geração o arquivo	
					
						$xml .= "\n<banco>";
						$xml .= "\n\t<calendario>";
						$xml .= "\n\t\t<senha>".$VlSenhas."</senha>";
						$xml .= "\n\t\t<pendentes>".$texto1."</pendentes>";
						$xml .= "\n\t</calendario>";
						$xml .= "\n</banco>";
						
					
						//Abre o arquivo e força a criação caso não exista, a opção w permite sobrescrer o conteudo
						$abrir = fopen($Axml,"w");
						
						//Gravar o arquivo xml
						$gravar = fwrite($abrir,$xml);
						
						//Apos ter gerado o XML redirecionar o arquivo index 
						//header ("location: index.php");
						
						echo "<script>alert (\"Seu evento foi enviado com sucesso\")</script>";
					}
}

?>
</body>
</html>