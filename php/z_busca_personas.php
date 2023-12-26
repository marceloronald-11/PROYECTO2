<?php
if (!isset($_SESSION)) {session_start();}
$coddepx= $_SESSION['depto'];

include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA
//SELECT * FROM personas AS per JOIN departamento AS dp ON per.coddep=dp.coddep WHERE dp.coddep='$coddepx'
//$registro = mysqli_query($conexion,"SELECT * FROM personas WHERE nombre LIKE '%$dato%' OR ci LIKE '%$dato%' ORDER BY id_per ASC");
$registro = mysqli_query($conexion,"SELECT * FROM personas AS per JOIN departamento AS dp ON per.coddep=dp.coddep WHERE dp.coddep='$coddepx' AND nombre LIKE '%$dato%' ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	 <tr>
			                <th width="200">Nombre</th>
			                <th width="100">Direccion</th>
							<th width="40">E-mail</th>
			                <th width="40">Telf/Cel.</th>
			                <th width="90">No CI.</th>
			                <th width="90">Depto</th>
			                <th width="60">Observ.</th>
							<th width="50">Imagen</th>
			                <th width="50">Opcion</th>
			            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nombre'].'</td>
							<td>'.$registro2['direccion'].'</td>
							<td>'.$registro2['email'].'</td>
							<td>'.$registro2['cel'].'</td>
							<td>'.$registro2['ci'].'</td>
							<td>'.$registro2['descripdepto'].'</td>
							<td>'.$registro2['observ'].'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>	
							<td><a href="javascript:editarPersona('.$registro2['id_per'].');" class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Editar Datos"></a> <a href="javascript:eliminarPersona('.$registro2['id_per'].');" class="glyphicon glyphicon-remove-circle" data-toggle="tooltip" title="Eliminar"></a> <a href="javascript:mostrarfotocarga('.$registro2['id_per'].');" class="glyphicon glyphicon-download-alt" data-toggle="tooltip" title="Subir Foto"></a> <a href="javascript:mostrarfoto('.$registro2['id_per'].');" class="glyphicon glyphicon-picture" data-toggle="tooltip" title="Ver Foto"></a></td>
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>