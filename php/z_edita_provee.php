<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM proveedor WHERE codpv = '$id'");
$valores2 = mysqli_fetch_array($valores);


$datos = array(
				0 => $valores2['nombre'], 
				1 => $valores2['direccion'], 
				2 => $valores2['telf'], 
				3 => $valores2['email'],
				4 => $valores2['observ'],
				5 => $valores2['foto'],
				6 => $valores2['ci'],



				);
echo json_encode($datos);
?>