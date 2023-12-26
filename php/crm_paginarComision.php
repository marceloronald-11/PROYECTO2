<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM movimdet AS mv LEFT JOIN usuarios AS us ON mv.id_usu=us.id_usu"));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM movimdet AS mv LEFT JOIN usuarios AS us ON mv.id_usu=us.id_usu LIMIT $limit, $nroLotes ");

  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%" align="center">Producto</td>
			                <td width="5%" align="center">U.Med.</td>
			                <td width="5%" align="center">Cant.</td>
			                <td width="5%" align="center">Precio</td>
			                <td width="7%" align="center">Subtot.</td>
			                <td width="5%" align="center">Comis.Vta</td><br>
			                <td width="5%" align="center">Comis.Dist.</td>

			                <td width="9%" align="center">Fecha</td>
			                <td width="12%" align="center">Usuario</td>
							
							

			            </tr>';
	$tadm='';	
$tcomi=0;
$tcomi2=0;

	while($registro2 = mysqli_fetch_array($registro)){
	$tcomi+=$registro2['comibs'];
		$tabla = $tabla.'<tr>
							
							<td>'.$registro2['descripdt'].'</td>
							<td>'.$registro2['umed'].'</td>
							<td align="center">'.$registro2['cant'].'</td>
							<td align="right">'.$registro2['precio'].'</td>
							<td align="right">'.$registro2['subtot'].'</td>
							<td align="right">'.$registro2['comibs'].'</td>
							<td align="right">'.$registro2['comibs2'].'</td>
							
							<td align="center">'.$registro2['fechadt'].'</td>
							<td>'.$registro2['nomb_usu'].'</td>
							
						  </tr>';		
	}
        $tabla = $tabla.'<tr><td colspan="5">Total :</td><td align="right">'.number_format($tcomi,2).'</td><td align="right">'.number_format($tcomi2,2).'</td></tr>';
    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>