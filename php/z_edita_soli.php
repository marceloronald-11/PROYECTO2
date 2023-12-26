<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM abastedet WHERE cod_abastedet = '$id'");
$valores2 = mysqli_fetch_array($valores);


$datos = array(
				0 => $valores2['detalle'], 
				1 => $valores2['cant'], 
				2 => $valores2['umed'], 
				3 => $valores2['nordenaba'],



				);
echo json_encode($datos);
?>