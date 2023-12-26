<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO
//if ($id!='1'){
mysqli_query($conexion,"DELETE FROM sucursal WHERE codsuc= '$id'  AND codtisuc!=1 ");
//}
//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM sucursal AS su JOIN tiposucursal AS ts ON su.codtisuc=ts.codtisuc ");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
			        <tr>
			                <td width="15%">Sucursal</td>
			                <td width="15%">Direccion</td>
			                <td width="15%">Tipo</td>
							<td width="15%">Habilitado</td>
							<td width="10%" class="hidden-xs">Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nombresuc'].'</td>
							<td>'.$registro2['direccsuc'].'</td>
							<td>'.$registro2['descriptisuc'].'</td>
							<td>'.$registro2['estadosuc'].'</td>
							

							<td align="center"><a href="javascript:editarSuc('.$registro2['codsuc'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Registro"></a>
							 <a href="javascript:eliminarSuc('.$registro2['codsuc'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							   </td>
						  </tr>';
	}
echo '</table>';
?>