<?php
include('conexion.php');

$id = $_POST['codcrex'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM creditos AS cr LEFT JOIN clientes AS cl ON cr.codcli=cl.codcli  WHERE cr.codcre = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['totalcr'], 
				1 => $valores2['saldocr'],
				2 => $valores2['fechacre'], 
				3 => $valores2['codsuc'],
				4 => $valores2['norden'],
				5 => $valores2['codcli'],
				6 => $valores2['nombrecli'],

				);
echo json_encode($datos);
?>