<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM cargo WHERE codcargo = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['detcargo'], 
				1 => $valores2['codcargo'], 

				);
echo json_encode($datos);
?>