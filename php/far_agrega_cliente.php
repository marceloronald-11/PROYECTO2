<?php
//include('conexion.php');
include('../php/conexion.php');
$idcli = $_POST['idcli'];
$proceso = $_POST['pro'];
$nomcli = $_POST['nomcli'];
$dircli = $_POST['dircli'];
$telf = $_POST['telf'];
$mailcli=$_POST['mailcli'];
$obcli = $_POST['obcli'];
$nitc = $_POST['nitc'];

//var_dump ($_POST);
$fecha = date('Y-m-d');

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO clientes (nombrecli,feingcli,direcccli,telfcli, emailcli,observcli,nitcli)VALUES
		('$nomcli','$fecha','$dircli','$telf','$mailcli','$obcli','$nitc')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE clientes SET nombrecli='$nomcli', direcccli = '$dircli',telfcli = '$telf',
		emailcli = '$mailcli',observcli='$obcli',nitcli='$nitc'  WHERE codcli = '$idcli'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM clientes");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
        	 <tr>
			                <td width="20%">Nombre Cliente</td>
			                <td width="9%">Registro</td>
			                <td width="15%">Direccion</td>
			                <td width="10%">Telf/Cel.</td>
			                <td width="10%">Email</td>
			                <td width="10%">Nit</td>
			                <td width="15%">Observaciones</td>
			                <td width="10%">Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		$fee=date("d-m-Y",strtotime($registro2['feingcli']));

		echo '<tr>
							<td>'.$registro2['nombrecli'].'</td>
							<td>'.$fee.'</td>
							<td>'.$registro2['direcccli'].'</td>
							<td>'.$registro2['telfcli'].'</td>
							<td>'.$registro2['emailcli'].'</td>
							<td>'.$registro2['nitcli'].'</td>

							<td>'.$registro2['observcli'].'</td>
							<td><a href="javascript:editarCli('.$registro2['codcli'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Cliente"></a>
							 <a href="javascript:eliminaCli('.$registro2['codcli'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Cliente"></a></td>
						  </tr>';
	}
echo '</table>';
?>