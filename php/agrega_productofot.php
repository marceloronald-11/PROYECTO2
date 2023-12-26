<?php
include('conexion.php');
$id = $_POST['id-prod'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$precio_uni = $_POST['precio-uni'];
$precio_dis = $_POST['precio-dis'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$serial = $_POST['serial'];
$codigo = $_POST['codigo'];
$cant = $_POST['cant'];
$cantt=1;
$fecha = date('Y-m-d');

    $file = $_FILES["file"];
    $nombre = $file["name"];



//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysql_query("INSERT INTO productos (nomb_prod, tipo_prod, precio_unit, precio_dist, fecha_reg,marca,modelo,serial,codigo,id_prov,saldo)VALUES('$nombre','$tipo','$precio_uni', $precio_dis, '$fecha', '$marca', '$modelo', '$serial', '$codigo', '$tipo', '$cantt')");
	break;
	
	case 'Edicion':
		mysql_query("UPDATE productos SET nomb_prod = '$nombre', tipo_prod = '$tipo',precio_unit = '$precio_uni', precio_dist = '$precio_dis', marca = '$marca', modelo = '$modelo', serial = '$serial', codigo = '$codigo' , id_prov = '$tipo' WHERE id_prod = '$id'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM productos ORDER BY id_prod ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
  			            <tr>
			                <th width="200">Nombre</th>
			                <th width="100">Tipo</th>
			                <th width="50">Precio</th>
			                <th width="60">Marca</th>
			                <th width="100">Modelo</th>
			                <th width="150">Serie</th>
			                <th width="90">Codigo</th>
			                <th width="60">Registro</th>
			                <th width="50">Opcion</th>
			            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nomb_prod'].'</td>
							<td>'.$registro2['tipo_prod'].'</td>
							<td>'.$registro2['precio_unit'].'</td>
							<td>'.$registro2['marca'].'</td>
							<td>'.$registro2['modelo'].'</td>
							<td>'.$registro2['serial'].'</td>
							<td>'.$registro2['codigo'].'</td>
							<td>'.fechaNormal($registro2['fecha_reg']).'</td>
							<td><a href="javascript:editarProductofot('.$registro2['id_prod'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-remove-circle"></a> <a href="javascript:mostrarfoto('.$registro2['id_prod'].');" class="glyphicon glyphicon-picture"></a></td>
				</tr>';
	}
echo '</table>';
?>