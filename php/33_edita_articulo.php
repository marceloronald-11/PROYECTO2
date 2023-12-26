<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM activos WHERE codar = '$id'");
$valores2 = mysqli_fetch_array($valores);


$datos = array(
				0 => $valores2['codar'], 
				1 => $valores2['codigo'],
				2 => $valores2['descripcion'], 
				3 => $valores2['pneto'], 
				4 => $valores2['pvp'],
				5 => $valores2['umed'],
				6 => $valores2['codpv'],
				7 => $valores2['existencia'],
				8 => $valores2['foto'],
				9 => $valores2['observart'],
				10 => $valores2['stockmin'],
				11 => $valores2['coddep'],
				);
echo json_encode($datos);
?>