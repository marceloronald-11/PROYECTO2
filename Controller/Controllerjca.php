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

	case 12:
		$objProducto = new Producto1();

		data: {'nombb':nombb,'areaa':areaa,'carg':carg},		
		$nombx=$_POST['nombb']; // recoge datos de ajax JSON
		$areaax=$_POST['areaa']; // recoge datos de ajax JSON
		$cargx=$_POST['carg']; // recoge datos de ajax JSON
		$idalux=$_POST['idalu']; // recoge datos de ajax JSON

		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		if (isset($_POST['idalu']) && $_POST['idalu']!='') {
			try {
				
// 				foreach($_SESSION['detalle'] as $det):
// 					$idservicio = $det['id'];
// 					$umed = $det['umed'];
// 					$mr= $det['mr'];
// 					$cantidad = $det['cantidad'];
// 					$tpago= $det['tipop'];
// 					$precio = $det['precio'];
// 					$subtotal = $det['subtotal'];
// 					$producto = $det['producto'];
// 					$observ= $det['observ'];
					

// 					$ttotal=$ttotal+$subtotal;
// $objProducto->GuardarMovservi($idservicio, $producto, $cantidad, $precio, $subtotal, $codmovv, $codh, $encargado, $nnota, $nturno, $umed,$tpago,$idusu,$norden,$nnha,$nticket);
// $objProducto->GuardarCtaTotal($idservicio, $producto, $cantidad, $precio, $subtotal, $codmovv, $codh, $encargado, $nnota, $nturno, $umed,$tpago,$mr,$norden,$idusu,$nticket);

				
// 				endforeach;



				//$objProducto->Actualizarcodnu($nnota,$nticket);

				//no sirve $objProducto->guardarTotal($ttotal,$idventa,$encargado,$nnota);
				
				//$_SESSION['detalle'] = array();
						
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'No hay servicios agregados';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;	

case 11:
		$objProducto = new Producto();
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;

		//data: {'codrepx':codrepx, 'detar':detar,'codd':codd,'ume':ume,'cantt':cantt, 'tpri':tpri},

		if (isset($_POST['detar']) && $_POST['detar']!='' && isset($_POST['cantt']) && $_POST['cantt']!='') {
			try {
				$coddx = $_POST['codd'];
				$detarx = strtoupper($_POST['detar']);
				$umex = $_POST['ume'];
				$canttx = $_POST['cantt'];
				$tprix = $_POST['tpri'];
				$codrepx = $_POST['codrepx'];


				$contador = time(); // unix

		$_SESSION['detalle'][$detarx] = array('codrep1'=>$codrepx,'codd1'=>$coddx,'detar1'=>$detarx, 'ume1'=>$umex, 'cantt1'=>$canttx, 'tpri1'=>$tprix);

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
		
case 34:

				$objProducto = new Producto();
				$nomb2=$_POST['nombx']; // recoge datos de ajax JSON
				$area2=$_POST['areaax']; // recoge datos de ajax JSON
				$carg2=$_POST['carg5']; // recoge datos de ajax JSON
				$codarea2=$_POST['codarea5']; // recoge datos de ajax JSON
				$codcargo2=$_POST['codcargo5']; // recoge datos de ajax JSON
				$codsoli2=$_POST['codsoli5']; // recoge datos de ajax JSON
				$coddoc2=$_POST['coddoc5']; // recoge datos de ajax JSON
				$vver2=$_POST['vver5']; // recoge datos de ajax JSON
				$fea2=$_POST['fea5']; // recoge datos de ajax JSON
				$fesol2=$_POST['fesol5']; // recoge datos de ajax JSON
				$nsol2=$_POST['nsol5']; // recoge datos de ajax JSON
		
		 $nnorden = $objProducto->getCodnu();
		
				foreach($nnorden as $nn):
					$nord2= $nn['nordensol']+1;
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
							$ume2 = $dett['ume1'];
							$cant2 = $dett['cantt1'];
							$tpri2 = $dett['tpri1'];
							$itt=$itt+1;

							$objProducto->guardarDetSoli($codrep2,$codd2,$detar2,$ume2,$cant2,$tpri2,$idusu,$hoyx,$nord2);
		
							//$objProducto-> resta_saldo3($cantx,$idar);
						endforeach;
		
						$objProducto->Actcodnusol($nord2);

						$objProducto->guardarSoli($idusu,$hoyx,$nord2,$nomb2,$coddoc2,$vver2,$fea2,$fesol2,$nsol2,$codarea2,$codcargo2,$area2,$carg2,$codsoli2,$itt);
		
		
						
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
		
		



	case 2:
		$json = array();
		$json['msj'] = 'Producto Eliminado';
		$json['success'] = true;
	
		if (isset($_POST['id'])) {
			try {
				unset($_SESSION['detalle'][$_POST['id']]);
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}
		break;
		
	case 3:
		$objProducto = new Producto();
		$encargado=$_POST['encargado']; // recoge datos de ajax JSON
		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		if (count($_SESSION['detalle'])>0) {
			try {
				$objProducto->guardarVenta();
				$registro_ultima_venta = $objProducto->getUltimaVenta();
				$result_ultima_venta = $registro_ultima_venta->fetchObject();
				$idventa = $result_ultima_venta->ultimo;
				
				foreach($_SESSION['detalle'] as $detalle):
					$idproducto = $detalle['id'];
					$cantidad = $detalle['cantidad'];
					$precio = $detalle['precio'];
					$subtotal = $detalle['subtotal'];
					$precio_dist = $detalle['precio_dist'];
					$id_prov = $detalle['id_prov'];
					
					$ttotal=$ttotal+$subtotal;
					$objProducto->guardarDetalleVenta($idventa, $idproducto, $cantidad, $precio, $subtotal,$precio_dist,$id_prov);
					$objProducto->incrementa_saldo($cantidad,$idproducto);
				endforeach;

				$objProducto->guardarTotal($ttotal,$idventa,$encargado);
				
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

		case 22:
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


case 35:


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

	case 36:
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


		$re = $objProducto->getRepuesto();
		foreach($re as $rex):
			$codrepx= $rex['codrep'];
			$umedx= $rex['umed'];
			$detrepu= $rex['detrepuesto'];
			$codigox= $rex['codigo'];
			$preciodtx= $rex['costo'];
			$saldox= $rex['saldo'];
			$saldominx= $rex['saldomin'];	
			
		//	$objProducto->RegSolidet($codrepx,$detrepu,$codigox,$umedx,$nordenx,$preciodtx,$saldox,$saldominx);
		endforeach;

//$objProducto->RegSolitot($nordenx,$nombre_u,$idusu,$coddocx,$versionx,$fedoc,$codarex,$codcargox,$codsolix);

		//$objProducto->Actcodnusol($nordenx);


		$json = array();
		$json['msj'] = 'Guardado correctamente';
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