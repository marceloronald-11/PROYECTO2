<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM sucursal WHERE codsuc = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['nombresuc'], 
				1 => $valores2['direccsuc'], 
				2 => $valores2['estadosuc'], 
				3 => $valores2['codtisuc'], 

);

echo json_encode($datos);
?>