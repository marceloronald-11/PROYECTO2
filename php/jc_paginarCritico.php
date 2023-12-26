<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM repuesto "));
    $nroLotes = 20;
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

  	$registro = mysqli_query($conexion,"SELECT * FROM repuesto  LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover titi">
      <tr>
      <td width="25%">Detalle</td>
      <td width="7%" align="center">Codigo</td>
      <td width="3%" align="center">U.Med.</td>
      <td width="10%" align="center">Ubicacion</td>
      <td width="10%" align="center">Especif.</td>
      <td width="5%" align="center">Costo Unit.</td>
      <td width="5%" align="center">Stock</td>
      <td width="5%" align="center">Stock_CR</td>
  </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
	
	
		$tabla = $tabla.'<tr>
                            <td>'.$registro2['detrepuesto'].'</td>
                            <td>'.$registro2['codigo'].'</td>
                            <td>'.$registro2['umed'].'</td>
                            <td>'.$registro2['ubicacion'].'</td>
                            <td>'.$registro2['especificacion'].'</td>
                            <td align="right">'.$registro2['costo'].'</td>
                            <td align="right">'.$registro2['saldo'].'</td>
                            <td align="right">'.$registro2['saldomin'].'</td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>