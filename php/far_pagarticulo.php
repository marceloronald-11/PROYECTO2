<?php
if (!isset($_SESSION)) {session_start();}
//$coddepx= $_SESSION['depto'];
//$areax=$_SESSION['id_area']; // admin si es ok sino no mostrar eliminar editar subir foto 
//$codsucx=$_SESSION['codsuc'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	
	
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM articulos AS ar JOIN laboratorio AS la ON ar.codlab=la.codlab "));
    $nroLotes = 5;
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

  	$registro = mysqli_query($conexion,"SELECT * FROM articulos AS ar JOIN laboratorio AS la ON ar.codlab=la.codlab  LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-bordered titi" >
			            <tr>
			                <td width="25%" class="hidden-xs-down" >Producto</td>
			                <td width="4%" >U.Med.</td>
							<td width="3%" >Contenido</td>
			                <td width="4%" >P.Neto</td>
							<td width="4%" >P.Venta</td>
							<td width="2%" >Control</td>
							<td width="10%" >Laboratorio</td>
							<td width="9%" >Observacion</td>

							<td width="5%" >Imagen</td>
			                <td width="12%" align="center">Opcion</td>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td><a href="javascript:editarProdu('.$registro2['codar'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['descripar'].'</a></td>							
							<td align="center" >'.$registro2['umed'].'</td>
							<td >'.$registro2['contiene'].'</td>
							<td >'.$registro2['pneto'].'</td>
							<td >'.$registro2['pvp'].'</td>
							<td align="center" >'.$registro2['control'].'</td>
							<td >'.$registro2['nombrelab'].'</td>
							<td >'.$registro2['observar'].'</td>
					<td ><a href="javascript:mostrarfoto('.$registro2['codar'].');" ><img src="'.$registro2['fotoar'].'"width="30" height="30"> </a></td>';
							$tabla = $tabla.'<td align="center"><a href="javascript:eliminaProd('.$registro2['codar'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							 <a href="javascript:mostrarfotocarga('.$registro2['codar'].');" ><img src="../recursos/subir.png" data-toggle="tooltip" title="Subir Imagen"></a>
							</td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>