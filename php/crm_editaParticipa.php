<?php
include('conexion.php');
$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM alumno WHERE codalum = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['nombrealum'], 
				1 => $valores2['telfalum'], 
				2 => $valores2['emailalum'], 
				3 => $valores2['coddep'], 
				4 => $valores2['cialum'], 
				5 => $valores2['nareas'], 


				);
echo json_encode($datos);
?>