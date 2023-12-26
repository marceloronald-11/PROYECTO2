<?php
include('conexion.php');

$codtrax = $_POST['codtrax'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM transporte WHERE codtra = '$codtrax'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['codvh'], 
				1 => $valores2['id_per'], 
				2 => $valores2['fechaact'], 
				3 => $valores2['fechaentre'], 
				4 => $valores2['horaentre'], 
				5 => $valores2['clientetra'], 
				6 => $valores2['direcctra'], 
				7 => $valores2['saldotra'], 
				8 => $valores2['telftra'], 

				);
echo json_encode($datos);
?>