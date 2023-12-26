<?php
//include('conexion.php');
include('../php/conexion.php');
$id = $_POST['idusux'];
$proceso = $_POST['pro'];
$iidper = $_POST['iidper'];
$usua = $_POST['usua'];
$pass = $_POST['pass'];
//$cat=$_POST['cat'];
$desar = $_POST['desar'];
//$dpp = $_POST['dpp'];

$busnombre = mysqli_query($conexion,"SELECT * FROM personas WHERE id_per='$iidper' ");
	while($buss = mysqli_fetch_array($busnombre)){
		$nnombre=$buss['nombre'];
		$foto=$buss['foto'];
		$ci=$buss['ci'];
		
	}

$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO usuarios (usuario, nomb_usu, pass_usu, id_area,id_per)VALUES
		('$usua','$nnombre','$pass','$desar','$iidper')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE usuarios SET usuario='$usua', nomb_usu = '$nnombre',pass_usu = '$pass',
		id_area = '$desar',id_per='$iidper' WHERE id_usu = '$id'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM usuarios");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
        	 <tr>
			                <th width="15%">Nombre</th>
			                <th width="10%">Usuario</th>
			                <th width="10%">Password</th>
			                <th width="10%" class="hidden-xs">Acceso</th>
			                <th width="15%">Opciones</th>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		if ($registro2['id_area']=='admin'){$tadm='Administrador';}
		if ($registro2['id_area']=='admin1'){$tadm='Conductor';}
		if ($registro2['id_area']=='usuarios'){$tadm='Publicador';}

		echo '<tr>
							<td>'.$registro2['nomb_usu'].'</td>
							<td>'.$registro2['usuario'].'</td>
							<td>'.$registro2['pass_usu'].'</td>
							<td class="hidden-xs">'.$tadm.'</td>
							
							<td><a href="javascript:editarUsuario('.$registro2['id_usu'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Usuario"></a>
							 <a href="javascript:eliminarUsux('.$registro2['id_usu'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
						  </tr>';
	}
echo '</table>';
?>