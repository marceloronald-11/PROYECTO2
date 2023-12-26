<?php
include('conexion.php');

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

//COMPROBAMOS QUE LAS FECHAS EXISTAN
if(isset($desde)==false){
	$desde = $hasta;
}

if(isset($hasta)==false){
	$hasta = $desde;
}
$tot=0.00;
$util=0.00;
//EJECUTAMOS LA CONSULTA DE BUSQUEDA

//$registro=mysql_query("SELECT * FROM productos INNER JOIN venta_detalle ON venta_detalle.id = productos.id_prod WHERE fecha_reg BETWEEN '$desde' AND '$hasta' ORDER BY id_prod ASC");

//$registro = mysql_query("SELECT productos.*,venta.*,venta_detalle.cant, vent_detalle.precio,venta_detalle.precio_dist, venta_detalle.subtotal,venta.fecha \n"
//. "FROM venta_detalle LEFT JOIN productos\n"
//. "ON venta_detalle.id_producto = productos.id_prod\n"
//. "LEFT JOIN venta ON venta.id = venta_detalle.idventa\n"
//. "  WHERE venta.fecha BETWEEN '$desde' AND '$hasta' ORDER BY productos.id_prod");


//$registro =mysql_query ("SELECT venta.*,productos.*,venta_detalle.cant, vent_detalle.precio,venta_detalle.precio_dist, venta_detalle.subtotal,venta.fecha \n"
//."FROM venta_detalle LEFT JOIN venta\n"."ON venta_detalle.idventa = venta.id\n"."LEFT JOIN productos ON venta_detalle.idproducto = productos.id_prod\n"."WHERE venta.fecha BETWEEN '$desde' AND '$hasta' ORDER BY productos.id_prod");
	
//$registro= mysql_query("SELECT * FROM venta INNER JOIN venta_detalle ON venta.id = venta_detalle.idventa inner join productos on venta_detalle.idproducto=productos.id_prod WHERE fecha BETWEEN '$desde' AND '$hasta'");	

$registro= mysql_query("SELECT * FROM productos INNER JOIN venta_detalle ON productos.id_prod = venta_detalle.idproducto INNER JOIN venta ON venta.id=venta_detalle.idventa WHERE fecha BETWEEN '$desde' AND '$hasta' AND venta.tmov='E' ");	





//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
			                <th width="40">id</th>
			                <th width="200">Articulo</th>
							<th width="100">Tipot</th>
							<th width="100">Cantidad</th>
			                <th width="100">PRECIO</th>
			                <th width="50">NETO</th>
			                <th width="50">Total</th>
			                <th width="60" align="right">Utilidad</th>
			                <th width="60">Fecha</th>
			            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		$util=( $registro2['precio']-$registro2['precio_dist'])*$registro2['cantidad'];
		$tot += $util;
		echo '<tr>
				<td>'.$registro2['id'].'</td>
				<td>'.$registro2['nomb_prod'].'</td>
				<td>'.$registro2['tipo_prod'].'</td>
				<td>'.$registro2['cantidad'].'</td>
				<td>'.number_format($registro2['precio'],2).'</td>
				<td>'.number_format($registro2['precio_dist'],2).'</td>
				<td>'.$registro2['subtotal'].'</td>
				<td align="right">'.number_format($util,2).'</td>
				<td>'.fechaNormal($registro2['fecha']).'</td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
} ?>


			<tr>
	        	<td colspan="7" class="text-right">Total</td>
	        	<td align="right"><?php echo number_format($tot,2);?></td>

	        	<td></td>

	        </tr>







<?
echo '</table>';
?>