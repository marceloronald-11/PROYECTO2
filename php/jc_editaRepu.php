<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM repuesto WHERE codrep = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
                0 => $valores2['detrepuesto'], 
				1 => $valores2['codigo'], 
				2 => $valores2['codcc'], 
				3 => $valores2['codpro'], 
				4 => $valores2['codmq'], 
				5 => $valores2['codel'], 
				6 => $valores2['codcct'], 
				7 => $valores2['codprot'], 
				8 => $valores2['codmqt'], 
				9 => $valores2['codelt'], 
				10 => $valores2['codmd'], 
				11 => $valores2['umed'], 
				12 => $valores2['nparte'], 
				13 => $valores2['ubicacion'], 
                14 => $valores2['especificacion'], 
				15 => $valores2['costo'], 
				16 => $valores2['saldo'], 
				17 => $valores2['saldomin'], 
				18 => $valores2['codigoanti'], 
                
                
				);
echo json_encode($datos);
?>