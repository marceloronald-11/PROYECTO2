<?php
	include('conexion.php');
	//require_once '../Config/conexion.php';
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM activos"));
    $nroLotes = 4;
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

  	$registro = mysqli_query($conexion,"SELECT * FROM activos LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover listita">
			            <tr>
			                <td width="15%">Descripcion</td>
			                <td width="5%">Codigo</td>
							<td width="10%">Fecha Ing.</td>
			                <td width="3%">U.Med.</td>
			                <td width="5%">Precio</td>
			                <td width="5%">Stock Min.</td>
			                <td width="5%">Saldo</td>
							<td width="3%">Imagen</td>
			                <td width="7%">Opcion</td>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td>'.$registro2['descripcion'].'</td>
							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['fecha_ing'].'</td>
							<td>'.$registro2['umed'].'</td>
							<td>'.$registro2['pvp'].'</td>
							<td>'.$registro2['stockmin'].'</td>
							<td align="center">'.$registro2['existencia'].'</td>
							<td align="center">'."<img src=\"".$registro2['foto']."\" width=\"25\" height=\"50\"/>".'</td>	
							<td><a href="javascript:editarActivo('.$registro2['cod_activo'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Registro"></a>
							 <a href="javascript:eliminarActivo('.$registro2['cod_activo'].');"><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							  <a href="javascript:mostrarfotocarga('.$registro2['cod_activo'].');"><img src="../recursos/editar.png" data-toggle="tooltip" title="Subir Foto"></a>
							   <a href="javascript:mostrarfoto('.$registro2['cod_activo'].');"><img src="../recursos/editar.png" data-toggle="tooltip" title="Ver Imagen"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>