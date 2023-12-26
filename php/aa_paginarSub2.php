<?php
	include('conexion.php');
	//require_once '../Config/conexion.php';
	$paginaActual = 1; //$_POST['partida'];
	$nor = $_POST['idu'];
	$codsx = $_POST['codsx'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM transferdet WHERE norden='$nor' AND cdt='' "));
    $nroLotes = 100;
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
	
$registro= mysqli_query($conexion,"SELECT * FROM transferdet WHERE norden='$nor' AND cdt='' LIMIT $limit, $nroLotes");

  	$tabla = $tabla.'<hr>';
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover">';
	$tabla = $tabla.'<tr><td><h4>DETALLE</h4></td></tr>';
	$tabla = $tabla.'</table>';
	 
	 
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover">
			            <tr>
			                <td align="center">No Orden</td>
			                <td align="center">Articulo</td>
			                <td align="center">Cant.</td>
							<td align="center">Opciones</td>

			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td align="left">'.$registro2['norden'].'</td>
							<td align="left">'.$registro2['descripdt'].'</td>
							<td align="center">'.$registro2['cant'].'</td>

							<td align="center"><a href="javascript:ConfirmTra('.$registro2['codt'].','.$registro2['codar'].','.$codsx.','.$registro2['norden'].');"><img src="../recursos/confirm.png" data-toggle="tooltip" title="Confirmar Registro"></a></td>
						  </tr>';		
	}
        
    $tabla = $tabla.'</table>';
	$tabla=$tabla. '<a href="aa_confirmSuc2.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Cerrar"> Cerrar</a>'.'  ';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>