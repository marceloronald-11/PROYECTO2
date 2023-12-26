<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM clasificacion WHERE codcla = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM clasificacion ");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%">Detalle del Grupo</td>
			                <td width="6%">Prefijo</td>
							
							<td width="10%">Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td><a href="javascript:editarCli('.$registro2['codcla'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['descripcla'].'</a></td>
							<td>'.$registro2['prefijo'].'</td>
							
							<td> <a href="javascript:eliminarClaa('.$registro2['codcla'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Grupo"></a></td> 
						  </tr>';
	}
echo '</table>';
?>