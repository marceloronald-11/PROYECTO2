<?php
include('conexion.php');

$id = $_POST['nordenx'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM movimtot WHERE norden = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['fechato'], 
				1 => $valores2['norden'], 
				2 => $valores2['totimporte'], 
				3 => $valores2['afavor'], 
				4 => $valores2['nfactura'], 
				5 => $valores2['nit'], 
				6 => $valores2['nitcliente'], 
				7 => $valores2['codsuc'], 

);

echo json_encode($datos);
?>