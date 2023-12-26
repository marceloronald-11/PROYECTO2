<?php
if (!isset($_SESSION)) {session_start();}
$nombre_u=$_SESSION['nomb_usu'];
$nombresuc=$_SESSION['nomb_suc'];
$codsucx=$_SESSION['codsuc'];

	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    //$nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN clasificacion AS cl ON ar.codcla=cl.codcla LEFT JOIN proveedor AS pv ON ar.codpv=pv.codpv "));


    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM articulossuc AS ars LEFT JOIN articulos AS ar ON ars.codar=ar.codar LEFT JOIN clasificacion AS cl ON ar.codcla=cl.codcla WHERE ars.codsuc='$codsucx' "));



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


  	$registro = mysqli_query($conexion,"SELECT * FROM articulossuc AS ars LEFT JOIN articulos AS ar ON ars.codar=ar.codar LEFT JOIN clasificacion AS cl ON ar.codcla=cl.codcla WHERE ars.codsuc='$codsucx' LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="20%">Producto</td>
			                <td width="5%" align="center">U.Med</td>
			                <td width="7%" align="center">Neto</td>
			                <td width="7%" align="center">Venta</td>
			                <td width="10%" align="center">Grupo</td>
			                <td width="10%" align="center">Saldo</td>
							
							<td width="12%" align="center">Observacion</td>
			                <td width="5%" align="center">Imagen</td>
			                <td width="5%" align="center">Acciones</td>
			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
	
	
		$tabla = $tabla.'<tr>
							<td>'.$registro2['descripar'].'</td>
							<td align="center">'.$registro2['umed'].'</td>
							<td align="right">'.$registro2['pneto'].'</td>
							
							<td align="right">'.$registro2['pvp'].'</td>
							<td>'.$registro2['descripcla'].'</td>
							<td align="center">'.$registro2['saldosuc'].'</td>
							
							<td>'.$registro2['observar'].'</td>
							<td align="center"><a href="javascript:mostrarfoto('.$registro2['codar'].');" ><img src="'.$registro2['fotoar'].'"width="30" height="30"> </a></td>
							<td align="center"> <a href="javascript:VerKardex('.$registro2['codar'].');" ><img src="../recursos/detalles.png" data-toggle="tooltip" title="Kardex "></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>