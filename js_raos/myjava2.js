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
					}else if(valor == 'usuarios'){
						document.location.href = 'php/z_inicio2.php';
					}else if(valor == 'admin1'){
						document.location.href = 'php/z_inicio3.php';
					}else if(valor == 'admin2'){
						document.location.href = 'php/z_inicio4.php';

					}


				}
			});
			return false;
		}else{
			$('#mensaje').addClass('error').html('Complete todos los campos').show(300).delay(3000).hide(300);
		}
	});
	
});