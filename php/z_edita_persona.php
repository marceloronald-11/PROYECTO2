<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM personas WHERE id_per = '$id'");
$valores2 = mysqli_fetch_array($valores);


$datos = array(
				0 => $valores2['nombre'], 
				1 => $valores2['email'], 
				2 => $valores2['cel'], 
				3 => $valores2['direccion'],
				4 => $valores2['observ'],
				5 => $valores2['ci'],
				6 => $valores2['coddep'],

				);
echo json_encode($datos);
?>