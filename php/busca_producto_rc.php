<?php
include('conexion.php');

$dato = $_POST['dato'];
$tot=0.00;
$util=0.00;
$totnet=0.00;

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

//$registro = mysql_query("SELECT * FROM productos WHERE nomb_prod LIKE '%$dato%' OR tipo_prod LIKE '%$dato%' AND id_per<1 ORDER BY id_prod ASC");

$registro=mysql_query("SELECT * FROM venta INNER JOIN venta_detalle ON venta_detalle.id = venta.id WHERE venta.encargado LIKE '%$dato%' AND venta.tmov='I'");



//SELECT * FROM productos WHERE id_per<1
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
			                <th width="200">Nombre del Cliente</th>
							<th width="100">Cant</th>
			                <th width="100">PRECIO</th>
			                <th width="150">NETO</th>
			                <th width="150">Total</th>
			                <th width="60">Fecha</th>
			            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		
		$util=($registro2['precio_dist'])*$registro2['cantidad'];
		$tot += $util;
				
		echo '<tr>
				<td>'.$registro2['encargado'].'</td>
				<td>'.$registro2['cantidad'].'</td>
				<td>'.number_format($registro2['precio'],2).'</td>
				<td>'.number_format($registro2['precio_dist'],2).'</td>
				<td>'.number_format($util,2).'</td>

				<td>'.fechaNormal($registro2['fecha']).'</td>
				</tr>';

	} ?>
			<tr>
	        	<td colspan="4" class="text-right">Total</td>
	        	<td ><?php echo number_format($tot,2);?></td>

	        	<td></td>

	        </tr>
<?	
	
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>