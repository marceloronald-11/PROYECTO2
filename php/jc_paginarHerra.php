<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM herramientas AS he LEFT JOIN proveedor AS pv ON he.codpv=pv.codpv "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM herramientas AS he LEFT JOIN proveedor AS pv ON he.codpv=pv.codpv  LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-bordered titi">
                        <tr>
                            <td width="5%">Codigo</td>
                            <td width="20%">Detalle</td>
			                <td width="10%">Proveedor</td>
			                <td width="8%">MaqHora</td>
			                <td width="8%">MaqMin</td>
                            
			                <td width="5%">Acciones</td>

			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
	
	
        $tabla = $tabla.'<tr>
                            <td>'.$registro2['codigohe'].'</td>
							<td>'.$registro2['detherramienta'].'</td>
							<td>'.$registro2['nombrepv'].'</td>
							<td>'.$registro2['maqhora'].'</td>
							<td>'.$registro2['maqmin'].'</td>

                            <td><a href="javascript:editarHe('.$registro2['codhe'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar "></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>