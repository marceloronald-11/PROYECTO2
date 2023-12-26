<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM cargo WHERE codcargo = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS


$registro = mysqli_query($conexion,"SELECT * FROM cargo ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%">Cargo</td>
							<td width="15%">Opciones</td>

			            </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
	
		echo '<tr>
							<td><a href="javascript:editarCar('.$registro2['codcargo'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['detcargo'].'</a></td>
							<td> <a href="javascript:eliminaCar('.$registro2['codcargo'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Area"></a></td>
						  </tr>';
	}
echo '</table>';
?>