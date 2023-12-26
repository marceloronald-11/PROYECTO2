<?php
	include('conexion.php');
	//require_once '../Config/conexion.php';
	$paginaActual = 1; //$_POST['partida'];
	$nordenaba = $_POST['nnorden'];

$nroProductos= mysql_query("SELECT * FROM abastedet WHERE nordenaba='$nordenaba' ");

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

  	$registro = mysqli_query($conexion,"SELECT * FROM abastedet WHERE nordenaba='$nordenaba' LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered letritas">
	<tr><td align="center" colspan="5">A CONTINUACIO DETALLE DE SOLICITUD</td></tr>
	<tr><td align="center" colspan="5">PARA SU APROBACION</td></tr>
			            <tr>
			                <th width="50%">Detalle</th>
			                <th width="6%">Cant.</th>
							<th width="7%">U.Med.</th>
							<th width="7%">Estado</th>
							
			                <th width="15%">Opcion</th>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td>'.$registro2['detalle'].'</td>
							<td>'.$registro2['cant'].'</td>
							<td>'.$registro2['umed'].'</td>
							<td>'.$registro2['aprob'].'</td>

							<td> <a href="javascript:editarAprob('.$registro2['cod_abastedet'].');" class="glyphicon glyphicon-thumbs-up tam" data-toggle="tooltip" title="Decidir Aprobacion"></a> <a href="javascript:eliminarSolicita('.$registro2['cod_abastedet'].');" class="glyphicon glyphicon-remove-circle tam" data-toggle="tooltip" title="Eliminar Registro"></a> </td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>