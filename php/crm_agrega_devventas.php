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
////var_dump ($_POST);

$fecha = date('Y-m-d');
$registro = mysqli_query($conexion,"SELECT * FROM movimdet WHERE norden='$nordenx' ");
while($registro2 = mysqli_fetch_array($registro)){
		$descrip21=$registro2['descripdt'];
		$precio21=$registro2['precio'];
		$subtot21=$registro2['subtot'];
		$umed21=$registro2['umed'];
		$codsuc21=$registro2['codsuc'];
		$codigo21=$registro2['codigo'];
		$codsucx21=$registro2['codsucx'];
		$codpv21=$registro2['codpv'];
		$codpv21=$registro2['codpv'];
	
}

$registro = mysqli_query($conexion,"SELECT * FROM movimtot WHERE norden='$nordenx' ");
while($registro2 = mysqli_fetch_array($registro)){
		$totimporte22=$registro2['totimporte'];
		$afavor22=$registro2['afavor'];
		$itmt22=$registro2['itm'];
		$tpago22=$registro2['tpago'];
		$descto22=$registro2['descuento'];
	
}


mysqli_query($conexion,"DELETE FROM movimdet WHERE codt = '$coddtx'");
//mysqli_query($conexion,"UPDATE movimdet SET tipo ='E',tmm='Devol' WHERE codt = '$coddtx'");
mysqli_query($conexion,"UPDATE articulos SET saldo =saldo+'$cantx' WHERE codar = '$codarx'");


mysqli_query($conexion,"UPDATE movimtot SET itm =itm-1 WHERE norden = '$nordenx'");
mysqli_query($conexion,"DELETE FROM movimtot WHERE itm = '0'");



//mysqli_query($conexion,"INSERT INTO movimdet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tipo,tmm,id_usu,codsuc,tpago,coddep,codpv,codigo,codsucx)VALUES ('$codarx','$descrip21','$cantx','$precio21','$subtot21','$nordenx','$umed21','$fecha','I','Devol','$id_usux','$codsuc21','CT','1','$codpv21','$codigo21','$codsucx21')");





//mysqli_query($conexion,"INSERT INTO movimtot (id_usu,fechato,tipo,norden,totimporte,afavor,imprimio,itm,codsuc,tpago,coddep,tmm,descuento)VALUES ('$id_usux','$fecha','I','$nordenx','$totimporte22','$afavor22','NO','$itmt22','$codsuc21','$tpago22','1','Devol','$descto22')");


	
echo '';
?>