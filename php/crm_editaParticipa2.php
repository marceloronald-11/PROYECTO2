<?php
include('conexion.php');
$codaa5 = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM areaalumno AS ar LEFT JOIN alumno AS al ON ar.codalum=al.codalum WHERE ar.codaa = '$codaa5'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['codalum'], 
				1 => $valores2['codarea'], 
				2 => $valores2['detarea2'], 
				3 => $valores2['ncursos'], 
				4 => $valores2['nombrealum'], 

				);
echo json_encode($datos);
?>