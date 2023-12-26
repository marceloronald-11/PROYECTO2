<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM tecnicos WHERE codtec = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['dettecnico'], 
				1 => $valores2['codigotec'], 
				2 => $valores2['horasus'], 
				3 => $valores2['minsus'], 
				4 => $valores2['direcctec'], 
				5 => $valores2['telftec'], 
				6 => $valores2['celulartec'], 

            );
echo json_encode($datos);
?>