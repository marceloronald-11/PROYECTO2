<?php
if (!isset($_SESSION)) {session_start();}
$coddepx= $_SESSION['depto'];
	include('conexion.php');
	//require_once '../Config/conexion.php';
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM activos WHERE coddep='$coddepx' "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM activos  WHERE coddep='$coddepx' LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered">
			            <tr>
			                <th width="15%">Descripcion</th>
			                <th width="5%">Codigo</th>
							<th width="10%">Fecha Ing.</th>
			                <th width="3%">U.Med.</th>
			                <th width="5%">Precio</th>
			                <th width="5%">Stock Min.</th>
			                <th width="5%">Saldo</th>
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
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>