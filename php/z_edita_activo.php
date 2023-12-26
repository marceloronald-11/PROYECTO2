<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM activos WHERE codar = '$id'");
$valores2 = mysqli_fetch_array($valores);


$datos = array(
				0 => $valores2['descripcion'], 
				1 => $valores2['codigo'], 
				2 => $valores2['fecha_ing'], 
				3 => $valores2['existencia'],
				4 => $valores2['observ'],
				5 => $valores2['umed'],
				6 => $valores2['stockmin'],
				7 => $valores2['foto'],
				8 => $valores2['codcla'],
				9 => $valores2['codpv'],
				10 => $valores2['coddep'],
				11 => $valores2['pneto'],
				12 => $valores2['pvp'],
				13 => $valores2['observart'],

				);
echo json_encode($datos);
?>