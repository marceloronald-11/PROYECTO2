<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro'];

$idarx= $_POST['idar'];
$descla = $_POST['descla'];
//$cii = $_POST['cii'];
//$dire = $_POST['dire'];
//$emma = $_POST['emma'];
//$observv = $_POST['observv'];
//$cel = $_POST['cel'];

$fecha = date('Y-m-d');
//var_dump ($_POST);
//VERIFICAMOS EL PROCESO
//$fee= date("Y-m-d", strtotime($fepag) );

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO zonas (detzona)VALUES ('$descla')");
	break;
	
	case 'Editar':
		
		mysqli_query($conexion,"UPDATE zonas SET detzona ='$descla' WHERE codzo = '$idarx'");

	break;
}

echo '';
?>