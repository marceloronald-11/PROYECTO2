<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM tecnicos "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM tecnicos LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-bordered titi">
			            <tr>
                        <td width="5%">Codigo</td>
                        <td width="12%">Tecnico</td>
                        <td width="5%">Hora U$</td>
                        <td width="5%">Min U$</td>
                        <td width="15%">Direcion</td>
                        <td width="10%">Telefono</td>
                        <td width="10%">Celular</td>
		                <td width="5%">Acciones</td>

			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
	
	
		$tabla = $tabla.'<tr>
                        <td>'.$registro2['codigotec'].'</td>
                        <td>'.$registro2['dettecnico'].'</td>
						<td>'.$registro2['horasus'].'</td>
                        <td>'.$registro2['minsus'].'</td>
                        <td>'.$registro2['direcctec'].'</td>
                        <td>'.$registro2['telftec'].'</td>
                        <td>'.$registro2['celulartec'].'</td>

                            <td><a href="javascript:editarTec('.$registro2['codtec'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar "></a> <a href="javascript:eliminaTec('.$registro2['codtec'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar "></a>
							 </td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>