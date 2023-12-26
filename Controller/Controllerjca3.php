<?php
//session_start();
if (!isset($_SESSION)) {session_start();}

$nombre_u=$_SESSION['nomb_usu'];
$fotito=$_SESSION['fotousu'];
$nombresuc=$_SESSION['nomb_suc'];
$codsucx=$_SESSION['codsuc'];
$area=$_SESSION['id_area'];
$idusu=$_SESSION['id_usu'];



$hoyx = date('Y-m-d');	

if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=0;
}

require_once '../Config/conexion.php';
require_once '../Model/Producto.php';

switch($page){



		case 1:
		$objProducto = new Producto();
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;


	
		if (isset($_POST['detar']) && $_POST['detar']!='' && isset($_POST['cantt']) && $_POST['cantt']!='') {
			try {


				$coddx = $_POST['codd'];
				$detarx = strtoupper($_POST['detar']);
				$peux = $_POST['peu'];
				$canttx = $_POST['cantt'];
				$costx = $_POST['cost'];
				$codrepx = $_POST['codrepx'];
				$stox = $_POST['sto'];
				$tcax = $_POST['tca'];
				$imbsx = $_POST['imbs'];



				$contador = time(); // unix

		$_SESSION['detalle'][$detarx] = array('codrep1'=>$codrepx,'codd1'=>$coddx,'detar1'=>$detarx, 'peu'=>$peux, 'cantt1'=>$canttx, 'cost'=>$costx, 'sto'=>$stox, 'tca'=>$tcax, 'imbs'=>$imbsx);

				$json['success'] = true;

				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'Ingrese descripcion o codigo';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;  

}
?>