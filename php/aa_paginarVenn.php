<?php
if (!isset($_SESSION)) {session_start();}
date_default_timezone_set('America/La_Paz');

//$coddepx= $_SESSION['depto'];
$areax=$_SESSION['id_area']; // admin si es ok sino no mostrar eliminar editar subir foto 
$codsucx=$_SESSION['codsuc'];
$hoyx = date('Y-m-d');
	include('conexion.php');
	//require_once '../Config/conexion.php';
	
	
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM movimtot WHERE codsuc='$codsucx' AND fechato='$hoyx' AND vta='X' "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM movimtot WHERE codsuc='$codsucx' AND  fechato='$hoyx' AND vta='X'  LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td align="center" width="9%">Fecha</td>
			                <td align="center" width="8%" >Nro Orden</td>
			                <td align="center" width="20%" >Cliente</td>
			                <td align="center" width="9%" >Total Importe</td>
							<td align="center" width="4%">No Items</td>
							<td align="center" width="4%">Tipo Vta</td>

							<td align="center" width="10%" class="hidden-xs">Opciones</td>

			            </tr>';
		$tt=0;		
	while($registro2 = mysqli_fetch_array($registro)){
		$cdbs=$registro2['cdbs'];
		$ff= date("d-m-Y", strtotime($registro2['fechato']) );
		$tt=$tt+$registro2['totimporte'];
		$ttmm=$registro2['tmm'];
		
		$tabla = $tabla.'<tr>
							<td align="center">'.$ff.'</td>
							<td align="center">'.$registro2['norden'].'</td>
							<td >'.$registro2['afavor'].'</td>
							<td align="right" >'.number_format($registro2['totimporte'],2).'</td>
							<td align="center" >'.$registro2['itm'].'</td>
							<td align="center" >'.$registro2['tmv'].'</td><td>';
							
							if($ttmm=='VentaSucu'){
							$tabla = $tabla.' <a href="javascript:mostrarBoleta('.$registro2['norden'].');" ><img src="../recursos/impresorad.png" data-toggle="tooltip" title="Ventas Sucursal"></a>';
							}

							if($ttmm=='Adelanto'){
							$tabla = $tabla.' <a href="javascript:impreAdelanto('.$registro2['norden'].');" ><img src="../recursos/impresoraa.png" data-toggle="tooltip" title="Venta Entrega Adelanto"></a>';
							}

							if($ttmm=='VentaSucuA'){
							$tabla = $tabla.' <a href="javascript:mostrarTotal('.$registro2['norden'].');" ><img src="../recursos/impresorab.png" data-toggle="tooltip" title="Venta Entrega Almacen"></a>';
							}
		
							if($ttmm=='VentaUrge'){
							$tabla = $tabla.' <a href="javascript:ImpreUrge('.$registro2['norden'].');" ><img src="../recursos/impresorae.png" data-toggle="tooltip" title="Venta Urgente de Almacen"></a>';
							}
		
							$tabla = $tabla.'</td></tr>';
	}
        
    $tabla = $tabla.'<tr><td colspan="3" align="right" >Total :</td><td align="right">'.number_format($tt,2).'</td></tr>';

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>