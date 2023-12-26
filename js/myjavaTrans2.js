$(document).ready(pagination(1));

	 
$(function(){

	

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

$( ".cierra" ).click(function() {
	var pregunta = confirm('¿Esta seguro de eliminar este Producto?');
  location.reload();
});



	

	
	$(".irmodal").click(function(e){
		$("#nitcli" ).focus();
		$("#myModal").modal('show');
		
	});
	
	
	
	
});

function reportePDFF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../php/productos.php?desde='+desde+'&hasta='+hasta);
}


function agregaRegistroInfo(){
	var url = '../php/aa_agrega_Trans2.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario1').serialize(),
		success: function(registro){
			if ($('#pro2').val() == 'Registro'){
			$('#formulario1')[0].reset();
			$('#mensaje2').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#pro2').val('Registro'); ////// solo debemos añadir este codigo para mantener REGISTRO
			$('#agrega-registros').html(registro);
			return false;
			}else{
			$('#mensaje2').addClass('bien').html('Informe Registrado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}
		}
	});
	return false;
}

function verTra(idu,codsx){
	var partida=1;
	var url = '../php/aa_paginarSub.php';
	$.ajax({
		type:'POST',
		url:url,
		//data:'idu='+idu,
		data:'idu='+idu+'&codsx='+codsx,
		success:function(data){
			var array = eval(data);
			$('#agrega-registros').html(array[0]);
			$('#pagination').html(array[1]);
			//$('#id-prod2').val(array[2]);
		}
	});
	return false;
}

function ConfirmTra(codtx,codarx,codsucx,nordx){
	var partida=1;
	var url = '../php/aa_paginarTf.php';
	$.ajax({
		type:'POST',
		url:url,
		//data:'idu='+idu,
		data:'codtx='+codtx+'&codarx='+codarx+'&codsucx='+codsucx+'&nordx='+nordx,

		success:function(data){
			var array = eval(data);
			$('#agrega-registros').html(array[0]);
			$('#pagination').html(array[1]);
			//$('#id-prod2').val(array[2]);
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



function EditaTra(codtrax){
	$('#formulario1')[0].reset();
	var url = '../php/aa_edita_traa.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'codtrax='+codtrax,
		success: function(valores){
				var datos = eval(valores);
				$('#reg2').hide();
				$('#edi2').show();
				$('#pro2').val('Edicion');
				$('#codx').val(codtrax);
				$('#feent2').val(datos[3]);
				$('#hoent2x').val(datos[4]);
				$('#clienn2').val(datos[5]);
				$('#tcel2').val(datos[8]);

				//json1={"foto":"juannn"};
				$('#modalInfo').modal({
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

	var url = '../php/aa_paginaTraspor2.php';

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