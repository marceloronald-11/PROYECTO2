<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM creditosgym WHERE nordengym = '$id'");
$valores2 = mysqli_fetch_array($valores);


$datos = array(
				0 => $valores2['idcli'], 
				1 => $valores2['idtip'], 
				2 => $valores2['fechaini'], 
				3 => $valores2['fechafin'],
				4 => $valores2['totalcr'],
				5 => $valores2['saldocr'],
				6 => $valores2['fechagym'],
				7 => $valores2['nordengym'],
				8 => $valores2['gm'],
				9 => $valores2['estado'],



				);
echo json_encode($datos);
?>