<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM personal WHERE codper = '$id'");
mysqli_query($conexion,"DELETE FROM usuarios WHERE codper = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM personal ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered  titi">
<tr>
			                <td width="15%">Nombre</td>
			                <td width="15%">Direccion</td>
			                <td width="9%">Cel/Telf.</td>
			                <td width="9%">Correo</td>
			                <td width="9%">No CI</td>

							<td width="9%">Observaciones</td>
			                <td width="5%">Imagen</td>
							<td width="15%">Opciones</td>

			            </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
	
		echo '<tr>
        <td><a href="javascript:editarPer('.$registro2['codper'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['nombreper'].'</a></td>
        <td>'.$registro2['direccper'].'</td>
        <td>'.$registro2['celper'].'</td>
        <td>'.$registro2['emailper'].'</td>
        <td>'.$registro2['ciper'].'</td>

        <td>'.$registro2['observper'].'</td>
        <td><a href="javascript:mostrarfoto('.$registro2['codper'].');" ><img src="'.$registro2['fotoper'].'"width="30" height="30"> </a></td>
        <td> <a href="javascript:eliminaPer('.$registro2['codper'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
      </tr>';
	}
echo '</table>';
?>