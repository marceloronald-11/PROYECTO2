<?php
include('conexion.php');
if (!isset($_SESSION)) {session_start();}
$coddepx= $_SESSION['depto'];

$id = $_POST['idper'];
$proceso = $_POST['pro'];
$nombre = $_POST['nomb'];
$ci = $_POST['ci'];
$dire = $_POST['dire'];
$cel = $_POST['cel'];
$email = $_POST['email'];
$observ = $_POST['observ'];
$dpp = $_POST['dpp'];

//$marca = $_POST['marca'];
//$modelo = $_POST['modelo'];
//$serial = $_POST['serial'];
//$codigo = $_POST['codigo'];
//$cant = $_POST['cant'];
$cantt=1;
$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO personas (nombre, email, cel, direccion, ci,observ,coddep)VALUES('$nombre','$email','$cel', '$dire', '$ci', '$observ','$dpp')");
	break;
	
	case 'Edicion':
		mysqli_query($conexion,"UPDATE personas SET nombre = '$nombre', email = '$email',cel = '$cel', direccion = '$dire', ci = '$ci' , observ = '$observ',coddep='$dpp' WHERE id_per = '$id'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM personas AS per JOIN departamento AS dp ON per.coddep=dp.coddep WHERE dp.coddep='$coddepx'");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
  			             <tr>
			                <th width="200">Nombre</th>
			                <th width="100">Direccion</th>
							<th width="40">E-mail</th>
			                <th width="40">Telf/Cel.</th>
			                <th width="90">No CI.</th>
			                <th width="90">Depto</th>
			                <th width="60">Observ.</th>
							<th width="50">Imagen</th>
			                <th width="50">Opcion</th>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nombre'].'</td>
							<td>'.$registro2['direccion'].'</td>
							<td>'.$registro2['email'].'</td>
							<td>'.$registro2['cel'].'</td>
							<td>'.$registro2['ci'].'</td>
							<td>'.$registro2['descripdepto'].'</td>
							<td>'.$registro2['observ'].'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>	
							<td><a href="javascript:editarPersona('.$registro2['id_per'].');" class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Editar Datos"></a> <a href="javascript:eliminarPersona('.$registro2['id_per'].');" class="glyphicon glyphicon-remove-circle" data-toggle="tooltip" title="Eliminar"></a> <a href="javascript:mostrarfotocarga('.$registro2['id_per'].');" class="glyphicon glyphicon-download-alt" data-toggle="tooltip" title="Subir Foto"></a> <a href="javascript:mostrarfoto('.$registro2['id_per'].');" class="glyphicon glyphicon-picture" data-toggle="tooltip" title="Ver Foto"></a></td>
						  </tr>';
	}
echo '</table>';
?>