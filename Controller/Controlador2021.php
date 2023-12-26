<?php
if (!isset($_SESSION)) {session_start();}
$nombre_u=$_SESSION['nomb_usu'];
$id_usu=$_SESSION['id_usu'];

date_default_timezone_set('America/La_Paz');
$fecha = date('Y-m-d');

require_once '../Config/conexion.php';
require_once '../Model/modelo1.php';

if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=0;
}


switch($page){
	
	case 1:
		$objProducto = new Producto();
		$json = array();
		$json['msj'] = 'Servicio Registrado para Aprobacion';
		$json['success'] = true;
		if (isset($_POST['idcod']) && $_POST['idcod']!=0 && isset($_POST['coservi']) && $_POST['coservi']!=0) {
			try {
				$idcodx = $_POST['idcod'];
				$coservix = $_POST['coservi'];
				$objProducto->RegistraServicio($idcodx,$coservix,$id_usu,$fecha);				
				
				$json['success'] = true;

				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'Ingrese un dato valido';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;

	case 2:
		$objProducto = new Producto();
		$json = array();
		$json['msj'] = 'Ticket Registrado ';
		$json['success'] = true;
		
		//data: {'idcod':idcod2, 'coservi':coservi2},
		
		if (isset($_POST['idcod']) && $_POST['idcod']!=0 && isset($_POST['coservi']) && $_POST['coservi']!=0) {
			try {
				$idcodx = $_POST['idcod'];
				$coservix = $_POST['coservi'];
				$obvx = $_POST['obv'];
$_SESSION['coddcli']=$idcodx;
				

				$objProducto->RegistraTk($idcodx,$coservix,$id_usu,$fecha,$obvx);
				
				
				
				$json['success'] = true;

				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'Ingrese un dato valido';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;		
		
		
}
?>