<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM ticket AS ti LEFT JOIN areas AS ar ON ti.codarea=ar.codarea LEFT JOIN clientes AS cl ON ti.codcli=cl.codcli WHERE codtk = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['nombrecli'].' '.$valores2['apellidop'].' '.$valores2['apellidom'], 
				1 => $valores2['observtk'], 

				);
echo json_encode($datos);
?>