<?php
include('conexion.php');
$id = $_POST['idx'];//codcli
$codsolix = $_POST['codsolix'];



//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM solicitudes AS so LEFT JOIN clientes AS cli ON so.codcli=cli.codcli WHERE so.codsoli = '$codsolix'");

$valores2 = mysqli_fetch_array($valores);


$datos = array(
				0 => $valores2['codcli'], 
				1 => $valores2['nombre212'], 
				2 => $valores2['ci212'], 
				3 => $valores2['cel212'], 
				4 => $valores2['direccion212'], 
				5 => $valores2['parentesco212'], 
				6 => $valores2['actividad212'], 
				7 => $valores2['croquisdom212'], 
				8 => $valores2['croquisnego212'],
				9 => $valores2['nit212'], 
				10 => $valores2['nomnego212'],
				11 => $valores2['dirnego212'], 
				12 => $valores2['datencion212'], 
				13 => $valores2['empezo212'], 
				14 => $valores2['negoes212'], 
				15 => $valores2['lugar212'], 
				16 => $valores2['asalariado212'], 
				17 => $valores2['dirempleo212'], 


				);
echo json_encode($datos);
?>