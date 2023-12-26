
<?php
//echo "estamos el la pAgina de subir";
$id=$_POST['idprod'];

$nombrefoto=$_FILES['file']['name'];
$tamano=$_FILES['file']['size'];
$ruta=$_FILES['file']['tmp_name'];

$foto = date('Y-m-d').date('H-i-s').'.jpg';
$destino="../fotos/".$foto; // AUMENTA LA X DEBERIA SER UN NUMERO CORRELATIVO

copy($ruta,$destino);

//conexion con la base de datos
include('../php/conexion.php');


mysqli_query($conexion,"UPDATE personal SET fotoper = '$destino' WHERE codper = '$id'");
mysqli_query($conexion,"UPDATE usuarios SET foto_usu = '$destino' WHERE codper = '$id'");

	echo '<Script language=javascript> 
	alert("LA IMAGEN FUE SUBIDA CORRECTAMENTE...")
	self:location="jca_personal.php"	
	</script>';
 ?>
