<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN clasificacion AS cl ON ar.codcla=cl.codcla LEFT JOIN articulossuc AS ar2 ON ar.codar=ar2.codar "));
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


  	$registro = mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN clasificacion AS cl ON ar.codcla=cl.codcla LEFT JOIN articulossuc AS ar2 ON ar.codar=ar2.codar LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15% align="center">Producto</td>
			                <td width="5%" align="center">Codigo</td>
			                <td width="7%" align="center">Grupo</td>
			                <td width="7%" align="center">Precio</td>
			                <td width="7%" align="center">Marca</td>
			                <td width="7%" align="center">Modelo</td>
			                <td width="7%" align="center">Proced.</td>
			                <td width="5%" align="center">Saldo Oficina</td>
			                <td width="5%" align="center">Saldo Almacen</td>
			                <td width="5%" align="center">Saldo Total</td>
							
							<td width="12%" align="center">Observacion</td>

			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
	
	$sal=$registro2['saldo'];
	$stom=$registro2['stockmin'];
$saltot=$registro2['saldo']+$registro2['saldosuc'];		
		$tabla = $tabla.'<tr>
							
							<td>'.$registro2['descripar'].'</td>
							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['descripcla'].'</td>
							<td>'.$registro2['pvp'].'</td>
							<td>'.$registro2['marca'].'</td>
							<td>'.$registro2['modelo'].'</td>
							<td>'.$registro2['procedencia'].'</td>
							<td align="center">'.$registro2['saldo'].'</td>
							<td align="center">'.$registro2['saldosuc'].'</td>
							<td align="center">'.$saltot.'</td>
							
							<td >'.$registro2['observar'].'</td>
							
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>