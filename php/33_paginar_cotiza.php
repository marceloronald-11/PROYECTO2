<?php
if (!isset($_SESSION)) {session_start();}
$codde=$_SESSION['depto'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM activos WHERE coddep='$codde'"));
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
	
$registro= mysqli_query($conexion,"SELECT * FROM activos WHERE coddep='$codde' LIMIT $limit, $nroLotes");

  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover">
			            <tr>
			                <th>Codigo</th>
			                <th>Descripcion</th>
			                <th>Saldo</th>
							<th>Imagen</th>
			                <th >Opciones</th>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['descripcion'].'</td>
							<td>'.number_format($registro2['existencia'],0).'</td>

							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>	
							
							
							<td><a href="javascript:editarProducto('.$registro2['codar'].');" class="glyphicon glyphicon-shopping-cart"></a>
							 <a href="javascript:mostrarfoto('.$registro2['codar'].');" class="glyphicon glyphicon-picture"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>