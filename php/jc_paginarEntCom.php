<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM solicitudtot AS so LEFT JOIN areas AS ar ON so.codarea=ar.codarea LEFT JOIN cargo AS ca ON so.codcargo=ca.codcargo WHERE so.tmm='Proceso'  "));
    $nroLotes = 15;
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

  	$registro = mysqli_query($conexion,"SELECT * FROM solicitudtot AS so LEFT JOIN areas AS ar ON so.codarea=ar.codarea LEFT JOIN cargo AS ca ON so.codcargo=ca.codcargo WHERE so.tmm='Proceso' LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-bordered titi">
			            <tr>
                            <td width="15%">Solicitante...</td>
                            <td width="9%">Area</td>
                            <td width="9%">Cargo</td>
                            <td width="6%">Cod.Doc.</td>
                            <td width="9%" align="center">Estado</td>
			                <td width="5%" align="center">Acciones</td>
			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
        $op1=$registro2['tmm'];
	
		$tabla = $tabla.'<tr>
							<td>'.$registro2['afavor'].'</td>
							<td>'.$registro2['detarea'].'</td>
							<td>'.$registro2['detcargo'].'</td>
							<td>'.$registro2['coddoc'].'</td>
							<td align="center">'.$registro2['tmm'].'</td>';
                             $tabla = $tabla.'<td align="center"><a href="javascript:versolCompra('.$registro2['norden'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar "></a> <a href="javascript:Imprii('.$registro2['norden'].');" ><img src="../recursos/impresora.png" data-toggle="tooltip" title="Imprimir "></a>
							</td>';
                                                   
                        $tabla = $tabla.'</tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>