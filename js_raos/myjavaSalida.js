$(document).ready();

	 
$(function(){

				$('#desart').autocomplete({
                   source : 'ajaxactivo.php?type=1',
                   select : function(event, ui){
					   			$('#idcodx').val(ui.item.codarx);
								$('#cant').val('1');
								$('#sal').val(ui.item.saldox);
								$('#um').val(ui.item.umedx);
								$('#pneto').val(ui.item.pnetoarx);
								//$('#codigoxx').val(ui.item.codigox);
								
								$( "#cant" ).focus();
                   }
                });

	$(".btn-agregar-producto2").off("click");
	$(".btn-agregar-producto2").on("click", function(e) {
		var cantidad = Number($("#cant").val());
		var producto_id = $("#idcodx").val();
		var pneto = $("#pneto").val();
		var saldo = Number($("#saldo").val());
		//var codigoxx = $("#codigoxx").val();
		
var ant = $("#mtt").val();
var res = (Number(pneto) * Number(cantidad))+Number(ant) ;
res = res.toFixed(2);
$("#mtt").val(res);
	
		//var cantidad = $("#cantidad").val();

	//	if(!$("#facsino").is(":checked")){
	//		var fac='NO';
    //	}else{
	//		var fac='SI';		
	//	}
		
		if(producto_id!=0){
			//if(cantidad<=saldo){
			//if(cantidad<100000){
				$.ajax({
					url: '../Controller/ControladorVentas.php?page=1',
					type: 'post',
					data: {'producto_id':producto_id, 'cantidad':cantidad, 'pneto':pneto},
					dataType: 'json',
					success: function(data) {
						if(data.success==true){
							//location.reload();
							$("#cant").val('1');
							$("#desart").val('');
							$("#idcodx").val('');
							$("#pneto").val('');
							$("#codigoxx").val('');

							$("#desart" ).focus();

							alertify.success(data.msj);
							$(".detalle-producto").load('../php/aa_detalle_compra.php');
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
			//}else{
			//	alertify.error('STOCK INSUFICIENTE...');
			//}
		}else{
			alertify.error('Seleccione un producto o Articulo');
		}
	});



	$(".guardar-salida").off("click");
	$(".guardar-salida").on("click", function(e) {
		var respo = $('#respo').val();
		var idusu = $('#idusu').val();
		var fechav = $('#fecha').val();
		var nsuc = $('#nsuc').val();
	
//		if(!$("#facsino").is(":checked")){
//			var fac='NO';
 //   	}else{
//			var fac='SI';		
//		}
		$.ajax({
			url: '../Controller/ControladorVentas.php?page=5',
			type: 'post',
			data: {'idusu':idusu,'respo':respo,'fechav':fechav,'nsuc':nsuc},
			dataType: 'json',
			success: function(data) {

				if(data.success==true){
					location.reload();
					$("#respo").val('');
					$("#idusu").val('');

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

	$(".limpiaNota").off("click");
	$(".limpiaNota").on("click", function(e) {
		var respo = $('#respo').val();

		$.ajax({
			url: '../Controller/ControladorVentas.php?page=3',
			type: 'post',
			data: {'respo':respo},
			dataType: 'json',
			success: function(data) {
				if(data.success==true){
					$("#mtt").val('');
					alertify.success(data.msj);
					
					$(".detalle-producto").load('../php/aa_detalle_compra.php');
				}else{
					alertify.error(data.msj);
				}
			},
			error: function(jqXHR, textStatus, error) {
				alertify.error(error);
			}
		});				
	});

	$(".eliminar-producto").off("click");
	$(".eliminar-producto").on("click", function(e) {
		var id = $(this).attr("id");
		var subx = $(this).attr("subx");

		var ant = $("#mtt").val();
var res = (Number(ant) - Number(subx)) ;
res = res.toFixed(2);
$("#mtt").val(res);

		
		$.ajax({
			url: '../Controller/ControladorVentas.php?page=4',
			type: 'post',
			data: {'id':id},
			dataType: 'json'
		}).done(function(data){
			if(data.success==true){
				alertify.success(data.msj);
				$(".detalle-producto").load('../php/aa_detalle_compra.php');
			}else{
				alertify.error(data.msj);
			}
		})
	});





	

	






$( ".sale" ).click(function() {
  $( "#bs-prod" ).focus();
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
window.open('../php/aa_pdf_boletaing.php?norden='+norden, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=70,left=500,width=700,height=600");
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