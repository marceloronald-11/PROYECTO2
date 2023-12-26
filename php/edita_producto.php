<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM productos WHERE id_prod = '$id'");
$valores2 = mysqli_fetch_array($valores);


$datos = array(
				0 => $valores2['nomb_prod'], 
				1 => $valores2['tipo_prod'], 
				2 => $valores2['precio_unit'], 
				3 => $valores2['precio_dist'],
				4 => $valores2['marca'],
				5 => $valores2['modelo'],
				6 => $valores2['serial'],
				7 => $valores2['codigo'],
				//8 => $valores2['saldo'],
				//9 => $valores2['foto'],
				);
echo json_encode($datos);
?>