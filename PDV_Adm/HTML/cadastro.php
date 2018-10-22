
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
<link rel="stylesheet" type="text/css" href="css.css" />
<link rel="stylesheet" media="all" type="text/css" href="screen.css" />

		<link rel="stylesheet" media="all" type="text/css" href="examples.css" />

<script type="text/javascript" src="jquery.corner.js"></script>

		<script type="text/javascript" src="jquery-impromptu.2.0.js"></script>

		<script type="text/javascript" src="common.js"></script>
        
        
</head>

<body>
<form  method="post">
Login: <input type="text" name="login" /><br />
Senha: <input type="password" name="senha" /><br />
Confirmar a senha: <input type="password" name="senha2" /><br />
<input type="submit" value="Cadatrar"/>
</form>
</body>
</html>
<?php
error_reporting(0);

	$login = $_POST["login"];
	$senha = $_POST["senha"];
	$senha2 = $_POST["senha2"];
 if(strlen($login)==0)
 {
	 
	 echo "<script>alert (\"Digite seu login\")</script>";
 }
 else 
 {
 	if (( strlen($senha)<8 ) || ( strlen($senha2)<8 )  )
 	{
		echo "<script>alert (\"Sua senha deve conter no mínimo 8 caracteres\")</script>";
	
 	}
 	else
 	{
  
  
 		 if ($senha == $senha2)
 		 {
			
					$valor = '';
	
					$xml = simplexml_load_file("dados.xml");
		
					//Percorer o array de informações
					foreach($xml->usuario as $dados)
					{
						
						if($dados->login == $login)
						{
							$valor = $login;
							echo "<script>alert ($login)</script>";
						}
					
				
					}
			
			if(strlen($valor) > 0 )
			{
				echo "<script>alert (\"login existente\")</script>";
			
			}
			else
			{

					//nome do arquivo a ser gerado
					$Axml = "dados.xml";

					if (!file_exists($Axml))
					{
						//A Variavel XML permite ao usuário definir os elementos a serem colocados no XML
						$xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>"; //Cabeçalho principal para geração o arquivo
						$xml .= "\n<banco>";
						$xml .= "\n\t<usuario>";
						$xml .= "\n\t\t<login>$login</login>";
						$xml .= "\n\t\t<senha>$senha</senha>";
						$xml .= "\n\t</usuario>";
						$xml .= "\n</banco>";
	
						//Abre o arquivo e força a criação caso não exista, a opção w permite sobrescrer o conteudo
						$abrir = fopen($Axml,"w+");
						
						//Gravar o arquivo xml
						$gravar = fwrite($abrir,$xml);
						
						//Apos ter gerado o XML redirecionar o arquivo index 
						header ("location: index.php");
					}
					else
					{	
						//Função para carregar o arquivo XML
						$xml = simplexml_load_file("dados.xml");
					
						//Localiza o nó dados apartir dele permite gravar os dados nos subnós
						$filho = $xml->addChild('usuario','');
						$filho->addChild('login',$login);
						$filho->addChild('senha',$senha);
						
						// função para adiciona dentro do arquivo dados.xml a informação gerada.
						file_put_contents ("dados.xml", $xml->asXML());
						
						//Apos ter gerado o XML redirecionar o arquivo index 
						header ("location: index.php");
					}
					
					
				echo "<script>alert (\"Login cadastrado com sucesso\")</script>";
				header("location: formulario.php");
				
			}

	
			

  		}
  		else
  		{
			 echo "<script>alert (\"senhas icompatíveis\")</script>";
  		}
  
 	}
 }

?>