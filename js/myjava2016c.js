$(document).ready(pagination(1));
	 
$(function(){
	
	$(".btn-agregar-producto").off("click");
	$(".btn-agregar-producto").on("click", function(e) {
		var cantidad = $("#cantidad").val();
		var producto_id = $("#id-prod").val();
		if(producto_id!=0){
			if(cantidad!=0){
				$.ajax({
					url: '../Controller/ProductoController1c.php?page=1',
					type: 'post',
					data: {'producto_id':producto_id, 'cantidad':cantidad},
					dataType: 'json',
					success: function(data) {
						if(data.success==true){
							$("#cantidad").val('');
							alertify.success(data.msj);
							$(".detalle-producto").load('../php/detalle1c.php');
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
			}
		}else{
			alertify.error('Seleccione un producto');
		}
	});
	
	$(".eliminar-producto").off("click");
	$(".eliminar-producto").on("click", function(e) {
		var id = $(this).attr("id");
		$.ajax({
			url: '../Controller/ProductoController1c.php?page=2',
			type: 'post',
			data: {'id':id},
			dataType: 'json'
		}).done(function(data){
			if(data.success==true){
				alertify.success(data.msj);
				$(".detalle-producto").load('../php/detalle1c.php');
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
		var encargado = $('#encargado').val();
		var nnota = $('#nnota').val();

		$.ajax({
			url: '../Controller/ProductoController1c.php?page=3',
			type: 'post',
			data: {'encargado':encargado,'nnota':nnota},
			dataType: 'json',
			success: function(data) {
				if(data.success==true){
					$("#txt_cantidad").val('');
					alertify.success(data.msj);
					$(".detalle-producto").load('../php/detalle1c.php');
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
			url: '../Controller/ProductoController1c.php?page=4',
			type: 'post',
			data: {'encargado':encargado},
			dataType: 'json',
			success: function(data) {
				if(data.success==true){
					//$("#cantidad").val('');
					alertify.success(data.msj);
					$(".detalle-producto").load('../php/detalle1c.php');
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
	
	$('#bs-prod').on('keyup',function(){
		var dato = $('#bs-prod').val();
		var url = '../php/busca_producto2016.php';
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
	var url = '../php/edita_productoc.php';
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

function mostrarfoto(id){
	
	var url = 'ver_foto.php';
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
	var url = '../php/paginarProductos2016c.php';
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