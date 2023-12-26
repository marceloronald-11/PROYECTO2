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
///cabecera
		$objProducto = new Producto();
		 $codarex=$_POST['codareax']; // recoge datos de ajax JSON
		 $codcargox=$_POST['codcargox']; // recoge datos de ajax JSON
		 $codsolix=$_POST['codsolix']; // recoge datos de ajax JSON


	 $cab = $objProducto->getCabeza();
		 foreach($cab as $nn):
			$versionx= $nn['version'];
			$coddocx= $nn['coddoc'];
			$fedoc= $nn['fechacab'];
		 endforeach;
 


 $nnorden = $objProducto->getCodnu();
		foreach($nnorden as $n):
			$nordenx= $n['nordensol']+1;
		endforeach;
$it=0;

		$re = $objProducto->getRepuesto();
		foreach($re as $rex):
			$codrepx= $rex['codrep'];
			$umedx= $rex['umed'];
			$detrepu= $rex['detrepuesto'];
			$codigox= $rex['codigo'];
			$preciodtx= $rex['costo'];
			$saldox= $rex['saldo'];
			$saldominx= $rex['saldomin'];	
			$it+=1;
			$objProducto->RegSolidet($codrepx,$detrepu,$codigox,$umedx,$nordenx,$preciodtx,$saldox,$saldominx);
		endforeach;

$objProducto->RegSolitot($nordenx,$nombre_u,$idusu,$coddocx,$versionx,$hoyx,$codarex,$codcargox,$codsolix,$it);

		$objProducto->Actcodnusol($nordenx);


		$json = array();
		$json['msj'] = 'Guardado correctamente ..!';
		$json['success'] = true;
		$ttotal=0.00;
		if (isset($_POST['codareax']) && $_POST['codareax']!='') {
			try {

				$itt=0;
				
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