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



	$('#nomrepu').autocomplete({
        source : 'ajaxjca.php?type=1',
        select : function(event, ui){
					$('#um').val(ui.item.umedx);
					$('#sald').val(ui.item.saldox);
					$('#saldcr').val(ui.item.saldomx);
					$('#precc').val(ui.item.costox);
					$('#codree').val(ui.item.codrepx);
					$('#codigoxx').val(ui.item.codigox);

        }
     });
	
	$('#nombb').autocomplete({
        source : 'ajaxjca.php?type=5',
        select : function(event, ui){
					 $('#areaa').val(ui.item.detarea3);
					 $('#carg').val(ui.item.detcargo3);
					 $('#codareax').val(ui.item.codarea3);
					 $('#codcargox').val(ui.item.codcargo3);
					 $('#codsolix').val(ui.item.codsoli3);
        }
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


function agregaRegistroModelo(){
	var url = '../php/jc_agrega_Modd2.php';
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

function agregaRegistroAdi(){
	var url = '../php/jc_agrega_adiciona.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formularioa').serialize(),
		success: function(registro){
			if ($('#proa').val() == 'Registro'){
			$('#formularioa')[0].reset();
			$('#mensajea').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			//location.reload();
			return false;
			}else{
			$('#mensajea').addClass('bien').html('Modificacion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			//location.reload();
			return false;
			}
		}
	});
	return false;
}



function eliminaLin(id,nordenn){
	var url = '../php/jc_eliminaLin.php';
	var pregunta = confirm('¿Esta seguro de eliminar esta Linea ?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id+'&nordenn='+nordenn,
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

function eliminaHeXX(id){
	var url = '../php/far_eliminaCla.php';
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


function versolCompra(id){
	var url = '../php/jc_repModelo2a.php';
	//var pregunta = confirm('¿Esta seguro de eliminar este Registro ?');
	//if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('.cabe').show();
			$('#nordenx').val(id);
			$('#agrega-registros').html(registro);
			return false;
		}
		});
	return false;
	//}else{
	//	return false;
	//}
}


function editar23(id){
	$('#formulario23')[0].reset();
	var url = '../php/jc_edita23.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
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
	// var desde = $('#bd-desde').val();
	// var hasta = $('#bd-hasta').val();
	window.open('../php/jc_pdf_soli22.php?norden='+nordenx);
}


function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../php/productos.php?desde='+desde+'&hasta='+hasta);
}

function pagination(partida){
	var url = '../php/jc_paginarModelo2.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'partida='+partida,
		success:function(data){
			$('.cabe').hide();

			var array = eval(data);
			$('#agrega-registros').html(array[0]);
			$('#pagination').html(array[1]);
		}
	});
	return false;
}