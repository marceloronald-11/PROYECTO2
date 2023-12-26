<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM productos WHERE nomb_prod LIKE '%$dato%' ORDER BY id_prod ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	 <tr>
			                <th width="300">Nombre</th>
			                <th width="100">Precio</th>
			                <th width="200">Neto</th>
			                <th width="90">Codigo</th>
			                <th width="100">Registro</th>
			                <th width="100">Opcion</th>
			            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['nomb_prod'].'</td>
							<td>'.number_format($registro2['precio_unit'],2).'</td>
							<td>'.number_format($registro2['precio_dist'],2).'</td>
							<td>'.$registro2['codigo'].'</td>
							<td>'.fechaNormal($registro2['fecha_reg']).'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"35\" height=\"35\"/>".'</td>							

							<td><a href="javascript:mostrarfoto('.$registro2['id_prod'].');" class="glyphicon glyphicon-picture"></a></td>
						  </tr>';	
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>