<?php
include('conexion.php');
$id = $_POST['idx'];//codcli
$codsolix = $_POST['codsolix'];



//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM solicitudes AS so LEFT JOIN clientes AS cli ON so.codcli=cli.codcli WHERE so.codsoli = '$codsolix'");

$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['codcli'], 
				1 => $valores2['nombresolicita'], 
				2 => $valores2['montosolicita'], 
				3 => $valores2['cuantopaga'], 
				4 => $valores2['cadatiempo'], 
				5 => $valores2['invertira'], 
				6 => $valores2['croquis1'], 
				7 => $valores2['croquis2'], 
				8 => $valores2['actividadnego'],
				9 => $valores2['nit'], 
				10 => $valores2['nomnegocio'],
				11 => $valores2['diasatencion'], 
				12 => $valores2['empezo'], 
				13 => $valores2['direccionnego'], 
				14 => $valores2['optnegocio'], 
				15 => $valores2['optactividad'], 
				16 => $valores2['optsalario'], 
				17 => $valores2['dirempleo'], 
				18 => $valores2['optgarantia'], 
				19 => $valores2['optogarantia'], 
				20 => $valores2['nombrecli'], 
				21 => $valores2['cicli'], 
				22 => $valores2['telfcli'], 


				);
echo json_encode($datos);
?>