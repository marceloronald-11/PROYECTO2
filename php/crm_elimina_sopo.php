<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM ticket WHERE codtk = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM ticket AS ti LEFT JOIN areas AS ar ON ti.codarea=ar.codarea LEFT JOIN clientes AS cl ON ti.codcli=cl.codcli ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi2">
			            <tr>
					            <td align="center">No Ticket</td>
					            <td align="center">Cliente</td>
					            <td align="center">Area</td>
					            <td align="center" width="8%">Fecha</td>
					            <td align="center">Estado</td>
								<td align="center">Observacion</td>

								<td>Opcion</td>
					        </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		$fexx= date("d-m-Y", strtotime($registro2['fechatk']) );
		$apro=$registro2['aprobotk'];
		if($apro=='P'){$dt='PENDIENTE';}else{$dt='ATENDIDO';}	
$nomm=$registro2['nombrecli'].' '.$registro2['apellidop'].' '.$registro2['apellidom'];
		
		echo '<tr>
							<td align="center">'.$registro2['codtk'].'</td>
							<td>'.$nomm.'</td>
							<td>'.$registro2['detarea'].'</td>
							<td>'.$fexx.'</td>';
		if($apro=='P'){
			echo '<td><a href="javascript:editarSopo('.$registro2['codtk'].');" data-toggle="tooltip" title="ATENDER CASO">'.$dt.'</a></td>';
		}
		else{
			echo '<td>'.$dt.'</td>';
		}
							
							
							echo '<td>'.$registro2['observtk'].'</td>

							<td><a href="javascript:EliminaSopo('.$registro2['codtk'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a></td>
						  </tr>';
	}
echo '</table>';
?>