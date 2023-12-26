<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

	
include('../php/conexion.php');
$proceso= $_POST['pro2'];
$idarx= $_POST['idper2'];
$nombclix = $_POST['nomcli22'];
$codarex = $_POST['codareax'];
$dett='';

$registro = mysqli_query($conexion,"SELECT * FROM area WHERE codarea='$codarex' ");
while($registro2 = mysqli_fetch_array($registro)){
	$dett=$registro2['detarea'];
}

$fecha = date('Y-m-d');


//var_dump ($_POST);

switch($proceso){
	case 'Registro':
		//$existe = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM alumno WHERE cialum='$cix' "));
		
		
		//if($existe<=0){	
			mysqli_query($conexion,"INSERT INTO areaalumno (codalum,codarea,detarea2)VALUES ('$idarx','$codarex','$dett')");
		
			mysqli_query($conexion,"UPDATE alumno SET nareas=nareas+1  WHERE codalum = '$idarx'");
		
		
//		}
		
	break;
	
	case 'Editar':
		
	//	mysqli_query($conexion,"UPDATE alumno SET nombrealum='$nombclix',telfalum='$telx',emailalum='$correo',cialum='$cix',coddep='$coddepx'  WHERE codalum = '$idarx'");

	break;
}


	
echo '';
?>