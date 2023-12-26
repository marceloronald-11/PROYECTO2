<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM solicituddet WHERE codsoldt = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
                0 => $valores2['detrepdt'], 
				1 => $valores2['cantllego'], 
				2 => $valores2['cantsoli'], 
				3 => $valores2['preciodt'], 
				4 => $valores2['umed'], 
				5 => $valores2['nfactura'], 
				6 => $valores2['norden'], 
                
				);
echo json_encode($datos);
?>