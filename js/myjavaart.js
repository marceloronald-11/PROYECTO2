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
	
	$('#bs-prod').on('change',function(){
		var dato = $('#bs-prod').val();
		var url = '../php/aa_busca_articulo.php';
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
	var url = '../php/aa_agrega_articulo.php';
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
			location.reload();
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			location.reload();
			return false;
			}
			location.reload();
		}
	});
	return false;
}

function eliminarProducto(id){
	var url = '../php/aa_elimina_articulo.php';
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
	var url = '../php/aa_edita_articulo.php';
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
				$('#codigo').val(datos[1]);
				$('#descrip').val(datos[2]);
				$('#neto').val(datos[3]);
				$('#pvp').val(datos[4]);
				$('#umed').val(datos[5]);
				$('#tipo').val(datos[8]);
				$('#observ').val(datos[6]);
				$('#tdepto').val(datos[9]);
				
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
	window.open('../php/aa_pdf_salida5.php?idd='+ido);

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
	var url = '../php/aa_paginararticulo.php';
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


