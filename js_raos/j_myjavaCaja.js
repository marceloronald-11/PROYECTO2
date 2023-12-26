$(document).ready();
	 
$(function(){
	
	
	$('#lb1').on('change', function(){
		var id = $('#lb1').val();
		var url = '../php/c_buscacombo.php';

		$.ajax({
			type:'POST',
			url:url,
			data:'id='+id,
			success: function(data){
				$('#lb2 option').remove();
				$('#lb2').append(data);
			}
		});
		return false;
	});

	$('#lb1').on('click', function(){
		var id1 = $('#lb1').val();
		var url = '../php/edi1.php';
		$.ajax({
			type:'POST',
			url:url,
			data:'id1='+id1,
			success: function(data){
				var datos = eval(data);
				$('#ccosto1').val(datos[1]);
			}
		});
		return false;
	});
	
	
	
		$('#lb2').on('change', function(){
		var id = $('#lb2').val();
		var url = '../php/c_buscacombo2.php';

		$.ajax({
			type:'POST',
			url:url,
			data:'id='+id,
			success: function(data){
				$('#lb3 option').remove();
				$('#lb3').append(data);
			}
		});
		return false;
	});
	
	$('#lb2').on('click', function(){
		var id2 = $('#lb2').val();
		var url = '../php/edi2.php';
		$.ajax({
			type:'POST',
			url:url,
			data:'id2='+id2,
			success: function(data){
				var datos = eval(data);
				$('#procc1').val(datos[1]);
			}
		});
		return false;
	});
	
	
    $('#lb3').on('change', function(){
		var id = $('#lb3').val();
		var url = '../php/c_buscacombo3.php';

		$.ajax({
			type:'POST',
			url:url,
			data:'id='+id,
			success: function(data){
				$('#lb4 option').remove();
				$('#lb4').append(data);
			}
		});
		return false;
	});


	

	$('#lb3').on('click', function(){
		var id3 = $('#lb3').val();
		var url = '../php/edi3.php';
		$.ajax({
			type:'POST',
			url:url,
			data:'id3='+id3,
			success: function(data){
				var datos = eval(data);
				$('#maqq1').val(datos[1]);
			}
		});
		return false;
	});	


	$('#lb4').on('click', function(){
		var id4 = $('#lb4').val();
		var url = '../php/edi4.php';
		$.ajax({
			type:'POST',
			url:url,
			data:'id4='+id4,
			success: function(data){
				var datos = eval(data);
				$('#ele1').val(datos[1]);

				var d1 = $('#ccosto1').val();
				var d2 = $('#procc1').val();
				var d3 = $('#maqq1').val();
				var d4 = $('#ele1').val();
	
				var tdt=d1+'.'+d2+'.'+d3+'.'+d4+'.';
				$('#codauto').val(tdt);



			}
		});
		return false;
	});		

	$('#detxx').autocomplete({
		source : 'ajaxreg_j.php?type=1',
		select : function(event, ui){
					//var producto = ui.item.codser;
						//$('#med').val(ui.item.umedx);
						$('#npar').val(ui.item.npartex);
						$('#ubi').val(ui.item.ubicacionx);
						$('#espe').val(ui.item.especificacionx);
						$('#cos').val(ui.item.costox);
						$('#sal').val(ui.item.saldox);
						$('#med').val(ui.item.codmdx);
						$('#salm').val(ui.item.saldominx);
					 
					 //$('#cantidad').val('1');
		}
	 });
	
	
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

function agregaRegistro(){
	var importe = $('#impo').val();
	var url = '../php/c_agrega_movimiento.php';
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
			$(location).attr('href','c_movimcaja.php');
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


function editarCliente(id){
	$('#formulario')[0].reset();
	var url = '../php/c_edita_grupo.php';
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
				$('#nomb').val(datos[0]);

				$('#registra-personas').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}


function eliminarActivo(id){
	var url = '../php/c_elimina_grupos.php';
	var pregunta = confirm('¿Esta seguro de eliminar a este Registro?');
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

function reportePDF(){
//	var ido=id;
//	var desde = $('#bd-desde').val();
//	var hasta = $('#bd-hasta').val();
	window.open('../php/z_pdf_personas.php');

}
function pagination(partida){
	var url = '../php/c_paginargrupo.php';
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