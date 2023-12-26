<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM usuarios WHERE id_usu = '$id'");

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