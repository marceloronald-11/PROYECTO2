<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM ccostos WHERE codcc = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM ccostos");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
<tr>
<td width="15%">Detallle</td>
<td width="7%" align="center">Codigo</td>
<td width="15%">Opciones</td>
</tr>';

	while($registro2 = mysqli_fetch_array($registro)){
	
		echo '<tr>
		<td>'.$registro2['detcostos'].'</td>
		<td align="center">'.$registro2['codcciso'].'</td>

		<td><a href="javascript:eliminaCoss('.$registro2['codcc'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Editar Usuario"></a>
		</td>
	  </tr>';
	}
echo '</table>';
?>