<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM personas WHERE id_per = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM personas ORDER BY id_per ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
			                <th width="200">Nombre</th>
			                <th width="100">Direccion</th>
							<th width="40">E-mail</th>
			                <th width="40">Telf/Cel.</th>
			                <th width="90">No CI.</th>
			                <th width="60">Observ.</th>
							<th width="50">Imagen</th>
			                <th width="50">Opcion</th>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nombre'].'</td>
							<td>'.$registro2['direccion'].'</td>
							<td>'.$registro2['email'].'</td>
							<td>'.$registro2['cel'].'</td>
							<td>'.$registro2['ci'].'</td>
							<td>'.$registro2['observ'].'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>	
							<td><a href="javascript:editarPersona('.$registro2['id_per'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarPersona('.$registro2['id_per'].');" class="glyphicon glyphicon-remove-circle"></a> <a href="javascript:mostrarfotocarga('.$registro2['id_per'].');" class="glyphicon glyphicon-download-alt"></a> <a href="javascript:mostrarfoto('.$registro2['id_per'].');" class="glyphicon glyphicon-picture"></a></td>
						  </tr>';
	}
echo '</table>';
?>