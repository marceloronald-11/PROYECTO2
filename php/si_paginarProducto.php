<?php
if (!isset($_SESSION)) {session_start();}
//$coddepx= $_SESSION['depto'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	
	
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM producto"));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM producto LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="20%">Producto</td>
			                <td width="4%" class="hidden-xs">U.Med.</td>
							<td width="10%" class="hidden-xs">Precio</td>
			                <td width="8%" class="hidden-xs">Cont.</td>
			                <td width="8%" class="hidden-xs">% Comest.</td>
			                <td width="15%" class="hidden-xs">Observacion</td>
							<td width="7%" class="hidden-xs">Imagen</td>
			                <td width="15%" align="center">Opcion</td>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td>'.$registro2['descrippro'].'</td>
							<td class="hidden-xs">'.$registro2['desmed'].'</td>
							<td class="hidden-xs">'.$registro2['preciopro'].'</td>
							<td class="hidden-xs">'.$registro2['contiene'].'</td>
							<td class="hidden-xs">'.$registro2['porccom'].'</td>
							<td class="hidden-xs">'.$registro2['observpro'].'</td>
							<td class="hidden-xs">'."<img src=\"".$registro2['fotopro']."\" width=\"30\" height=\"30\"/>".'</td>	
							<td align="center"><a href="javascript:editarProducto('.$registro2['codpro'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Registro"></a>
							 <a href="javascript:eliminarProducto('.$registro2['codpro'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							  <a href="javascript:mostrarfotocarga('.$registro2['codpro'].');" ><img src="../recursos/subir.png" data-toggle="tooltip" title="Subir Imagen"></a>
							   <a href="javascript:mostrarfoto('.$registro2['codpro'].');" ><img src="../recursos/imagen.png" data-toggle="tooltip" title="Ver Imagen"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>