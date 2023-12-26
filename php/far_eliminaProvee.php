<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM proveedor WHERE codpv = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM proveedor");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
			            <tr>
			                <td width="10%">Proveedor</td>
			                <td width="15%">Direccion</td>
			                <td width="10%">Telf/Cel.</td>
			                <td width="15%">E-mail</td>
			                <td width="15%">Observaciones</td>
			                <td width="8%">Opciones</td>

			            </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
	
		echo '<tr>
							<td>'.$registro2['nombrepv'].'</td>
							<td>'.$registro2['direccpv'].'</td>
							<td>'.$registro2['telfpv'].'</td>
							<td>'.$registro2['emailpv'].'</td>
							<td>'.$registro2['observpv'].'</td>
							<td><a href="javascript:editarLab('.$registro2['codpv'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar"></a>
							 <a href="javascript:eliminaLab('.$registro2['codpv'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar "></a></td>
						  </tr>';
	}
echo '</table>';
?>