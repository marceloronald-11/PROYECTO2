<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM servcliente WHERE codsc = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM servcliente AS se LEFT JOIN servicios AS sv ON se.codser=sv.codser ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
					            <td align="center">Servicio</td>
					            <td align="center">Solicito</td>
					            <td align="center">Estado</td>
								<td>Opcion</td>
					        </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		$fexx= date("d-m-Y", strtotime($registro2['solicito']) );
		$apro=$registro2['aprobo'];
		if($apro=='P'){$dt='PENDIENTE';}else{$dt='HABILITADO';}	
		
		echo '<tr>
							<td>'.$registro2['detservicio'].'</td>
							<td>'.$fexx.'</td>
							<td>'.$dt.'</td>

							<td><a href="javascript:ElininaServicio('.$registro2['codsc'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Servicio"></a></td>
						  </tr>';
	}
echo '</table>';
?>