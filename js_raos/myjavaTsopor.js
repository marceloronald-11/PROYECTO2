$(document).ready(pagination(1));
$(function(){
	$('#nuevo-labo').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#sucu-modal').modal({
			show:true,
			backdrop:'static'
		});
	});
	
	$('#bs-prod').on('change',function(){
		var dato = $('#bs-prod').val();
		var url = '../php/aa_busca_uu.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
});

function agregaRegistroSopo(){
	var url = '../php/crm_agrega_Aprobado.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			location.reload();
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Modificacion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			location.reload();
			return false;
			}
		}
	});
	return false;
}

function EliminaSopo(id){
	var url = '../php/crm_elimina_sopo.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Registro ?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}



function editarSopo(id){
	$('#formulario')[0].reset();
	var url = '../php/crm_editaSopo.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Editar');
				$('#idper').val(id);
				$('#nomar').val(datos[0]);
				
				$('#sucu-modal').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../php/productos.php?desde='+desde+'&hasta='+hasta);
}

function mostrarfoto(id){ //sisadal
	
	var url = 'jca_verfoto.php';
	var pregunta =true;
	if(pregunta==true){
	$('#modalfoto').modal({
					show:true,
					backdrop:'static'
				});
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#espacio-foto').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}


function pagination(partida){
	var url = '../php/crm_paginar_soporte1.php';
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