<?php
include('../php/conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM personal WHERE id_per = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['nombre'], 
				1 => $valores2['ci'], 
				2 => $valores2['cargo'], 
				3 => $valores2['area'], 
				4 => $valores2['cel'],
				5 => $valores2['direccion']
				);
echo json_encode($datos);
?>