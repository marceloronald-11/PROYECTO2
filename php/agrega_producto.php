<?php
include('conexion.php');
$id = $_POST['id-prod'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$precio_uni = $_POST['precio-uni'];
$precio_dis = $_POST['precio-dis'];
$grupo = $_POST['grupo'];

//$marca = $_POST['marca'];
//$modelo = $_POST['modelo'];
//$serial = $_POST['serial'];
$codigo = $_POST['codigo'];
//$cant = $_POST['cant'];
$cantt=1;
$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO productos (nomb_prod, tipo_prod, precio_unit, precio_dist, fecha_reg,codigo,id_prov)VALUES('$nombre','$grupo','$precio_uni', $precio_dis, '$fecha', '$codigo', '$tipo')");
	break;
	
	case 'Edicion':
		mysqli_query($conexion,"UPDATE productos SET nomb_prod = '$nombre', tipo_prod = '$grupo',precio_unit = '$precio_uni', precio_dist = '$precio_dis', codigo = '$codigo' , id_prov = '$tipo' WHERE id_prod = '$id'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM productos ORDER BY id_prod ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
  			             <tr>
			                <th width="200">Nombre</th>
			                <th width="100">Grupo</th>
							<th width="40">Precio Neto</th>
			                <th width="40">Precio Venta</th>
			                <th width="90">Codigo</th>
			                <th width="60">Registro</th>
							<th width="50">Imagen</th>
			                <th width="50">Opcion</th>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nomb_prod'].'</td>
							<td>'.$registro2['tipo_prod'].'</td>
							<td>'.$registro2['precio_dist'].'</td>
							<td>'.$registro2['precio_unit'].'</td>
							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['fecha_reg'].'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>
							<td><a href="javascript:editarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-remove-circle"></a> <a href="javascript:mostrarfoto('.$registro2['id_prod'].');" class="glyphicon glyphicon-picture"></a></td>
				</tr>';
	}
echo '</table>';
?>