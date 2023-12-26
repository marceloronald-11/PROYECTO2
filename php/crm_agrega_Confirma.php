<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];
date_default_timezone_set('America/La_Paz');
include('../php/conexion.php');
$proceso= $_POST['pro'];
$idarx= $_POST['idper'];

$encargox = $_POST['encargo'];
$fechacfx = $_POST['fechacf'];
$nordx = $_POST['nord'];



$fecha = date('Y-m-d');


//var_dump ($_POST);

switch($proceso){
	case 'Registro':
//		$existe = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM clientes WHERE cicli='$cix' "));
//		
//		
//		if($existe<=0){	
//			mysqli_query($conexion,"INSERT INTO clientes (nombrecli,feingcli,direcccli,telfcli,emailcli,observcli,cicli,codzo)VALUES ('$nombclix','$fecha','$dirx','$telx','$correo','$obv','$cix','$codzox')");
//		}
		
	break;
	
	case 'Editar':

// falta norden+1  MODULO
		
$registro = mysqli_query($conexion,"SELECT * FROM movimdet WHERE norden='$nordx'");	while($registro2 = mysqli_fetch_array($registro)){
	$codar3=$registro2['codar'];	
	$codpv3=$registro2['codpv'];	
	$descrp3=$registro2['descripdt'];	
	$codigo3=$registro2['codigo'];	
	$umed3=$registro2['umed'];	
	$cant3=$registro2['cant'];	
	$precio3=$registro2['precio'];	
	$subtot3=$registro2['subtot'];	
	$tipo3=$registro2['tipo'];	
	$fechadt3=$registro2['fechadt'];	
	$fechave3=$registro2['fechavenc'];	
	$idusu3=$registro2['id_usu'];	
	$tmm3=$registro2['tmm'];	
	$codsuc3=$registro2['codsuc'];	
$existe=0;	
mysqli_query($conexion,"INSERT INTO movimdet (codar,codpv,descripdt,umed,cant,precio,subtot,norden,id_usu,tmm,codsuc,tipo,fechadt)VALUES ('$codar3','$codpv3','$descrp3','$umed3','$cant3','$precio3','$subtot3','$nordx','$id_usux','Confirmo','$codsucss','I','$fecha')");
	
$existe = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM articulossuc WHERE codar='$codar3' "));	

if($existe==0){	
	mysqli_query($conexion,"INSERT INTO articulossuc (codar,saldosuc,codsuc)VALUES ('$codar3','$cant3','$codsuc3')");
}else{
	mysqli_query($conexion,"UPDATE articulossuc SET saldosuc =saldosuc+'$cant3' WHERE codar = '$codar3'  AND codsuc='$codsuc3'");
}	
	
}
		
		
$registro = mysqli_query($conexion,"SELECT * FROM movimtot WHERE norden='$nordx'");	while($registro2 = mysqli_fetch_array($registro)){
	$idusu4=$registro2['id_usu'];	
	$fechato4=$registro2['fechato'];	
	$totimporte4=$registro2['totimporte'];	
	$afavor4=$registro2['afavor'];	
	$codsuc4=$registro2['codsuc'];	
	$tmm4=$registro2['tmm'];	
	$itm4=$registro2['itm'];	
	$codcli4=$registro2['codcli'];	

	mysqli_query($conexion,"INSERT INTO movimtot (fechato,afavor,totimporte,codsuc,id_usu,tipo,norden,itm,tmm,codcli)VALUES ('$fechato4','$afavor4','$totimporte4','$codsuc4','$id_usux','I','$nordx','$itm4','Confirmo','$codcli4')");

	
}
								
mysqli_query($conexion,"UPDATE movimtot SET aceptado ='SI' WHERE norden = '$nordx' ");

	break;
}


	
echo '';
?>