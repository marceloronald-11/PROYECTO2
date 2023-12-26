<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM proceso WHERE codpro = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['detproceso'], 
				1 => $valores2['codproiso'], 
				2 => $valores2['codcc'], 
				3 => $valores2['codcciso'], 
            );
echo json_encode($datos);
?>