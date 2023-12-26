<?php
include('../php/conexion.php');
$id = $_POST['idusux'];
$proceso = $_POST['pro'];
$iidper = $_POST['iidper'];
$usua = $_POST['usua'];
$pass = $_POST['pass'];
$tiu = $_POST['tiu'];
$codsuc1 = $_POST['codsuc1'];


$codts=0;
$nosuc="";
$tadm="";

//var_dump ($_POST);
$busnombre = mysqli_query($conexion,"SELECT * FROM personal WHERE codper='$iidper' ");
	while($buss = mysqli_fetch_array($busnombre)){
		$nnombre=$buss['nombreper'];
		$fotoper=$buss['fotoper'];
		$ciper=$buss['ciper'];
		
	}

// $nnsuc = mysqli_query($conexion,"SELECT * FROM sucursal WHERE codsuc='$csuc' ");
// 	while($cs = mysqli_fetch_array($nnsuc)){
// 		$nosuc=$cs['nombresuc'];
// 		$codts=$cs['codtisuc'];
// 	}

//$ndepa = mysqli_query($conexion,"SELECT * FROM departamento  WHERE coddep='$cdp'");
//	while($dxx = mysqli_fetch_array($ndepa)){
//		$nodepar=$dxx['descripdepto'];
//	}



$fecha = date('Y-m-d');
//$xx='rolito';
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO usuarios (usuario, nomb_usu, pass_usu, id_area,codper,codsuc)VALUES ('$usua','$nnombre','$pass','$tiu','$iidper','$codsuc1')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE usuarios SET usuario='$usua', nomb_usu = '$nnombre',pass_usu = '$pass',id_area = '$tiu',codper='$iidper',codsuc='$codsuc1'  WHERE id_usu = '$id'");

	break;
}


echo '';
?>