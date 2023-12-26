<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM personal WHERE codper = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['nombreper'], 
				1 => $valores2['emailper'], 
				2 => $valores2['celper'], 
				3 => $valores2['direccper'], 
				4 => $valores2['observper'], 
				5 => $valores2['fotoper'], 
				6 => $valores2['ciper'], 
				7 => $valores2['codcargo'], 
				8 => $valores2['codarea'] 


				);
echo json_encode($datos);
?>