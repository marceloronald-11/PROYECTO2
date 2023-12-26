<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM proveedor "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM proveedor  LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover titi">
			            <tr>
			                <td width="10%">Proveedor</td>
			                <td width="15%">Direccion</td>
			                <td width="10%">Telf/Cel.</td>
			                <td width="15%">E-mail</td>
			                <td width="15%">Observaciones</td>
			                <td width="8%">Opciones</td>

			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
	
	
		$tabla = $tabla.'<tr>
							<td>'.$registro2['nombrepv'].'</td>
							<td>'.$registro2['direccpv'].'</td>
							<td>'.$registro2['telfpv'].'</td>
							<td>'.$registro2['emailpv'].'</td>
							<td>'.$registro2['observpv'].'</td>
							<td><a href="javascript:editarLab('.$registro2['codpv'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar"></a>
							 <a href="javascript:eliminaLab('.$registro2['codpv'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar "></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>