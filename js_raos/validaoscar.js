//letras
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



function soloCodigo(e){
	var key= e.keyCode || e.which;
	var tecla= String.fromCharCode(key).toLowerCase();
	var letras="áéíóúabcdefghijklmnñopqrstuvwxyz-";
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

$(document).ready(function() {
    	function validaremail(email){
			var emailReg=/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
			return emailReg.test(email);
		}
		
		$("#verificar").click (function(){
				if($("#email").val()==''){
					alert("ingrese email");
				}else if(validaremail($("#email").val()) ){
					alert("email valido");
				}else{
					alert("email no es valido");
				}
			
		})
});