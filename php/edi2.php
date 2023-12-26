<?php
include('conexion.php');

$id2 = $_POST['id2'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM proceso WHERE codpro = '$id2'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['detproceso'], 
				1 => $valores2['codproiso'], 
            );
echo json_encode($datos);
?>