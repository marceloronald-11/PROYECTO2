<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

//**mysqli_query($conexion,"DELETE FROM clientes WHERE codcli = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM documentos WHERE codcli='$id' ");
//$registro = mysqli_query($conexion,"SELECT * FROM documentos");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="12">Detalle</td>
			                <td width="5%">Imagen</td>
							<td width="9%">Opciones</td>

			            </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							
							<td>'.$registro2['detdoc'].'</td>
							<td><a href="javascript:mostrarfotodoc2('.$registro2['coddoc'].');" ><img src="'.$registro2['fotodoc'].'"width="30" height="30"> </a></td>
							<td> <a href="javascript:eliminaDocu('.$registro2['coddoc'].','.$registro2['codcli'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
							</tr>';
						  	}
echo '<tr><td colspan="4"><a href="crm_clientes.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Retornar a Recetas"> SALIR</a></td>
</tr>';
echo '</table>';
?>