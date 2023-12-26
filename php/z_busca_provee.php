<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion,"SELECT * FROM proveedor WHERE nombre LIKE '%$dato%' OR ci LIKE '%$dato%' ORDER BY codpv ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	 <tr>
			                <th width="20%">Nombre</th>
			                <th width="20%">Direccion</th>
							<th width="10%">No Carnet</th>
			                <th width="10%">Telefono</th>
			                <th width="15%">E-mail </th>
			                <th width="15%">Observ.</th>
							<th width="5%">Imagen</th>
			                <th width="10%">Opcion</th>
			            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nombre'].'</td>
							<td>'.$registro2['direccion'].'</td>
							<td>'.$registro2['ci'].'</td>
							<td>'.$registro2['telf'].'</td>
							<td>'.$registro2['email'].'</td>
							<td>'.$registro2['observ'].'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>	
							<td><a href="javascript:editarProvee('.$registro2['codpv'].');" class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Editar Datos"></a>
							 <a href="javascript:eliminarProvee('.$registro2['codpv'].');" class="glyphicon glyphicon-remove-circle" data-toggle="tooltip" title="Eliminar Registro"></a>
							  <a href="javascript:mostrarfotocarga('.$registro2['codpv'].');" class="glyphicon glyphicon-download-alt" data-toggle="tooltip" title="Subir Imagen"></a>
							   <a href="javascript:mostrarfoto('.$registro2['codpv'].');" class="glyphicon glyphicon-picture" data-toggle="tooltip" title="Ver Imagen"></a></td>
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>