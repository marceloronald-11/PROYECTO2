$(document).ready();

	 
$(function(){


				$('#encarga').autocomplete({
                   source : 'ajaxotes.php?type=6',
                   select : function(event, ui){
                       		//var producto = ui.item.codser;
					   			$('#iidper').val(ui.item.idper);
								
								//$('#cantidad').val('1');
                   }
                });
				
	
				$('#descrip').autocomplete({
			 
				   source : 'ajaxotes.php?type=7',
				   
                   select : function(event, ui){
                       		//var producto = ui.item.codser;
					   			$('#codar').val(ui.item.codar);
								$('#ume').val(ui.item.umed);
								$('#cod').val(ui.item.codigo);
								$('#pn').val(ui.item.pneto);
								$('#pv').val(ui.item.pvp);
								$('#cla').val(ui.item.codcla);
								$('#coprov').val(ui.item.codpv);
								$('#stm').val(ui.item.stock);
								$('#observ').val(ui.item.observ);
								$('#saldoex').val(ui.item.existencia);

								$( "#cant" ).focus();

								                   }
                });

				$('#dmaqui').autocomplete({
                   source : 'ajaxotes.php?type=3',
                   select : function(event, ui){
                       		//var producto = ui.item.codser;
					   			$('#cmq').val(ui.item.codmaq);
								$('#codmqq').val(ui.item.codmq);
                   }
                });


	$(".btn-agregar-producto").off("click");
	$(".btn-agregar-producto").on("click", function(e) {
		var cantidad = Number($("#cantidad").val());
		var producto_id = $("#id-prod").val();
		var pventa = $("#pventa").val();
		var saldo = Number($("#saldo").val());
		
		if(producto_id!=0){
		//	if(cantidad<=saldo){
				$.ajax({
					url: '../Controller/ProductoController1.php?page=11',
					type: 'post',
					data: {'producto_id':producto_id, 'cantidad':cantidad, 'pventa':pventa},
					dataType: 'json',
					success: function(data) {
						if(data.success==true){
							$("#cantidad").val('');
							alertify.success(data.msj);
							$(".detalle-producto").load('../php/detalle1.php');
							//location.reload();
								//	$('#registra-producto').modal({
								//	show:hide,
								//	backdrop:'static'
								//	});
							
							
							
						}else{
							alertify.error(data.msj);
						}
					},
					error: function(jqXHR, textStatus, error) {
						alertify.error(error);
					}
				});				
		//	}else{
		//		alertify.error('STOCK INSUFICIENTE...');
		//	}
		}else{
			alertify.error('Seleccione un producto');
		}
	});
	



	$(".btnPersonal").off("click");
	$(".btnPersonal").on("click", function(e) {
		var codar = $("#codar").val();
		var descrip = $("#descrip").val();
		var cod = $("#cod").val();
		var ume = $("#ume").val();
		var pn = $("#pn").val();
		var pv = $("#pv").val();
		var stm = $("#stm").val();
		var observ = $("#observ").val();
		var cla = $("#cla").val();
		var coprov = $("#coprov").val();
		var coddepx = $("#coddepx").val();
		var cant = Number($("#cant").val());
		//var idperr = $("#iidper").val();
	//	var sel= ($('input[name="tipop"]:checked', '#formulario').val());
	//	if(codotee!=0){
			if(cant!=0){
				$.ajax({
					
					url: '../Controller/Controlador.php?page=333',
					type: 'post',
					data: {'codar':codar, 'descrip':descrip, 'cod':cod, 'ume':ume, 'pn':pn, 'pv':pv, 'stm':stm, 'observ':observ, 'cla':cla, 'coprov':coprov,'cant':cant,'coddepx':coddepx},
					dataType: 'json',
					success: function(data) {
								//var pregunta = confirm('¿Esta seguro de eliminar este Producto?');

						if(data.success==true){
							//$("#codotee").val('');
						//	$("#codmqq").val('');
//							$("#idart").val('');
//							$("#ppvp").val('');
							alertify.success(data.msj);
							$(".detalle-producto").load('../php/22_detalle_per.php');
							$('#formulario')[0].reset();
							$( "#descrip" ).focus();
							//$(".datos").load('../php/datos.php');
							
						}else{
							alertify.error(data.msj);
						}
					},
					error: function(jqXHR, textStatus, error) {
						alertify.error(error);
					}
				});				
			}else{
				alertify.error('Ingrese una cantidad');
				$( "#cant" ).focus();
			}
	//	}else{
	//		alertify.error('Seleccione un producto');
	//	}
	});	

	$(".guardaMatDevol").off("click");
	$(".guardaMatDevol").on("click", function(e) {
		var nnota = $('#nnota').val();
		var nomcli = $('#encarga').val();
		var idusu = $('#idusu').val();
		var fechav = $('#fecha').val();
		var iidper = $('#iidper').val();
//		var note = $('#note').val();
//		var dote = $('#dote').val();

		$.ajax({
			url: '../Controller/Controlador.php?page=666',
			type: 'post',
			data: {'nnota':nnota,'idusu':idusu,'nomcli':nomcli,'fechav':fechav,'iidper':iidper},
			dataType: 'json',
			success: function(data) {

				if(data.success==true){
					location.reload();
					$("#encarga").val('');
					$("#idusu").val('');
					$("#codar").val('');

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
	
	
	$(".alcarro").off("click");
	$(".alcarro").on("click", function(e) {
		var cantidad = Number($("#cantidad").val());
		var idart = $("#idart").val();
		var pventa = $("#ppvp").val();
		var saldo = Number($("#saldo").val());
		var sel= ($('input[name="tipop"]:checked', '#formulario').val());

		if(idart!=0){
			//if(cantidad<=saldo){
			if(cantidad<100000){
				$.ajax({
					url: '../Controller/ControladorArt.php?page=1',
					type: 'post',
					//data: {'idart':idart, 'cantidad':cantidad, 'pventa':pventa,'sel':sel},
					data: {'idart':idart},
					dataType: 'json',
					success: function(data) {
						if(data.success==true){
							//location.reload();
						//	$("#cantidad").val('1');
						//	$("#buscaract").val('');
						//	$("#idart").val('');
						//	$("#precio").val('');
						//	$("#buscaract" ).focus();

							alertify.success(data.msj);
						//	$(".detalle-producto").load('../php/1_detalle_articulo.php');
							//location.reload();
								//	$('#registra-producto').modal({
								//	show:hide,
								//	backdrop:'static'
								//	});
							
							
							
						}else{
							alertify.error(data.msj);
						}
					},
					error: function(jqXHR, textStatus, error) {
						alertify.error(error);
					}
				});				
			}else{
				alertify.error('STOCK INSUFICIENTE...');
			}
		}else{
			alertify.error('Seleccione un producto');
		}
	});	
	
	

	$(".btn-agregar-producto2").off("click");
	$(".btn-agregar-producto2").on("click", function(e) {
		var cantidad = Number($("#cantidad").val());
		var producto_id = $("#id-ser").val();
		var pventa = $("#precio").val();
		var saldo = Number($("#saldo").val());
		var sel= ($('input[name="tipop"]:checked', '#formulario').val());
		//var cantidad = $("#cantidad").val();

	//	if(!$("#facsino").is(":checked")){
	//		var fac='NO';
    //	}else{
	//		var fac='SI';		
	//	}
		
		if(producto_id!=0){
			//if(cantidad<=saldo){
			if(cantidad<100000){
				$.ajax({
					url: '../Controller/ProductoControllerActivo.php?page=1',
					type: 'post',
					data: {'producto_id':producto_id, 'cantidad':cantidad, 'pventa':pventa,'sel':sel},
					dataType: 'json',
					success: function(data) {
						if(data.success==true){
							//location.reload();
							$("#cantidad").val('1');
							$("#buscaract").val('');
							$("#id-ser").val('');
							$("#precio").val('');
							$("#buscaract" ).focus();

							alertify.success(data.msj);
							$(".detalle-producto").load('../php/z_detalle_activo.php');
							//location.reload();
								//	$('#registra-producto').modal({
								//	show:hide,
								//	backdrop:'static'
								//	});
							
							
							
						}else{
							alertify.error(data.msj);
						}
					},
					error: function(jqXHR, textStatus, error) {
						alertify.error(error);
					}
				});				
			}else{
				alertify.error('STOCK INSUFICIENTE...');
			}
		}else{
			alertify.error('Seleccione un producto');
		}
	});



$( ".sale" ).click(function() {
  $( "#bs-prod" ).focus();
});

$( ".LimpiaForm" ).click(function() {
	$("#codar").val('');
	//$("#encarga").val('');

	$('#formulario')[0].reset();
	$( "#descrip" ).focus();

});


	$(".eliminar-producto").off("click");
	$(".eliminar-producto").on("click", function(e) {
		var id = $(this).attr("id");
		$.ajax({
			url: '../Controller/ProductoControllerCarta.php?page=2',
			type: 'post',
			data: {'id':id},
			dataType: 'json'
		}).done(function(data){
			if(data.success==true){
				alertify.success(data.msj);
				$(".detalle-producto").load('../php/1_detalle_venta.php');
			}else{
				alertify.error(data.msj);
			}
		})
	});
	

	$(".eliminar-detalle").off("click");
	$(".eliminar-detalle").on("click", function(e) {
		var id = $(this).attr("id"); // enviado popr boton
		$.ajax({
			url: '../Controller/Controlador.php?page=13',
			type: 'post',
			data: {'id':id},
			dataType: 'json'
		}).done(function(data){
			if(data.success==true){
				alertify.success(data.msj);
				$(".detalle-producto").load('../php/22_detalle_info.php');
			}else{
				alertify.error(data.msj);
			}
		})
	});


	
	$(".irmodal").click(function(e){
		$("#nitcli" ).focus();
		$("#myModal").modal('show');
		
	});
	
	
	
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



	$(".guardar-carrito33").off("click");
	$(".guardar-carrito33").on("click", function(e) {
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
					$("#observ").val('');
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




	$(".imprime-cotiza").off("click");
	$(".imprime-cotiza").on("click", function(e) {
		var nnota = $('#nnota').val();
		$.ajax({
			url: '../Controller/ProductoController1.php?page=6',
			type: 'post',
			data: {'nnota':nnota},
			dataType: 'json',
			success: function(data) {
				if(data.success==true){
					//$("#idusu").val('');

					alertify.success(data.msj);
					//$(".detalle-producto").load('../php/a_pdf_cotizacion.php');
					window.open('a_pdf_cotizacion.php?nnota='+desde+'&hasta='+hasta);

//					window.open('../php/a_pdf_cotizacion.php?nnota='+desde+'&hasta='+hasta);
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

	
	$(".limpiacarro").off("click");
	$(".limpiacarro").on("click", function(e) {
		var encargado = $('#encargado').val();
		$.ajax({
			url: '../Controller/ProductoControllerCarta.php?page=4',
			type: 'post',
			data: {'encargado':encargado},
			dataType: 'json',
			success: function(data) {
				if(data.success==true){
					//$("#cantidad").val('');
					alertify.success(data.msj);
					$(".detalle-producto").load('../php/1_detalle_venta.php');
				}else{
					alertify.error(data.msj);
				}
			},
			error: function(jqXHR, textStatus, error) {
				alertify.error(error);
			}
		});				
	});

	$(".limpiacarroumsa").off("click");
	$(".limpiacarroumsa").on("click", function(e) {
		var encargado = $('#encargado').val();
		$.ajax({
			url: '../Controller/ProductoControllerCarta.php?page=4',
			type: 'post',
			data: {'encargado':encargado},
			dataType: 'json',
			success: function(data) {
				if(data.success==true){
					//$("#cantidad").val('');
					alertify.success(data.msj);
					$(".detalle-producto").load('../php/1_detalle_ventaumsa.php');
					location.reload();
				}else{
					alertify.error(data.msj);
				}
			},
			error: function(jqXHR, textStatus, error) {
				alertify.error(error);
			}
		});				
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
		$('#registra-producto').modal({
			show:true,
			backdrop:'static'
		});
	});
	
	$('#bsss-prod').on('keyup',function(){
		var dato = $('#bs-prod').val();
		var url = '../php/a_busca_ventas.php';
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
	
	$('#bs-prod').on('change', function(){
		var dato = $('#bs-prod').val();
		var url = '../php/1_busca_ventas.php';
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



	//$( "#other" ).click(function() {
//  		$( "#target" ).focus();
	//});
	
	
	
	
});

function reportePDFF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../php/productos.php?desde='+desde+'&hasta='+hasta);
}


function agregaRegistro(){
	var url = '../php/agrega_producto.php';
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



function eliminarProducto(id){
	var url = '../php/elimina_producto.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Producto?');
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



function editarProducto(id){
	$('#formulario')[0].reset();
	var url = '../php/1_edita_carta.php';
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
			//	$('#nreg').val(datos[0]);
				$('#codigo').val(datos[0]);
				$('#descrip').val(datos[1]);
				$('#pventa').val(datos[3]);
				$('#saldo').val(datos[6]);

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


function mostrarfoto(id){
	
	var url = '1_ver_foto.php';
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


function mostrarIngreso(norden){
//window.open('../php/a_pdf_ventas.php?noredn='+norden+'&nfac='+nfac, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=70,left=500,width=500,height=600");
window.open('../php/z_pdf_ocompra.php?norden='+norden, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=70,left=500,width=700,height=600");
//$(location).attr('href','z_activosing.php');
//location.reload();

}




function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../php/productos.php?desde='+desde+'&hasta='+hasta);
}

function pagination(partida){
	$("#bs-prod").val('');

	var url = '../php/1_paginarventa.php';

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