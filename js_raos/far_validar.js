$(document).ready();
$(function(){
	
	$.validator.addMethod('latinos',function(value,element){
		var numeros = /^[0-9]+$/;
		var letras = /^[a-zA-Z]+$/;
		var correo = /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/;
		var password = /^([a-z]+[0-9]+)|([0-9]+[a-z]+)/i;
		var fecha = /^([0-9]{2}\/[0-9]{2}\/[0-9]{4})$/;		
		var nufloat = /^[+-]?\d+(\.\d+)?$/; 
		var del1al50 = /(^[1-9]{1}$|^[1-4]{1}[0-9]{1}$|^50$)/gm;
		var dateDDMMYYYRegex = /^(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](19|20)\d\d$/;
		var codigo=/\d{5}(-\d{4})/;

		return this.optional(element)|| codigo.test(value);
	});
	
	$('#envia').on('click',function(){
		$('#formulario').validate({
			rules:
			{
				ema:{required:true,email:true,minlength:5}, //email funcion validate
				nume:{required:true,digits:true,minlength:4,maxlength:6},
				lat:{required:true,latinos:true} //latinos expresion personalizada
			
			},
			messages:
			{
				ema:{required:' campo requerido',email:' No es un email @',minlength:' Minimo 5 caracteres'},
				nume:{required:' numero',digits:' Minimo 10 digitos'},
				lat:{required:' Requiere Dato',latinos:' Solo enteros o decimales'}

			}
			
			
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
	var url = '../php/far_agrega_cliente.php';
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



function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../php/productos.php?desde='+desde+'&hasta='+hasta);
}

function pagination(partida){
	var url = '../php/far_paginarClientes.php';
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