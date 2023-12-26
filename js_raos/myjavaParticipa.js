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
		var url = '../php/crm_busca_participa.php';
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

function agregaCurso(){
	var url = '../php/crm_agrega_curso.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario3').serialize(),
		success: function(registro){
			if ($('#pro3').val() == 'Registro'){
			$('#formulario3')[0].reset();
			$('#mensaje3').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
				$('#sucu-modal3').modal('hide');
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

function agregaArea(){
	var url = '../php/crm_agrega_areaa.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario2').serialize(),
		success: function(registro){
			if ($('#pro2').val() == 'Registro'){
			$('#formulario2')[0].reset();
			$('#mensaje2').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			location.reload();
			return false;
			}else{
			$('#mensaje2').addClass('bien').html('Modificacion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			location.reload();
			return false;
			}
		}
	});
	return false;
}



function agregaRegistroCli(){
	var url = '../php/crm_agrega_participa.php';
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

function eliminaCli(id){
	var url = '../php/crm_eliminaParticipa.php';
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

function eliminaDocu(id,cdcli,codarea1){ //codaa   codalum codarea
	var url = '../php/crm_eliminaArea.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Registro ?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		//data:'id='+id,
		data:'id='+id+'&cdcli='+cdcli+'&cdarea='+codarea1,			
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

function eliminaCurso(id,codal,codare){ //codaa   codalum codarea
	var url = '../php/crm_eliminaCurso.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Registro ?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		//data:'id='+id,
		data:'id='+id+'&codal='+codal+'&cdarea='+codare,			
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



function VerAreas(id){
	var url = '../php/crm_verDatosParticipa.php';
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

function VerCursos(codalumx,codareax){
	var url = '../php/crm_verDatosCurso.php';
	//var pregunta = confirm('¿Esta seguro de eliminar este Registro ?');
	//if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
			
		//data:'id='+id,
		data:'codalum1='+codalumx+'&codarea1='+codareax,			
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

function anadircurso(codaax){
	$('#formulario3')[0].reset();
	var url = '../php/crm_editaParticipa2.php';
	//var pregunta = confirm('¿Esta seguro curso...... ?');
		$.ajax({
		type:'POST',
		url:url,
		//data:'codalu4='+codaluu+'&codarea4='+hasta+'&codaa4='+hasta,			
		data:'id='+codaax,
		success: function(valores){
				//	var pregunta = confirm('¿salio bien...... ?');
				var datos = eval(valores);
				$('#reg3').hide();
				$('#edi3').show();
				$('#pro3').val('Registro');
				$('#idper3').val(codaax);
				$('#nomcli23').val(datos[4]);
				$('#codarea3').val(datos[1]);
				$('#codalum3').val(datos[0]);
				
				$('#sucu-modal3').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}


function anadirpar(id){
	$('#formulario2')[0].reset();
	var url = '../php/crm_editaParticipa.php';
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
				$('#nomcli22').val(datos[0]);
				
				$('#sucu-modal2').modal({
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
	var url = '../php/crm_editaParticipa.php';
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
				$('#cii').val(datos[4]);
				$('#telcli').val(datos[1]);
				$('#email').val(datos[2]);
				$('#coddepx').val(datos[3]);
				
				$('#sucu-modal').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function imprimepar(codalx){
//	var desde = $('#bd-desde').val();
//	var hasta = $('#bd-hasta').val();
//	window.open('../php/productos.php?desde='+desde+'&hasta='+hasta);
	window.open('../php/crm_pdf_participa.php?codalx='+codalx);
	
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
	var url = '../php/crm_paginarParticipa.php';
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