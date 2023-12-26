<?php
include('conexion.php');
$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM movimtot WHERE norden = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['afavor'], 
				1 => $valores2['fechato'], 
				2 => $valores2['totimporte'], 
				3 => $valores2['tmm'],
				4 => $valores2['norden'] 



				);
echo json_encode($datos);
?>