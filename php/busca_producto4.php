<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM personal WHERE nombre LIKE '%$dato%' OR cargo LIKE '%$dato%' ORDER BY id_per ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
		            <tr>
			                <th width="300">Nombre</th>
			                <th width="300">Carnet N°</th>
			                <th width="200">Cargo</th>
			                <th width="150">Area</th>
			                <th width="150">Celular</th>
			                <th width="150">Direccion</th>
			                <th width="50">Opciones</th>
			            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
<td>'.$registro2['nombre'].'</td>
							<td>'.$registro2['ci'].'</td>
							<td>'.$registro2['cargo'].'</td>
							<td>'.$registro2['area'].'</td>
							<td>'.$registro2['cel'].'</td>
							<td>'.$registro2['direccion'].'</td>
							<td><a href="javascript:editarProducto('.$registro2['id_per'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_per'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>