<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM servcliente AS se LEFT JOIN  clientes AS cl ON se.codcli=cl.codcli WHERE se.codsc = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
				0 => $valores2['nombrecli'].' '.$valores2['apellidop'].' '.$valores2['apellidom'], 
				1 => $valores2['codser'], 

				);
echo json_encode($datos);
//0 => $valores2['nombrecli'].' '.$valores2['apellidop'].' '.$valores2['apellidom'], 

?>