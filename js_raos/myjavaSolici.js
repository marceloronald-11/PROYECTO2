$(document).ready();
$(function(){
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

    $(".btn-agregar-cuenta").off("click");
	$(".btn-agregar-cuenta").on("click", function(e) {
		var detar = $("#detar").val(); // codigo del servicio
		var codd = $("#codd").val(); // codigo del servicio
		var ume = $("#ume").val(); // codigo del servicio
		var cantt = $("#cantt").val(); // codigo del servicio
		var tpri = $("#tpri").val(); // codigo del servicio
		var codrepx = $("#codrepx").val(); // codigo del servicio

//		var saldo =Number( $("#saldo").val()); // codigo del servicio
		//var tipop= ($('input[name="tipop"]:checked', '#formulario').val()); 
	//	if(servicio_id!=0){

		//	if(cantidad<=saldo){
				$.ajax({
					url: '../Controller/Controllerjca.php?page=11',
					type: 'post',
					data: {'codrepx':codrepx, 'detar':detar,'codd':codd,'ume':ume,'cantt':cantt, 'tpri':tpri},
					dataType: 'json',
					success: function(data) {
						//var pregunta = confirm('¿Esta seguro ..Finalizo..?');
						if(data.success==true){
							alertify.success(data.msj);
							$("#agrega-solicitud").load('../php/jc_detalleSolici.php');
							//$('#formulario')[0].reset();
							$("#detar").val('');
							$("#codd").val('');
							$("#ume").val('');
							$("#cantt").val('1');

							$( "#detar" ).focus();
							
						}else{
							alertify.error(data.msj);
						}
					},
					error: function(jqXHR, textStatus, error) {
						alertify.error(error);
					}
				});				
		//	}else{
		//		alertify.error('Stock insuficiente');
		//	}
	//	}else{
		//	alertify.error('Seleccione un producto');
	//	}
	});


	$("#btn-GuardaSoli").off("click");
	$("#btn-GuardaSoli").on("click", function(e) {
		//var pregunta = confirm('¿LLEGO guardar ..Finalizo..?');

		var nombx = $('#nomb').val();
		var areaax = $('#areaa').val();
		
		var carg5 = $('#carg').val();
		var codarea5 = $('#codareax').val();
		var codcargo5 = $('#codcargox').val();
		var codsoli5 = $('#codsolix').val();
		var coddoc5 = $('#coddoc').val();
		var vver5 = $('#vver').val();
		var fea5 = $('#fea').val();
		var fesol5 = $('#fesol').val();
		var nsol5 = $('#nsol').val();


		$.ajax({
			url: '../Controller/Controllerjca.php?page=34',
			type: 'post',
			data: {'nombx':nombx,'areaax':areaax,'carg5':carg5,'codarea5':codarea5,'codcargo5':codcargo5,'codsoli5':codsoli5,'coddoc5':coddoc5,'vver5':vver5,'fea5':fea5,'fesol5':fesol5,'nsol5':nsol5},
			dataType: 'json',
			success: function(data) {
				if(data.success==true){
					$("#nomb").val('');
					$("#areaa").val('');
					//$("#novtax").val('');
					alertify.success(data.msj);
					//$("#agrega-solicitud").load('../php/jc_detalleSolici.php');
					//$('#formulario')[0].reset();
					location.reload();
					//$(".datos").load('../php/datos.php');
				}else{
					alertify.error(data.msj);
				}
			},
			error: function(jqXHR, textStatus, error) {
				alertify.error(error);
			}
		});				
	});



	$('#detar').autocomplete({
        source : 'ajaxjca.php?type=1',
        select : function(event, ui){
                     $('#codd').val(ui.item.codigox);
                     $('#ume').val(ui.item.umedx);
                     $('#ume').val(ui.item.umedx);
                     $('#codrepx').val(ui.item.codrepx);
        }
     });

	 
	 $('#nomb').autocomplete({
        source : 'ajaxjca.php?type=2',
        select : function(event, ui){
                   //  $('#codd').val(ui.item.codigox);
                    // $('#ume').val(ui.item.umedx);
                   //  $('#ume').val(ui.item.umedx);
					 $('#areaa').val(ui.item.detarea3);
					 $('#carg').val(ui.item.detcargo3);
					 $('#codareax').val(ui.item.codarea3);
					 $('#codcargox').val(ui.item.codcargo3);
					 $('#codsolix').val(ui.item.codsoli3);


        }
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

function agregaRegistroCoss(){
	var url = '../php/jc_agrega_coss.php';
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

function eliminaCoss(id){
	var url = '../php/jc_eliminaCoss.php';
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


function editarCoss(id){
	$('#formulario')[0].reset();
	var url = '../php/jc_editaCoss.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Editar');
				$('#idcoss').val(id);
				$('#nomcoss').val(datos[0]);
				$('#codcossi').val(datos[1]);
				
				$('#labo-modal').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function mostrarSolicitud(id){
	window.open('../php/jc_pdf_soli.php?idd='+id, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=70,left=500,width=500,height=600");
	//location.reload();
}

function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../php/productos.php?desde='+desde+'&hasta='+hasta);
}

function pagination(partida){
	var url = '../php/jc_paginarCoss.php';
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