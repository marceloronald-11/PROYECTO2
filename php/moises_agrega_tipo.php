<?php
include('../php/conexion.php');
$idgru = $_POST['idgru'];
$proceso = $_POST['pro'];
$tipox = $_POST['tipof'];

//var_dump ($_POST);
$fecha = date('Y-m-d');

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO tipo (dettipo)VALUES('$tipox')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE tipo SET dettipo='$tipox' WHERE codti = '$idgru'");

	break;
}


echo '';
?>