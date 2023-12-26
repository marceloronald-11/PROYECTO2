<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM clientes WHERE codcli = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM clientes ");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="20%" align="center">Nombre</td>
			                <td width="12%" align="center">Direccion</td>
			                <td width="10%" align="center">Telf/Cel</td>
			                <td width="8%" align="center">No Carnet</td>
			                <td width="10%" align="center">Correo</td>
							<td width="10%" align="center">Observaciones</td>
			                <td width="3%" align="center">Imagen</td>
							<td width="5%" align="center">Acciones</td>

			            </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
	
		echo '<tr>
							<td><a href="javascript:editarCli('.$registro2['codcli'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['nombrecli'].'</a></td>
							<td>'.$registro2['direcccli'].'</td>
							<td>'.$registro2['telfcli'].'</td>
							<td>'.$registro2['cicli'].'</td>
							<td>'.$registro2['emailcli'].'</td>
							<td>'.$registro2['observcli'].'</td>
							<td><a href="javascript:mostrarfoto('.$registro2['codcli'].');" ><img src="'.$registro2['fotocli'].'"width="30" height="30"> </a></td>
							<td align="center"> <a href="javascript:eliminaCli('.$registro2['codcli'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a> </td> 
						  </tr>';
	}
echo '</table>';
?>