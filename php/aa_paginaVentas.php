<?php
if (!isset($_SESSION)) {session_start();}
date_default_timezone_set('America/La_Paz');

//$codde=$_SESSION['depto'];
//$codsucx=$_SESSION['codsuc'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM movimtot AS mt JOIN sucursal AS su ON mt.codsuc=su.codsuc ")); // falta codsuc='$codsucx'
    $nroLotes = 1000;
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
	
$registro= mysqli_query($conexion,"SELECT * FROM movimtot AS mt JOIN sucursal AS su ON mt.codsuc=su.codsuc  LIMIT $limit, $nroLotes");
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover">
			            <tr>
			                <th>No Factura</th>
							<th>Fecha</th>
			                <th>Nombre del Cliente</th>
			                <th>Nit Cliente</th>
							<th>Importe</th>
							<th>Sucursal</th>
							
			                <th>Estado</th>

							<th>Opciones</th>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tp=$registro2['tmv'];
			if($tp=='X'){$est='ANULADO';}else{$est='';}
		$tabla = $tabla.'<tr>
							<td>'.$registro2['nfactura'].'</td>
							<td>'.$registro2['fechato'].'</td>
							<td>'.$registro2['afavor'].'</td>
							<td>'.$registro2['nitcliente'].'</td>
							<td>'.$registro2['totimporte'].'</td>
							<td>'.$registro2['nombresuc'].'</td>
							<td>'.$est.'</td>

	<td> <a href="javascript:Verfactura('.$registro2['norden'].');" ><img src="../recursos/detalles.png" data-toggle="tooltip" title="Ver Factura"></a>
	<a href="javascript:AnularFac('.$registro2['norden'].');" ><img src="../recursos/cancelarg.png" data-toggle="tooltip" title="Anular Factura"></a>
	 <a href="javascript:editarFactura('.$registro2['norden'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Factura"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>