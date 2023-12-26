<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];


include('../php/conexion.php');
$proceso= $_POST['pro'];
$idarx= $_POST['idper'];
$nombclix = $_POST['nomcli'];
$cix = $_POST['cii'];
$coddepx = $_POST['coddepx'];
$telx = $_POST['telcli'];
$correo = $_POST['email'];


$fecha = date('Y-m-d');


//var_dump ($_POST);

switch($proceso){
	case 'Registro':
		$existe = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM alumno WHERE cialum='$cix' "));
		
		
		if($existe<=0){	
			mysqli_query($conexion,"INSERT INTO alumno (nombrealum,telfalum,emailalum,cialum,coddep)VALUES ('$nombclix','$telx','$correo','$cix','$coddepx')");
		}
		
	break;
	
	case 'Editar':
		
		mysqli_query($conexion,"UPDATE alumno SET nombrealum='$nombclix',telfalum='$telx',emailalum='$correo',cialum='$cix',coddep='$coddepx'  WHERE codalum = '$idarx'");

	break;
}


	
echo '';
?>