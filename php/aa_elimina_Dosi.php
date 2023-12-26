<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO
//if ($id!='1'){
mysqli_query($conexion,"DELETE FROM dosificacion WHERE coddo= '$id'  ");
//}
//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

//$registro = mysqli_query($conexion,"SELECT * FROM sucursal AS su JOIN tiposucursal AS ts ON su.codtisuc=ts.codtisuc ");
$registro = mysqli_query($conexion,"SELECT * FROM dosificacion AS do JOIN sucursal AS su on do.codsuc=su.codsuc ");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
			        <tr>
			                <td width="15%">Sucursal</td>
			                <td width="15%">Nro Autorizacion</td>
			                <td width="15%">Nit</td>
			                <td width="15%">Llave</td>
			                <td width="10%">Fecha limite</td>
			                <td width="15%">Leyenda</td>
							<td width="5%">Habilitado</td>
							<td width="10%" class="hidden-xs">Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nombresuc'].'</td>
							<td>'.$registro2['nautorizacion'].'</td>
							<td>'.$registro2['nit'].'</td>
							<td>'.$registro2['llave'].'</td>
							<td>'.$registro2['fechalim'].'</td>
							<td>'.$registro2['leyenda'].'</td>
							<td>'.$registro2['cdfac'].'</td>
							

							<td align="center"><a href="javascript:editarSucFac('.$registro2['coddo'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Registro"></a>
							 <a href="javascript:eliminarSuc('.$registro2['coddo'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							   </td>
						  </tr>';
	}
echo '</table>';
?>