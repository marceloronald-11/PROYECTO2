<?php
include('conexion.php');

$id1 = $_POST['id1'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM ccostos WHERE codcc = '$id1'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['detcostos'], 
				1 => $valores2['codcciso'], 
            );
echo json_encode($datos);
?>