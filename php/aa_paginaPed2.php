<?php
if (!isset($_SESSION)) {session_start();}
//$codde=$_SESSION['depto'];
$codsucx=$_SESSION['codsuc'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM pedidotot AS pe JOIN
	 sucursal AS su ON pe.codsuc=su.codsuc WHERE  cd='' ORDER BY norden DESC"));
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
	
$registro= mysqli_query($conexion,"SELECT *FROM pedidotot AS pe JOIN
	 sucursal AS su ON pe.codsuc=su.codsuc WHERE  cd='' ORDER BY norden DESC LIMIT $limit, $nroLotes");
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover">
			            <tr>
			                <td>No Orden</td>
			                <td>Sucursal</td>
			                <td>Fecha</td>
			                <td>Solicitante</td>
			                <td>No Items</td>

			                <td>Opciones</td>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td>'.$registro2['norden'].'</td>
							<td>'.$registro2['nombresuc'].'</td>
							<td>'.$registro2['fechato'].'</td>
							<td>'.$registro2['afavor'].'</td>
							<td>'.$registro2['itm'].'</td>

							<td> <a href="javascript:verPedi('.$registro2['norden'].','.$registro2['codsuc'].');" ><img src="../recursos/detalles.png" data-toggle="tooltip" title="Ver Detalle"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>