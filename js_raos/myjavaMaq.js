$(document).ready(pagination(1));
$(function(){


    $('#lb1').on('change', function(){
		var id = $('#lb1').val();
		var url = '../php/c_buscacombo.php';

		$.ajax({
			type:'POST',
			url:url,
			data:'id='+id,
			success: function(data){
				$('#lb2 option').remove();
				$('#lb2').append(data);
			}
		});
		return false;
	});

	$('#lb1').on('click', function(){
		var id1 = $('#lb1').val();
		var url = '../php/edi1.php';
		$.ajax({
			type:'POST',
			url:url,
			data:'id1='+id1,
			success: function(data){
				var datos = eval(data);
				$('#ccosto1').val(datos[1]);
			}
		});
		return false;
	});
	

    $('#lb2xxxx').on('change', function(){
		var id = $('#lb2').val();
		var url = '../php/c_buscacombo2.php';

		$.ajax({
			type:'POST',
			url:url,
			data:'id='+id,
			success: function(data){
				$('#lb3 option').remove();
				$('#lb3').append(data);
			}
		});
		return false;
	});
	
	$('#lb2').on('click', function(){
		var id2 = $('#lb2').val();
		var url = '../php/edi2.php';
		$.ajax({
			type:'POST',
			url:url,
			data:'id2='+id2,
			success: function(data){
				var datos = eval(data);
				$('#procc1').val(datos[1]);
			}
		});
		return false;
	});
	


	$('#nuevo-labo').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#labo-modal').modal({
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

function agregaRegistroMqq(){
	var url = '../php/jc_agrega_maq.php';
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
			location.reload();
			return false;
			}
		}
	});
	return false;
}

function eliminaMaq(id){
	var url = '../php/jc_eliminaMaq.php';
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


function editarMaq(id){
	$('#formulario')[0].reset();
	var url = '../php/jc_editaMaq.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Editar');
				$('#idmak').val(id);
				$('#nommaq').val(datos[0]);
				$('#codmaqi').val(datos[1]);
				$('#lb1').val(datos[2]);
				$('#ccosto1').val(datos[3]);
				$('#lb2').val(datos[4]);
				$('#procc1').val(datos[5]);
				
				$('#labo-modal').modal({
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

function pagination(partida){
	var url = '../php/jc_paginarMaq.php';
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