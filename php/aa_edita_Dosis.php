<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM dosificacion WHERE coddo = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['nautorizacion'], 
				1 => $valores2['nit'], 
				2 => $valores2['llave'], 
				3 => $valores2['fechalim'], 
				4 => $valores2['leyenda'], 
				5 => $valores2['cdfac'], 
				6 => $valores2['codsuc'], 
				

);

echo json_encode($datos);
?>