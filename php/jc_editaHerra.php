<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM herramientas WHERE codhe = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
                0 => $valores2['detherramienta'], 
                1 => $valores2['codigohe'], 
                2 => $valores2['codpv'], 
                3 => $valores2['maqhora'], 
                4 => $valores2['maqmin'], 

				);
echo json_encode($datos);
?>