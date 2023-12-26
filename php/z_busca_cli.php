<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion,"SELECT * FROM clientes WHERE nombre LIKE '%$dato%' OR ci LIKE '%$dato%' ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover tam">
        	<tr>
			                <th width="200">Cliente </th>
			                <th width="100">No Carnet</th>
			                <th width="100">Codigo</th>
							<th width="40">Ingreso</th>
			                <th width="40">Edad</th>
			                <th width="40">Sexo</th>
			                <th width="90">Telf/Cel.</th>
			                <th width="60">Observ.</th>
							<th width="50">Imagen</th>
			                <th width="50">Opcion</th>
			            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nombre'].'</td>
							<td>'.$registro2['ci'].'</td>
							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['feing'].'</td>
							<td>'.$registro2['edad'].'</td>
							<td>'.$registro2['sexo'].'</td>
							<td>'.$registro2['cel'].'</td>
							<td>'.$registro2['observcli'].'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>	
							<td><a href="javascript:editarCliente('.$registro2['idcli'].');" class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Editar Datos"></a> <a href="javascript:eliminarActivo('.$registro2['idcli'].');" class="glyphicon glyphicon-remove-circle" data-toggle="tooltip" title="Eliminar Registro"></a> <a href="javascript:mostrarfotocarga('.$registro2['idcli'].');" class="glyphicon glyphicon-download-alt" data-toggle="tooltip" title="Subir Imagen"></a> <a href="javascript:mostrarfoto('.$registro2['idcli'].');" class="glyphicon glyphicon-picture" data-toggle="tooltip" title="Ver Imagen"></a></td>
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>