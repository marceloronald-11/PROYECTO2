<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM laboratorio "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM laboratorio  LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover titi">
			            <tr>
			                <td width="15%">Laboratorio</td>
			                <td width="10%">Direccion</td>
			                <td width="10%">Telf/Cel.</td>
			                <td width="10%">E-mail</td>
			                <td width="10%">Cuenta</td>
			                <td width="15%">Observaciones</td>
			                <td width="15%">Opciones</td>

			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
	
	
		$tabla = $tabla.'<tr>
							<td>'.$registro2['nombrelab'].'</td>
							<td>'.$registro2['direccionlab'].'</td>
							<td>'.$registro2['telflab'].'</td>
							<td>'.$registro2['emaillab'].'</td>
							<td>'.$registro2['deudapv'].'</td>
							<td>'.$registro2['observlab'].'</td>
							<td><a href="javascript:editarLab('.$registro2['codlab'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Usuario"></a>
							 <a href="javascript:eliminaLab('.$registro2['codlab'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>