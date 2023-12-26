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

function agregaSolicitudd(){
	var url = '../php/crm_agrega_Solicitudd.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario2').serialize(),
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

function agregaSoliCodeudor(){
	var url = '../php/crm_agrega_SolicitudCodeu.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario211').serialize(),
		success: function(registro){
			if ($('#pro211').val() == 'Editar'){
			$('#formulario211')[0].reset();
			$('#mensaje211').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			//location.reload();
			return false;
			}else{
			$('#mensaje211').addClass('bien').html('Modificacion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			//location.reload();
			return false;
			}
		}
	});
	return false;
}


function agregaSoliGarante(){
	var url = '../php/crm_agrega_SolicitudGarante.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario212').serialize(),
		success: function(registro){
			if ($('#pro212').val() == 'Editar'){
			$('#formulario212')[0].reset();
			$('#mensaje212').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			//location.reload();
			return false;
			}else{
			$('#mensaje212').addClass('bien').html('Modificacion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			//location.reload();
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
			if ($('#pro3').val() == 'Editar'){
			$('#formulario3')[0].reset();
			$('#mensaje3').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			location.reload();
			return false;
			}else{
			$('#mensaje3').addClass('bien').html('Modificacion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			location.reload();
			return false;
			}
		}
	});
	return false;
}





