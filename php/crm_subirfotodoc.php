<?php
$id=$_POST['idprod'];
$dt=$_POST['dt'];


$nombrefoto=$_FILES['file']['name'];
$tamano=$_FILES['file']['size'];
$ruta=$_FILES['file']['tmp_name'];

$foto = date('Y-m-d').date('H-i-s').'.jpg';
$destino="../fotos/".$foto; // AUMENTA LA X DEBERIA SER UN NUMERO CORRELATIVO

copy($ruta,$destino);

//conexion con la base de datos
include('../php/conexion.php');

mysqli_query($conexion,"INSERT INTO documentos (codcli,fotodoc,detdoc)VALUES('$id','$destino','$dt')");
//mysqli_query($conexion,"UPDATE clientes SET fotocli = '$destino' WHERE codcli = '$id'");
//mysqli_query($conexion,"UPDATE usuarios SET foto_usu = '$destino' WHERE codper = '$id'");

	echo '<Script language=javascript> 
	alert("LA IMAGEN FUE SUBIDA CORRECTAMENTE...")
	self:location="crm_clientes.php"	
	</script>';
 ?>
