<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM clientes"));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM clientes LIMIT $limit, $nroLotes ");

  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="20">Nombre</td>
			                <td width="8%">No Carnet</td>
			                <td width="9%" align="center">Ingreso</td>
			                <td width="12%">Direccion</td>
			                <td width="10%">Telf/Cel</td>
			                <td width="12%">Correo</td>
			                <td width="9%" align="center"># Solic.</td>

							<td width="10%">Observaciones</td>
			                <td width="3%">Imagen</td>
							<td width="12%" align="center">Acciones</td>

			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
	
	
		$tabla = $tabla.'<tr>
							<td><a href="javascript:editarCli('.$registro2['codcli'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['nombrecli'].'</a></td>
							<td>'.$registro2['cicli'].'</td>

							<td>'.$registro2['feingcli'].'</td>
							<td>'.$registro2['direcccli'].'</td>
							<td>'.$registro2['telfcli'].'</td>
							<td>'.$registro2['emailcli'].'</td>
							<td align="center">'.$registro2['nrosolicitudes'].'</td>
							
							<td>'.$registro2['observcli'].'</td>

							<td align="center"><a href="javascript:mostrarfoto('.$registro2['codcli'].');" ><img src="'.$registro2['fotocli'].'"width="30" height="30"> </a></td>
							<td align="center"> <a href="javascript:VerSoli('.$registro2['codcli'].');" ><img src="../recursos/buscar3.png" data-toggle="tooltip" title="Ver Cuentas"></a>   </td> 
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>