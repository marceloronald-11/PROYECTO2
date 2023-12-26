<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM clientes WHERE codcli = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['nombrecli'], 
				1 => $valores2['feingcli'],
				2 => $valores2['direcccli'], 
				3 => $valores2['telfcli'],
				4 => $valores2['emailcli'],
				5 => $valores2['observcli'],
				6 => $valores2['nitcli'],
				7 => $valores2['fotocli'],
				8 => $valores2['habilcli'],

				);
echo json_encode($datos);
?>