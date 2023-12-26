$(document).ready();
	 
$(function(){
	
	$('#bs-prod').on('change',function(){ //sisadal
		var dato = $('#bs-prod').val();
		var url = '../php/aa_busca_Claa.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-registros').html(datos);
			//return false;
		}
	});
	return false;
	});
				$('#nauto').autocomplete({
                   source : 'ajaxactivo.php?type=7',
                   select : function(event, ui){
					   			$('#nfa').val(ui.item.nfacturax);
								$('#nitt').val(ui.item.nitx);
								$('#fe').val(ui.item.fechax);
								$('#impo').val(ui.item.importex);
								//$('#lla').val(ui.item.llavex);
								$('#codi').val(ui.item.codigox);

//								
//								$( "#cant" ).focus();
                   }
                });
	
	
	
});

function agregaRegistroSin(){ // sisadal
	var url = '../php/aa_agrega_Sin.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#pro').val('Registro'); ////// solo debemos añadir este codigo para mantener REGISTRO
			$('#agrega-registros').html(registro);
			
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}
		}
	});
	return false;
}


function pagination(partida){ /// sidsadal
	var url = '../php/aa_paginarClaa.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'partida='+partida,
		success:function(data){
			var array = eval(data);
			$('#agrega-registros').html(array[0]);
			$('#pagination').html(array[1]);
		}
	});
	return false;
}