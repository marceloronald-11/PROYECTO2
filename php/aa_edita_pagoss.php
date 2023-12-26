<?php
include('conexion.php');

$id = $_POST['codcrex'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM creditos AS cr JOIN clientes AS cli ON cr.codcli=cli.codcli JOIN sucursal 
as suc ON cr.codsuc=suc.codsuc WHERE cr.codcre = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['totalcr'], 
				1 => $valores2['saldocr'],
				2 => $valores2['fechacre'], 
				3 => $valores2['observcre'],
				4 => $valores2['codcli'],
				5 => $valores2['codsuc'],
				6 => $valores2['nordencre'],
				7 => $valores2['nombrecli'],
				8 => $valores2['nombresuc'],

				);
echo json_encode($datos);
?>