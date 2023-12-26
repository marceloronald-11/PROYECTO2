<?php
include('../php/conexion.php');
$idgru = $_POST['idgru'];
$proceso = $_POST['pro'];
$marcax = $_POST['marcaf'];

//var_dump ($_POST);
$fecha = date('Y-m-d');

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO marca (detmarca)VALUES('$marcax')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE marca SET detmarca='$marcax' WHERE codmar = '$idgru'");

	break;
}


echo '';
?>