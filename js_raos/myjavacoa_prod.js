$(document).ready(pagination(1));
	 
$(function(){

	$('#nuevo-producto').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#modalArticulo').modal({
			show:true,
			backdrop:'static'
		});
	});

	$('#bs-prod').on('keyup',function(){
		var dato = $('#bs-prod').val();
		var url = '../php/aa_busca_derma.php';
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





				$('#buss').autocomplete({
                   source : 'ajaxactivo.php?type=1',
                   select : function(event, ui){
					   			$('#idcodx').val(ui.item.codarx);
								$('#cant').val('1');
								$('#sal').val(ui.item.saldox);
								$('#um').val(ui.item.umedx);
								$('#pneto').val(ui.item.pnetox);
								
								$( "#cant" ).focus();
                   }
                });

	

	
});


function agregaProducto(){
	var url = '../php/far_agregaProd.php';
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
			location.reload();
			//$(location).attr('href','z_activos.php');
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			//$(location).attr('href','z_activos.php');
			location.reload();

			return false;
			}
		}
	});
	return false;
}




function editarProdu(id){ /// sisadal
				//	var pregunta = confirm('¿Esta seguro de eliminar ........');
	$('#formulario')[0].reset();
	var url = '../php/far_editaProd.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Edicion');
				$('#idcod').val(id);
				$('#dess').val(datos[0]);
				$('#ume').val(datos[14]);
				$('#conte').val(datos[6]);
				$('#neto').val(datos[7]);
				$('#pvp').val(datos[8]);
				$('#mar').val(datos[5]);
				$('#feven').val(datos[10]);
				$('#cla').val(datos[1]);
				$('#lab').val(datos[2]);
				$('#observ').val(datos[11]);
			
				$('#modalArticulo').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}





function eliminaProd(id){
	var url = '../php/far_eliminaProd.php';
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

function mostrarfoto(id){ //sisadal
	
	var url = 'far_verfotoArtix.php';
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
	
	var url = 'far_ver_fotoart.php';
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


function reporteeeePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../php/productos.php?desde='+desde+'&hasta='+hasta);
}

function reportePDF(){
	window.open('../php/far_pdf_articulos.php');
}

function reporteExcel(){
	window.open('../php/far_ExcelArticulo.php');
}


function pagination(partida){
	//var pregunta = confirm('¿Esta seguro Paginar....?');
	var url = '../php/coa_paginar_productos.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'partida='+partida,
		success:function(data){
			//var pregunta = confirm('¿Esta paginita....xxx..?');
			var array = eval(data);
			$('#agrega-registros').html(array[0]);
			$('#pagination').html(array[1]);
		}
	});
	return false;
}