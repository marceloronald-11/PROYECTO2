<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM articulos WHERE codar = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['codcla'], 
				1 => $valores2['codpv'], 
				2 => $valores2['descripar'], 
				3 => $valores2['fechaing'], 
				4 => $valores2['saldo'], 
				5 => $valores2['umed'], 
				6 => $valores2['pneto'], 
				7 => $valores2['pvp'], 
				8 => $valores2['stockmin'],
				9 => $valores2['fechavence'],
				10 => $valores2['observar'],
				11 => $valores2['fotoar'],
				12 => $valores2['codsuc'],
				13=> $valores2['fechavence'],
				14 => $valores2['codigo'],
				15 => $valores2['dimension'],
				16 => $valores2['marca'],
				17 => $valores2['modelo'],
				18 => $valores2['serie'],
				19 => $valores2['procedencia'],
				20 => $valores2['codgru'],
				21 => $valores2['codmar'],
				22 => $valores2['codti'],


				);
echo json_encode($datos);
?>