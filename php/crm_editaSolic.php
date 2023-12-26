<?php
include('conexion.php');

$id = $_POST['id'];
$codsoli3=$_POST['codsolix'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM solicitudes AS so LEFT JOIN clientes AS cli ON so.codcli=cli.codcli WHERE so.codsoli = '$codsoli3'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['codcli'], 
				1 => $valores2['montosolicita'], 
				2 => $valores2['cuantopaga'], 
				3 => $valores2['cadatiempo'], 
				4 => $valores2['invertira'], 
				5 => $valores2['croquis1'], 
				6 => $valores2['croquis2'], 
				7 => $valores2['actividad'], 
				8 => $valores2['actividadnego'], 
				9 => $valores2['cicli'], 
				10 => $valores2['nombrecli'], 


				);
echo json_encode($datos);
?>