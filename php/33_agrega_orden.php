<?php
include('conexion.php');
$id = $_POST['idper'];
$proceso = $_POST['pro'];
$descri = $_POST['descri'];
$cant = $_POST['cant'];
$nordenx = $_POST['nordenx'];
$facx = $_POST['fac'];

$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO productos (nomb_prod, tipo_prod, precio_unit, precio_dist, fecha_reg,codigo,id_prov)VALUES('$nombre','$grupo','$precio_uni', $precio_dis, '$fecha', '$codigo', '$tipo')");
	break;
	
	case 'Edicion':
		mysqli_query($conexion,"UPDATE ordendet SET cant = '$cant',nfactura='$facx' WHERE codt = '$id'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM ordendet WHERE norden='$nordenx' ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
  			             <tr>
			                <th width="10%">Orden</th>
			                <th width="50%">Descripcion</th>
			                <th width="10%">Cant</th>
			                <th width="15%">No Factura</th>

			                <th width="10%">Opciones</th>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['norden'].'</td>
							<td>'.$registro2['descripdt'].'</td>
							<td>'.$registro2['cant'].'</td>
							<td>'.$registro2['nfactura'].'</td>
							<td> <a href="javascript:editarOrden('.$registro2['codt'].');" class="glyphicon glyphicon-pencil"></a>
							 <a href="javascript:eliminarOrden('.$registro2['codt'].','.$registro2['norden'].');" class="glyphicon glyphicon-remove"></a></td>							
				</tr>';
	}
echo '</table>';
?>