<?php
include('../php/conexion.php');
$id = $_POST['idusux'];
$proceso = $_POST['pro'];
$iidper = $_POST['iidper'];
$usua = $_POST['usua'];
$pass = $_POST['pass'];
$tiu = $_POST['tiu'];


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


$fecha = date('Y-m-d');
//$xx='rolito';
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO usuarios (usuario, nomb_usu, pass_usu, id_area,codper)VALUES ('$usua','$nnombre','$pass','$tiu','$iidper')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE usuarios SET usuario='$usua', nomb_usu = '$nnombre',pass_usu = '$pass',id_area = '$tiu',codper='$iidper'  WHERE id_usu = '$id'");

	break;
}


echo '';
?>