<?php
if (!isset($_SESSION)) {session_start();}
//$coddepx= $_SESSION['depto'];
$areax=$_SESSION['id_area']; // admin si es ok sino no mostrar eliminar editar subir foto 
$codsucx=$_SESSION['codsuc'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	
	
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM articulos AS ar JOIN proveedor AS pv ON 
	ar.codpv=pv.codpv JOIN clasificacion AS cl ON ar.codcla=cl.codcla JOIN sucursal AS su ON ar.codsuc=su.codsuc WHERE ar.codsuc='$codsucx' "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM articulos AS ar JOIN proveedor AS pv ON 
	ar.codpv=pv.codpv JOIN clasificacion AS cl ON ar.codcla=cl.codcla JOIN sucursal AS su ON ar.codsuc=su.codsuc WHERE ar.codsuc='$codsucx'  LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%">Producto</td>
			                <td width="4%" class="hidden-xs">Codigo</td>
			                <td width="4%" class="hidden-xs">U.Med.</td>
							<td width="7%" class="hidden-xs">Neto</td>
			                <td width="7%" class="hidden-xs">Pvp</td>
			                <td width="8%" class="hidden-xs">Proveedor</td>
			                <td width="9%" class="hidden-xs">Clasif.</td>
			                <td width="10%" class="hidden-xs">Sucursal</td>
			                <td width="7%" >Saldo</td>
			                <td width="15%" class="hidden-xs">Observ.</td>
							<td width="7%" class="hidden-xs">Imagen</td>
			                <td width="10%" align="center">Opcion</td>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td>'.$registro2['descripar'].'</td>
							<td class="hidden-xs">'.$registro2['codigoba'].'</td>
							<td class="hidden-xs">'.$registro2['umed'].'</td>
							<td class="hidden-xs">'.$registro2['pneto'].'</td>
							<td class="hidden-xs">'.$registro2['pvp'].'</td>
							<td class="hidden-xs">'.$registro2['nombrepv'].'</td>
							<td class="hidden-xs">'.$registro2['descripcla'].'</td>
							<td class="hidden-xs">'.$registro2['nombresuc'].'</td>
							<td align="center">'.$registro2['saldo'].'</td>

							<td class="hidden-xs">'.$registro2['observar'].'</td>
							<td class="hidden-xs">'."<img src=\"".$registro2['fotoar']."\" width=\"30\" height=\"30\"/>".'</td>';
							$tabla = $tabla.'<td align="center">
							 <a href="javascript:eliminarProducto('.$registro2['codar'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							  <a href="javascript:mostrarfotocarga('.$registro2['codar'].');" ><img src="../recursos/subir.png" data-toggle="tooltip" title="Subir Imagen"></a>
							<a href="javascript:VerKardex('.$registro2['codar'].');" ><img src="../recursos/factura.png" data-toggle="tooltip" title="Ver Kardex"></a> 
							<a href="javascript:mostrarfoto('.$registro2['codar'].');" ><img src="../recursos/imagen.png" data-toggle="tooltip" title="Ver Imagen"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>