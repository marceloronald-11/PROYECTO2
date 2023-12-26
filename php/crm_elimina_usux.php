<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM usuarios WHERE id_usu = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM usuarios  ");


//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
			            <tr>
			                <td width="15%">Nombre</td>
			                <td width="10%">Usuario</td>
			                <td width="10%">Password</td>
			                <td width="10%">Acceso</td>
							
			                <td width="15%">Opciones</td>

			            </tr>';
	$tadm='';			

	while($registro2 = mysqli_fetch_array($registro)){
		if ($registro2['id_area']=='admin'){$tadm='Administrador';}
		if ($registro2['id_area']=='usua'){$tadm='Usuario';}
		echo '<tr>
							<td><a href="javascript:editarUsuario('.$registro2['id_usu'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['nomb_usu'].'</a></td>							
							<td>'.$registro2['usuario'].'</td>
							<td>'.$registro2['pass_usu'].'</td>
							<td class="hidden-xs">'.$tadm.'</td>
												
							<td> <a href="javascript:eliminarUsux('.$registro2['id_usu'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
						  </tr>';
	}
echo '</table>';
?>