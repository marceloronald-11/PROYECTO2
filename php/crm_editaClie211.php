<?php
include('conexion.php');
$id = $_POST['idx'];//codcli
$codsolix = $_POST['codsolix'];



//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM solicitudes AS so LEFT JOIN clientes AS cli ON so.codcli=cli.codcli WHERE so.codsoli = '$codsolix'");

$valores2 = mysqli_fetch_array($valores);


$datos = array(
				0 => $valores2['codcli'], 
				1 => $valores2['nombre211'], 
				2 => $valores2['ci211'], 
				3 => $valores2['cel211'], 
				4 => $valores2['direccion211'], 
				5 => $valores2['parentesco211'], 
				6 => $valores2['actividad211'], 
				7 => $valores2['croquisdom211'], 
				8 => $valores2['croquisnego211'],
				9 => $valores2['nit211'], 
				10 => $valores2['nomnego211'],
				11 => $valores2['dirnego211'], 
				12 => $valores2['datencion211'], 
				13 => $valores2['empezo211'], 
				14 => $valores2['negoes211'], 
				15 => $valores2['lugar211'], 
				16 => $valores2['asalariado211'], 
				17 => $valores2['dirempleo211'], 


				);
echo json_encode($datos);
?>