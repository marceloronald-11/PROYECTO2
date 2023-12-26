<?php
include('../php/conexion.php');
$idgru = $_POST['idgru'];
$proceso = $_POST['pro'];
$grupox = $_POST['grupof'];

//var_dump ($_POST);
$fecha = date('Y-m-d');

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO grupo (detgrupo)VALUES('$grupox')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE grupo SET detgrupo='$grupox' WHERE codgru = '$idgru'");

	break;
}


echo '';
?>