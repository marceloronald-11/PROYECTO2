<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM repuesto WHERE saldomin=5 "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM repuesto WHERE saldomin=5  LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-bordered titi">
			            <tr>
                            <td width="25%">Detalle</td>
                            <td width="7%" align="center">Codigo</td>
			                <td width="3%" align="center">U.Med.</td>
			                <td width="5%" align="center">Costo Unit.</td>
			                <td width="5%" align="center">Stock</td>
			                <td width="5%" align="center">Stock_CR</td>
                            
                            

			            </tr>';
    $tadm='';	
    $itm=0;		
	while($registro2 = mysqli_fetch_array($registro)){
	$itm+=1;
	    $tabla = $tabla.'<tr>
                            <td>'.$registro2['detrepuesto'].'</td>
                            <td align="center">'.$registro2['codigo'].'</td>
                            <td align="center">'.$registro2['umed'].'</td>
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