function VerSoli(id){
	var url = '../php/crm_versolicitudes.php';
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

function DatSoliNueva(id){ //codcli
	$('#formulario2')[0].reset();
	var url = '../php/crm_editaClie.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'idx='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg21').show();
				//$('#edi21').show();
				$('#pro21').val('Registro');
				$('#idper21').val(id);
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



function DatSoli(codsolix,id){
	$('#formulario2')[0].reset();
	var url = '../php/crm_editaClie21.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'codsolix='+codsolix+'&idx='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg21').show();
				//$('#edi21').show();
				$('#pro21').val('Editar');
				$('#idper21').val(id);
				$('#codsoli21').val(codsolix);
			
				$('#solicita21').val(datos[20]);
				$('#ci21').val(datos[21]);
				$('#cel21').val(datos[22]);
				$('#monto21').val(datos[2]);
				$('#puede21').val(datos[3]);
				$('#tiempo21').val(datos[4]);
				$('#inviertira21').val(datos[5]);
				$('#croquisdom21').val(datos[6]);
				$('#cronegocio21').val(datos[7]);
				$('#activi21').val(datos[8]);
				$('#nit21').val(datos[9]);
				$('#nomnegocio21').val(datos[10]);
				$('#dirnegocio21').val(datos[13]);
				$('#datencio21').val(datos[11]);
				$('#empezo21').val(datos[12]);
				//$('#negoes21').val(datos[14]);
				//$('#lug21').val(datos[15]);
				//$('#asalariado21').val(datos[16]);
				$('#empleo21').val(datos[17]);
				//$('#garantia21').val(datos[18]);
				//$('#ogarantia21').val(datos[19]);
			
				var v14 = datos[14];
				if (v14 == "PRO") {
                $('input:radio[name="negoes21"][value="PRO"]').prop('checked', true);
           		 }
				if (v14 == "ALQ") {
                $('input:radio[name="negoes21"][value="ALQ"]').prop('checked', true);
           		 }
				if (v14 == "ANT") {
                $('input:radio[name="negoes21"][value="ANT"]').prop('checked', true);
           		 }			
				if (v14 == "OTR") {
                $('input:radio[name="negoes21"][value="OTR"]').prop('checked', true);
           		 }			
			
				var v15 = datos[15];
				if (v15 == "TIE") {
                $('input:radio[name="lug21"][value="TIE"]').prop('checked', true);
           		 }			
				if (v15 == "CAL") {
                $('input:radio[name="lug21"][value="CAL"]').prop('checked', true);
           		 }			
				if (v15 == "MER") {
                $('input:radio[name="lug21"][value="MER"]').prop('checked', true);
           		 }			
				if (v15 == "OTR2") {
                $('input:radio[name="lug21"][value="OTR2"]').prop('checked', true);
           		 }			
			
				var v16 = datos[16];
				if (v16 == "SI") {
                $('input:radio[name="asalariado21"][value="SI"]').prop('checked', true);
           		 }	
				if (v16 == "NO") {
                $('input:radio[name="asalariado21"][value="NO"]').prop('checked', true);
           		 }	

				var v18 = datos[18];
				if (v18 == "SIG") {
                $('input:radio[name="garantia21"][value="SIG"]').prop('checked', true);
           		 }	
				if (v18 == "NOG") {
                $('input:radio[name="garantia21"][value="NOG"]').prop('checked', true);
           		 }	
			
				var v19 = datos[19];
				if (v19 == "SIO") {
                $('input:radio[name="ogarantia21"][value="SIO"]').prop('checked', true);
           		 }	
				if (v19 == "NOO") {
                $('input:radio[name="ogarantia21"][value="NOO"]').prop('checked', true);
           		 }	
			
				
				$('#modaldatos').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function DatSoli211(codsolix,id){//id=codcli
	$('#formulario211')[0].reset();
	var url = '../php/crm_editaClie211.php';
		$.ajax({
		type:'POST',
		url:url,
		//data:'idx='+id,
		data:'idx='+id+'&codsolix='+codsolix,
		success: function(valores){
				var datos = eval(valores);
				$('#reg211').hide();
				$('#edi211').show();
				$('#pro211').val('Editar');
				$('#idper211').val(id);
				$('#codsolix211').val(codsolix);
 
	 			
				$('#nombre211').val(datos[1]);
				$('#ci211').val(datos[2]);
				$('#cel211').val(datos[3]);
				$('#direcc211').val(datos[4]);
				$('#pariente211').val(datos[5]);
//				$('#actiref211').val(datos[6]);
				$('#croquisdom211').val(datos[7]);
				$('#cronegocio211').val(datos[8]);
				$('#activi211').val(datos[6]);
				$('#nit211').val(datos[9]);
				$('#nomnegocio211').val(datos[10]);
				$('#dirnegocio211').val(datos[11]);
				$('#datencio211').val(datos[12]);
				$('#empezo211').val(datos[13]);
				//$('#negoes211').val(datos[14]);
				//$('#lug211').val(datos[15]);
				//$('#asalariado211').val(datos[16]);
				$('#empleo211').val(datos[17]);
			
				var v14 = datos[14];
				if (v14 == "PRO") {
                $('input:radio[name="negoes211"][value="PRO"]').prop('checked', true);
           		 }	
				if (v14 == "ALQ") {
                $('input:radio[name="negoes211"][value="ALQ"]').prop('checked', true);
           		 }					
				if (v14 == "ANT") {
                $('input:radio[name="negoes211"][value="ANT"]').prop('checked', true);
           		 }					
				if (v14 == "OTR") {
                $('input:radio[name="negoes211"][value="OTR"]').prop('checked', true);
           		 }					
			
			var v15 = datos[15];
				if (v15 == "TIE") {
                $('input:radio[name="lug211"][value="TIE"]').prop('checked', true);
           		 }	
				if (v15 == "CAL") {
                $('input:radio[name="lug211"][value="CAL"]').prop('checked', true);
           		 }					
				if (v15 == "MER") {
                $('input:radio[name="lug211"][value="MER"]').prop('checked', true);
           		 }					
				if (v15 == "OTR2") {
                $('input:radio[name="lug211"][value="OTR2"]').prop('checked', true);
           		 }					
			
				var v16 = datos[16];
				if (v16 == "SI") {
                $('input:radio[name="asalariado211"][value="SI"]').prop('checked', true);
           		 }	
				if (v16 == "NO") {
                $('input:radio[name="asalariado211"][value="NO"]').prop('checked', true);
           		 }			
			
			
				$('#modalcodeudor').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function DatSoli212(codsolix,id){
	$('#formulario212')[0].reset();
	var url = '../php/crm_editaClie212.php';
		$.ajax({
		type:'POST',
		url:url,
		//data:'idx='+id,
		data:'idx='+id+'&codsolix='+codsolix,	
		success: function(valores){
				var datos = eval(valores);
				$('#reg212').hide();
				$('#edi212').show();
				$('#pro212').val('Editar');
				$('#idper212').val(id);
				$('#codsolix212').val(codsolix);
 
	 			
				$('#nombre212').val(datos[1]);
				$('#ci212').val(datos[2]);
				$('#cel212').val(datos[3]);
				$('#direcc212').val(datos[4]);
				$('#pariente212').val(datos[5]);
//				$('#actiref212').val(datos[6]);
				$('#croquisdom212').val(datos[7]);
				$('#cronegocio212').val(datos[8]);
				$('#activi212').val(datos[6]);
				$('#nit212').val(datos[9]);
				$('#nomnegocio212').val(datos[10]);
				$('#dirnegocio212').val(datos[11]);
				$('#datencio212').val(datos[12]);
				$('#empezo212').val(datos[13]);
//				$('#negoes212').val(datos[14]);
//				$('#lug212').val(datos[15]);
//				$('#asalariado212').val(datos[16]);
				$('#empleo212').val(datos[17]);			
			
var v14 = datos[14];
				if (v14 == "PRO") {
                $('input:radio[name="negoes212"][value="PRO"]').prop('checked', true);
           		 }	
				if (v14 == "ALQ") {
                $('input:radio[name="negoes212"][value="ALQ"]').prop('checked', true);
           		 }					
				if (v14 == "ANT") {
                $('input:radio[name="negoes212"][value="ANT"]').prop('checked', true);
           		 }					
				if (v14 == "OTR") {
                $('input:radio[name="negoes212"][value="OTR"]').prop('checked', true);
           		 }					
			
			var v15 = datos[15];
				if (v15 == "TIE") {
                $('input:radio[name="lug212"][value="TIE"]').prop('checked', true);
           		 }	
				if (v15 == "CAL") {
                $('input:radio[name="lug212"][value="CAL"]').prop('checked', true);
           		 }					
				if (v15 == "MER") {
                $('input:radio[name="lug212"][value="MER"]').prop('checked', true);
           		 }					
				if (v15 == "OTR2") {
                $('input:radio[name="lug212"][value="OTR2"]').prop('checked', true);
           		 }					
			
				var v16 = datos[16];
				if (v16 == "SI") {
                $('input:radio[name="asalariado212"][value="SI"]').prop('checked', true);
           		 }	
				if (v16 == "NO") {
                $('input:radio[name="asalariado212"][value="NO"]').prop('checked', true);
           		 }						
			
			
			
			
				
				$('#modalgarante').modal({
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

function AprobarSolic(codsoli,id){ //codsoli  codcli
	$('#formulario3')[0].reset();
	var url = '../php/crm_editaSolic.php';
		$.ajax({
		type:'POST',
		url:url,
		//data:'id='+id,
		data:'id='+id+'&codsolix='+codsoli,				
		success: function(valores){
				var datos = eval(valores);
				$('#reg3').hide();
				$('#edi3').show();
				$('#pro3').val('Editar');
				$('#idper3').val(id);
				$('#codsoli3').val(codsoli);
			
			
				$('#nomcli3').val(datos[10]);
				$('#cii3').val(datos[9]);	
				$('#montosoli3').val(datos[1]);	
				$('#montoaprob3').val(datos[11]);	
			
			
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
	var url = '../php/crm_paginarSolicitud.php';
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