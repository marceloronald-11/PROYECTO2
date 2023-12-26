<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM solicitudes AS so LEFT JOIN clientes AS cl ON so.codcli=cl.codcli WHERE so.aprobado='SI' "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM solicitudes AS so LEFT JOIN clientes AS cl ON so.codcli=cl.codcli WHERE so.aprobado='SI' LIMIT $limit, $nroLotes ");

  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="20%">Nombre</td>
			                <td width="8%">No Carnet</td>
			                <td width="5%">Solicito Bs.</td>
			                <td width="9%">Aprobado Bs.</td>
			                <td width="9%">Saldo Bs.</td>
							
							<td width="10%">Supervisor</td>
			                <td width="3%">Imagen</td>
							<td width="12%" align="center">Acciones</td>

			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
	
	
		$tabla = $tabla.'<tr>
							<td>'.$registro2['nombrecli'].'</td>
							<td>'.$registro2['cicli'].'</td>
							<td>'.$registro2['montosolicita'].'</td>
							<td>'.$registro2['montoaprobado'].'</td>
							<td>'.$registro2['saldosoli'].'</td>
							<td>'.$registro2['supervisor'].'</td>

							<td align="center"><a href="javascript:mostrarfoto('.$registro2['codsoli'].');" ><img src="'.$registro2['fotocli'].'"width="30" height="30"> </a></td>
							<td align="center"> <a href="javascript:VerPlanPagos('.$registro2['codsoli'].','.$registro2['codcli'].');" ><img src="../recursos/detalles.png" data-toggle="tooltip" title="Detalle de Pagos"></a>  </td> 
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>