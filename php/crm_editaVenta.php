<?php
include('conexion.php');
$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM movimdet WHERE codt = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['descripdt'], 
				1 => $valores2['cant'], 
				2 => $valores2['nlotee'], 
				3 => $valores2['norden'], //codar 
				4 => $valores2['codlot'], 
				5 => $valores2['codar'], 
				6 => $valores2['precio'], 


				);
echo json_encode($datos);
?>