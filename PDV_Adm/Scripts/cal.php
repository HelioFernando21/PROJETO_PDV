<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>

<script type="text/javascript" src="jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="calendario.js"></script>
 
<form action="/" method="post">
<label for="calendario">Data:</label>
<input id="calendario" type="text" name="calendario" />


</form>

<script type="text/javascript">
$(function(){
$("#calendario").datepicker({
dateFormat: 'dd/mm/yy',
dayNames: [
'Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'
],
dayNamesMin: [
'D','S','T','Q','Q','S','S','D'
],
dayNamesShort: [
'Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'
],
monthNames: [
'Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro',
'Outubro','Novembro','Dezembro'
],
monthNamesShort: [
'Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set',
'Out','Nov','Dez'
],
nextText: 'Próximo',
prevText: 'Anterior'
 
});
});
</script>

</body>
</html>