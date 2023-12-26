<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM servcliente WHERE codsc = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS


$registro = mysqli_query($conexion,"SELECT * FROM servcliente AS se LEFT JOIN  clientes AS cl ON se.codcli=cl.codcli LEFT JOIN servicios AS sv ON se.codser=sv.codser LEFT JOIN usuarios AS u ON se.idusu=u.id_usu ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi2">
			            <tr>
					            <td align="center">Servicio</td>
					            <td align="center">Cliente</td>
					            <td align="center" width="8%">Fecha</td>
					            <td align="center">Atendio</td>
					            <td align="center">Estado</td>
								<td align="center">Observacion</td>

								<td>Opcion</td>
					        </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
		$fexx= date("d-m-Y", strtotime($registro2['solicito']) );
		$apro=$registro2['aprobo'];
		if($apro=='P'){$dt='PENDIENTE';}else{$dt='ATENDIDO';}	
$nomm=$registro2['nombrecli'].' '.$registro2['apellidop'].' '.$registro2['apellidom'];
	
		echo '<tr>
							<td >'.$registro2['detservicio'].'</td>
							<td>'.$nomm.'</td>
							<td>'.$fexx.'</td>
							<td >'.$registro2['nomb_usu'].'</td>';
							
		if($apro=='P'){
			echo '<td><a href="javascript:editarCli('.$registro2['codsc'].');" data-toggle="tooltip" title="HABILITAR">'.$dt.'</a></td>';
		}
		else{
			echo '<td>'.$dt.'</td>';
		}
							
							
							echo '<td>'.$registro2['observserr'].'</td>

							<td><a href="javascript:eliminaSer('.$registro2['codsc'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Servicio"></a></td>
						  </tr>';
	}
echo '</table>';
?>