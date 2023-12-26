<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM servicios WHERE codser = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS


$registro = mysqli_query($conexion,"SELECT * FROM servicios ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%">Servicios</td>
							<td width="15%">Opciones</td>

			            </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
	
		echo '<tr>
							<td><a href="javascript:editarServi('.$registro2['codser'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['detservicio'].'</a></td>
							<td> <a href="javascript:eliminaServi('.$registro2['codser'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Servicio"></a></td>
						  </tr>';
	}
echo '</table>';
?>