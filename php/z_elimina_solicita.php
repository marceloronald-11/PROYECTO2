<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM abastetot WHERE cod_abaste = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM abastetot ORDER BY cod_abaste ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
			                <th width="200">Descripcion</th>
			                <th width="100">Codigo</th>
							<th width="40">Fecha Ing.</th>
			                <th width="40">U.Med.</th>
			                <th width="90">Stock Min.</th>
			                <th width="60">Saldo</th>
							<th width="50">Imagen</th>
			                <th width="50">Opcion</th>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['descripcion'].'</td>
							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['fecha_ing'].'</td>
							<td>'.$registro2['umed'].'</td>
							<td>'.$registro2['stockmin'].'</td>
							<td>'.$registro2['existencia'].'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>	
							<td><a href="javascript:editarActivo('.$registro2['cod_activo'].');" class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Editar Datos"></a> <a href="javascript:eliminarActivo('.$registro2['cod_activo'].');" class="glyphicon glyphicon-remove-circle" data-toggle="tooltip" title="Eliminar Registro"></a> <a href="javascript:mostrarfotocarga('.$registro2['cod_activo'].');" class="glyphicon glyphicon-download-alt" data-toggle="tooltip" title="Subir Imagen"></a> <a href="javascript:mostrarfoto('.$registro2['cod_activo'].');" class="glyphicon glyphicon-picture" data-toggle="tooltip" title="Ver Imagen"></a></td>
						  </tr>';
	}
echo '</table>';
?>