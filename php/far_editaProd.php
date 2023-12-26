<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM articulos WHERE codar = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['descripar'], 
				1 => $valores2['codigoba'],
//				2 => $valores2['codcla'], 
//				3 => $valores2['codpv'],
//				4 => $valores2['feingar'],
//				5 => $valores2['saldo'],
//				6 => $valores2['marca'],
//				7 => $valores2['preciva'],
//				8 => $valores2['presiva'],
//				9 => $valores2['premayor'],
//				10 => $valores2['compatible'],
//				11 => $valores2['stockmin'],
//				12 => $valores2['observart'],
//				13 => $valores2['codsuc'],
//				14 => $valores2['fotoar'],
//				15 => $valores2['qrfotoar'],
//				16 => $valores2['pneto'],
//				17 => $valores2['umed'],

				);
echo json_encode($datos);
?>