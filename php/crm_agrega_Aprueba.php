<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro3'];
$idarx= $_POST['idper3'];//codcli
$codsoli3x = $_POST['codsoli3'];
$nombaprobox = $_POST['nombaprobo'];
$montoAprobado = $_POST['montoaprob3'];



$fecha = date('Y-m-d');
var_dump ($_POST);

switch($proceso){
	case 'Registro':
			
			//mysqli_query($conexion,"INSERT INTO solicitudes (codcli,nombreref)VALUES ('$idarx','$nombclix')");
		
	break;
	
	case 'Editar':
		
	mysqli_query($conexion,"INSERT INTO planpagos (codsoli,codcli,capital,interes,cargos,garantia,cuota,saldo,fechaplan)VALUES ('$codsoli3x','$idarx','0','0','0','0','0','$montoAprobado','$fecha')");

		
		
		mysqli_query($conexion,"UPDATE solicitudes SET aprobado ='SI',supervisor='$nombaprobox',montoaprobado='$montoAprobado',saldosoli='$montoAprobado' WHERE codsoli = '$codsoli3x'");
	break;
}


	
echo '';
?>