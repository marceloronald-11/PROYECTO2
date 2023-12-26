<?php
//include('conexion.php');
include('../php/conexion.php');
$id = $_POST['id-prod'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$tipo=$_POST['tipo'];
$ipp = $_POST['iidper'];
$dpp = $_POST['dpp'];

$busnombre = mysqli_query($conexion,"SELECT * FROM personas WHERE id_per='$ipp' ");
	while($buss = mysqli_fetch_array($busnombre)){
		$nnombre=$buss['nombre'];
		$foto=$buss['foto'];
		$ci=$buss['ci'];
		
	}

$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO usuarios (usuario, nomb_usu, pass_usu, id_area,id_per,coddep)VALUES
		('$usuario','$nnombre','$password','$tipo','$ipp','$dpp')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE usuarios SET nomb_usu = '$nnombre', usuario = '$usuario',pass_usu = '$password',
		id_area = '$tipo',id_per='$ipp',coddep='$dpp' WHERE id_usu = '$id'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM usuarios ORDER BY id_usu ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
 			                <th width="300">Nombre</th>
			                <th width="200">Usuario</th>
			                <th width="200">Password</th>
			                <th width="150">Acceso</th>
			                <th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nomb_usu'].'</td>
							<td>'.$registro2['usuario'].'</td>
							<td>'.$registro2['pass_usu'].'</td>
							<td>'.$registro2['id_area'].'</td>
							
							<td><a href="javascript:editarProducto('.$registro2['id_usu'].');" class="glyphicon glyphicon-edit"></a>
							 <a href="javascript:eliminarProducto('.$registro2['id_usu'].');" class="glyphicon glyphicon-remove-circle"></a></td>
						  </tr>';
	}
echo '</table>';
?>