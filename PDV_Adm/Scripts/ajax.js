function pagina (url){
	var mreq;
	if(window.XMLHttpRequest){
		req = new XMLHttpRequest();
	}else if(window.ActiveXObject){ 
		req = new ActiveXObject("Microsoft.XMLHTTP");
	}else{ 
		alert("Seu navegador não tem suporte a AJAX.");
	}

	req.onreadystatechange = function() {
		if(req.readyState == 1){
			document.getElementById('refresh').innerHTML = 'Carregando';			
		}else if(req.readyState == 4){ 
			document.getElementById('refresh').innerHTML = req.responseText;
		}
	};
	req.open("GET",url,true);
	req.send(null);
}

