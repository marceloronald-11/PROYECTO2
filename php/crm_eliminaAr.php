<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM areas WHERE codarea = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS


$registro = mysqli_query($conexion,"SELECT * FROM areas ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%">Area</td>
							<td width="15%">Opciones</td>

			            </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
	
		echo '<tr>
							<td><a href="javascript:editarAr('.$registro2['codarea'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['detarea'].'</a></td>
							<td> <a href="javascript:eliminaAr('.$registro2['codarea'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Area"></a></td>
						  </tr>';
	}
echo '</table>';
?>