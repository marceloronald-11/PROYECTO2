<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM planpagos AS pla LEFT JOIN clientes AS cli ON pla.codcli=cli.codcli WHERE pla.codplan = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['codcli'], 
				1 => $valores2['codsoli'], 
				2 => $valores2['fechaplan'], 
				3 => $valores2['capital'], 
				4 => $valores2['interes'], 
				5 => $valores2['cargos'], 
				6 => $valores2['garantia'], 
				7 => $valores2['cuota'], 
				8 => $valores2['saldo'], 
				9 => $valores2['nombrecli'], 
				10 => $valores2['cicli'], 


				);
echo json_encode($datos);
?>