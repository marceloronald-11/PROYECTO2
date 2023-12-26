$(document).ready(pagination(1));
	 
$(function(){
	$('#fef').on('change', function(){
	//	var desde = $('#fei').val();
		var hasta = $('#fef').val();
		var url = '../php/aa_fechaVta.php';
		$.ajax({
		type:'POST',
		url:url,
//		data:'desde='+desde+'&hasta='+hasta,
		data:'hasta='+hasta,

		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
	$('#fefxx').on('change', function(){
		var desde = $('#fei').val();
		var hasta = $('#fef').val();
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
		$('#registra-artis').modal({
			show:true,
			backdrop:'static'
		});
	});

	$('#grubu').on('change', function(){
		var grupp = $('#grubu').val();
//		var hasta = $('#bd-hasta').val();
		var url = '../php/si_busca_grupo.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'grupp='+grupp,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});

	$('#cosuc').on('change',function(){ //sisadal
		var dato = $('#cosuc').val();
		var dia = $('#diabus').val();
		var url = '../php/aa_busca_fact.php';
		$.ajax({
		type:'POST',
		url:url,
		//data:'dato='+dato,
		data:'dato='+dato+'&diax='+dia,		
		success: function(datos){
			$('#agrega-registros').html(datos);
			//return false;
		}
	});
	return false;
	});

	
	$('#bs-prod').on('change',function(){ //sisadal
		var dato = $('#bs-prod').val();
		var url = '../php/aa_busca_vennn.php';
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
	
});

function agregaRegistroAnular(){ // sisadal
	var url = '../php/aa_agrega_Edicion.php';
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
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Registro... Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			location.reload();
			return false;
			}
		}
	});
	return false;
}


function agregaRegistroFacc(){ // sisadal
	var url = '../php/aa_agrega_edifac.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario1').serialize(),
		success: function(registro){
			if ($('#pro1').val() == 'Registro'){
			$('#formulario1')[0].reset();
			$('#mensaje1').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#pro1').val('Registro'); ////// solo debemos añadir este codigo para mantener REGISTRO
			$('#agrega-registros').html(registro);
			location.reload();
			return false;
			}else{
			$('#mensaje1').addClass('bien').html('Registro... Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			location.reload();
			return false;
			}
		}
	});
	return false;
}


function editarArtiss(id){ /// sisadal
//var pregunta = confirm('¿Esta seguro de eliminar este !!!!!!');
	$('#formulario')[0].reset();
	var url = '../php/aa_edita_dinero.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+nordenx,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Editar');
				$('#idar').val(id);
				$('#dartt').val(datos[0]);
				$('#codd').val(datos[1]);
				$('#um').val(datos[6]);
				$('#pne').val(datos[7]);
				$('#pve').val(datos[8]);
				$('#cpv').val(datos[3]);
				$('#ccla').val(datos[2]);
				$('#sto').val(datos[9]);
				$('#observ').val(datos[10]);
			
				$('#registra-artis').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

//				0 => $valores2['id_usu'], 
//				1 => $valores2['fechato'],
//				2 => $valores2['totimporte'], 
//				3 => $valores2['afavor'],
//				4 => $valores2['tmm'],


function AnularFac(nordenx){ /// codto norden
//var pregunta = confirm('¿Esta seguro de eliminar este !!!!!!');
	$('#formulario')[0].reset();
	var url = '../php/aa_edita_factura.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'nordenx='+nordenx,			
		success: function(valores){
				var datos = eval(valores);
				$('#reg').show();
				$('#edi').hide();
				$('#pro').val('Registro');
				$('#xnorden').val(nordenx);
				$('#nocli').val(datos[3]);
				$('#nofac').val(datos[4]);
				$('#fee').val(datos[0]);
				$('#ModalAnular').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}


function editarFactura(nordenx){ /// codto norden
//var pregunta = confirm('¿Esta seguro de eliminar este !!!!!!');
	$('#formulario1')[0].reset();
	var url = '../php/aa_edita_factura.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'nordenx='+nordenx,			
		success: function(valores){
				var datos = eval(valores);
				$('#reg1').show();
				$('#edi1').hide();
				$('#pro1').val('Registro');
				$('#xnorden1').val(nordenx);
				$('#nocli1').val(datos[3]);
				$('#nofac1').val(datos[4]);
				$('#fee1').val(datos[0]);
				$('#nitcli1').val(datos[6]);

			$('#ModalEditaFactura').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}



function Recargar(){
	location.reload();
}


function eliminarProducto(id){ //SISADAL
	var url = '../php/aa_elimina_Artt.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Registro?');
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
	
	var url = 'aa_verfotoArtix.php';
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

function mostrarfotocarga(id){//SISADAL
	
	var url = 'aa_ver_fotoart.php';
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
	var fefx = $('#fef').val();
//	var hasta = $('#bd-hasta').val();
	window.open('../php/aa_pdf_ventas.php?fefx='+fefx);
}

function  mostrarBoleta(norden){
//window.open('../php/a_pdf_ventas.php?noredn='+norden+'&nfac='+nfac, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=70,left=500,width=500,height=600");
//window.open('../php/aa_pdf_boletaing33.php?norden='+norden, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=70,left=500,width=700,height=600");
window.open('../php/aa_pdf_Ventasuc.php?norden='+norden, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=70,left=500,width=700,height=600");
//$(location).attr('href','z_activosing.php');
//location.reload();
}

function Verfactura(norden){
//window.open('../php/a_pdf_ventas.php?noredn='+norden+'&nfac='+nfac, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=70,left=500,width=500,height=600");
window.open('../php/aa_pdf_boletaVta.php?norden='+norden, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=70,left=500,width=700,height=600");
//$(location).attr('href','z_activosing.php');
//location.reload();

}

function impreAdelanto(norden){
//window.open('../php/a_pdf_ventas.php?noredn='+norden+'&nfac='+nfac, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=70,left=500,width=500,height=600");
window.open('../php/aa_pdf_Adelanto.php?norden='+norden, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=70,left=500,width=700,height=600");
//$(location).attr('href','z_activosing.php');
//location.reload();

}

function mostrarTotal(norden){
//window.open('../php/a_pdf_ventas.php?noredn='+norden+'&nfac='+nfac, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=70,left=500,width=500,height=600");
window.open('../php/aa_pdf_boletaPednn.php?norden='+norden, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=70,left=500,width=700,height=600");
//$(location).attr('href','z_activosing.php');
//location.reload();

}

function ExcelVentas(){
var dato = $('#cosuc').val();
var dia = $('#diabus').val();
	
//	var nordenx = 0;
//	var hasta = $('#bsha').val();
	window.open('../php/aa_ExcelVentas.php?codsucx='+dato+'&diax='+dia);
//	window.open('../php/aa_ExcelVentas.php');

}


//function reportePDF(){
////	var ido=id;
////	var desde = $('#bd-desde').val();
////	var hasta = $('#bd-hasta').val();
//	window.open('../php/z_pdf_personas.php');
//
//}
function pagination(partida){ /// sidsadal
	var url = '../php/aa_paginaVentas.php';
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