<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysql_query("DELETE FROM proveedor WHERE id_prov = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM proveedor ORDER BY id_prov ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
			            <tr>
			                <th width="300">Nombre</th>
			                <th width="80">Carnet N°</th>
			                <th width="200">Empresa</th>
			                <th width="100">Celular</th>
			                <th width="200">Direccion</th>
			                <th width="50">Opciones</th>
			            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nombre'].'</td>
							<td>'.$registro2['ci'].'</td>
							<td>'.$registro2['empresa'].'</td>
							<td>'.$registro2['cel'].'</td>
							<td>'.$registro2['direccion'].'</td>
							<td><a href="javascript:editarProducto('.$registro2['id_prov'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_prov'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>