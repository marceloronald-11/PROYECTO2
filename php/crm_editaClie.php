<?php
include('conexion.php');
$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM clientes WHERE codcli = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['nombrecli'], 
				1 => $valores2['sexo'], 
				2 => $valores2['feingcli'], 
				3 => $valores2['direcccli'], 
				4 => $valores2['telfcli'], 
				5 => $valores2['emailcli'], 
				6 => $valores2['observcli'],
				7 => $valores2['fotocli'], 
				8 => $valores2['cicli'],
				9 => $valores2['codzo'],
				10 => $valores2['nomsalon'],
				11 => $valores2['propietaria'] 


				);
echo json_encode($datos);
?>