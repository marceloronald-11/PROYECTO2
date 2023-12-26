<?php
if (!isset($_SESSION)) {session_start();}
$codde=$_SESSION['depto'];

$iduu=$_POST['idu'];

	include('../php/conexion.php');
	$paginaActual = 1; //$_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM ordendet WHERE norden='$iduu' AND coddep='$codde'  "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM ordendet WHERE norden='$iduu' AND coddep='$codde'   LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover">
			            <tr>
			                <th width="10%">Orden</th>
			                <th width="50%">Descripcion</th>
			                <th width="10%">Cant</th>
			                <th width="15%">No Factura</th>

			                <th width="10%">Opciones</th>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td>'.$registro2['norden'].'</td>
							<td>'.$registro2['descripdt'].'</td>
							<td>'.$registro2['cant'].'</td>
							<td>'.$registro2['nfactura'].'</td>

							<td> <a href="javascript:editarOrden('.$registro2['codt'].');" class="glyphicon glyphicon-pencil"></a>
							 <a href="javascript:eliminarOrden('.$registro2['codt'].','.$registro2['norden'].');" class="glyphicon glyphicon-remove"></a></td>							


				</tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>