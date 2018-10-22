


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
<link href="Calendario3.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
</head>

<body>
<form name="formMes" action="" method="post">





<?php
error_reporting(0);
date_default_timezone_set("Brazil/East");
$numeroMes = $_GET['x'];
//$numeroAno = $_GET['y'];

?>
<?php
$numeros3 = $numeroMes;
$numeroAno = date("Y");
//$numeroAno = $_GET['y'];

if ($numeroMes > 12)
{
	$valorAno = 0;
	
	do
	{
		
		$valorAno++;
		$numeros3 = $numeros3 - 12;
	}
	while($numeros3 > 12);
	$numeroAno = $numeroAno + $valorAno;

}
else
{
	if ( $numeroMes < 1 )
	{
		$valorAno = 0;
	
		do
		{
			
			$valorAno++;
			$numeros3 = $numeros3 + 12;
		}
		while($numeros3 < 1);
		$numeroAno = $numeroAno - $valorAno;
	}
}
$numAno = $numeroAno;
$MesAtual ="";

switch($numeros3)
{
	case 1: $MesAtual = "Janeiro";
	break;

case 2: $MesAtual = "Fevereiro";
	break;

case 3: $MesAtual = "Março";
	break;

case 4: $MesAtual = "Abril";
	break;

case 5: $MesAtual = "Maio";
	break;

case 6: $MesAtual = "Junho";
	break;

case 7: $MesAtual = "Julho";
break;

case 8: $MesAtual = "Agosto";
	break;	

case 9: $MesAtual = "Setembro";
	break;

case 10: $MesAtual = "Outubro";
	break;

case 11: $MesAtual = "Novembro";
	break;

case 12: $MesAtual = "Dezembro";
	break;
}


?>

<div> <p class="especial"> <?php echo $MesAtual. ' de '.$numAno; ?> </p> </div>


<?php
error_reporting(0);
		// zerando as divs e colocando css nelas
		$cor = '';
		
		$i = 0;
		$cor2 = '';
		do
		{
			$i++;
			$num[$i] = '';
			$cor2 = '#Principal #d'.$i.'{
				width: 35px;
				height: 20px;
				border:2px #000 solid;
				float:left;	
				text-align:center;
				margin:10px;
                                border-radius: 5px;
				top:100px;} '.$cor2;
		}
		while( $i <= 42 );
		
		$cor = '<style type="text/css">' . $cor2 . '</style>';
		
		//zerando a array cores  dias
		$valorDia='';
		$i = 0;
		do
		{
			
			$i++;
			$valorDia = '#Principal #d'.$i.'{background-color:white;} '.$valorDia ;
		}
		while($i <= 42);
		$corZerado = '<style type="text/css"> '.$valorDia.' </style> ';
		echo $corZerado;
		
		
		
		// colocando valor no array
		$valorDia = '';
		$mes = $numeros3;
		$ano = $numAno;
		$dia = 0;
		$diaFinal = date("t", mktime(0,0,0,$mes,1,$ano));
		$i = date("w", mktime(0,0,0,$mes,1,$ano));		
		do
		{
			$valorIni = '';
			$dia++;
			$i++;
			
			$data = $dia.'/'.$mes.'/'.$ano;
			$valorIni = '';
		
			
			$xml = simplexml_load_file($dia."_".$mes."_".$ano.".xml");
		
			
			foreach($xml->calendario as $dados)
 		    {
	  
	 				 if($dados->data == $data)
					  {
							  $valorIni = $dados->senha ;
		  
					  }
  

 			 }
			 
			 
			
			if($valorIni == '')
			{
				$valorIni = 0;
			}
			
			if($valorIni > 0)
			{
				if($valorIni < 5)
				{
					$valorDia = '#Principal #d'.$i.'{ background-color:#cdac10 ;}'.$valorDia;
				}
				else
				{
					$valorDia = '#Principal #d'.$i.'{ background-color:#aa3131 ;}'.$valorDia;
				}
			}
			else
			{
				$valorDia = '#Principal #d'.$i.'{ background-color:#c2cdb5 ;}'.$valorDia;
			}
			
		}
		while($dia <= $diaFinal-1);
		
		$corZerado = '<style type="text/css"> '.$valorDia.'</style>';
		echo $corZerado;
	
		
		// colocando dia nas divs
		$mes = $numeros3;
		$ano = $numAno;
		$dia = 0;
		$diaFinal = date("t", mktime(0,0,0,$mes,1,$ano));
		$i = date("w", mktime(0,0,0,$mes,1,$ano));		
		do
		{
			$dia++;
			$i++;
			$num[$i] = $dia; 
		}
		while($dia <= $diaFinal-1);
		
		
	
		
		
