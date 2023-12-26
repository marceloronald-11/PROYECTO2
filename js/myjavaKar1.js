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


	
	$('#bs-prod').on('change',function(){ //sisadal
		var dato = $('#bs-prod').val();
		var url = '../php/aa_busca_Artx.php';
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

function agregaRegistroAr(){ // sisadal
	var url = '../php/aa_agrega_Artt.php';
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



function VerKardex(codarx){
	var desde = $('#fei').val();
	var hasta = $('#fef').val();

	var partida=1;
	
	var url = '../php/aa_paginarKardex.php';
	$.ajax({
		type:'POST',
		url:url,
		//data:'idu='+idu,
		data:'codarx='+codarx+'&desde='+desde+'&hasta='+hasta,
		success:function(dataa){
			//var pregunta = confirm('¿Esta..................a?');
//			$('#lado2').fadeIn(400);
//			$('#lado1').fadeOut(1000);
//			$('.buscame').fadeOut(10);
			
			var array = eval(dataa);
			$('#agrega-registros').html(array[0]);
			//$('#pagination2').html(array[1]);
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
	var grupox = $('#grubu').val();
//	var hasta = $('#bd-hasta').val();
	window.open('../php/si_pdf_produ.php?grupox='+grupox);
}

//function reportePDF(){
////	var ido=id;
////	var desde = $('#bd-desde').val();
////	var hasta = $('#bd-hasta').val();
//	window.open('../php/z_pdf_personas.php');
//
//}
function pagination(partida){ /// sidsadal
	var url = '../php/aa_paginarArtx.php';
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