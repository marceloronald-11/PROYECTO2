<?php
if (!isset($_SESSION)) {session_start();}
//$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro'];
$idarx= $_POST['idper'];//codplan
$nombclix = $_POST['nomcli'];
$fesolix = $_POST['fesoli'];
$mttox = $_POST['mtto'];
$obvx = $_POST['observpg'];


$fecha = date('Y-m-d');
var_dump ($_POST);

$rm = mysqli_query($conexion,"SELECT * FROM planpagos WHERE codplan='$idarx' ");
while($rex = mysqli_fetch_array($rm)){
$codsolix=$rex['codsoli'];
$codclix=$rex['codcli'];
$fechaplanx=$rex['fechaplan'];
$cuotax=$rex['cuota'];
$saldox=$rex['saldo'];
}



switch($proceso){
	case 'Registro':
			
			//mysqli_query($conexion,"INSERT INTO cuotas (nombrecli,sexo,feingcli,direcccli,telfcli,emailcli,observcli,cicli)VALUES ('$nombclix','$sexx','$fecha','$dirx','$telx','$correo','$obv','$cix')");
		
	break;
	
	case 'Editar':
		//mysqli_query($conexion,"INSERT INTO cuotaspagos (codsoli,codplan,codcli,fechapag,fechaact,cuotapag,id_usu,observpag)VALUES ('$codsolix','$idarx','$codclix','$fecha','$fechaplanx','$mttox','$id_usux','$obvx')");
		
mysqli_query($conexion,"INSERT INTO cuotaspagos (codsoli,codplan,codcli,fechapag,fechaact,cuotapag,id_usu,observpag)VALUES ('$codsolix','$idarx','$codclix','$fechaplanx','$fecha','$mttox','$id_usux','$obvx')");		
		

		
		mysqli_query($conexion,"UPDATE solicitudes SET saldosoli =saldosoli-'$mttox' WHERE codsoli = '$codsolix'");

		mysqli_query($conexion,"UPDATE planpagos SET pagado ='SI' WHERE codplan = '$idarx'");

	break;
}


	
echo 'okkkkkkkkkk';
?>