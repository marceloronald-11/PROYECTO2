<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM solicita AS sol LEFT JOIN areas AS ar ON sol.codarea=ar.codarea LEFT JOIN cargo AS ca ON sol.codcargo=ca.codcargo "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM solicita AS sol LEFT JOIN areas AS ar ON sol.codarea=ar.codarea LEFT JOIN cargo AS ca ON sol.codcargo=ca.codcargo LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-bordered titi">
			            <tr>
                            <td width="15%">Nombre</td>
                            <td width="15%">Area</td>
                            <td width="15%">Cargo</td>
			                <td width="10%">Acciones</td>

			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
	
	
		$tabla = $tabla.'<tr>
							<td>'.$registro2['detsolicitante'].'</td>
							<td>'.$registro2['detarea'].'</td>
							<td>'.$registro2['detcargo'].'</td>

                            <td><a href="javascript:editarHe('.$registro2['codsoli'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar "></a>
							 <a href="javascript:eliminaHe('.$registro2['codsoli'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>