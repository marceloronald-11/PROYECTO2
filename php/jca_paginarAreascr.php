<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM personal AS pe LEFT JOIN cargo AS ca ON pe.codcargo=ca.codcargo  LEFT JOIN areas AS ar ON pe.codarea=ar.codarea"));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM personal AS pe LEFT JOIN cargo AS ca ON pe.codcargo=ca.codcargo  LEFT JOIN areas AS ar ON pe.codarea=ar.codarea  LIMIT $limit, $nroLotes ");

  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover titi">
			            <tr>
			                <td width="15%">Nombre</td>
			                <td width="15%">Direccion</td>
			                <td width="9%">Cel/Telf.</td>
			                <td width="9%">Correo</td>
			                <td width="9%">No CI</td>
			                <td width="9%">No Cargo</td>
			                <td width="9%">No Area</td>

							<td width="9%">Observaciones</td>
			                <td width="5%">Imagen</td>
							<td width="15%">Opciones</td>

			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
	
	
		$tabla = $tabla.'<tr>
							<td><a href="javascript:editarPer('.$registro2['codper'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['nombreper'].'</a></td>
							<td>'.$registro2['direccper'].'</td>
							<td>'.$registro2['celper'].'</td>
							<td>'.$registro2['emailper'].'</td>
							<td>'.$registro2['ciper'].'</td>
							<td>'.$registro2['detcargo'].'</td>
							<td>'.$registro2['detarea'].'</td>

							<td>'.$registro2['observper'].'</td>
							<td><a href="javascript:mostrarfoto('.$registro2['codper'].');" ><img src="'.$registro2['fotoper'].'"width="30" height="30"> </a></td>
							<td> <a href="javascript:eliminaPer('.$registro2['codper'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>