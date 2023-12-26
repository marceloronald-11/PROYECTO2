<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];
include "../phpqrcode/qrlib.php";      

include('../php/conexion.php');
$proceso= $_POST['pro'];
$idarx= $_POST['idper'];
 

$nomprodx = $_POST['nomprod'];
$cgrux = $_POST['cgru'];
$cmarx = $_POST['cmar'];
$ctix = $_POST['cti'];
$seriex = $_POST['serien'];
$preux = $_POST['prefac']; //preecio factura
$prevtax = $_POST['prevta'];//precio vta

$stomix = $_POST['stomi'];



$fecha = date('Y-m-d');
//var_dump ($_POST);

switch($proceso){
	case 'Registro':

			
		mysqli_query($conexion,"INSERT INTO articulos (descripar,pneto,codgru,codmar,codti,serie,stockmin,pvp)VALUES ('$nomprodx','$preux','$cgrux','$cmarx','$ctix','$seriex','$stomix','$prevtax')");
		
	$iddd=mysqli_insert_id($conexion); 
		
$row = mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN grupo AS gru ON ar.codgru=gru.codgru LEFT JOIN marca AS mar ON ar.codmar=mar.codmar LEFT JOIN tipo AS ti ON ar.codti=ti.codti  WHERE ar.codar='$iddd'");	while($regg = mysqli_fetch_array($row)){
	$grupox=$regg['detgrupo'];
	$marcax=$regg['detmarca'];
	$tipox=$regg['dettipo'];
	
}
		
$ma='MOI'.$iddd;
$tempDir = $ma;
		
$codeContents = 'Articulo:'.$nomprodx.'|P.Vta:'.$prevtax.'|Serie:'.$seriex.'|Grupo:'.$grupox.'|Marca:'.$marcax.'|Tipo:'.$tipox;//		
$fileName = '.png';
$filename2 = '../php/'.$ma.'.png';
$pngAbsoluteFilePath = $tempDir.$fileName;
QRcode::png($codeContents, $pngAbsoluteFilePath,'L', 4, 2); 
//		
mysqli_query($conexion,"UPDATE articulos SET qr='$filename2' WHERE codar = '$iddd'");
		
		
	break;
	
	case 'Editar':
		
		mysqli_query($conexion,"UPDATE articulos SET descripar='$nomprodx',pneto='$preux',codgru='$cgrux',codmar='$cmarx',codti='$ctix',serie='$seriex',stockmin='$stomix',pvp='$prevtax'  WHERE codar = '$idarx'");
		
$row = mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN grupo AS gru ON ar.codgru=gru.codgru LEFT JOIN marca AS mar ON ar.codmar=mar.codmar LEFT JOIN tipo AS ti ON ar.codti=ti.codti  WHERE ar.codar='$idarx'");	while($regg = mysqli_fetch_array($row)){
	$grupox=$regg['detgrupo'];
	$marcax=$regg['detmarca'];
	$tipox=$regg['dettipo'];
	
}		
		
		

$ma='MOI'.$idarx;
$tempDir = $ma;
		
$codeContents = 'Articulo:'.$nomprodx.'|P.Vta:'.$prevtax.'|Serie:'.$seriex.'|Grupo:'.$grupox.'|Marca:'.$marcax.'|Tipo:'.$tipox;//		
$fileName = '.png';
$filename2 = '../php/'.$ma.'.png';
$pngAbsoluteFilePath = $tempDir.$fileName;
QRcode::png($codeContents, $pngAbsoluteFilePath,'L', 4, 2); 
		
mysqli_query($conexion,"UPDATE articulos SET qr='$filename2' WHERE codar = '$idarx'");			
		
		
		
		
		
		

	break;
}


echo '';
?>