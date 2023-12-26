<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM productos WHERE nomb_prod LIKE '%$dato%' OR tipo_prod LIKE '%$dato%' AND id_per<1 ORDER BY id_prod ASC");




//SELECT * FROM productos WHERE id_per<1
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
			                <th width="200">Nombre</th>
			                <th width="100">Tipo</th>
			                <th width="50">Precio</th>
			                <th width="60">Marca</th>
			                <th width="100">Modelo</th>
			                <th width="150">Serie</th>
			                <th width="90">Codigo</th>
			                <th width="30">Disp.</th>
			                <th width="60">Registro</th>
			                <th width="50">Asignar</th>
			            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['nomb_prod'].'</td>
							<td>'.$registro2['tipo_prod'].'</td>
							<td>'.$registro2['precio_unit'].'</td>
							<td>'.$registro2['marca'].'</td>
							<td>'.$registro2['modelo'].'</td>
							<td>'.$registro2['serial'].'</td>
							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['saldo'].'</td>
							<td>'.fechaNormal($registro2['fecha_reg']).'</td>
				<td><a href="javascript:editarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-hand-right"></a> </td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>