?>
<div ></div>
</form>
<?php echo $cor; ?>

<div id="mes"></div>
<div id="Principal">

<div id="linha1"><p>Dom</p></div>

<div id="linha1"><p>Seg</p></div>

<div id="linha1"><p>Ter</p></div>

<div id="linha1"><p>Qua</p></div>

<div id="linha1"><p>Qui</p></div>

<div id="linha1"><p>Sex</p></div>

<div id="linha1"><p>Sab</p></div>

<div id="d1" >  <?php echo $num[1]; ?> </div>
<div id="d2"><?php echo $num[2]; ?></div>
<div id="d3"> <?php echo $num[3]; ?>  </div>
<div id="d4"><?php echo $num[4]; ?></div>
<div id="d5"><?php echo $num[5]; ?></div>
<div id="d6"><?php echo $num[6]; ?></div>
<div id="d7"><?php echo $num[7]; ?></div>

<div id="d8"> <?php echo $num[8]; ?>  </div>
<div id="d9"><?php echo $num[9]; ?></div>
<div id="d10"><?php echo $num[10]; ?></div>
<div id="d11"><?php echo $num[11]; ?></div>
<div id="d12"><?php echo $num[12]; ?></div>
<div id="d13"><?php echo $num[13]; ?></div>
<div id="d14"><?php echo $num[14]; ?></div>

<div id="d15"><?php echo $num[15]; ?></div>
<div id="d16"><?php echo $num[16]; ?></div>
<div id="d17"><?php echo $num[17]; ?></div>
<div id="d18"><?php echo $num[18]; ?></div>
<div id="d19"><?php echo $num[19]; ?></div>
<div id="d20"><?php echo $num[20]; ?></div>
<div id="d21"><?php echo $num[21]; ?></div>

<div id="d22"><?php echo $num[22]; ?></div>
<div id="d23"><?php echo $num[23]; ?></div>
<div id="d24"><?php echo $num[24]; ?></div>
<div id="d25"><?php echo $num[25]; ?></div>
<div id="d26"><?php echo $num[26]; ?></div>
<div id="d27"><?php echo $num[27]; ?></div>
<div id="d28"><?php echo $num[28]; ?></div>

<div id="d29"><?php echo $num[29]; ?></div>
<div id="d30"><?php echo $num[30]; ?></div>
<div id="d31"><?php echo $num[31]; ?></div>
<div id="d32"><?php echo $num[32]; ?></div>
<div id="d33"><?php echo $num[33]; ?></div>
<div id="d34"><?php echo $num[34]; ?></div>
<div id="d35"><?php echo $num[35]; ?></div>

<div id="d36"><?php echo $num[36]; ?></div>
<div id="d37"><?php echo $num[37]; ?></div>
<div id="d38"><?php echo $num[38]; ?></div>
<div id="d39"><?php echo $num[39]; ?></div>
<div id="d40"><?php echo $num[40]; ?></div>
<div id="d41"><?php echo $num[41]; ?></div>
<div id="d42"><?php echo $num[42]; ?></div>



</div>


</body>
</html>