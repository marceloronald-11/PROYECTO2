<?php
//include('conexion.php');
include('../php/conexion.php');
$id = $_POST['id-prod'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$ci = $_POST['ci'];
$cargo = $_POST['cargo'];
$area = $_POST['area'];
$cel = $_POST['cel'];
$direccion = $_POST['direccion'];
//echo $persona;
$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysql_query("INSERT INTO personal (nombre, cargo, area, cel, direccion,ci)VALUES('$nombre','$cargo','$area','$cel', '$direccion', '$ci')");
	break;
	
	case 'Editar':
		//mysql_query("UPDATE productos SET asignado = 'SI' WHERE id_prod = '$id'");
		mysql_query("UPDATE personal SET nombre = '$nombre', ci = '$ci', cargo = '$cargo', area = '$area', cel = '$cel', direccion = '$direccion' WHERE id_per = '$id'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM personal ORDER BY id_per ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
  			            <tr>
			                <th width="300">Nombre</th>
			                <th width="300">Carnet N°</th>
			                <th width="200">Cargo</th>
			                <th width="150">Area</th>
			                <th width="150">Celular</th>
			                <th width="150">Direccion</th>
			                <th width="50">Opciones</th>
			            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nombre'].'</td>
							<td>'.$registro2['ci'].'</td>
							<td>'.$registro2['cargo'].'</td>
							<td>'.$registro2['area'].'</td>
							<td>'.$registro2['cel'].'</td>
							<td>'.$registro2['direccion'].'</td>
							<td><a href="javascript:editarProducto('.$registro2['id_per'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_per'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>