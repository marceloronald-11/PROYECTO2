<?php
if (!isset($_SESSION)) {session_start();}
$coddepx= $_SESSION['depto'];


include('conexion.php');

$id = $_POST['id'];  //codt
$idar = $_POST['idar']; //codar
$idno = $_POST['idno'];  //norden
$cant = $_POST['cant'];  //norden

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM movimdet WHERE codt = '$id'");

mysqli_query($conexion,"UPDATE activos SET existencia = existencia-'$cant' WHERE codar = '$idar'");


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM movimdet WHERE coddep='$coddepx' AND norden='$idno'");

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
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['fechadt'].'</td>
							<td>'.$registro2['norden'].'</td>

							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['descripdt'].'</td>
							<td>'.$registro2['umed'].'</td>
							<td>'.$registro2['cant'].'</td>
							<td>'.$registro2['tmm'].'</td>
							<td><a href="javascript:eliminarActivo('.$registro2['norden'].');" class="glyphicon glyphicon-remove-circle" data-toggle="tooltip" title="Eliminar Registro"></a>  </td>
						  </tr>';
	}
echo '</table>';
?>