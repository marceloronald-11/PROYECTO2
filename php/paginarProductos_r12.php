<?php
	include('conexion.php');
	$paginaActual = $_POST['partida'];

//    $nroProductos = mysql_num_rows(mysql_query("SELECT * FROM venta INNER JOIN venta_detalle.id = venta.id WHERE id<1 "));
//	$nroProductos=mysql_query("SELECT * FROM productos INNER JOIN personal ON personal.id_per = productos.id_per");
	$nroProductos=mysql_query("SELECT * FROM productos INNER JOIN personal ON venta_detalle.id = productos.id_prod WHERE id_prod<1");

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

// 	$registro = mysql_query("SELECT * FROM productos WHERE id_per<1 LIMIT $limit, $nroLotes ");
  
  	$registro = mysql_query("SELECT * FROM productos INNER JOIN venta_detalle ON venta_detalle.id = productos.id_prod WHERE id_prod<1 LIMIT $limit, $nroLotes ");

//	$registro=mysql_query("SELECT * FROM venta INNER JOIN venta_detalle ON venta_detalle.id = venta.id WHERE venta.encargado LIKE '%$dato%'");

//	$registro=mysql_query("SELECT * FROM productos INNER JOIN personal ON personal.id_per = productos.id_per LIMIT $limit, $nroLotes");

  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover">
			            <tr>
			                <th width="200">Articulo</th>
							<th width="100">Tipot</th>
							<th width="100">Cantidad</th>
			                <th width="100">PRECIO</th>
			                <th width="50">NETO</th>
			                <th width="50">Total</th>
			                <th width="60">Utilidad</th>
			                <th width="60">Fecha</th>
			            </tr>';
				
	while($registro2 = mysql_fetch_array($registro)){
		$tabla = $tabla.'<tr>
				<td>'.$registro2['nomb_prod'].'</td>
				<td>'.$registro2['tipo_prod'].'</td>
				<td>'.$registro2['cantidad'].'</td>
				<td>'.number_format($registro2['precio'],2).'</td>
				<td>'.number_format($registro2['precio_dist'],2).'</td>
				<td>'.$registro2['subtotal'].'</td>
				<td>'.fechaNormal($registro2['fecha']).'</td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>