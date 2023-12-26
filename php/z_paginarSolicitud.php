<?php
	include('conexion.php');
	//require_once '../Config/conexion.php';
	$paginaActual = $_POST['partida'];

$nroProductos= mysql_query("SELECT * FROM abastetot AS aba JOIN personas AS per ON aba.id_per = per.id_per JOIN area AS ar ON aba.id_area = ar.id_area");

//$registro= mysql_query(“SELECT * FROM alumno AS alu JOIN alumno_carrera AS aca ON alu.ID = aca.ID JOIN carreras AS carr ON aca.Id_carrera = carr.Id_carrera JOIN cobros AS cob ON cob.Id_alumno = alu.ID OR Apellido_paterno LIKE ‘%$dato%’ OR CI LIKE ‘%$dato%’ LIMIT 15”);
 //   $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM abastetot"));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM abastetot AS aba JOIN personas AS per ON aba.id_per = per.id_per JOIN area AS ar ON aba.id_area = ar.id_area LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered letra">
			            <tr>
			                <th width="20%">Fecha</th>
			                <th width="6%">No Orden</th>
							<th width="20%">Area</th>
			                <th width="35%">Pedido de</th>
			                <th width="15%">Opcion</th>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td>'.$registro2['fecha'].'</td>
							<td>'.$registro2['nordenaba'].'</td>
							<td>'.$registro2['nombre_area'].'</td>
							<td>'.$registro2['nombre'].'</td>
							<td><a href="javascript:VerSolicitudPdf('.$registro2['nordenaba'].');" class="glyphicon glyphicon-list tam" data-toggle="tooltip" title="PDF Detalle"></a> <a href="javascript:editarSoli('.$registro2['nordenaba'].');" class="glyphicon glyphicon-eye-open tam" data-toggle="tooltip" title="VER DETALLE"></a> <a href="javascript:eliminarSolicita('.$registro2['cod_abaste'].');" class="glyphicon glyphicon-remove-circle tam" data-toggle="tooltip" title="Eliminar Registro"></a> </td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>