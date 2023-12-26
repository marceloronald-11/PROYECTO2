$(document).ready();
$(function(){

	
	$('#nomclie').autocomplete({
                   source : 'ajaxcoa.php?type=1',
                   select : function(event, ui){
					   			$('#codclix').val(ui.item.codclix);
					   			$('#nci').val(ui.item.ciclix);
					   			$('#dire').val(ui.item.direccx);
					   
								//$( "#cant" ).focus();
                   }
    });	
	
	$('#produ').autocomplete({
                   source : 'ajaxcoa.php?type=2',
                   select : function(event, ui){
					   			$('#codarx').val(ui.item.codarx);
					   			$('#ume').val(ui.item.umedx);
					   			$('#pre').val(ui.item.pvpx);
								$( "#cantt" ).focus();
                   }
    });		
	
$(".btn-agregar-cuenta").off("click");
$(".btn-agregar-cuenta").on("click", function(e) {
		//var pregunta = confirm('¿Esta seguro .....?');
		
		var produx = $("#produ").val(); // codigo del servicio
		var umex = $("#ume").val(); // codigo del servicio
		var prex = $("#pre").val(); // codigo del servicio
		var codarx = $("#codarx").val(); // codigo del servicio
		var canttx = $("#cantt").val(); // codigo del servicio

//		var saldo =Number( $("#saldo").val()); // codigo del servicio
		//var tipop= ($('input[name="tipop"]:checked', '#formulario').val()); 
	//	if(servicio_id!=0){

		//	if(cantidad<=saldo){
				$.ajax({
					

					url: '../Controller/ControladorPreventa.php?page=1',
					type: 'post',
					data: {'codar1':codarx ,'producto1':produx,'ume1':umex, 'pre1':prex,'cant1':canttx},
					dataType: 'json',
					success: function(data) {
						//var pregunta = confirm('¿salio bien?');
						if(data.success==true){
							alertify.success(data.msj);
					$("#agrega-registros").load('../php/coa_detalle_preventa.php');
							//$('#formulario')[0].reset();
							$("#produ").val('');
							$("#ume").val('');
							$("#pre").val('');
							$("#codarx").val('');
							$("#cantt").val('');

							$( "#produ" ).focus();
							
						}else{
							alertify.error(data.msj);
						}
					},
					error: function(jqXHR, textStatus, error) {
						alertify.error(error);
					}
				});				
		//	}else{
		//		alertify.error('Stock insuficiente');
		//	}
	//	}else{
		//	alertify.error('Seleccione un producto');
	//	}
	});	
	
	
$(".btnGuardarVta").off("click");
	$(".btnGuardarVta").on("click", function(e) {
		var respox = $('#nomclie').val();
		var codclix = $('#codclix').val();

		$.ajax({
			url: '../Controller/ControladorPreventa.php?page=2',
			type: 'post',
			data: {'respox':respox,'codclix':codclix},
			dataType: 'json',
			success: function(data) {
				if(data.success==true){
					$("#nomclie").val('');
					$("#codclix").val('');
					//$("#novtax").val('');
					alertify.success(data.msj);
					//$("#agrega-registros").load('../php/detalleorden.php');
					//$('#formulario')[0].reset();
					location.reload();
					//$(".datos").load('../php/datos.php');
				}else{
					alertify.error(data.msj);
				}
			},
			error: function(jqXHR, textStatus, error) {
				alertify.error(error);
			}
		});				
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
			//location.reload();
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Modificacion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			//location.reload();
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
				$('#cla').val(datos[0]);
				$('#prov').val(datos[1]);
				$('#nomprod').val(datos[2]);
				$('#ume').val(datos[5]);
				$('#pvp').val(datos[7]);
				$('#observ').val(datos[10]);
				
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
	var url = '../php/coa_paginarPreventa.php';
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