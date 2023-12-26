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
	

	
});

function agregaRegistro(){
	var url = '../php/z_agrega_activos.php';
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
			$(location).attr('href','z_activos.php');
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			$(location).attr('href','z_activos.php');
			return false;
			}
		}
	});
	return false;
}


function editarArtiss(id){ /// sisadal
//var pregunta = confirm('¿Esta seguro de eliminar este !!!!!!');
	$('#formulario')[0].reset();
	var url = '../php/aa_edita_arts.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
//				$('#reg').hide();
//				$('#edi').show();
//				$('#pro').val('Editar');
//				$('#idar').val(id);
				$('#dess').val(datos[0]);
//				$('#codd').val(datos[1]);
//				$('#ccla').val(datos[2]);
//				$('#cpv').val(datos[3]);
//				$('#mar').val(datos[6]);
//				$('#pci').val(datos[7]);
//				$('#psi').val(datos[8]);
//				$('#pmay').val(datos[9]);
//				$('#compa').val(datos[10]);
//				$('#observ').val(datos[12]);
//				$('#pnet').val(datos[16]);
//				$('#ume').val(datos[17]);
//				$('#stom').val(datos[11]);
			
				$('#modalArticulo').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}


function editarArtiss2(id){ /// sisadal
//var pregunta = confirm('¿Esta seguro de eliminar este !!!!!!');
	$('#formulario2')[0].reset();
	var url = '../php/aa_edita_arts.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
//				$('#reg').hide();
//				$('#edi').show();
//				$('#pro').val('Editar');
//				$('#idar').val(id);
				$('#dess2').val(datos[0]);
//				$('#codd').val(datos[1]);
//				$('#ccla').val(datos[2]);
//				$('#cpv').val(datos[3]);
//				$('#mar').val(datos[6]);
//				$('#pci').val(datos[7]);
//				$('#psi').val(datos[8]);
//				$('#pmay').val(datos[9]);
//				$('#compa').val(datos[10]);
//				$('#observ').val(datos[12]);
//				$('#pnet').val(datos[16]);
//				$('#ume').val(datos[17]);
//				$('#stom').val(datos[11]);
			
				$('#modalArticulo2').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}


function eliminarActivo(id){
	var url = '../php/z_elimina_activo.php';
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
	
	var url = 'z_ver_fotoarticulo.php';
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
	
	var url = 'z_ver_fotoart.php';
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
	window.open('../php/z_pdf_articulos.php');
}

function reporteExcel(){
	window.open('../php/33_articulo_excel.php');
}


function pagination(partida){
	//var pregunta = confirm('¿Esta seguro Paginar....?');
	var url = '../php/far_pagarticulo.php';
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