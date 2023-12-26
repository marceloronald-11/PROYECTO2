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
	
	$(".imprimeVentaPdf").off("click");
	$(".imprimeVentaPdf").on("click", function(e) {
//		var desde = $('#desde').val();
//		var hasta = $('#hasta').val();
//		window.open('../php/a_pdf_reporte3.php?desde='+desde+'&hasta='+hasta);
		window.open('../php/aa_pdf_listado.php');
		
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
	var url = '../php/moises_agrega_articulos.php';
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
				$('#nomprod').val(datos[2]);
				$('#cgru').val(datos[20]);
				$('#cmar').val(datos[21]);
				$('#cti').val(datos[22]);
				$('#serien').val(datos[18]);
				$('#prevta').val(datos[7]);
				$('#sall').val(datos[4]);
				$('#stomi').val(datos[8]);
				$('#prefac').val(datos[6]);
			
			
				
				$('#sucu-modal').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function reportePDF(codart){
	//window.open('../php/db_pdf_articulo.php');
	window.open('../php/moisess_pdf_art1.php?codarx='+codart);
}

function reportePDF2(codart){
	//window.open('../php/db_pdf_articulo.php');
	window.open('../php/moises_pdf_art11.php?codarx='+codart);
}

function mostrarfoto(id){ //sisadal
	
	var url = 'coa_verfoto.php';
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
	var url = '../php/moises_paginarProductos.php';
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