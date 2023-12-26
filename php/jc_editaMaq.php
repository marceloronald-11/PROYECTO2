<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM maquina WHERE codmq = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['detmaquina'], 
				1 => $valores2['codmqiso'], 
				2 => $valores2['codcc'], 
                3 => $valores2['codcciso'], 
				4 => $valores2['codpro'], 
				5 => $valores2['codproiso'], 
				                
            );
echo json_encode($datos);
?>