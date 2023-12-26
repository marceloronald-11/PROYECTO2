$(document).ready(pagination(1));

	 
$(function(){
	$('#bd-desde').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = '11_busca_movim_fecha.php';
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
		var url = '11_busca_movim_fecha.php';
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

	$('#bd-desde3').on('change', function(){
		var desde = $('#bd-desde3').val();
		var hasta = $('#bd-hasta3').val();
		var url = '11_busca_movim_fecha3.php';
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
	
	$('#bd-hasta3').on('change', function(){
		var desde = $('#bd-desde3').val();
		var hasta = $('#bd-hasta3').val();
		var url = '11_busca_movim_fecha3.php';
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

	$("#ConfiOrden").off("click");
	$("#ConfiOrden").on("click", function(e) {
		var nnota = $('#nordenxx').val();
//		var nomcli = $('#encarga').val();
//		var idusu = $('#idusu').val();
//		var fechav = $('#fecha').val();
//		var iidper = $('#iidper').val();
//		var note = $('#note').val();
//		var dote = $('#dote').val();

		$.ajax({
			url: '../Controller/Controlador.php?page=777',
			type: 'post',
			data: {'nnotaxx':nnota},
			dataType: 'json',
			success: function(data) {

				if(data.success==true){
					location.reload();
					$("#nordenxx").val('');
					//$("#idusu").val('');
					//$("#codar").val('');

					alertify.success(data.msj);
				//	$(".detalle-producto").load('../php/1_detalle_ventaumsa.php');
				//	$(".detalle-producto1").load('../php/2_detalle_ventaumsa.php');

					//location.reload();
				}else{
					alertify.error(data.msj);
				}
			},
			error: function(jqXHR, textStatus, error) {
				alertify.error(error);
			}
		});				
	});
				
			$('#tipo').autocomplete({
                   source : 'ajaxreg.php?type=2',
                   select : function(event, ui){
                       $('#resultados').slideUp('slow', function(){
                    //        $('#resultados').html(
                     //           '<h3>Datos del cliente</h3>' +
					//			'<img height="100" width="100" src="' + ui.item.fotodoc1 + '" />' +'<br/>' +
                     //           '<strong>Nombre: </strong>' + ui.item.value + '<br/>' +
                      //          '<strong>ci: </strong>' + ui.item.ci+ "  "+
					//			'<strong>pais:</strong>' + ui.item.pais+ '<br>'+
					//			'<strong>Fecha Nac:</strong>' + ui.item.fecha_nac+ '<br>'+
					//			'<strong>Profesion:</strong>' + ui.item.profesion+ '<br>'+
					//			'<strong>Historial:</strong>' + ui.item.historial
								 //$(#cantidad).value()=1;
                     //       );
							
					   		$('#precio').val(ui.item.precio);
					   		$('#codthh').val(ui.item.codth);
							
					   });
                       $('#resultados').slideDown('slow');
                   }
                });



	
	$('#nuevo-producto').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra-producto').modal({
			show:true,
			backdrop:'static'
		});
	});
	
	$('#bs-prod').on('keyup',function(){
		var dato = $('#bs-prod').val();
		var url = '../php/a_busca_venta_1.php';
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
	var url = '../php/33_agrega_orden.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#pro').val('Registro'); ////// solo debemos añadir este codigo para mantener REGISTRO
			$('#agrega-registros2').html(registro);
			location.reload();
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros2').html(registro);
			//$(location).attr('href','33_confirm_orden.php');
			//location.reload();
			return false;
			}
			//location.reload();
		}
	});
	return false;
}

