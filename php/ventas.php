$(function(){
	
	$('#ingresar').on('click',function(){
		var usu = $('#usu').val();
		var pass = $('#pass').val();
		var area = $('#area').val();
		var url='php/procesar_login.php';
		var total = usu.length * pass.length * area.length;
		if (total>0){
			$.ajax({
				type: 'POST',
				url: url,
				data: 'usu='+usu+'&pass='+pass+'&area='+area,
				success: function(valor){
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
						document.location.href = 'php/z_inicio1.php';
					}else if(valor == 'operador'){
						document.location.href = 'php/z_operador.php';
					}else if(valor == 'almacen'){
						document.location.href = 'php/z_almacen.php';
					}else if(valor == 'sucursal'){
						document.location.href = 'php/z_sucursal.php';
					}else if(valor == 'movil'){
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