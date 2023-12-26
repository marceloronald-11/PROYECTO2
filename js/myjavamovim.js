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
	
	$(".irmodal").click(function(e){
		$("#myModal").modal('show');
	});

	$('#nuevo-producto').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra-personas').modal({
			show:true,
			backdrop:'static'
		});
	});
	
	$('#bs-prod').on('change',function(){
		var dato = $('#bs-prod').val();
		var url = '../php/z_busca_cliente.php';
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
	var url = '../php/z_agrega_clientemov.php';
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
			$(location).attr('href','z_movim1.php');
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

function agregaRegistroMen(){
	var url = '../php/z_agrega_clientemovv.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario1').serialize(),
		success: function(registro){
			if ($('#pro1').val() == 'Registro'){
			$('#formulario1')[0].reset();
			$('#mensaje1').addClass('bien').html('Se Registro con exito').show(200).delay(2500).hide(200);
			$('#pro').val('Registro'); ////// solo debemos añadir este codigo para mantener REGISTRO
			//$('#pre1').val(''); ////// solo debemos añadir este codigo para mantener REGISTRO

			$('#agrega-registros').html(registro);
			$(location).attr('href','z_movim1.php');
			//location.reload();
			return false;
			}else{
			$('#mensaje1').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			//return false;
			}
		}
	});
	return false;
}


function agregaRegistro1(){
	var url = '../php/z_agrega_clientemov1.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario1').serialize(),
		success: function(registro){
			if ($('#pro1').val() == 'Registro'){
			$('#formulario1')[0].reset();
			$('#mensaje1').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#pro1').val('Registro'); ////// solo debemos añadir este codigo para mantener REGISTRO
			$('#agrega-registros').html(registro);
			$(location).attr('href','z_movim1.php');
			return false;
			}else{
			$('#mensaje1').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}
		}
	});
	return false;
}


function VerCaja(id){
	$('#formulario')[0].reset();
	var url = '../php/z_edita_clientegym.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').show();
				$('#edi').hide();
				$('#pro').val('Registro');
				$('#idper').val(id);
				$('#cli').val(datos[0]);
				//$('#observ').val(datos[8]);


				$('#registra-personas').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}


function PagoMes(id){
	$('#formulario1')[0].reset();
	var url = '../php/z_edita_clientegym.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg1').show();
				$('#edi1').hide();
				$('#pro1').val('Registro');
				$('#idper1').val(id);
				$('#cli1').val(datos[0]);
				//$('#observ1').val(datos[8]);


				$('#registra-mes').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}




function VerCaja2(){
	$('#formulario1')[0].reset();
				$('#GymVarios').modal({
					show:true,
					backdrop:'static'
				});
	return false;
}

function editarCliente(id){
	$('#formulario')[0].reset();
	var url = '../php/z_edita_cliente.php';
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
				$('#nomb').val(datos[0]);
				$('#ci').val(datos[1]);
				$('#cod').val(datos[2]);
				$('#fenac').val(datos[3]);
				$('#edad').val(datos[4]);
				//$('#sex').val(datos[10]);
				$('#dire').val(datos[5]);
				$('#cel').val(datos[6]);
				$('#email').val(datos[7]);
				$('#observ').val(datos[8]);

				if (datos[10] == "M") {
                $('input:radio[name="sex"][value="M"]').prop('checked', true);
	            }
            	else if (datos[10] == "F") {
               	 	$('input:radio[name="sex"][value="F"]').prop('checked', true);
            	}


				$('#registra-personas').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}


function eliminarActivo(id){
	var url = '../php/z_elimina_cliente.php';
	var pregunta = confirm('¿Esta seguro de eliminar a este Cliente?');
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


function mostrarfoto(id){
	
	var url = 'z_ver_fotoactivos.php';
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
	
	var url = 'z_ver_fotoac.php';
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

function HistoriaPdf(idx){
//	var desde = $('#bd-desde').val();
//	var hasta = $('#bd-hasta').val();
	window.open('../php/z_histopdf.php?iidcli='+idx);
}


function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../php/productos.php?desde='+desde+'&hasta='+hasta);
}

function reportePDF(){
//	var ido=id;
//	var desde = $('#bd-desde').val();
//	var hasta = $('#bd-hasta').val();
	window.open('../php/z_pdf_personas.php');

}
function pagination(partida){
	var url = '../php/z_paginarrmovim.php';
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