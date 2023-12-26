<?php
include('conexion.php');

$nordenx = $_POST['nordenx'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM movimtot WHERE norden = '$nordenx'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['fechato'],
				1 => $valores2['afavor'], 
				);
echo json_encode($datos);
?>