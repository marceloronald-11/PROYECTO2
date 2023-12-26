<?php
if (!isset($_SESSION)) {session_start();}

$codclix=$_SESSION['codcli'];
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM movimtot AS mv LEFT JOIN clientes AS cli ON mv.codcli=cli.codcli WHERE mv.codcli='$codclix' "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM movimtot AS mv LEFT JOIN clientes AS cli ON mv.codcli=cli.codcli WHERE mv.codcli='$codclix' LIMIT $limit, $nroLotes ");

  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%">Cliente</td>
			                <td width="7%">No Carnet</td>
			                <td width="15%">Direccion</td>
			                <td width="10%">Telefono</td>
			                <td width="9%">Fecha</td>
			                <td width="5%">No Orden</td>
			                <td width="5%">No Items</td>
			                <td width="8%">Importe</td>
							<td width="8%">Acciones</td>

			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
	
	
		$tabla = $tabla.'<tr>
							
							<td>'.$registro2['afavor'].'</td>
							<td>'.$registro2['cicli'].'</td>
							<td>'.$registro2['direcccli'].'</td>
							<td>'.$registro2['telfcli'].'</td>
							<td>'.$registro2['fechato'].'</td>
							<td>'.$registro2['norden'].'</td>
							<td>'.$registro2['itm'].'</td>
							<td>'.$registro2['totimporte'].'</td>
							<td> <a href="javascript:ImprimePedido('.$registro2['norden'].');" ><img src="../recursos/impresora.png" data-toggle="tooltip" title="Imprimir Nota"></a> <a href="javascript:VerDocs('.$registro2['norden'].');" ><img src="../recursos/buscar3.png" data-toggle="tooltip" title="Ver Preliminar"></a> </td> 
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>