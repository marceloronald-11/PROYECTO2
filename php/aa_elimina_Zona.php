<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM zonas WHERE codzo = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM zonas ");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="20">Zona</td>
							<td width="12%">Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td><a href="javascript:editarCli('.$registro2['codzo'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['detzona'].'</a></td>
							
							<td> <a href="javascript:eliminarClaa('.$registro2['codzo'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Grupo"></a></td> 
						  </tr>';
	}
echo '</table>';
?>