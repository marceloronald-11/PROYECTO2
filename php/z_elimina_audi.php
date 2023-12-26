<?php
if (!isset($_SESSION)) {session_start();}
$coddepx= $_SESSION['depto'];


include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM auditor WHERE idau = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM auditor AS au JOIN usuarios AS usu ON au.id_usu=usu.id_usu 
	JOIN departamento AS dp ON au.coddep=dp.coddep");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
			                <th width="10%">Usuario</th>
			                <th width="8%">Fecha</th>
							<th width="8%">Hora</th>
			                <th width="7%">Val.Ant.</th>
			                <th width="7%">Val.Act.</th>
			                <th width="10%">Modulo</th>
			                <th width="5%">Depto</th>
			                <th width="15%">Observ.</th>

			                <th width="7%">Opcion</th>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nomb_usu'].'</td>
							<td>'.$registro2['fechaau'].'</td>
							<td>'.$registro2['horaau'].'</td>
							<td>'.$registro2['valantiguo'].'</td>
							<td>'.$registro2['valnuevo'].'</td>
							<td>'.$registro2['modulo'].'</td>
							<td align="center">'.$registro2['descripdepto'].'</td>
							<td align="left">'.$registro2['observau'].'</td>

							<td align="center"><a href="javascript:eliminarAuditor('.$registro2['idau'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
						  </tr>';
	}
echo '</table>';
?>