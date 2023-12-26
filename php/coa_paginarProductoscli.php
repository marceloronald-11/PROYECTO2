<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN clasificacion AS cl ON ar.codcla=cl.codcla "));
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


  	$registro = mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN clasificacion AS cl ON ar.codcla=cl.codcla LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="20%">Producto</td>
			                <td width="10%">Grupo</td>
			                <td width="9%">U.Med</td>
			                <td width="9%">Precio</td>
			                <td width="9%">P.Credito</td>
							
							<td width="15%">Detalles</td>
							
			                <td width="5%">Imagen</td>
							<td width="5%" align="center">Video</td>

			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
	
	
		$tabla = $tabla.'<tr>
							
							<td>'.$registro2['descripar'].'</td>
							
							<td>'.$registro2['descripcla'].'</td>
							
							<td>'.$registro2['umed'].'</td>
							<td>'.$registro2['pvp'].'</td>
							<td>'.$registro2['precre'].'</td>

							<td>'.$registro2['observar'].'</td>
							<td><a href="javascript:mostrarfoto('.$registro2['codar'].');" ><img src="'.$registro2['fotoar'].'"width="30" height="30"> </a></td>
							<td><a href="'.$registro2['videotec'].'" data-toggle="tooltip" title="Ver Video" target="_blank">'.$registro2['videotec'].'</a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>