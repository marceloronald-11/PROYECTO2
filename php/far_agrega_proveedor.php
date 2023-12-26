<?php
include('../php/conexion.php');
$idlab = $_POST['idlab'];
$proceso = $_POST['pro'];
$nomlab = $_POST['nomlab'];
$dirlab = $_POST['dirlab'];
$telf = $_POST['telf'];
$maillab=$_POST['maillab'];
$oblab = $_POST['oblab'];

//var_dump ($_POST);
$fecha = date('Y-m-d');

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO proveedor (nombrepv, direccpv, telfpv, emailpv,observpv)VALUES
		('$nomlab','$dirlab','$telf','$maillab','$oblab')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE proveedor SET nombrepv='$nomlab', direccpv = '$dirlab',telfpv = '$telf',
		emailpv = '$maillab',observpv='$oblab'  WHERE codpv = '$idlab'");

	break;
}

echo '';
?>