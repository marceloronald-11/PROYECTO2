<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro'];
$idarx= $_POST['idper'];
$nomprodx = $_POST['nomprod'];
$clax = $_POST['cla'];
$provx = $_POST['prov'];
$umex = $_POST['umed'];
$pvpx = $_POST['pvp'];
$netox = $_POST['neto'];
//$fevenx = $_POST['feven'];
//$codiix = $_POST['coddi'];

$observx = $_POST['observ'];
$saldox = $_POST['sall'];
$stockmi = $_POST['stomi'];
$dimex = $_POST['dime'];
$marcax = $_POST['marcax'];
$modelox = $_POST['modelox'];
$seriex = $_POST['seriex'];
$procex = $_POST['procex'];


$fecha = date('Y-m-d');
var_dump ($_POST);

switch($proceso){
	case 'Registro':
$regi = mysqli_query($conexion,"SELECT * FROM clasificacion WHERE codcla='$clax' ");
while($regi2 = mysqli_fetch_array($regi)){
	$pre=$regi2['prefijo'];
	$conta=$regi2['nro']+1;
	$codigox=$pre.$conta;
}
			
		mysqli_query($conexion,"INSERT INTO articulos (descripar,fechaing,saldo,umed,pneto,stockmin,observar,coddep,codsuc,codcla,codpv,codigo,dimension,marca,modelo,serie,procedencia)VALUES ('$nomprodx','$fecha','0','$umex','$pvpx','$stockmi','$observx','1','1','$clax','$provx','$codigox','$dimex','$marcax','$modelox','$seriex','$procex')");
		
mysqli_query($conexion,"UPDATE clasificacion SET nro ='$conta'  WHERE codcla = '$clax'");
		
		
	break;
	
	case 'Editar':
		
		mysqli_query($conexion,"UPDATE articulos SET descripar ='$nomprodx',umed='$umex', pvp='$pvpx',observar='$observx',codcla='$clax',codpv='$provx',pneto='$pvpx',stockmin='$stockmi',dimension='$dimex',marca='$marcax',modelo='$modelox',serie='$seriex',procedencia='$procex'  WHERE codar = '$idarx'");


	break;
}


echo '';
?>