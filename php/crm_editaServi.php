<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM servicios WHERE codser = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['detservicio'], 
				1 => $valores2['codser'], 

				);
echo json_encode($datos);
?>