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
	
	$(".articulosPdf").off("click");
	$(".articulosPdf").on("click", function(e) {
//		var desde = $('#desde').val();
//		var hasta = $('#hasta').val();
		window.open('../php/aa_pdf_articulossp.php');
	});
	
	
	$('#bs-prod').on('change',function(){
		var dato = $('#bs-prod').val();
		var url = '../php/coa_busca_articulos.php';
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

function agregaArticulos(){
	var url = '../php/coa_agrega_articulos.php';
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

function eliminaPer(id){
	var url = '../php/coa_eliminaArt.php';
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

function VerKardex(codarx){
	//var desde = $('#fei').val();
//	var hasta = $('#fef').val();
	$('#codarxx').val(codarx);

	var partida=1;
	
	
  var url = '../php/aa_paginarkf.php';
	//var url = '../php/aa_paginarKar22.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'codarx='+codarx,
		//data:'codarx='+codarx+'&desde='+desde+'&hasta='+hasta,
		success:function(dataa){
			//var pregunta = confirm('¿Esta..................a?');
		//	$('.nv').fadeOut(400);
		//	$('.nv1').fadeIn(400);
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
function editarPer(id){
	$('#formulario')[0].reset();
	var url = '../php/coa_editaArticulo.php';
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
				$('#cla').val(datos[0]);
				$('#prov').val(datos[1]);
				$('#nomprod').val(datos[2]);
				$('#ume').val(datos[5]);
				$('#pvp').val(datos[7]);
				$('#observ').val(datos[10]);
				$('#pcre').val(datos[13]);
				
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

function VerKardexpdf(codarx){
	window.open('../php/aa_pdf_kardex233.php?codarx='+codarx);
}

function mostrarfoto(id){ //sisadal
	
	var url = 'coa_verfoto2.php';
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
	var url = '../php/coa_paginarKardex.php';
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