function eliminarCompra(id){
	var url = '../php/a_elimina_compra_ceramica.php';
	var pregunta = confirm('¿Esta seguro de eliminar esta Compra ?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'norden='+id,
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

function eliminarOrden(id,nor){
	var url = '../php/z_elimina_orden.php';
	var pregunta = confirm('¿Esta seguro de eliminar esta Orden?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		//data:'id='+id,
		data:'id='+id+'&nnorden='+nor,
		success: function(registro){
			$('#agrega-registros2').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}


	$(".guardar-carrito2").off("click");
	$(".guardar-carrito2").on("click", function(e) {
		var nnota = $('#nnota').val();
		var observ = $('#observ').val();
		var idusu = $('#idusu').val();

		

		$.ajax({
			url: '../Controller/ProductoController1.php?page=3',
			type: 'post',
			data: {'observ':observ,'nnota':nnota,'idusu':idusu},
			dataType: 'json',
			success: function(data) {
				if(data.success==true){
					$("#encargado").val('');
					$("#idusu").val('');

					alertify.success(data.msj);
					$(".detalle-producto").load('../php/detalle1.php');
					//location.reload();
				}else{
					alertify.error(data.msj);
				}
			},
			error: function(jqXHR, textStatus, error) {
				alertify.error(error);
			}
		});				
	}); 
	
	
function ConfirmaTra(coda,cant,codttt){
	//$('#formulario')[0].reset();
	var pregunta = confirm('¿Confirmar Transferencia?');
	var codaa=coda;
	var canti=cant;
	var codtttx=codttt;

	var url = '../Controller/ProductoController1.php?page=9';
		$.ajax({
		type:'POST',
		url:url,
		data:{'coda':codaa,'canti':canti,'codtttx':codtttx},
		dataType: 'json',
		success: function(data){
				if(data.success==true){
				//	$("#encargado").val('');
				//	$("#idusu").val('');

					alertify.success(data.msj);
					//$(".detalle-producto").load('../php/detalle1.php');
					
					location.reload();
				}else{
					alertify.error(data.msj);
				}
		}
	});
	return false;
}

function ConfirmaTra2(norden){
	//$('#formulario')[0].reset();
	var pregunta = confirm('¿Confirmar Transferencia ?');
	var nnor=norden;
//	var canti=cant;
//	var codtttx=codttt;

	var url = '../Controller/ProductoController1.php?page=10';
		$.ajax({
		type:'POST',
		url:url,
		data:{'norden':nnor},
		dataType: 'json',
		success: function(data){
				if(data.success==true){
				//	$("#encargado").val('');
				//	$("#idusu").val('');

					alertify.success(data.msj);
					//$(".detalle-producto").load('../php/detalle1.php');
					
					location.reload();
				}else{
					alertify.error(data.msj);
				}
		}
	});
	return false;
}





function ConfirmaTraaaaa(coda){
	//$('#formulario')[0].reset();
	var url = '../php/a_edita_articulo.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Edicion');
				$('#id-prod').val(id);
				$('#nreg').val(datos[0]);
				$('#codigo').val(datos[1]);
				$('#descrip').val(datos[2]);
				$('#pventa').val(datos[3]);

				//json1={"foto":"juannn"};
				$('#registra-producto').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function editarOrden(id){
	$('#formulario')[0].reset();
	var url = '../php/z_edita_orden.php';
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
				$('#descri').val(datos[0]);
				$('#cant').val(datos[1]);
				$('#nordenx').val(datos[2]);
				$('#fac').val(datos[3]);

				//json1={"foto":"juannn"};
				$('#myModal').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function mostrarfoto(id){
	
	var url = 'a_ver_foto.php';
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
	
	var url = 'a_ver_foto22.php';
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

function mostrarformato(id){
	var ido=id;
//	var desde = $('#bd-desde').val();
//	var hasta = $('#bd-hasta').val();
	window.open('../php/a_pdf_salida2.php?idd='+ido);

}

function mostrarcotiza(id){
	var ido=id;
//	var desde = $('#bd-desde').val();
//	var hasta = $('#bd-hasta').val();
	window.open('../php/a_pdf_compras.php?idd='+ido);

}

function verTra(idu){
	var partida=1;
	$('#nordenxx').val(idu);
	//var pregunta = confirm('¿Esta..................a?');
	var url = '../php/33_paginartr.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'idu='+idu,
		success:function(data){
			var array = eval(data);
			$('#agrega-registros2').html(array[0]);
			$('#pagination2').html(array[1]);
		}
	});
	return false;
}

function reporte3PDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../php/11_pdf_salida_a.php?desde='+desde+'&hasta='+hasta);
}

function reporte0PDF(){
//	var desde = $('#bd-desde').val();
	//var hasta = $('#bd-hasta').val();
	window.open('../php/11_pdf_salida1.php');
}

function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../php/a_pdf_articulos.php?desde='+desde+'&hasta='+hasta);
}

function reporte2PDF(){
	var busca = $('#bs-prod').val();
	window.open('../php/11_pdf_salida_b.php?buscar='+busca);
}

function pagination(partida){
//	var url = '../php/11_paginarMovim_a.php';
	var url = '../php/33_paginaordenar.php';

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


