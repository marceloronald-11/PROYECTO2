<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM servcliente AS se LEFT JOIN  clientes AS cl ON se.codcli=cl.codcli LEFT JOIN servicios AS sv ON se.codser=sv.codser LEFT JOIN usuarios AS u ON se.idusu=u.id_usu"));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM servcliente AS se LEFT JOIN  clientes AS cl ON se.codcli=cl.codcli LEFT JOIN servicios AS sv ON se.codser=sv.codser LEFT JOIN usuarios AS u ON se.idusu=u.id_usu LIMIT $limit, $nroLotes ");

  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi2">
			            <tr>
					            <td align="center">Servicio</td>
					            <td align="center">Cliente</td>
					            <td align="center" width="8%">Fecha</td>
					            <td align="center">Atendio</td>
					            <td align="center">Estado</td>
								<td align="center">Observacion</td>

								<td>Opcion</td>
					        </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
		$fexx= date("d-m-Y", strtotime($registro2['solicito']) );
		$apro=$registro2['aprobo'];
		if($apro=='P'){$dt='PENDIENTE';}else{$dt='ATENDIDO';}	
$nomm=$registro2['nombrecli'].' '.$registro2['apellidop'].' '.$registro2['apellidom'];
	
	
		$tabla = $tabla.'<tr>
							<td >'.$registro2['detservicio'].'</td>
							<td>'.$nomm.'</td>
							<td>'.$fexx.'</td>
							<td >'.$registro2['nomb_usu'].'</td>';
							
		if($apro=='P'){
			$tabla = $tabla.'<td><a href="javascript:editarCli('.$registro2['codsc'].');" data-toggle="tooltip" title="HABILITAR">'.$dt.'</a></td>';
		}
		else{
			$tabla = $tabla.'<td>'.$dt.'</td>';
		}
							
							
							$tabla = $tabla.'<td>'.$registro2['observserr'].'</td>

							<td><a href="javascript:eliminaSer('.$registro2['codsc'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Servicio"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>