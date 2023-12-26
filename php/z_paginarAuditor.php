<?php
if (!isset($_SESSION)) {session_start();}
$coddepx= $_SESSION['depto'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM auditor AS au JOIN usuarios AS usu ON au.id_usu=usu.id_usu 
	JOIN departamento AS dp ON au.coddep=dp.coddep "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM auditor AS au JOIN usuarios AS usu ON au.id_usu=usu.id_usu 
	JOIN departamento AS dp ON au.coddep=dp.coddep  LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered">
			            <tr>
			                <th width="10%">Usuario</th>
			                <th width="8%">Fecha</th>
							<th width="8%">Hora</th>
			                <th width="7%">Val.Ant.</th>
			                <th width="7%">Val.Act.</th>
			                <th width="10%">Modulo</th>
			                <th width="5%">Depto</th>
			                <th width="15%">Observ.</th>

			                <th width="7%">Opcion</th>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td>'.$registro2['nomb_usu'].'</td>
							<td>'.$registro2['fechaau'].'</td>
							<td>'.$registro2['horaau'].'</td>
							<td>'.$registro2['valantiguo'].'</td>
							<td>'.$registro2['valnuevo'].'</td>
							<td>'.$registro2['modulo'].'</td>
							<td align="center">'.$registro2['descripdepto'].'</td>
							<td align="left">'.$registro2['observau'].'</td>

							<td align="center"><a href="javascript:eliminarAuditor('.$registro2['idau'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>