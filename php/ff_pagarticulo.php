<?php
if (!isset($_SESSION)) {session_start();}
//$coddepx= $_SESSION['depto'];
//$areax=$_SESSION['id_area']; // admin si es ok sino no mostrar eliminar editar subir foto 
//$codsucx=$_SESSION['codsuc'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	
	
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM articulos "));
    $nroLotes = 2;
    $nroPaginas = ceil($nroProductos/$nroLotes);
    $lista = '';
    $tabla = '';

    if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a  href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li ><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a  href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';
    }
  
  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}

  	$registro = mysqli_query($conexion,"SELECT * FROM articulos   LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-bordered" >
			            <tr>
			                <td width="15%">Producto</td>
			                <td width="4%" >Codigo</td>
			                <td width="4%" >U.Med.</td>
							<td width="7%" >Neto</td>
			                <td width="10%" align="center">Opcion</td>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td>'.$registro2['descripar'].'</td>
							<td >'.$registro2['codigo'].'</td>
							<td >'.$registro2['umed'].'</td>
							<td >'.$registro2['pneto'].'</td>';
							$tabla = $tabla.'<td><a href="javascript:editarArtiss('.$registro2['codar'].');" ><img src="../recursos/factura.png" data-toggle="tooltip" title="Ver Kardex"></a> 
							<a href="javascript:mostrarfoto('.$registro2['codar'].');" ><img src="../recursos/imagen.png" data-toggle="tooltip" title="Ver Imagen"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>