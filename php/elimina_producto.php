<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM productos WHERE id_prod = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM productos ORDER BY id_prod ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
			                <th width="200">Nombre</th>
			                <th width="100">Grupo</th>
							<th width="40">Precio Neto</th>
			                <th width="40">Precio Venta</th>
			                <th width="90">Codigo</th>
			                <th width="60">Registro</th>
							<th width="50">Imagen</th>
			                <th width="50">Opcion</th>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['nomb_prod'].'</td>
							<td>'.$registro2['tipo_prod'].'</td>
							<td>'.$registro2['precio_dist'].'</td>
							<td>'.$registro2['precio_unit'].'</td>
							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['fecha_reg'].'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>
							<td><a href="javascript:editarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-remove-circle"></a> <a href="javascript:mostrarfoto('.$registro2['id_prod'].');" class="glyphicon glyphicon-picture"></a></td>
				</tr>';
	}
echo '</table>';
?>