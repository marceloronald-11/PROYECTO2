<?php
if (!isset($_SESSION)) {session_start();}

include('../php/conexion.php');
$usu = addslashes($_POST['usu']);
$pass = addslashes($_POST['pass']);
$ufvx = addslashes($_POST['ufvx']);

$hoyx = date('Y-m-d');
//$tcc = mysqli_query($conexion,"SELECT * FROM ufv_registro WHERE fechaufv = '$hoyx' ");
//if(mysqli_num_rows($tcc)<1){
//		mysqli_query($conexion,"INSERT INTO ufv_registro (fechaufv,importeufv)VALUES('$hoyx','$ufvx')");
//		//mysqli_query($conexion,"UPDATE codnu SET  tcambioo = '$tc' ");
//
//}

$usuario = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '$usu'");
if (mysqli_num_rows($usuario)<1) {
   echo 'usuario';
} else{
	$clave = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '$usu' AND pass_usu = '$pass'");
		if(mysqli_num_rows($clave)<1){
			echo 'password';
		}else{
			
		$consulta2 = mysqli_fetch_array($clave);
			$_SESSION['usuario'] = $consulta2['usuario'];
			$_SESSION['id_area'] = $consulta2['id_area'];
			$_SESSION['id_usu'] = $consulta2['id_usu'];
			$_SESSION['nomb_usu'] = $consulta2['nomb_usu'];
			$_SESSION['id_per'] = $consulta2['codper'];
			$_SESSION['coddep'] = $consulta2['coddep'];
			$_SESSION['nomdepto'] = $consulta2['nombredepto'];
			$_SESSION['codsuc'] = $consulta2['codsuc'];
			$_SESSION['fotousu'] = $consulta2['foto_usu'];
			$_SESSION['nomb_suc'] = $consulta2['nomb_suc'];
			$_SESSION['codtisuc'] = $consulta2['codtisuc'];
			$_SESSION['pass'] = $consulta2['pass_usu'];
			
			
			$area=$consulta2['id_area'];
		
			echo $area;
			
		}
}


?>
