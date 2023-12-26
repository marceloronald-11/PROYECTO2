<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM movimtot WHERE tipo='I'"));
    $nroLotes = 10;
    $nroPaginas = ceil($nroProductos/$nroLotes);
    $lista = '';
    $tabla = '';

    if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';
    }
  
  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}

  	$registro = mysqli_query($conexion,"SELECT * FROM movimtot WHERE tipo='I'  LIMIT $limit, $nroLotes ");

  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="9%" align="center">Fecha</td>
						
			                <td width="15%" align="center">Cliente</td>
							
			                <td width="5%" align="center">No Orden</td>
			                <td width="5%" align="center">No Items</td>
			                <td width="8%"align="center" >Importe</td>
							<td width="8%" align="center">Acciones</td>

			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
	
	
		$tabla = $tabla.'<tr>
							<td align="center">'.$registro2['fechato'].'</td>
							<td>'.$registro2['afavor'].'</td>
							<td align="center">'.$registro2['norden'].'</td>
							<td align="center">'.$registro2['itm'].'</td>
							<td align="right">'.$registro2['totimporte'].'</td>
							<td align="center"> <a href="javascript:ImprimePedido('.$registro2['norden'].');" ><img src="../recursos/impresora.png" data-toggle="tooltip" title="Imprimir Nota"></a> <a href="javascript:VerDocs('.$registro2['norden'].');" ><img src="../recursos/buscar3.png" data-toggle="tooltip" title="Ver Documentos"></a> </td> 
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>