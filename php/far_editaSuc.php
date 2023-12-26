<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM sucursal WHERE codsuc = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['codtisuc'], 
				1 => $valores2['nombresuc'], 
				2 => $valores2['direccsuc'], 
				3 => $valores2['fotomapsuc'], 
				4 => $valores2['coddep'], 
				5 => $valores2['estadosuc'], 

				);
echo json_encode($datos);
?>