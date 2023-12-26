<?php
if (!isset($_SESSION)) {session_start();}
//$coddepx= $_SESSION['depto'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	
	
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM dosificacion AS do JOIN sucursal AS su on do.codsuc=su.codsuc"));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM dosificacion AS do JOIN sucursal AS su on do.codsuc=su.codsuc LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%">Sucursal</td>
			                <td width="15%">Nro Autorizacion</td>
			                <td width="15%">Nit</td>
			                <td width="15%">Llave</td>
			                <td width="10%">Fecha limite</td>
			                <td width="15%">Leyenda</td>
							<td width="5%">Habilitado</td>
							<td width="10%" class="hidden-xs">Opciones</td>

			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td>'.$registro2['nombresuc'].'</td>
							<td>'.$registro2['nautorizacion'].'</td>
							<td>'.$registro2['nit'].'</td>
							<td>'.$registro2['llave'].'</td>
							<td>'.$registro2['fechalim'].'</td>
							<td>'.$registro2['leyenda'].'</td>
							<td>'.$registro2['cdfac'].'</td>
							

							<td align="center"><a href="javascript:editarSucFac('.$registro2['coddo'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Registro"></a>
							 <a href="javascript:eliminarSuc('.$registro2['coddo'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							   </td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>