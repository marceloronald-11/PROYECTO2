//letras
function solocodigo(e){
	var key= e.keyCode || e.which;
	var tecla= String.fromCharCode(key).toLowerCase();
	var numeros="1234567890-";
	var especiales=[46];
	var tecla_especial=false;
		for (var i in especiales){
			if(key==especiales[i]){
				tecla_especial=true;
				break;		
			}
		
		}	
	
	if(numeros.indexOf(tecla)==-1 && !tecla_especial)
	return false
}

function sololetras(e){
	var key= e.keyCode || e.which;
	var tecla= String.fromCharCode(key).toLowerCase();
	var letras="áéíóúabcdefghijklmnñopqrstuvwxyz";
	var especiales=[8,37,39,46];
	var tecla_especial=false;
		for (var i in especiales){
			if(key==especiales[i]){
				tecla_especial=false;
				break;		
			}
		
		}	
	
	if(letras.indexOf(tecla)==-1 && !tecla_especial)
	return false
}

/// numeros
function solonumeros(e){
	var key= e.keyCode || e.which;
	var tecla= String.fromCharCode(key).toLowerCase();
	var numeros="1234567890";
	var especiales=[46];
	var tecla_especial=false;
		for (var i in especiales){
			if(key==especiales[i]){
				tecla_especial=true;
				break;		
			}
		
		}	
	
	if(numeros.indexOf(tecla)==-1 && !tecla_especial)
	return false
}

$(document).ready(function(e) {
    	function validaremail(email){
			var emailReg=/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
			return emailReg.test(email);
		}
		
		$("#verificar").click (function(){
				if($("#email").val()==''){
					alert("ingrese email");
				}else if(validaremail){}
			
		})
});