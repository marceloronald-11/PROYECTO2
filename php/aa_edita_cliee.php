<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM clientes WHERE codcli = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['nombrecli'], 
				1 => $valores2['direcccli'],
				2 => $valores2['telfcli'], 
				3 => $valores2['emailcli'],
				4 => $valores2['cicli'],
				5 => $valores2['observcli'],
				6 => $valores2['fotocli'],
				7 => $valores2['zona'],
				8 => $valores2['nitcli'],

				);
echo json_encode($datos);
?>