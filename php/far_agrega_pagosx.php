<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];
$nombre_u=$_SESSION['nomb_usu'];
include('../php/conexion.php');
$proceso= $_POST['pro'];


$codcrexx= $_POST['codcrexx'];
$fepag = $_POST['fepag'];
$pagui = $_POST['pagui'];
$impto = $_POST['impto'];
$sal = $_POST['sal'];
$nordenxx = $_POST['nordenxx'];
$nclientex = $_POST['ncliente'];
$codclix = $_POST['codclix'];

//var_dump ($_POST);
//VERIFICAMOS EL PROCESO
//$fee= date("Y-m-d", strtotime($fepag) );

switch($proceso){
	case 'Registro':

	break;
	
	case 'Editar':
if ($pagui>$sal){
		//importe no puede ser mayor a saldo
		
	}else{
		mysqli_query($conexion,"INSERT INTO creditospagos (codcre,nordencre, importepg, fechapg, id_usu)VALUES
		('$codcrexx','$nordenxx','$pagui','$fepag','$id_usux')");
		
		mysqli_query($conexion,"UPDATE creditos SET saldocr =saldocr- '$pagui' WHERE codcre = '$codcrexx'");
		
}


	break;
}


echo '';
?>