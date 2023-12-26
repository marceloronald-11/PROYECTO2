<?php
include('conexion.php');

$id4 = $_POST['id4'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM elemento WHERE codel = '$id4'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['detelemento'], 
				1 => $valores2['codeliso'], 
            );
echo json_encode($datos);
?>