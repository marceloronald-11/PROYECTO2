<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM elemento WHERE codel = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['detelemento'], 
				1 => $valores2['codeliso'], 
				2 => $valores2['codcc'], 
                3 => $valores2['codcciso'], 
				4 => $valores2['codpro'], 
				5 => $valores2['codproiso'], 
				6 => $valores2['codmq'], 
				7 => $valores2['codmqiso'], 
            );
echo json_encode($datos);
?>