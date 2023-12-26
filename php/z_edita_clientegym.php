<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM clientes WHERE idcli = '$id'");
$valores2 = mysqli_fetch_array($valores);


$datos = array(
				0 => $valores2['nombre'], 
				1 => $valores2['ci'], 
				2 => $valores2['codigo'], 
				3 => $valores2['fechanac'],
				4 => $valores2['edad'],
				5 => $valores2['direccion'],
				6 => $valores2['cel'],
				7 => $valores2['email'],
				8 => $valores2['observcli'],
				9 => $valores2['foto'],
				10 => $valores2['sexo'],
				11 => $valores2['feing'],



				);
echo json_encode($datos);
?>