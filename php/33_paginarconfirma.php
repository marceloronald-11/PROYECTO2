<?php
	include('conexion.php');
	//require_once '../Config/conexion.php';
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM movimtot"));
    $nroLotes = 4;
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

  	$registro = mysqli_query($conexion,"SELECT * FROM movimtot LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered">
			            <tr>
			                <th width="15%">Solicitante</th>
							<th width="10%">Fecha Ing.</th>
			                <th width="3%">No Orden</th>
			                <th width="5%">Importe</th>
			                <th width="5%">Item</th>
			                <th width="7%">Opcion</th>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td>'.$registro2['afavor'].'</td>
							<td>'.$registro2['fechato'].'</td>
							<td>'.$registro2['norden'].'</td>
							<td>'.$registro2['totimporte'].'</td>
							<td>'.$registro2['itm'].'</td>
							<td><a href="javascript:editarActivo('.$registro2['codar'].');" class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Editar Datos"></a>
							 <a href="javascript:eliminarActivo('.$registro2['codar'].');" class="glyphicon glyphicon-remove-circle" data-toggle="tooltip" title="Eliminar Registro"></a>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>