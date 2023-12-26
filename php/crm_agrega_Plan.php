<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro'];
$idarx= $_POST['idper'];
$nombclix = $_POST['nomcli'];
$fesolix = $_POST['fesoli'];
$mttox = $_POST['mtto'];
$ncuotax = $_POST['ncuota'];
//$cix = $_POST['cii'];
//$dirx = $_POST['dircli'];
//$telx = $_POST['telcli'];
//$correo = $_POST['email'];
//$obv = $_POST['observ'];


$fecha = date('Y-m-d');
//var_dump ($_POST);

switch($proceso){
	case 'Registro':
			
			//mysqli_query($conexion,"INSERT INTO cuotas (nombrecli,sexo,feingcli,direcccli,telfcli,emailcli,observcli,cicli)VALUES ('$nombclix','$sexx','$fecha','$dirx','$telx','$correo','$obv','$cix')");
		
	break;
	
	case 'Editar':
		
		//mysqli_query($conexion,"UPDATE clientes SET nombrecli ='$nombclix', sexo='$sexx',direcccli='$dirx',telfcli='$telx',emailcli='$correo',observcli='$obv',cicli='$cix'  WHERE codcli = '$idarx'");


	break;
}


	
echo 'okkkkkkkkkk';
?>