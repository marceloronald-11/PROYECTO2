<?php
if (!isset($_SESSION)) {session_start();}
$coddepx= $_SESSION['depto'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	
	
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM personas AS per JOIN departamento AS dp ON per.coddep=dp.coddep WHERE dp.coddep='$coddepx' "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM personas AS per JOIN departamento AS dp ON per.coddep=dp.coddep WHERE dp.coddep='$coddepx'  LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered">
			            <tr>
			                <th width="200">Nombre</th>
			                <th width="100">Direccion</th>
							<th width="40">E-mail</th>
			                <th width="40">Telf/Cel.</th>
			                <th width="90">No CI.</th>
			                <th width="90">Depto</th>
			                <th width="60">Observ.</th>
							<th width="50">Imagen</th>
			                <th width="50">Opcion</th>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td>'.$registro2['nombre'].'</td>
							<td>'.$registro2['direccion'].'</td>
							<td>'.$registro2['email'].'</td>
							<td>'.$registro2['cel'].'</td>
							<td>'.$registro2['ci'].'</td>
							<td>'.$registro2['descripdepto'].'</td>
							<td>'.$registro2['observ'].'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>	
							<td><a href="javascript:editarPersona('.$registro2['id_per'].');" class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Editar Datos"></a> <a href="javascript:eliminarPersona('.$registro2['id_per'].');" class="glyphicon glyphicon-remove-circle" data-toggle="tooltip" title="Eliminar"></a> <a href="javascript:mostrarfotocarga('.$registro2['id_per'].');" class="glyphicon glyphicon-download-alt" data-toggle="tooltip" title="Subir Foto"></a> <a href="javascript:mostrarfoto('.$registro2['id_per'].');" class="glyphicon glyphicon-picture" data-toggle="tooltip" title="Ver Foto"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>