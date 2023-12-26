<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro'];
//$nombclix = $_POST['nomcli'];

$coddtx= $_POST['coddtx'];
$codarx= $_POST['codarx'];
$nlotex = $_POST['nlotex'];

$cantx = $_POST['cantx'];
$nordenx = $_POST['nordenx'];


//$nomsalonx = $_POST['nomsalon'];
//$mvvx = $_POST['mvv'];


$fecha = date('Y-m-d');

mysqli_query($conexion,"DELETE FROM movimdet WHERE codt = '$coddtx'");

mysqli_query($conexion,"UPDATE articulos SET saldo =saldo-'$cantx' WHERE codar = '$codarx'");

mysqli_query($conexion,"DELETE FROM lotes WHERE codme = '$codarx' AND nlotee='$nlotex'");

mysqli_query($conexion,"UPDATE movimtot SET itm =itm-1 WHERE norden = '$nordenx'");

//
////var_dump ($_POST);
//

	
echo '';
?>