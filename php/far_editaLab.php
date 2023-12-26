<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM laboratorio WHERE codlab = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['nombrelab'], 
				1 => $valores2['direccionlab'],
				2 => $valores2['telflab'], 
				3 => $valores2['emaillab'],
				4 => $valores2['observlab'],
				5 => $valores2['deudapv'],
				);
echo json_encode($datos);
?>