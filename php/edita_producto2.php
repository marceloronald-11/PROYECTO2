<?php
include('conexion.php');


$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM productos WHERE id_prod = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['nomb_prod'], 
				1 => $valores2['tipo_prod'], 
				2 => $valores2['precio_unit'], 
			//	3 => $valores2['precio_dist'],
				3 => $valores2['marca'],
				4 => $valores2['modelo'],
				5 => $valores2['serial'],
				6 => $valores2['codigo'],
				7 => $valores2['saldo'],
				8 => $valores2['id_per']
				
				
				);
echo json_encode($datos);
//echo json_encode($n_nota);
?>