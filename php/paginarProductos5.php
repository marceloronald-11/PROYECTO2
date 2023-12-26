<?php
	include('conexion.php');
	$paginaActual = $_POST['partida'];

//    $nroProductos = mysql_num_rows(mysql_query("SELECT * FROM productos"));
	$nroProductos=mysql_query("SELECT * FROM productos INNER JOIN personal ON personal.id_per = productos.id_per");
    $nroLotes = 4;
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

 // 	$registro = mysql_query("SELECT * FROM productos LIMIT $limit, $nroLotes ");
	$registro=mysql_query("SELECT * FROM productos INNER JOIN personal ON personal.id_per = productos.id_per LIMIT $limit, $nroLotes");

  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover">
			            <tr>
			                <th width="200">Nombre</th>
			                <th width="100">Tipo</th>
			                <th width="50">Precio</th>
			                <th width="60">Marca</th>
			                <th width="100">Modelo</th>
			                <th width="150">Serie</th>
			                <th width="90">Codigo</th>
			                <th width="60">Registro</th>
			                <th width="60">Asignado</th>
			                <th width="50">Transferir</th>
			            </tr>';
				
	while($registro2 = mysql_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td>'.$registro2['nomb_prod'].'</td>
							<td>'.$registro2['tipo_prod'].'</td>
							<td>'.$registro2['precio_unit'].'</td>
							<td>'.$registro2['marca'].'</td>
							<td>'.$registro2['modelo'].'</td>
							<td>'.$registro2['serial'].'</td>
							<td>'.$registro2['codigo'].'</td>
							<td>'.fechaNormal($registro2['fecha_reg']).'</td>
							<td>'.$registro2['nombre'].'</td>
							
							<td><a href="javascript:editarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-hand-right"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>