<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM proveedor WHERE codpv = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['nombrepv'], 
				1 => $valores2['direccpv'],
				2 => $valores2['telfpv'], 
				3 => $valores2['emailpv'],
				4 => $valores2['observpv'],
				5 => $valores2['deudapv'],
				);
echo json_encode($datos);
?>