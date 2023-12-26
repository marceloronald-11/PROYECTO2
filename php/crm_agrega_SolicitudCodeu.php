<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
 
$proceso= $_POST['pro211'];
$idarx= $_POST['idper211'];//codcli
$codsoli211x= $_POST['codsolix211'];//codcli

$solicita211x = $_POST['nombre211'];
$ci211x = $_POST['ci211'];
$cel211x = $_POST['cel211'];
$direcc211x = $_POST['direcc211'];
$pariente211x = $_POST['pariente211'];
//$actire211x = $_POST['actiref211'];
$crodom211x = $_POST['croquisdom211'];
$cronego211x = $_POST['cronegocio211'];
$activi211x = $_POST['activi211'];
$nit211x = $_POST['nit211'];
$nomnegocio211x = $_POST['nomnegocio211'];
$dirnegocio211x = $_POST['dirnegocio211'];
$datencio211x = $_POST['datencio211'];
$empezo211x = $_POST['empezo211'];
$negoes211x = $_POST['negoes211'];
$lugaracti211x = $_POST['lug211'];

$asalariado211x = $_POST['asalariado211'];
$empleo211x = $_POST['empleo211'];

$fecha = date('Y-m-d');
var_dump ($_POST);

switch($proceso){
	case 'Registro':
			
	//mysqli_query($conexion,"INSERT INTO solicitudes (nombresolicita,montosolicita,cuantopaga,cadatiempo,invertira,croquis1,croquis2,actividad,actividadnego,nit,nomnegocio,direccionnego,diasatencion,empezo,direccionnego,optnegocio,optactividad,optsalario,dirempleo,optgarantia,optogarantia)VALUES ('$solicita21','','','','','','','','','','','','','','','','','','','','')");
		
	//mysqli_query($conexion,"INSERT INTO solicitudes (codcli,nombresolicita,montosolicita,cuantopaga)VALUES ('$idarx','$solicita21x','$monto21x','$puede21x')");
		
		
		
		
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE solicitudes SET nombre211 ='$solicita211x', ci211='$ci211x',cel211='$cel211x',direccion211='$direcc211x',parentesco211='$pariente211x',actividad211='$activi211x',croquisdom211='$crodom211x',croquisnego211='$cronego211x',nit211='$nit211x',nomnego211='$nomnegocio211x',dirnego211='$dirnegocio211x',datencion211='$datencio211x',empezo211='$empezo211x',negoes211='$negoes211x',lugar211='$lugaracti211x',asalariado211='$asalariado211x',dirempleo211='$empleo211x' WHERE codsoli = '$codsoli211x'");
		
	break;
}


	
echo '';
?>