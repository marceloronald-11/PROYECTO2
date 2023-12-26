<?php
if (!isset($_SESSION)) {session_start();}
//$coddepx= $_SESSION['depto'];
$areax=$_SESSION['id_area']; // admin si es ok sino no mostrar eliminar editar subir foto 
$codsucx=$_SESSION['codsuc'];

date_default_timezone_set('America/La_Paz');
$fecha = date('Y-m-d');

	include('conexion.php');
	//require_once '../Config/conexion.php';
	
	
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM movimtot WHERE fechato='$fecha' "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM movimtot WHERE fechato='$fecha' LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%">Nombre del Cliente</td>
			                <td width="7%" class="hidden-xs">Fecha</td>
			                <td width="4%" class="hidden-xs">No Orden</td>
							<td width="6%" class="hidden-xs">Nit Cliente</td>
			                <td width="6%" class="hidden-xs">No Factura</td>
			                <td width="8%" class="hidden-xs">Importe</td>
			                <td width="2%" class="hidden-xs">Items</td>

			                <td width="9%" align="center">Opcion</td>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$ff= date("d-m-Y", strtotime($registro2['fechato']) );
		$tabla = $tabla.'<tr>
							<td>'.$registro2['afavor'].'</td>
							<td class="hidden-xs">'.$ff.'</td>
							<td class="hidden-xs">'.$registro2['norden'].'</td>
							<td class="hidden-xs">'.$registro2['nitcliente'].'</td>
							<td class="hidden-xs">'.$registro2['nfactura'].'</td>
							<td class="hidden-xs">'.$registro2['totimporte'].'</td>
							<td class="hidden-xs">'.$registro2['itm'].'</td>';
							$tabla = $tabla.'<td align="center">
							<a href="javascript:VerKardex('.$registro2['norden'].');" ><img src="../recursos/factura.png" data-toggle="tooltip" title="Ver Detalle"></a> 
							</td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>