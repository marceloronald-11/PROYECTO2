<?php
include('conexion.php');

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$ttot=0.00;
//COMPROBAMOS QUE LAS FECHAS EXISTAN
if (!isset($_POST['desde'])){
//if(isset($desde)==false){
	$desde = $hasta;
}
if (!isset($_POST['hasta'])){
//if(isset($desde)==false){
	$hasta = $desde;
}

//if(isset($hasta)==false){
//	$hasta = $desde;
//}
//
//EJECUTAMOS LA CONSULTA DE BUSQUEDA
//$registro = mysqli_query($conexion,"SELECT * FROM movgymtot WHERE fechagym BETWEEN '$desde' AND '$hasta'");
$registro = mysqli_query($conexion,"SELECT * FROM movgymtot AS mv JOIN clientes AS cli ON mv.idcli=cli.idcli WHERE fechamv BETWEEN '$desde' AND '$hasta'");
//$registro = mysqli_query($conexion,"SELECT * FROM movgymtot AS mv JOIN clientes AS cli ON mv.idcli=cli.idcli LIMIT $limit, $nroLotes ");

//$re=mysql_query("SELECT * FROM productos INNER JOIN personal ON personal.id_per = productos.id_per");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered">
        	<tr>
			                <th width="9%">Fecha </th>
			                <th width="15%">Nombre</th>
			                <th width="8%">No Orden</th>
							<th width="5%">Importe</th>
			            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		$feee= date("d-m-Y", strtotime($registro2['fechamv']) );
		$ttot=$ttot+$registro2['importe'];
		echo '<tr>
							<td align="center">'.$feee.'</td>
							<td>'.$registro2['nombre'].'</td>
							<td align="center">'.$registro2['nordengym'].'</td>
							<td align="right">'.$registro2['importe'].'</td>
						  </tr>';
	}
	echo '<tr><td colspan="2"></td><td> Total Bs.- </td><td align="right">'.number_format($ttot,2).'</td><tr>';
}else{
	echo '<tr>
				<td colspan="6">No se encontraron Ventas</td>
			</tr>';
}
echo '</table>';
?>