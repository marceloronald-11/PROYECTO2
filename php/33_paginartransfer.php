<?php
if (!isset($_SESSION)) {session_start();}
$codde=$_SESSION['depto'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM transfertotal WHERE acoddep='$codde' AND cdtr='' ORDER BY norden DESC"));
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

//  	$registro = mysql_query("SELECT * FROM habita LIMIT $limit, $nroLotes ");
	
$registro= mysqli_query($conexion,"SELECT * FROM transfertotal WHERE acoddep='$codde' AND cdtr='' ORDER BY norden DESC LIMIT $limit, $nroLotes");
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover">
			            <tr>
			                <th>No Orden</th>
			                <th>Fecha</th>
			                <th>Nombre del Cliente</th>
			                <th>Opciones</th>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		
		$ffe= date("d-m-Y", strtotime($registro2['fechacot']) );
		$tabla = $tabla.'<tr>
							<td>'.$registro2['norden'].'</td>
							<td>'.$ffe.'</td>
							<td>'.$registro2['cliente'].'</td>
							<td> <a href="javascript:verTra('.$registro2['norden'].');" class="glyphicon glyphicon-zoom-in subir" data-toggle="tooltip" title="VER REGISTROS"></a>
							 <a href="javascript:ConfirmaTra2('.$registro2['norden'].');" class="glyphicon glyphicon-edit subir" data-toggle="tooltip" title="CONFIRMAR TRANSFERENCIA"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>