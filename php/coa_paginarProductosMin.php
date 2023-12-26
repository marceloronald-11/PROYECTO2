<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN clasificacion AS cl ON ar.codcla=cl.codcla LEFT JOIN proveedor AS pvv ON ar.codpv=pvv.codpv WHERE ar.saldo<ar.stockmin  "));
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


  	$registro = mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN clasificacion AS cl ON ar.codcla=cl.codcla LEFT JOIN proveedor AS pvv ON ar.codpv=pvv.codpv  WHERE ar.saldo<ar.stockmin  LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15% align="center">Producto</td>
			                <td width="5%" align="center">Codigo</td>
			                <td width="7%" align="center">Grupo</td>
							
			                <td width="7%" align="center">Precio</td>
			                <td width="5%" align="center">Saldo</td>
			                <td width="5%" align="center">Stock Min.</td>
							
							<td width="12%" align="center">Observacion</td>
			                <td width="5%" align="center">Imagen</td>
							

			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
	
	$sal=$registro2['saldo'];
	$stom=$registro2['stockmin'];	
		
		
		$tabla = $tabla.'<tr>
							<td><a href="javascript:editarPer('.$registro2['codar'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['descripar'].'</a></td>
							<td align="center">'.$registro2['codigo'].'</td>
							<td align="center">'.$registro2['descripcla'].'</td>
							
							<td align="right">'.$registro2['pneto'].'</td>
							<td align="center">'.$registro2['saldo'].'</td>
							<td align="center">'.$registro2['stockmin'].'</td>
							
							<td >'.$registro2['observar'].'</td>
							<td align="center"><a href="javascript:mostrarfoto('.$registro2['codar'].');" ><img src="'.$registro2['fotoar'].'"width="30" height="30"> </a></td>
							
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>