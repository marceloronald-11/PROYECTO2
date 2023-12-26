<?php
date_default_timezone_set('America/La_Paz'); 
//$id=$_POST['codcli3'];//codfile
$dt=$_POST['dt'];
$codcli3=$_POST['codcli3'];

include('../php/conexion.php');


$nombrefoto=$_FILES['file']['name'];
$tipo = $_FILES['file']['type'];
$tamano=$_FILES['file']['size'];
$ruta=$_FILES['file']['tmp_name'];

$foto = date('Y-m-d').date('H-i-s').'.jpg';
//$destino="../fotos/".$foto; // AUMENTA LA X DEBERIA SER UN NUMERO CORRELATIVO
$destino="../archivos/".$nombrefoto; // AUMENTA LA X DEBERIA SER UN NUMERO CORRELATIVO

copy($ruta,$destino);

//conexion con la base de datos


mysqli_query($conexion,"INSERT INTO documentos (codalum,fotodoc,detdoc)VALUES ('$codcli3','$nombrefoto','$dt')");

		mysqli_query($conexion,"UPDATE alumno SET ndoc =ndoc+1 WHERE codalum = '$codcli3'");


	echo '<Script language=javascript> 
	alert("LA IMAGEN FUE SUBIDA CORRECTAMENTE...")
	self:location="crm_participantesdoc.php"	
	</script>';
?>

///////////////////////

<?php

//$nombrearchivo=$_FILES['file']['name'];
//$tipo = $_FILES['file']['type'];
//$tamano=$_FILES['file']['size'];
//$ruta=$_FILES['file']['tmp_name'];
//$destino="../archivos/".$nombrearchivo; // AUMENTA LA X DEBERIA SER UN NUMERO CORRELATIVO
//
////$fecha= date("Y-m-d", strtotime($fechae) );
//$fecha = date('Y-m-d');
//copy($ruta,$destino);
//
//mysqli_query($conexion,"INSERT INTO biblioteca (detbiblioteca,fechabiblio,coddep,id_usu,archivo1)VALUES ('$detax','$fecha','$coddepx','$idusu','$nombrearchivo')");
//
//
//	echo '<Script language=javascript> 
//	alert("ARCHIVO SUBIDO EXITOSAMENTE...")
//	self:location="col_biblioteca.php"	
//	</script>';
 ?>




