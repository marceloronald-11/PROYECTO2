<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro'];
$idarx= $_POST['idper'];
$nombclix = $_POST['nomcli'];
//$appx = $_POST['app'];
//$apmx = $_POST['apm'];
//$sexx = $_POST['sex'];
$cix = $_POST['cii'];
$dirx = $_POST['dircli'];
$telx = $_POST['telcli'];
$correo = $_POST['email'];
$obv = $_POST['observ'];
$codzox = $_POST['zonn'];

//$nomsalonx = $_POST['nomsalon'];
//$mvvx = $_POST['mvv'];


$fecha = date('Y-m-d');


//var_dump ($_POST);

switch($proceso){
	case 'Registro':
		$existe = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM clientes WHERE cicli='$cix' "));
		
		
		if($existe<=0){	
			mysqli_query($conexion,"INSERT INTO clientes (nombrecli,feingcli,direcccli,telfcli,emailcli,observcli,cicli,codzo)VALUES ('$nombclix','$fecha','$dirx','$telx','$correo','$obv','$cix','$codzox')");
		}
		
	break;
	
	case 'Editar':
		
		mysqli_query($conexion,"UPDATE clientes SET nombrecli ='$nombclix', direcccli='$dirx',telfcli='$telx',emailcli='$correo',observcli='$obv',cicli='$cix',codzo='$codzox'  WHERE codcli = '$idarx'");

	break;
}


	
echo '';
?>