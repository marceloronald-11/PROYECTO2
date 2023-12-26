<?php
if (!isset($_SESSION)) {session_start();}
$coddepx= $_SESSION['depto'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM activos WHERE coddep='$coddepx'"));
    $nroLotes =20;
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

  	$registro = mysqli_query($conexion,"SELECT * FROM activos WHERE coddep='$coddepx' LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered">
			            <tr>
			                <th width="200">Descripcion</th>
			                <th width="100">Codigo</th>
							<th width="40">Fecha Ing.</th>
			                <th width="40">U.Med.</th>
			                <th width="40">P.Neto</th>
			                <th width="90">Stock Min.</th>
			                <th width="60">Saldo</th>
							<th width="50">Imagen</th>
			                <th width="50">Opcion</th>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td>'.$registro2['descripcion'].'</td>
							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['fecha_ing'].'</td>
							<td>'.$registro2['umed'].'</td>
							<td>'.$registro2['pneto'].'</td>
							
							<td>'.$registro2['stockmin'].'</td>
							<td>'.$registro2['existencia'].'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>	
							<td><a href="javascript:MostrarKardex('.$registro2['codar'].');" class="glyphicon glyphicon-list" data-toggle="tooltip" title="Editar Datos"></a>
							  <a href="javascript:mostrarfoto('.$registro2['codar'].');" class="glyphicon glyphicon-picture" data-toggle="tooltip" title="Ver Imagen"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>