$(document).ready(pagination(1));
	 
$(function(){


	$(".btn-agregar-producto").off("click");
	$(".btn-agregar-producto").on("click", function(e) {
		var cantidad = Number($("#cantidad").val());
		var producto_id = $("#id-prod").val();
		var pventa = $("#pventa").val();
		var saldo = Number($("#saldo").val());
	//	var dcto = $("#dcto").val();

	//	var tipodoc= ($('input[name="arch"]:checked', '#formulario').val());

		
		if(producto_id!=0){
			if(cantidad>0 && pventa>0){
				$.ajax({
					url: '../Controller/ProductoController1.php?page=11',
					type: 'post',
					data: {'producto_id':producto_id, 'cantidad':cantidad, 'pventa':pventa},
					dataType: 'json',
					success: function(data) {
						if(data.success==true){
							$("#cantidad").val('');
							alertify.success(data.msj);
							$(".detalle-producto").load('../php/33_detalle_cotiza.php');
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
				alertify.error('CANTIDAD INCORRECTA!!...');
			}
		}else{
			alertify.error('Seleccione un producto');
		}
	});
	

	


	$(".btn-agregar-producto2").off("click");
	$(".btn-agregar-producto2").on("click", function(e) {
		var cantidad = Number($("#cantidad").val());
		var producto_id = $("#id-prod").val();
		var pventa = $("#pventa").val();
		var saldo = Number($("#saldo").val());
		
		if(!$("#sino").is(":checked")){
			var dcto='NO';
    	}else{
			var dcto='SI';		
		}
		
		if(!$("#facsino").is(":checked")){
			var fac='NO';
    	}else{
			var fac='SI';		
		}
		
		if(producto_id!=0){
			if(cantidad<=saldo){
				$.ajax({
					url: '../Controller/ProductoController1.php?page=1',
					type: 'post',
					data: {'producto_id':producto_id, 'cantidad':cantidad, 'pventa':pventa, 'dcto':dcto, 'fac':fac},
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
			}else{
				alertify.error('STOCK INSUFICIENTE...');
			}
		}else{
			alertify.error('Seleccione un producto');
		}
	});





	$(".eliminar-producto").off("click");
	$(".eliminar-producto").on("click", function(e) {
		var id = $(this).attr("id");
		$.ajax({
			url: '../Controller/ProductoController1.php?page=2',
			type: 'post',
			data: {'id':id},
			dataType: 'json'
		}).done(function(data){
			if(data.success==true){
				alertify.success(data.msj);
				$(".detalle-producto").load('../php/detalle1.php');
			}else{
				alertify.error(data.msj);
			}
		})
	});
	
	
	$(".irmodal").click(function(e){
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

	$(".guardar-carrito3").off("click");
	$(".guardar-carrito3").on("click", function(e) {
		var nnota = $('#nnota').val();
		var observ = $('#observ').val();
		var idusu = $('#idusu').val();
		$.ajax({
			url: '../Controller/ProductoController1.php?page=33',
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

	$(".guardar-carrito33").off("click"); // USANDO ENCOMPRAS DE ARTICULOS DMO
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
					location.reload();
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

	$(".guardar-transf").off("click"); // USANDO EN cotizacion DE ARTICULOS DMO
	$(".guardar-transf").on("click", function(e) {
		var nnota = $('#nnota').val();
		var observ = $('#observ').val();
		var idusu = $('#idusu').val();
	//	var nproff = $('#nproff').val();
		var clasem = $('#clasemov').val();
		var adepto = $('#iidepto').val();
		//var dr = $('#dr').val();
	//	var paciente = $('#paciente').val();
	//	var telf = $('#telf').val();
		

		//var pregunta = confirm('¿esta en 34?');
		$.ajax({
			url: '../Controller/ProductoController1.php?page=8',
			type: 'post',
			data: {'observ':observ,'nnota':nnota,'idusu':idusu,'clasemov':clasem,'adepto':adepto},
			dataType: 'json',
			success: function(data) {
				if(data.success==true){
					location.reload();
					$("#observ").val('');
					$("#idusu").val('');

					alertify.success(data.msj);
					$(".detalle-producto").load('../php/detalle_proforma.php');
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
			url: '../Controller/ProductoController1.php?page=4',
			type: 'post',
			data: {'encargado':encargado},
			dataType: 'json',
			success: function(data) {
				if(data.success==true){
					//$("#cantidad").val('');
					alertify.success(data.msj);
					$(".detalle-producto").load('../php/detalle1.php');
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
	
	$('#bs-prod').on('change',function(){
		var dato = $('#bs-prod').val();
		var url = '../php/33_busca_cotiza.php';
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

function editarProductoxxx(id){
	$('#formulario')[0].reset();
	var url = '../php/edita_producto.php';
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
				$('#nombre').val(datos[0]);
				$('#grupo').val(datos[1]);
				$('#precio-uni').val(datos[2]);
				$('#precio-dis').val(datos[3]);
				$('#marca').val(datos[4]);
				$('#modelo').val(datos[5]);
				$('#serial').val(datos[6]);
				$('#codigo').val(datos[7]);
				//$('#saldo').val(datos[8]);
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



function editarProducto(id){
	$('#formulario')[0].reset();
	var url = '../php/33_edita_articulo.php';
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
				//$('#nreg').val(datos[0]);
				$('#codigo').val(datos[1]);
				$('#descrip').val(datos[2]);
				$('#pventa').val(datos[4]); //de alquiler
				$('#saldo').val(datos[7]);

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






function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../php/productos.php?desde='+desde+'&hasta='+hasta);
}

function pagination(partida){
//	var url = '../php/paginarProductos2016.php';
	var url = '../php/33_paginar_cotiza.php';

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