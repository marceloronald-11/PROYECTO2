<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM solicita WHERE codsoli = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
                0 => $valores2['detsolicitante'], 
				1 => $valores2['codarea'], 
				2 => $valores2['codcargo'], 
                
				);
echo json_encode($datos);
?>