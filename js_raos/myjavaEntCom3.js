$(document).ready(pagination(1));
$(function(){
	$('#nuevo-labo').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#labo-modal').modal({
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

	$('#yaa').on('click',function(){
		var idd = $('#idaluu').val();
		var caa = $('#cantsoo').val();

		var url = '../php/jc_linea.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'idd='+idd,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});




});


function agregaRegistro23(){
	var url = '../php/jc_agrega23.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario23').serialize(),
		success: function(registro){
			if ($('#pro23').val() == 'Registro'){
			$('#formulario23')[0].reset();
			$('#mensaje23').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			//location.reload();
			return false;
			}else{
			$('#mensaje23').addClass('bien').html('Modificacion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			//location.reload();
			return false;
			}
		}
	});
	return false;
}

function agregaRegistroArea(){
	var url = '../php/jc_agrega_area.php';
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

function envia25(norden){
	var url = '../php/jc_compra25.php';
	var pregunta = confirm('¿Desea Confirmar ?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+norden,
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


function versolCompra(id){
	var url = '../php/jc_repCompras.php';
	//var pregunta = confirm('¿Esta seguro de eliminar este Registro ?');
	//if(pregunta==true){
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
	//}else{
	//	return false;
	//}
}


function editar24(norden){
	$('#formulario23')[0].reset();
	var url = '../php/jc_edita23.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+norden,
		success: function(valores){
				var datos = eval(valores);
				$('#reg23').hide();
				$('#edi23').show();
				$('#pro23').val('Editar');
				$('#idar23').val(id);
				$('#carec').val(datos[1]);
				$('#pree').val(datos[3]);
				$('#nfac').val(datos[5]);
				$('#dtt').val(datos[0]);
				$('#norden23').val(datos[6]);
				
				$('#registra23').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function editarAr(id){
	$('#formulario')[0].reset();
	var url = '../php/jc_editaArea.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Editar');
				$('#idar').val(id);
				$('#nomarea').val(datos[0]);
				
				$('#labo-modal').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function Imprii(nordenx){
	window.open('../php/jc_pdf_soli3.php?norden='+nordenx);
}

function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../php/productos.php?desde='+desde+'&hasta='+hasta);
}

function pagination(partida){
	var url = '../php/jc_paginarEntCom3.php';
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