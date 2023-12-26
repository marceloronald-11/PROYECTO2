<?php
//session_start();
if (!isset($_SESSION)) {session_start();}
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


case 11:
		$objProducto = new Producto();
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;

		//data: {'codrepx':codrepx, 'detar':detar,'codd':codd,'ume':ume,'cantt':cantt, 'tpri':tpri},

		if (isset($_POST['detar']) && $_POST['detar']!='' && isset($_POST['cantt']) && $_POST['cantt']!='') {
			try {
				$coddx = $_POST['codd'];
				$detarx = $_POST['detar'];
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

							$objProducto->guardarDetSoli2($codrep2,$codd2,$detar2,$ume2,$cant2,$tpri2,$idusu,$hoyx,$nord2);
		
							//$objProducto-> resta_saldo3($cantx,$idar);
						endforeach;
		
						$objProducto->Actcodnusol($nord2);

						$objProducto->guardarSoli2($idusu,$hoyx,$nord2,$nomb2,$coddoc2,$vver2,$fea2,$fesol2,$nsol2,$codarea2,$codcargo2,$area2,$carg2,$codsoli2,$itt);
		
		
						
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

}
?>