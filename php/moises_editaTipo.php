<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM tipo WHERE codti = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['dettipo'], 
				);
echo json_encode($datos);
?>