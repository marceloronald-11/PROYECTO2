<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM zonas WHERE codzo = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['detzona'], 
				);
echo json_encode($datos);
?>