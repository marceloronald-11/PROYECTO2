$(document).ready(pagination(1));
$(function(){


	$('#nomb').autocomplete({
        source : 'ajaxjca.php?type=2',
        select : function(event, ui){
					 $('#areaa').val(ui.item.detarea3);
					 $('#carg').val(ui.item.detcargo3);
					 $('#codareax').val(ui.item.codarea3);
					 $('#codcargox').val(ui.item.codcargo3);
					 $('#codsolix').val(ui.item.codsoli3);


        }
     });

	 $("#nuevoCriticoo").off("click");
	 $("#nuevoCriticoo").on("click", function(e) {
		//var pregunta = confirm('¿Esta critico.... ?');
		 var codareax = $('#codareax').val();
		 var codcargox = $('#codcargox').val();
		 var codsolix = $('#codsolix').val();

		 $.ajax({
			 url: '../Controller/Controllerjca1.php?page=1',
			 type: 'POST',
			 data: {'codareax':codareax,'codcargox':codcargox,'codsolix':codsolix},
			 dataType: 'json'
		 }).done(function(data){
			 if(data.success==true){
				var pregunta = confirm('SE GENERO CORRECTAMENTE ....');
				 alertify.success(data.msj);
				 //$(".detalle-producto").load('../php/detalle1.php');
			 }else{
				 alertify.error(data.msj);
			 }
		 })
	 });


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
	
    $('#lb2').on('change', function(){
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
	
	
    $('#lb3').on('change', function(){
		var id = $('#lb3').val();
		var url = '../php/c_buscacombo3.php';

		$.ajax({
			type:'POST',
			url:url,
			data:'id='+id,
			success: function(data){
				$('#lb4 option').remove();
				$('#lb4').append(data);
			}
		});
		return false;
	});


	

	$('#lb3').on('click', function(){
		var id3 = $('#lb3').val();
		var url = '../php/edi3.php';
		$.ajax({
			type:'POST',
			url:url,
			data:'id3='+id3,
			success: function(data){
				var datos = eval(data);
				$('#maqq1').val(datos[1]);
			}
		});
		return false;
	});	


	$('#lb4').on('click', function(){
		var id4 = $('#lb4').val();
		var url = '../php/edi4.php';
		$.ajax({
			type:'POST',
			url:url,
			data:'id4='+id4,
			success: function(data){
				var datos = eval(data);
				$('#ele1').val(datos[1]);

				var d1 = $('#ccosto1').val();
				var d2 = $('#procc1').val();
				var d3 = $('#maqq1').val();
				var d4 = $('#ele1').val();
	
				var tdt=d1+'.'+d2+'.'+d3+'.'+d4+'.';
				$('#codauto').val(tdt);



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
    
    $('#nuevoCritico').on('click', function(){
        //var pregunta = confirm('¿Esta critico.... ?');
		var id3 ='';// $('#lb3').val();
		var url = '../php/jc_procesarAlm.php';
		$.ajax({
			type:'POST',
			url:url,
			data:'id3='+id3,
			success: function(data){
                var pregunta = confirm('¿Proceso Correcto.... ?');
			//	var datos = eval(data);
			//	$('#maqq1').val(datos[1]);
			}
		});
		return false;
	});	

	$('.bs-prod').on('change',function(){
		var dato = $('.bs-prod').val();
		var url = '../php/jc_busca_repu.php';
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

function agregaRegistroar(){
	var url = '../php/jc_agrega_repu.php';
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



function agregaRegistroRep(){
	var url = '../php/jc_agrega_repuesto.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulariore').serialize(),
		success: function(registro){
			if ($('#pro1').val() == 'Registro'){
			$('#formulariore')[0].reset();
			$('#mensaje1').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			location.reload();
			return false;
			}else{
			$('#mensaje1').addClass('bien').html('Modificacion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			location.reload();
			return false;
			}
		}
	});
	return false;
}




function eliminaRepxxx(id){
	var url = '../php/jc_eliminaRep.php';
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


function editarRepu(id){
	$('#formulariore')[0].reset();
	var url = '../php/jc_editaRepu.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				 $('#reg1').hide();
				 $('#edi1').show();
				 $('#pro1').val('Editar');
				 $('#idrep1').val(id);
				 $('#nomrep').val(datos[0]);
				 $('#umm').val(datos[11]);
				 $('#npar1').val(datos[12]);
				 $('#ubi1').val(datos[13]);
				 $('#espe1').val(datos[14]);
				 $('#cossto1').val(datos[15]);
				 $('#sal1').val(datos[16]);
				 $('#salcr').val(datos[17]);
				
				$('#Modal-repu').modal({
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
	var url = '../php/jc_paginarAlmacen1.php';
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