$(document).ready();

	 
$(function(){


				$('#buscar').autocomplete({
                   source : 'ajaxregejem.php?type=1',
                   select : function(event, ui){
						
	
                       $('#resultados').slideUp('slow', function(){
                            $('#resultados').html(
                                '<h4>Detalles del Articulo</h4>' +
								'<img height="100" width="100" src="' + ui.item.foto + '" />' +'<br/>' +
                           //     '<strong>Nombre: </strong>' + ui.item.value + '<br/>' +
                            //    '<strong>Precio: </strong>' + ui.item.precio+ "  "+
							//	'<strong>____ </strong>' + ui.item.umed+ '<br>'+
								'<strong>Observacion :</strong>' + ui.item.observ+ '<br>'+
								'<strong>Saldo Actual :</strong>' + ui.item.existencia
								
								//$(#cantidad).value()=1;
                            );
                       		//var producto = ui.item.codser;
					   			$('#id-ser').val(ui.item.cod_activo);
								$('#cantidad').val('1');
								$('#precio').val(ui.item.stockmin);
								$('#saldo').val(ui.item.existencia);
								$('#umed').val(ui.item.umed);
								
								$( "#cantidad" ).focus();

								//$('#id-prod').val('7');
							
					   });
                       $('#resultados').slideDown('slow');
                   }
                });



				$('#buscar2').autocomplete({
                   source : 'ajaxregejem.php?type=2',
                   select : function(event, ui){
                       $('#resultados').slideUp('slow', function(){
                            $('#resultados').html(
                                '<h4>Detalles del Articulo</h4>'+
								'<img height="100" width="100" src="' + ui.item.foto + '" />' +'<br/>'+
                                '<strong>Nombre: </strong>' + ui.item.value + '<br/>' 
                            //    '<strong>Precio: </strong>' + ui.item.precio+ "  "+
							//	'<strong>____ </strong>' + ui.item.umed+ '<br>'+
							//	'<strong>Observacion :</strong>' + ui.item.observ+ '<br>'+
							//	'<strong>Saldo Actual :</strong>' + ui.item.existencia
								
								//$(#cantidad).value()=1;
                            );
                       		//var producto = ui.item.codser;
					   			//$('#id-ser').val(ui.item.cod_activo);
								//$('#cantidad').val('1');
								$('#cant').val(ui.item.existencia);
								//$('#saldo').val(ui.item.existencia);
								//$('#umed').val(ui.item.umed);
								
								$( "#cant" ).focus();

								//$('#id-prod').val('7');
							
					   });
                       $('#resultados').slideDown('slow');
                   }
                });



	$(".btn-agregar-producto").off("click");
	$(".btn-agregar-producto").on("click", function(e) {
		var cantidad = Number($("#cantidad").val());
		var producto_id = $("#id-prod").val();
		var pventa = $("#pventa").val();
		var saldo = Number($("#saldo").val());
		
		if(producto_id!=0){
		//	if(cantidad<=saldo){
				$.ajax({
					url: '../Controller/ProductoController1.php?page=11',
					type: 'post',
					data: {'producto_id':producto_id, 'cantidad':cantidad, 'pventa':pventa},
					dataType: 'json',
					success: function(data) {
						if(data.success==true){
							$("#cantidad").val('');
							alertify.success(data.msj);
							$(".detalle-producto").load('../php/detalle1.php');
							//location.reload();
								//	$('#registra-producto').modal({
								//	show:hide,
								//	backdrop:'static'
								//	});
							
							
							
						}else{
							alertify.error(data.msj);
						}
					},
					error: function(jqXHR, textStatus, error) {
						alertify.error(error);
					}
				});				
		//	}else{
		//		alertify.error('STOCK INSUFICIENTE...');
		//	}
		}else{
			alertify.error('Seleccione un producto');
		}
	});
	

	


	



	
	
	
});

function reportePDFF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../php/productos.php?desde='+desde+'&hasta='+hasta);
}



function pagination(partida){
	$("#bs-prod").val('');

	var url = '../php/1_paginarventa.php';

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