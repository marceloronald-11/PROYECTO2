<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');


$proceso= $_POST['pro21'];
//$proceso='Registro';
$idarx= $_POST['idper21'];//codcli
$codsoli21x= $_POST['codsoli21'];//codcli

$solicita21x = $_POST['solicita21'];
$ci21x = $_POST['ci21'];
$cel21x = $_POST['cel21'];
$monto21x = $_POST['monto21'];
$puede21x = $_POST['puede21'];
$tiempo21x = $_POST['tiempo21'];
$inviertira21x = $_POST['inviertira21'];
$croquisdom21x = $_POST['croquisdom21'];
$cronegocio21x = $_POST['cronegocio21'];
$activi21x = $_POST['activi21'];
$nit21x = $_POST['nit21'];
$nomnegocio21x = $_POST['nomnegocio21'];
$dirnegocio21x = $_POST['dirnegocio21'];
$datencio21x = $_POST['datencio21'];
$empezo21x = $_POST['empezo21'];
$negoes21x = $_POST['negoes21'];
$lugaracti21x = $_POST['lug21'];

$asalariado21x = $_POST['asalariado21'];
$empleo21x = $_POST['empleo21'];
$garantia21x = $_POST['garantia21'];
$ogarantia21x = $_POST['ogarantia21'];

$fecha = date('Y-m-d');
var_dump ($_POST);

switch($proceso){
	case 'Registro':
			
	//mysqli_query($conexion,"INSERT INTO solicitudes (nombresolicita,montosolicita,cuantopaga,cadatiempo,invertira,croquis1,croquis2,actividad,actividadnego,nit,nomnegocio,direccionnego,diasatencion,empezo,direccionnego,optnegocio,optactividad,optsalario,dirempleo,optgarantia,optogarantia)VALUES ('$solicita21','','','','','','','','','','','','','','','','','','','','')");
		
	mysqli_query($conexion,"INSERT INTO solicitudes (codcli,nombresolicita,montosolicita,cuantopaga,cadatiempo)VALUES ('$idarx','$solicita21x','$monto21x','$puede21x','$puede21x')");
		
		
		
	mysqli_query($conexion,"UPDATE clientes SET nrosolicitudes =nrosolicitudes+1 WHERE codcli = '$idarx'");
		
		
		
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE solicitudes SET nombresolicita ='$solicita21x', montosolicita='$monto21x',cuantopaga='$puede21x',cadatiempo='$tiempo21x',invertira='$inviertira21x',croquis1='$croquisdom21x',croquis2='$cronegocio21x',actividad='$activi21x',nit='$nit21x',actividadnego='$activi21x',nomnegocio='$nomnegocio21x',diasatencion='$datencio21x',empezo='$empezo21x',direccionnego='$dirnegocio21x',optnegocio='$negoes21x',optactividad='$lugaracti21x',optsalario='$asalariado21x',dirempleo='$empleo21x',optgarantia='$garantia21x',optogarantia='$ogarantia21x' WHERE codsoli = '$codsoli21x'");
	break;
}


	
echo '';
?>