<?php 
session_start();
if ($_SESSION['login'] == NULL)
{
	header("location: formulario.php");
}
?>
