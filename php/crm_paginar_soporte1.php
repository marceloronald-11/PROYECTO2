<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM ticket AS ti LEFT JOIN areas AS ar ON ti.codarea=ar.codarea LEFT JOIN clientes AS cl ON ti.codcli=cl.codcli"));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM ticket AS ti LEFT JOIN areas AS ar ON ti.codarea=ar.codarea LEFT JOIN clientes AS cl ON ti.codcli=cl.codcli LIMIT $limit, $nroLotes ");

  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi2">
			            <tr>
					            <td align="center">No Ticket</td>
					            <td align="center">Cliente</td>
					            <td align="center">Area</td>
					            <td align="center" width="8%">Fecha</td>
					            <td align="center">Estado</td>
								<td align="center">Observacion</td>

								<td>Opcion</td>
					        </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
		$fexx= date("d-m-Y", strtotime($registro2['fechatk']) );
		$apro=$registro2['aprobotk'];
		if($apro=='P'){$dt='PENDIENTE';}else{$dt='ATENDIDO';}	
$nomm=$registro2['nombrecli'].' '.$registro2['apellidop'].' '.$registro2['apellidom'];
	
	
		$tabla = $tabla.'<tr>
							<td align="center">'.$registro2['codtk'].'</td>
							<td>'.$nomm.'</td>
							<td>'.$registro2['detarea'].'</td>
							<td>'.$fexx.'</td>';
		if($apro=='P'){
			$tabla = $tabla.'<td><a href="javascript:editarSopo('.$registro2['codtk'].');" data-toggle="tooltip" title="ATENDER CASO">'.$dt.'</a></td>';
		}
		else{
			$tabla = $tabla.'<td>'.$dt.'</td>';
		}
							
							
							$tabla = $tabla.'<td>'.$registro2['observtk'].'</td>

							<td><a href="javascript:EliminaSopo('.$registro2['codtk'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>