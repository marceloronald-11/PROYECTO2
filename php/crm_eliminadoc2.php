<?php
include('conexion.php');
$id = $_POST['id'];//coddoc
$cdalx = $_POST['codal']; //codalum


//ELIMINAMOS EL PRODUCTO

//mysqli_query($conexion,"DELETE FROM areaalumno WHERE codaa = '$id'");

mysqli_query($conexion,"DELETE FROM documentos WHERE coddoc = '$id'");

mysqli_query($conexion,"UPDATE alumno SET ndoc=ndoc-1  WHERE codalum = '$cdalx' ");
////UPDATE nro AREAS


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM documentos WHERE codalum='$cdalx' ");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%" align="center">Detalle</td>
			                <td width="10%" align="center">Archivo</td>
			                <td width="5%" align="center">Descargar</td>
							<td width="9%" align="center">Acciones</td>

			            </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
	
		echo '<tr>
							<td>'.$registro2['detdoc'].'</td>
							<td>'.$registro2['fotodoc'].'</td>
<td align="center"><a href="../archivos/'.$registro2['fotodoc'].'" target="_blank"><img src="../recursos/subir2.png" data-toggle="tooltip" title="Descargar"></a>
							 </td>
							<td align="center"> <a href="javascript:eliminaDocumento('.$registro2['coddoc'].','.$registro2['codalum'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar "></a></td>
							</tr>';
	}
echo '<tr><td colspan="4"><a href="crm_participantesdoc.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Retornar"> SALIR</a></td>
</tr>';
echo '</table>';
?>