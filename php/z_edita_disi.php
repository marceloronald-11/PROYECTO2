<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM disiplina WHERE coddisi = '$id'");
$valores2 = mysqli_fetch_array($valores);


$datos = array(
				0 => $valores2['descripdici'], 
				1 => $valores2['observ'],



				);
echo json_encode($datos);
?>