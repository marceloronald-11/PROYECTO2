$(document).ready(pagination(1));
	 
$(function(){
	$('#bd-desde').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = '../php/busca_producto_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
	$('#bd-hasta').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = '../php/busca_producto_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
	$('#nuevo-producto').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra-personas').modal({
			show:true,
			backdrop:'static'
		});
	});
	
	$('#bs-prod').on('change',function(){
		var dato = $('#bs-prod').val();
		var url = '../php/z_busca_activos.php';
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

function agregaRegistroAp(){
	var url = '../php/z_agrega_aprueba.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#pro').val('Registro'); ////// solo debemos añadir este codigo para mantener REGISTRO
			$('#agrega-registros2').html(registro);
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Confirmacion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros2').html(registro);
			return false;
			}
		}
	});
	return false;
}

//				0 => $valores2['detalle'], 
//				1 => $valores2['cant'], 
//				2 => $valores2['umed'], 
//				3 => $valores2['nordenaba'],

function editarAprob(id){
	$('#formulario')[0].reset();
	var url = '../php/z_edita_soli.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Edicion');
				$('#idper').val(id);
				$('#descri').val(datos[0]);
				$('#cant').val(datos[1]);
				$('#umed').val(datos[2]);
				$('#nordenaba').val(datos[3]);



				$('#registra-personas').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}




function eliminarSolicita(id){
	var url = '../php/z_elimina_activo.php';
	var pregunta = confirm('¿Esta seguro de eliminar a este Activo?');
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


function mostrarfoto(id){
	
	var url = 'z_ver_fotoactivos.php';
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

function mostrarfotocarga(id){
	
	var url = 'z_ver_fotoac.php';
	var pregunta =true;
	if(pregunta==true){
	$('#modalcargafoto').modal({
					show:true,
					backdrop:'static'
				});
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#espacio-carga').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}


function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../php/productos.php?desde='+desde+'&hasta='+hasta);
}

function VerSolicitudPdf(nordenab){
//	var ido=id;
//	var desde = $('#bd-desde').val();
//	var hasta = $('#bd-hasta').val();
//	window.open('../php/z_pdf_personas.php');
	window.open('../php/z_pdf_solicitud.php?norden='+nordenab);

}
function editarSoli(nnorden){
	var url = '../php/z_paginarSolicitud2.php';
	var pregunta = true;
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'nnorden='+nnorden,
		success: function(data){
			var array = eval(data);
			$('#agrega-registros2').html(array[0]);
			$('#pagination2').html(array[1]);
			
//			$('#agrega-registros2').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}
function pagination(partida){
	var url = '../php/z_paginarSolicitud.php';
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