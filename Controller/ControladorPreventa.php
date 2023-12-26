<?php
if (!isset($_SESSION)) {session_start();}

$hoyx = date('Y-m-d');	
$iduux=$_SESSION['id_usu'];
//$nnox=$_SESSION['nomb_usu'];
//$idper=$_SESSION['id_per'];
if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=0;
}

require_once '../Config/conexion.php';
require_once '../Model/ProductoPre.php';

switch($page){
	case 1:
		//$objProducto = new Producto();
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;
		
		if (isset($_POST['producto1']) && $_POST['producto1']!='') {
			try {
				$codarx = $_POST['codar1'];
				$desscri = $_POST['producto1'];
				$pvpx = $_POST['pre1'];
				$cantx = $_POST['cant1'];
				$umedx = $_POST['ume1'];
				
				$subtot=$pvpx*$cantx;
				
				$contador = time(); // unix

				
		$_SESSION['detalle'][$contador] = array('nro'=>$contador,'id'=>$codarx, 'desscri'=>$desscri, 'precio'=>$pvpx, 'cantx'=>$cantx, 'umedx'=>$umedx, 'subtot'=>$subtot);

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
		
		
		case 2:
//data: {'feax':feax,'respox':respox,'codclix':codclix,'fpgx':fpgx},
//		data: {'respox':respox,'codclix':codclix},
		
		$objProducto = new Producto();
		$respox=$_POST['respox']; // recoge datos de ajax JSON
		$codclix=$_POST['codclix']; // recoge datos de ajax JSON

$nnorden = $objProducto->getCodnu();

		foreach($nnorden as $nn):
			$nnordenx= $nn['norden']+1;
		endforeach;

		
		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		if (count($_SESSION['detalle'])>0) {
			try {

				$itt=0;
				foreach($_SESSION['detalle'] as $dett):
					$idar = $dett['id'];
					$desscri = $dett['desscri'];
					$pvpx = $dett['precio'];
					$cantx = $dett['cantx'];
					$umedx = $dett['umedx'];
				
					$itt=$itt+1;
					$subtotal=$pvpx*$cantx;
					$ttotal=$ttotal+$subtotal;

$objProducto->guardarDetallePre($idar,$desscri,$cantx,$pvpx,$subtotal,$nnordenx,$umedx,$hoyx,$iduux,$codclix);

					//$objProducto-> resta_saldo3($cantx,$idar);
				endforeach;

$objProducto->Actualizarec($nnordenx);

$objProducto->guardarTotalPre($iduux,$hoyx,$nnordenx,$ttotal,$respox,$itt,$codclix);


				
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