<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM laboratorio WHERE codlab = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM laboratorio");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
			      <tr>
			                <td width="15%">Laboratorio</td>
			                <td width="10%">Direccion</td>
			                <td width="10%">Telf/Cel.</td>
			                <td width="10%">E-mail</td>
			                <td width="10%">Cuenta</td>
			                <td width="15%">Observaciones</td>
			                <td width="15%">Opciones</td>

			            </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
	
		echo '<tr>
							<td>'.$registro2['nombrelab'].'</td>
							<td>'.$registro2['direccionlab'].'</td>
							<td>'.$registro2['telflab'].'</td>
							<td>'.$registro2['emaillab'].'</td>
							<td>'.$registro2['deudapv'].'</td>
							<td>'.$registro2['observlab'].'</td>
							<td><a href="javascript:editarLab('.$registro2['codlab'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Usuario"></a>
							 <a href="javascript:eliminarLab('.$registro2['codlab'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
						  </tr>';
	}
echo '</table>';
?>