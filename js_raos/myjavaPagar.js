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
	
	$('#nuevo-usuario').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#usuarios-modal').modal({
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

function agregaRegistroPago(){
	var url = '../php/far_agrega_pagosx.php';
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
			$('#mensaje').addClass('bien').html('Pago Registrado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
				location.reload();
			return false;
			}
		}
	});
	return false;
}

function eliminarUsux(id){
	var url = '../php/aa_elimina_usux.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Usuario?');
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


function PagandoCre(codcrex){
	$('#formulario')[0].reset();
	var url = '../php/far_edita_pagoss.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'codcrex='+codcrex,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Editar');
				$('#codcrexx').val(codcrex);
				$('#ncliente').val(datos[6]);
				$('#impto').val(datos[0]);
				$('#sal').val(datos[1]);
				$('#nosucc').val(datos[3]);
				$('#nordenxx').val(datos[4]);
				$('#codclix').val(datos[5]);
				
				$('#usuarios-modal').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function editarUsuario(id){
	$('#formulario')[0].reset();
	var url = '../php/aa_edita_usuariox3.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Editar');
				$('#idusux').val(id);
				$('#iidper').val(datos[4]);
				$('#usua').val(datos[1]);
				$('#pass').val(datos[2]);
				$('#csuc').val(datos[5]);
				$('#desar').val(datos[3]);
				
				$('#usuarios-modal').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function VerPaguos(codcrexxx){
	var partida=1;
	//$('#nordenxx').val(idu);
	//var pregunta = confirm('¿Esta..................a?');
	var url = '../php/far_paginarPagos.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'codcrexxx='+codcrexxx,
		success:function(data){
			$('#agrega-registros').html(data);
//			var array = eval(data);
//			$('#agrega-registros').html(array[0]);
//			$('#pagination2').html(array[1]);
		}
	});
	return false;
}

function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../php/productos.php?desde='+desde+'&hasta='+hasta);
}

function ImprimePagos(codcre1,norden1){
window.open('../php/aa_pdf_pagoscre.php?codcrex='+codcre1+'&nordenx='+norden1);	
}

function pagination(partida){
	var url = '../php/far_paginarCree.php';
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