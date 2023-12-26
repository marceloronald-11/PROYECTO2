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



case 2:


		$objProducto = new Producto();
		//$nomb2=$_POST['nordenx']; // recoge datos de ajax JSON
		$tcax=$_POST['tcax']; // recoge datos de ajax JSON
		$feax=$_POST['feax']; // recoge datos de ajax JSON
		$codotex=$_POST['codote']; // recoge datos de ajax JSON
		$codigotecx=$_POST['codigotec']; // recoge datos de ajax JSON
		$notecx=$_POST['notec']; // recoge datos de ajax JSON
		$fesalx=$_POST['fesal']; // recoge datos de ajax JSON

 $nnorden = $objProducto->getCodnu();

		foreach($nnorden as $nn):
			$nord2= $nn['nvales']+1;
		endforeach;


		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		if (count($_SESSION['detalle'])>0) {
			try {

				$itt=0;

			
				
				foreach($_SESSION['detalle'] as $dett):
					$codrep2 = $dett['codrep1'];
					$codd2 = $dett['codd1'];
					$detar2 = $dett['detar1'];
					$peu2 = $dett['peu'];
					$cant2 = $dett['cantt1'];
					$cost2 = $dett['cost'];
					$sto2 = $dett['sto'];
					$tca2 = $dett['tca'];
					$imbs2 = $dett['imbs'];

					$iimporte= $peu2*$cant2;
					$itt=$itt+1;

					$objProducto->guardarValedet($hoyx,$codd2,$detar2,$cant2,$peu2,$cost2,$iimporte,$sto2,$idusu,$nord2);


					//$objProducto-> resta_saldo3($cantx,$idar);
				endforeach;
	

				$objProducto->guardarValetot($hoyx,$nord2,$itt,$tcax,$codotex,$codigotecx,$notecx,$fesalx);
				$objProducto-> Actcodnuvale($nord2);

				
				$_SESSION['detalle'] = array();
						
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'No hay productos agregados';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;		


}
?>