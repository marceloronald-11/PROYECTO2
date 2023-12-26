<?php
if (!isset($_SESSION)) {session_start();}


include('../php/conexion.php');
$usu = addslashes($_POST['usu']);
$pass = addslashes($_POST['pass']);
$area = addslashes($_POST['area']);

$usuario = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '$usu'");
if(mysqli_num_rows($usuario)<1){
	echo 'usuario';
}else{
	$area = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '$usu' AND id_area = '$area'");
	if(mysqli_num_rows($area)<1){
		echo 'area';
	}else{
//		$consulta = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '$usu' AND pass_usu = '$pass'");
//$consulta = mysqli_query($conexion,"SELECT * FROM usuarios AS uu JOIN departamento AS dp ON uu.coddep=dp.coddep 
//WHERE usuario = '$usu' AND pass_usu = '$pass'");

$consulta = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '$usu' AND pass_usu = '$pass'");

		if(mysqli_num_rows($consulta)<1){
			echo 'password';
		}else{
			$consulta2 = mysqli_fetch_array($consulta);
			$_SESSION['usuario'] = $consulta2['usuario'];
			$_SESSION['id_area'] = $consulta2['id_area'];
			$_SESSION['id_usu'] = $consulta2['id_usu'];
			$_SESSION['nomb_usu'] = $consulta2['nomb_usu'];
			$_SESSION['id_per'] = $consulta2['id_per'];
			$_SESSION['coddep'] = $consulta2['coddep'];
			$_SESSION['nomdepto'] = $consulta2['nombredepto'];
			$_SESSION['codsuc'] = $consulta2['codsuc'];
			$_SESSION['fotousu'] = $consulta2['fotousu'];
			$_SESSION['nomb_suc'] = $consulta2['nomb_suc'];
			$_SESSION['codtisuc'] = $consulta2['codtisuc'];

			
			switch($consulta2['id_area']){
				case 'admin':
					echo 'admin';
				break;
				case 'operador':
					echo 'operador';
				break;
				case 'sucursal':
					echo 'sucursal';
				break;
				case 'movil':
					echo 'movil';
				break;
				case 'vendedor':
					echo 'vendedor';
				break;
				case 'cobrador':
					echo 'cobrador';
				break;
				case 'compras':
					echo 'compras';
				break;
				case 'ventas':
					echo 'ventas';
				break;


			}
		}
	}
}
?>
