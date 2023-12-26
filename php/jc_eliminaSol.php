<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM solicita WHERE codsoli = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM solicita AS sol LEFT JOIN areas AS ar ON sol.codarea=ar.codarea LEFT JOIN cargo AS ca ON sol.codcargo=ca.codcargo");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
<tr>
<td width="15%">Nombre</td>
<td width="15%">Area</td>
<td width="15%">Cargo</td>
<td width="10%">Acciones</td>

</tr>';

	while($registro2 = mysqli_fetch_array($registro)){
	
		echo '<tr>
        <td>'.$registro2['detsolicitante'].'</td>
        <td>'.$registro2['detarea'].'</td>
        <td>'.$registro2['detcargo'].'</td>

        <td><a href="javascript:editarHe('.$registro2['codsoli'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar "></a>
         <a href="javascript:eliminaHe('.$registro2['codsoli'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar"></a></td>
      </tr>';
	}
echo '</table>';
?>