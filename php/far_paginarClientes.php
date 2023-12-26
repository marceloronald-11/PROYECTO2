<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM clientes "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM clientes  LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover titi">
			            <tr>
			                <td width="20%">Nombre Cliente</td>
			                <td width="9%">Registro</td>
			                <td width="15%">Direccion</td>
			                <td width="10%">Telf/Cel.</td>
			                <td width="10%">Email</td>
			                <td width="10%">Nit</td>
			                <td width="15%">Observaciones</td>
			                <td width="10%">Opciones</td>

			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
		$fee=date("d-m-Y",strtotime($registro2['feingcli']));
	
		$tabla = $tabla.'<tr>
							<td>'.$registro2['nombrecli'].'</td>
							<td>'.$fee.'</td>
							<td>'.$registro2['direcccli'].'</td>
							<td>'.$registro2['telfcli'].'</td>
							<td>'.$registro2['emailcli'].'</td>
							<td>'.$registro2['nitcli'].'</td>

							<td>'.$registro2['observcli'].'</td>
							<td><a href="javascript:editarCli('.$registro2['codcli'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Cliente"></a>
							 <a href="javascript:eliminaCli('.$registro2['codcli'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Cliente"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>