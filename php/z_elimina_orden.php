<?php
if (!isset($_SESSION)) {session_start();}
$codde=$_SESSION['depto'];

include('conexion.php');

$id = $_POST['id'];
$nnorden = $_POST['nnorden'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM ordendet WHERE codt = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM ordendet WHERE norden='$nnorden' AND coddep='$codde'");
//$registro = mysqli_query($conexion,"SELECT * FROM ordendet WHERE coddep='$codde'");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
			                <th width="10%">Orden</th>
			                <th width="50%">Descripcion</th>
			                <th width="10%">Cant</th>
			                <th width="15%">No Factura</th>

			                <th width="10%">Opciones</th>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['norden'].'</td>
							<td>'.$registro2['descripdt'].'</td>
							<td>'.$registro2['cant'].'</td>
							<td>'.$registro2['nfactura'].'</td>

							<td> <a href="javascript:editarOrden('.$registro2['codt'].');" class="glyphicon glyphicon-pencil"></a>
							 <a href="javascript:eliminarOrden('.$registro2['codt'].','.$registro2['norden'].');" class="glyphicon glyphicon-remove"></a></td>							


				</tr>';
	}
echo '</table>';
?>