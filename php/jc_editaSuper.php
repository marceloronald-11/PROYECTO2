<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM supervisor WHERE codspv = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['detsupervisor'], 
				1 => $valores2['codigospv'], 

            );
echo json_encode($datos);
?>