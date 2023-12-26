<?php
if (!isset($_SESSION)) {session_start();}
$coddepx= $_SESSION['depto'];

include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion,"SELECT * FROM movimdet WHERE coddep='$coddepx' AND norden='$dato' ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	 <tr>
			                <th width="200">Fecha</th>
			                <th width="100">No Orden</th>
			                <th width="100">Codigo</th>
							<th width="40">Descripcion</th>
			                <th width="40">U.Med.</th>
			                <th width="90">Cant.</th>
			                <th width="60">Area</th>
			                <th width="50">Opcion</th>
			            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['fechadt'].'</td>
							<td>'.$registro2['norden'].'</td>

							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['descripdt'].'</td>
							<td>'.$registro2['umed'].'</td>
							<td>'.$registro2['cant'].'</td>
							<td>'.$registro2['tmm'].'</td>
							<td><a href="javascript:eliminarActivo('.$registro2['codt'].','.$registro2['codar'].','.$registro2['norden'].','.$registro2['cant'].');" class="glyphicon glyphicon-remove-circle" data-toggle="tooltip" title="Eliminar Registro"></a>  </td>
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>