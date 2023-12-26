<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
 
$proceso= $_POST['pro212'];
$idarx= $_POST['idper212'];//codcli
$codsoli212x= $_POST['codsolix212'];//codcli

$solicita212x = $_POST['nombre212'];
$ci212x = $_POST['ci212'];
$cel212x = $_POST['cel212'];
$direcc212x = $_POST['direcc212'];
$pariente212x = $_POST['pariente212'];
$crodom212x = $_POST['croquisdom212'];
$cronego212x = $_POST['cronegocio212'];
$activi212x = $_POST['activi212'];
$nit212x = $_POST['nit212'];
$nomnegocio212x = $_POST['nomnegocio212'];
$dirnegocio212x = $_POST['dirnegocio212'];
$datencio212x = $_POST['datencio212'];
$empezo212x = $_POST['empezo212'];
$negoes212x = $_POST['negoes212'];
$lugaracti212x = $_POST['lug212'];

$asalariado212x = $_POST['asalariado212'];
$empleo212x = $_POST['empleo212'];

$fecha = date('Y-m-d');
var_dump ($_POST);

switch($proceso){
	case 'Registro':
			
	//mysqli_query($conexion,"INSERT INTO solicitudes (nombresolicita,montosolicita,cuantopaga,cadatiempo,invertira,croquis1,croquis2,actividad,actividadnego,nit,nomnegocio,direccionnego,diasatencion,empezo,direccionnego,optnegocio,optactividad,optsalario,dirempleo,optgarantia,optogarantia)VALUES ('$solicita21','','','','','','','','','','','','','','','','','','','','')");
		
	//mysqli_query($conexion,"INSERT INTO solicitudes (codcli,nombresolicita,montosolicita,cuantopaga)VALUES ('$idarx','$solicita21x','$monto21x','$puede21x')");
		
		
		
		
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE solicitudes SET nombre212 ='$solicita212x', ci212='$ci212x',cel212='$cel212x',direccion212='$direcc212x',parentesco212='$pariente212x',actividad212='$activi212x',croquisdom212='$crodom212x',croquisnego212='$cronego212x',nit212='$nit212x',nomnego212='$nomnegocio212x',dirnego212='$dirnegocio212x',datencion212='$datencio212x',empezo212='$empezo212x',negoes212='$negoes212x',lugar212='$lugaracti212x',asalariado212='$asalariado212x',dirempleo212='$empleo212x' WHERE codsoli = '$codsoli212x'");
		
	break;
}


	
echo '';
?>