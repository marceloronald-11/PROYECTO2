<?php 
if (!isset($_SESSION)) {session_start();}
$nombre_u=$_SESSION['nomb_usu'];
$id_usu=$_SESSION['id_usu'];


include('../php/conexion.php');

$codclix=$_SESSION['coddcli'];

$registro = mysqli_query($conexion,"SELECT * FROM ticket AS ti LEFT JOIN areas AS ar ON ti.codarea=ar.codarea LEFT JOIN clientes AS cl ON ti.codcli=cl.codcli WHERE ti.codcli='$codclix'  ");

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
	$dt='';			
	while($registro2 = mysqli_fetch_array($registro)){
		$fexx= date("d-m-Y", strtotime($registro2['fechatk']) );
		$apro=$registro2['aprobotk'];
		if($apro=='P'){$dt='PENDIENTE';}else{$dt='ATENDIDO';}	
$nomm=$registro2['nombrecli'].' '.$registro2['apellidop'].' '.$registro2['apellidom'];
		echo '<tr>
							<td>'.$registro2['codtk'].'</td>
							<td>'.$nomm.'</td>
							<td>'.$registro2['detarea'].'</td>
							<td>'.$fexx.'</td>
							<td>'.$dt.'</td>
							<td>'.$registro2['observtk'].'</td>

							<td><a href="javascript:ElininaServicio('.$registro2['codtk'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Servicio"></a></td>
						  </tr>';		
	}
        

    echo '</table>';



?>

<script src="../js/myjavaServi2.js"></script>