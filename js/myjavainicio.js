$(function(){
	
	$('#ingresando').on('click',function(){
		
		var usu = $('#usu').val();
		var pass = $('#pass').val();
		//var area = $('#area').val();
		//var url='php/procesar_login2.php';
		var url='php/procesar_login2.php';

		var total = usu.length * pass.length ;
		if (total>0){
			$.ajax({
				type: 'POST',
				url: url,
				data: 'usu='+usu+'&pass='+pass,
				success: function(valor){
					//var pregunta = confirm('Are you sure you want to delete this....'  ) ;
					
					if(valor == 'usuario'){
						$('#mensaje').addClass('error').html('El usuario ingresado no existe').show(300).delay(3000).hide(300);
						$('#usu').focus();
						return false;
					}else if(valor == 'area'){
						$('#mensaje').addClass('error').html('Usted no pertenece al area seleccionada').show(300).delay(3000).hide(300);
						$('#area').focus();
						return false;
					}else if(valor == 'password'){
						$('#mensaje').addClass('error').html('Su password es incorrecto').show(300).delay(3000).hide(300);
						$('#pass').focus();
						return false;
					}else if(valor == 'admin'){
						document.location.href = 'php/far_inicio1.php';
					}else if(valor == 'operador'){
						document.location.href = 'php/z_almacen.php';
					}else if(valor == 'sucursal'){
						document.location.href = 'php/z_movil.php';
					}else if(valor == 'vendedor'){
						document.location.href = 'php/z_vendedor.php';
					}else if(valor == 'cobrador'){
						document.location.href = 'php/z_cobrador.php';
					}else if(valor == 'compras'){
						document.location.href = 'php/z_compras.php';
					}else if(valor == 'ventas'){
						document.location.href = 'php/z_ventas.php';
						
					}


				}
			});
			return false;
		}else{
			$('#mensaje').addClass('error').html('Complete todos los campos').show(300).delay(3000).hide(300);
			return false;
		}
	});
	
});