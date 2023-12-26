<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro2'];
$idarx= $_POST['idper2'];
$nombclix = $_POST['nomcli2'];
$cix = $_POST['cii2'];
$nombcox = $_POST['nombco'];
$cicox = $_POST['cico'];


$fecha = date('Y-m-d');
var_dump ($_POST);

switch($proceso){
	case 'Registro':
			
			mysqli_query($conexion,"INSERT INTO solicitudes (codcli,nombreref)VALUES ('$idarx','$nombclix')");
		
	break;
	
	case 'Editar':
		//mysqli_query($conexion,"UPDATE clientes SET nombrecli ='$nombclix', sexo='$sexx',direcccli='$dirx',telfcli='$telx',emailcli='$correo',observcli='$obv',cicli='$cix'  WHERE codcli = '$idarx'");
	break;
}


	
echo '';
?>