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

    $(".btn-agregar-ote").off("click");
	$(".btn-agregar-ote").on("click", function(e) {
		var pregunta = confirm('¿Esta seguro .uddd.Finalizo..?');
		var detar = $("#detar").val(); // codigo del servicio
		var codd = $("#codd").val(); // codigo del servicio
		var peu = $("#peu").val(); // codigo del servicio
		var cantt = $("#cantt").val(); // codigo del servicio
		var cost = $("#cost").val(); // codigo del servicio
		var codrepx = $("#codrepx").val(); // codigo del servicio
		var sto = $("#sto").val(); // codigo del servicio
		var imbs = $("#imbs").val(); // codigo del servicio

		var tcax = $("#tca").val(); // codigo del servicio

//		var saldo =Number( $("#saldo").val()); // codigo del servicio
		//var tipop= ($('input[name="tipop"]:checked', '#formulario').val()); 
	//	if(servicio_id!=0){

		//	if(cantidad<=saldo){
				$.ajax({
					url: '../Controller/Controllerjca.php?page=22',
					type: 'post',
					data: {'codrepx':codrepx, 'detar':detar,'codd':codd,'peu':peu,'cantt':cantt, 'cost':cost,'sto':sto,'tca':tcax,'imbs':imbs},
					dataType: 'json',
					success: function(data) {
						var pregunta = confirm('¿Esta seguro ..Finalizo..?');
						if(data.success==true){
							alertify.success(data.msj);
							$("#agrega-solicitud").load('../php/jc_detalleSolici3.php');
							//$('#formulario')[0].reset();
							$("#detar").val('');
							$("#codd").val('');
							$("#peu").val('0');
							$("#cantt").val('1');
							$("#cost").val('0');
							$("#sto").val('0');



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

	$(".eliminar-producto").off("click");
	$(".eliminar-producto").on("click", function(e) {
		var id = $(this).attr("id");
		$.ajax({
			url: '../Controller/Controllerjca.php?page=2',
			type: 'post',
			data: {'id':id},
			dataType: 'json'
		}).done(function(data){
			if(data.success==true){
				alertify.success(data.msj);
				$("#agrega-solicitud").load('../php/jc_detalleSolici3.php');

			}else{
				alertify.error(data.msj);
			}
		})
	});


	$("#btn-GuardaVale").off("click");
	$("#btn-GuardaVale").on("click", function(e) {
		//var pregunta = confirm('¿LLEGO guardar ..Finalizo..?');

		var nordenx = $('#nordenx').val();
		var tcax = $('#tca').val();
		var feax = $('#fea').val();
		
		
		$.ajax({
			url: '../Controller/Controllerjca.php?page=35',
			type: 'post',
			data: {'nordenx':nordenx,'tcax':tcax,'feax':feax},
			dataType: 'json',
			success: function(data) {
				if(data.success==true){
				//	$("#nomb").val('');
				//	$("#areaa").val('');
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

    $('#ootes').autocomplete({
        source : 'ajaxjca.php?type=3',
        select : function(event, ui){
                      $('#codotex').val(ui.item.codotex);
                      $('#nomote').val(ui.item.detotex);
                    //  $('#ume').val(ui.item.umedx);
                    //  $('#codrepx').val(ui.item.codrepx);
        }
     });

	 $('#notec').autocomplete({
        source : 'ajaxjca.php?type=4',
        select : function(event, ui){
                      $('#codigotecx').val(ui.item.codtecx);
                    //  $('#ume').val(ui.item.umedx);
                    //  $('#ume').val(ui.item.umedx);
                    //  $('#codrepx').val(ui.item.codrepx);
        }
	 });
	 	 
	$('#detar').autocomplete({
        source : 'ajaxjca.php?type=1',
        select : function(event, ui){
                     $('#codd').val(ui.item.codigox);
                     $('#cost').val(ui.item.costox);
                     $('#sto').val(ui.item.saldox);
                     $('#peu').val(ui.item.punitx);

                     $('#codrepx').val(ui.item.codrepx);
        }
     });

     $('#notec').autocomplete({
        source : 'ajaxjca.php?type=4',
        select : function(event, ui){
                      $('#codigotecx').val(ui.item.codtecx);
                    //  $('#ume').val(ui.item.umedx);
                    //  $('#ume').val(ui.item.umedx);
                    //  $('#codrepx').val(ui.item.codrepx);
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