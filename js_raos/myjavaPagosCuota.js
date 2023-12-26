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
	
});

function agregaRegistroCli(){
	var url = '../php/crm_agrega_Clientes.php';
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

function agregaRegistroCli(){
	var url = '../php/crm_agrega_Clientes.php';
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



function agregaRegistroAprueba(){
	var url = '../php/crm_agrega_Aprueba.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario3').serialize(),
		success: function(registro){
			if ($('#pro3').val() == 'Registro'){
			$('#formulario3')[0].reset();
			$('#mensaje3').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			//location.reload();
			return false;
			}else{
			$('#mensaje3').addClass('bien').html('Modificacion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			//location.reload();
			return false;
			}
		}
	});
	return false;
}





function VerSoli(id){
	var url = '../php/crm_verCuentas.php';
	//var pregunta = confirm('¿Esta seguro de eliminar este Registro ?');
	//if(pregunta==true){
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
//	}else{
//		return false;
//	}
}


function eliminaCli(id){
	var url = '../php/crm_eliminaClie.php';
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

function eliminaDocu(id,cdcli){
	var url = '../php/crm_eliminaDocu.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Registro ?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		//data:'id='+id,
		data:'id='+id+'&cdcli='+cdcli,			
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

function VerDocs(id){
	var url = '../php/crm_verDatos.php';
	//var pregunta = confirm('¿Esta seguro de eliminar este Registro ?');
	//if(pregunta==true){
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
	//}else{
	//	return false;
	//}
}

function DatSoli(id){
	$('#formulario2')[0].reset();
	var url = '../php/crm_editaClie.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg2').hide();
				$('#edi2').show();
				$('#pro2').val('Registro');
				$('#idper2').val(id);
				$('#solicita21').val(datos[0]);
				$('#ci21').val(datos[10]);
				
				$('#modaldatos').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function editarPagar(id){
	$('#formulario10')[0].reset();
	var url = '../php/crm_editaPlann.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
			//	var datos = eval(valores);
			//	$('#reg').hide();
//				$('#edi').show();
//				$('#pro').val('Editar');
//				$('#idper').val(id);
//				$('#nomcli').val(datos[0]);
//				$('#app').val(datos[1]);
//				$('#apm').val(datos[2]);
//				$('#sex').val(datos[3]);
//				$('#cii').val(datos[10]);
//				$('#dircli').val(datos[5]);
//				$('#telcli').val(datos[6]);
//				$('#email').val(datos[7]);
//				$('#observ').val(datos[8]);
				
				$('#ModalPagos').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}




function editarCli(id){
	$('#formulario')[0].reset();
	var url = '../php/crm_editaClie.php';
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
				$('#nomcli').val(datos[0]);
				$('#app').val(datos[1]);
				$('#apm').val(datos[2]);
				$('#sex').val(datos[3]);
				$('#cii').val(datos[10]);
				$('#dircli').val(datos[5]);
				$('#telcli').val(datos[6]);
				$('#email').val(datos[7]);
				$('#observ').val(datos[8]);
				
				$('#sucu-modal').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function AprobarSolic(id){ //codsoli
	$('#formulario3')[0].reset();
	var url = '../php/crm_editaSolic.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg3').hide();
				$('#edi3').show();
				$('#pro3').val('Editar');
				$('#idper3').val(id);
				$('#nomcli3').val(datos[8]);
				$('#cii3').val(datos[9]);				
				$('#modalAprobar').modal({
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
	
	var url = 'crm_verfoto.php';
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

function mostrarfotodoc2(id){ //sisadal
	
	var url = 'crm_verfotodocu.php';
	var pregunta =true;
	if(pregunta==true){
	$('#modalfotodocu').modal({
					show:true,
					backdrop:'static'
				});
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#espacio-foto2').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}

function mostrarfotodoc(id){ //sisadal
	
	var url = 'crm_verdoc.php';
	var pregunta =true;
	if(pregunta==true){
	$('#modalfotodoc').modal({
					show:true,
					backdrop:'static'
				});
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#espacio-foto1').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}





function pagination(partida){
	var url = '../php/crm_paginarPagos.php';
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