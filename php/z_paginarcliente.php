<?php
	include('conexion.php');
	//require_once '../Config/conexion.php';
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM clientes"));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM clientes LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered tam">
			            <tr>
			                <th width="200">Cliente </th>
			                <th width="100">No Carnet</th>
			                <th width="100">Codigo</th>
							<th width="40">Ingreso</th>
			                <th width="40">Edad</th>
			                <th width="40">Sexo</th>
			                <th width="90">Telf/Cel.</th>
			                <th width="60">Observ.</th>
							<th width="50">Imagen</th>
			                <th width="50">Opcion</th>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td>'.$registro2['nombre'].'</td>
							<td>'.$registro2['ci'].'</td>
							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['feing'].'</td>
							<td>'.$registro2['edad'].'</td>
							<td>'.$registro2['sexo'].'</td>
							<td>'.$registro2['cel'].'</td>
							<td>'.$registro2['observcli'].'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>	
							<td><a href="javascript:editarCliente('.$registro2['idcli'].');" class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Editar Datos"></a> <a href="javascript:eliminarActivo('.$registro2['idcli'].');" class="glyphicon glyphicon-remove-circle" data-toggle="tooltip" title="Eliminar Registro"></a> <a href="javascript:mostrarfotocarga('.$registro2['idcli'].');" class="glyphicon glyphicon-download-alt" data-toggle="tooltip" title="Subir Imagen"></a> <a href="javascript:mostrarfoto('.$registro2['idcli'].');" class="glyphicon glyphicon-picture" data-toggle="tooltip" title="Ver Imagen"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>