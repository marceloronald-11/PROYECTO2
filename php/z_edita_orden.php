<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM ordendet WHERE codt = '$id'");
$valores2 = mysqli_fetch_array($valores);


$datos = array(
				0 => $valores2['descripdt'], 
				1 => $valores2['cant'], 
				2 => $valores2['norden'], 
				3 => $valores2['nfactura'], 

				);
echo json_encode($datos);
?>