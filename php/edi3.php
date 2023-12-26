<?php
include('conexion.php');

$id3 = $_POST['id3'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM maquina WHERE codmq = '$id3'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['detmaquina'], 
				1 => $valores2['codmqiso'], 
            );
echo json_encode($datos);
?>