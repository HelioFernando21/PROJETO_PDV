<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
<link href="Calendario2.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<form name="formMes" action="" method="post">
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
				width: 45px;
				height: 30px;
				border:2px #000 solid;
				float:left;	
				text-align:center;
				margin:10px;
				top:100px;} '.$cor2;
		}
		while( $i <= 35 );
		
		$cor = '<style type="text/css">' . $cor2 . '</style>';
		
		//zerando a array cores  dias
		$valorDia='';
		$i = 0;
		do
		{
			
			$i++;
			$valorDia = '#Principal #d'.$i.'{background-color:white;} '.$valorDia ;
		}
		while($i <= 35);
		$corZerado = '<style type="text/css"> '.$valorDia.' </style> ';
		echo $corZerado;
		
		
		
		// colocando valor no array
		$valorDia = '';
		$mes = date("m");
		$ano = date("Y");
		$dia = 0;
		$diaFinal = date("t", mktime(0,0,0,$mes,1,$ano));
		$i = date("w", mktime(0,0,0,$mes,1,$ano));		
		do
		{
			$valorIni = '';
			$dia++;
			$i++;
			$ini = parse_ini_file('teste.ini');
			$data = $dia.'/'.$mes.'/'.$ano;
			$valorIni = $ini[$data];
			
			if($valorIni == '')
			{
				$valorIni = 0;
			}
			
			if($valorIni > 0)
			{
				if($valorIni < 5)
				{
					$valorDia = '#Principal #d'.$i.'{ background-color:yellow ;}'.$valorDia;
				}
				else
				{
					$valorDia = '#Principal #d'.$i.'{ background-color:red ;}'.$valorDia;
				}
			}
			else
			{
				$valorDia = '#Principal #d'.$i.'{ background-color:green ;}'.$valorDia;
			}
			
		}
		while($dia <= $diaFinal-1);
		
		$corZerado = '<style type="text/css"> '.$valorDia.'</style>';
		echo $corZerado;
	
		
		// colocando dia nas divs
		$mes = date("m");
		$ano = date("Y");
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

<a id="anterior" href="#" onclick="oi(1)">ant</a>
<a id="anterior" href="#" onclick="oi(0)">atual</a>
  <script type="text/javascript">
		function oi(v)
		{
			if(v == 0)
			{
				document.formMes.txtMes.value = "5";
			}
			else
			{
				var valor = parseInt( document.formMes.txtMes.value);
				document.formMes.txtMes.value = valor-1;
			}
		}
	</script>
    
   

<div >Mes :</div>
 <input name="txtMes" type="text" />	
</form>
<?php echo $cor; ?>

<div id="mes"></div>
<div id="Principal">

<div id="linha1">Dom</div>

<div id="linha1">Seg</div>

<div id="linha1">Ter</div>

<div id="linha1">Qua</div>

<div id="linha1">Qui</div>

<div id="linha1">Sex</div>

<div id="linha1">Sab</div>

<div id="d1" > <a href="#"> <?php echo $num[1]; ?> </a> </div>
<div id="d2"><?php echo $num[2]; ?></div>
<div id="d3"> <a href="#"> <?php echo $num[3]; ?> </a> </div>
<div id="d4"><?php echo $num[4]; ?></div>
<div id="d5"><?php echo $num[5]; ?></div>
<div id="d6"><?php echo $num[6]; ?></div>
<div id="d7"><?php echo $num[7]; ?></div>

<div id="d8"><?php echo $num[8]; ?></div>
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

<div id="proximo">pro</div>

</div>
</body>
</html>