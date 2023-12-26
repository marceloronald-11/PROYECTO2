<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro'];
$idarx= $_POST['idper'];
//$nomb = $_POST['nomper'];
//$ci = $_POST['cii'];
//$dire = $_POST['dirper'];
//$correo = $_POST['email'];
//$tel = $_POST['telper'];
//$obv = $_POST['observ'];
//
//$ccar = $_POST['ccar'];
//$aar = $_POST['aar'];
//

$fecha = date('Y-m-d');
var_dump ($_POST);

switch($proceso){
	case 'Registro':
			
			//mysqli_query($conexion,"INSERT INTO personal (nombreper,emailper,celper,direccper,observper,ciper,codarea,codcargo)VALUES ('$nomb','$correo','$tel','$dire','$obv','$ci','$aar','$ccar')");
		
	break;
	
	case 'Editar':
		
		//mysqli_query($conexion,"UPDATE personal SET nombreper ='$nomb',emailper='$correo', celper='$tel',direccper='$dire',observper='$obv',ciper='$ci',codarea='$aar',codcargo='$ccar'  WHERE codper = '$idarx'");

       // mysqli_query($conexion,"UPDATE usuarios SET nomb_usu  WHERE codper = '$idarx'");

	break;
}


echo '';
?>