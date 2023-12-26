<?php
if (!isset($_SESSION)) {session_start();}
$codsucse=$_SESSION['codsuc'];


require_once '../Config/conexion.php';
require_once '../Model/Producto2.php';

if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=0;
}


switch($page){
	
	case 1:
		$objProducto = new Producto1();
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;

		
		if (isset($_POST['producto_id']) && $_POST['producto_id']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!=0) {
			try {
				$cantidad = $_POST['cantidad'];
				$producto_id = $_POST['producto_id'];
				//$pneto = $_POST['pneto'];
					
				
				
				$resultado_producto = $objProducto->getById($producto_id);
				$dservicio = $resultado_producto->fetchObject();
				
				$descripcion = $dservicio->descripar;
				$pneto = $dservicio->pneto;
				$saldo = $dservicio->saldo;
				$umed = $dservicio->umed;
				$fotox = $dservicio->fotoar;
				$observx = $dservicio->observar;
				$codsucx = $dservicio->codsuc;
				$codclax = $dservicio->codcla;
				$codpvx = $dservicio->codpv;
				
				
				$subtotal = $cantidad * $pneto;
				
	$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'descripcion'=>$descripcion,'umed'=>$umed,'cantidad'=>$cantidad,'precio'=>$pneto,'subtotal'=>$subtotal,'saldo'=>$saldo,'observ'=>$observx,'codsucx'=>$codsucx,'codclax'=>$codclax,'codpvx'=>$codpvx);

				$json['success'] = true;

				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'Ingrese un producto y/o ingrese cantidad';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;

case 2:
//data: {'idusu':idusu,'respo':respo,'fechav':fechav,'codclix':codclix},		
				$objProducto = new Producto1();
				$idusu=$_POST['idusu'];												
				$respo=$_POST['respo']; // recoge datos de ajax JSON
				$fechav=$_POST['fechav']; // recoge datos de ajax JSON
				$fechavv= date("Y-m-d", strtotime($fechav) );
				$codclix=$_POST['codclix']; // recoge datos de ajax JSON
		
		
		
		$nnota = $objProducto->getcodnu();
				foreach($nnota as $nro):
					$nroing= $nro['norden']+1;
				endforeach;
		$nxr=0;
				
		$fecha2= date("Y-m-d", strtotime($fechav) );
		
				$json = array();
				$json['msj'] = 'Guardado correctamente';
				$json['success'] = true;
				$ttotal=0.00;
				$itm=0;
				if (count($_SESSION['detalle'])>0) {
					try {
		
						
		
						foreach($_SESSION['detalle'] as $datos):
							$idservicio = $datos['id'];
							$descripcion= $datos['descripcion'];
							$cantidad = $datos['cantidad'];
							$precio = $datos['precio'];
							$subtotal = $datos['subtotal'];
							$observ1 = $datos['observ'];
							$umed = $datos['umed'];
//		
							$ttotal=$ttotal+$subtotal;
							$itm=$itm+1;
						$objProducto->GuardarCompra12($idservicio, $descripcion, $cantidad,$precio,$subtotal,$nroing,$umed,$fechavv,$idusu,$codsucse);
					$objProducto->ActualizarArt12($idservicio, $cantidad);
		
						endforeach;
		
				
		$objProducto->Actualizarcodnu($nroing);
		$objProducto->guardarTot12($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$codsucse); 
						
						
		//$xx=1;
		//if($tpago=='CR'){
//			$objProducto->CrearCredito($idusu,$codsucse,$fecha2,$nroing,$ttotal,$respo,$colab);
//		}
	
						
						
	foreach($_SESSION['detalle'] as $datos):
							$idservicio = $datos['id'];
							$cantidad = $datos['cantidad'];
						
						$cantaux=0;
						$sw=0;
					while($cantaux < $cantidad){
						if($sw==0){
						$cantidad1=$cantidad; $sw=1;
						}
						$artlote = $objProducto->getlote($idservicio);
						foreach($artlote as $dd):
							$codlotx = $dd['codlot'];
							$cantlotx = $dd['cantlot'];
						endforeach;
							if($cantidad1>$cantlotx){
								$objProducto->ActualizaLote2($codlotx,$cantlotx);
								$cantaux+=$cantlotx;
								$cantidad1-=$cantlotx;
							}else{
							if($cantidad1==$cantlotx){
								$objProducto->ActualizaLote2($codlotx,$cantidad1);
								$cantaux+=$cantidad1;
							}
							if($cantidad1<$cantlotx){
								$objProducto->ActualizaLote2($codlotx,$cantidad1);
								$cantaux+=$cantidad1;
							}						
							}
					}
							
endforeach;	
						
						
						
						
						
						$_SESSION['detalle'] = array();
						//session_destroy();
								
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
		

case 3:
				$objProducto = new Producto1();
				$idusu=$_POST['idusu'];												
				$respo=$_POST['respo']; // recoge datos de ajax JSON
				$fechav=$_POST['fechav']; // recoge datos de ajax JSON
				$fechavv= date("Y-m-d", strtotime($fechav) );
				$codclix=$_POST['codclix']; // recoge datos de ajax JSON
				$tpgx=$_POST['tpgx']; // recoge datos de ajax JSON
		
		
		$nnota = $objProducto->getcodnu();
				foreach($nnota as $nro):
					$nroing= $nro['norden']+1;
				endforeach;
		$nxr=0;
				
		$fecha2= date("Y-m-d", strtotime($fechav) );
		
				$json = array();
				$json['msj'] = 'Guardado correctamente';
				$json['success'] = true;
				$ttotal=0.00;
				$itm=0;
				if (count($_SESSION['detalle'])>0) {
					try {
		
						
		
						foreach($_SESSION['detalle'] as $datos):
							$idservicio = $datos['id'];
							$descripcion= $datos['descripcion'];
							$cantidad = $datos['cantidad'];
							$precio = $datos['precio'];
							$subtotal = $datos['subtotal'];
							$observ1 = $datos['observ'];
							$umed = $datos['umed'];
//		
							$ttotal=$ttotal+$subtotal;
							$itm=$itm+1;
						$objProducto->GuardarCompra122($idservicio, $descripcion, $cantidad,$precio,$subtotal,$nroing,$umed,$fechavv,$idusu,$codsucse);
						
					$objProducto->ActualizarSucuu($idservicio, $cantidad,$codsucse);
		
						endforeach;
		
				
		$objProducto->Actualizarcodnu($nroing);
		$objProducto->guardarTot12($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$codsucse,$tpgx,$codclix); 
						
						
		if($tpgx=='CR'){
			$objProducto->CrearCredito($idusu,$codsucse,$fechavv,$nroing,$ttotal,$respo,$codclix);
		}
	
						
						
	//foreach($_SESSION['detalle'] as $datos):
//							$idservicio = $datos['id'];
//							$cantidad = $datos['cantidad'];
//						
//						$cantaux=0;
//						$sw=0;
//					while($cantaux < $cantidad){
//						if($sw==0){
//						$cantidad1=$cantidad; $sw=1;
//						}
//						$artlote = $objProducto->getlote($idservicio);
//						foreach($artlote as $dd):
//							$codlotx = $dd['codlot'];
//							$cantlotx = $dd['cantlot'];
//						endforeach;
//							if($cantidad1>$cantlotx){
//								$objProducto->ActualizaLote2($codlotx,$cantlotx);
//								$cantaux+=$cantlotx;
//								$cantidad1-=$cantlotx;
//							}else{
//							if($cantidad1==$cantlotx){
//								$objProducto->ActualizaLote2($codlotx,$cantidad1);
//								$cantaux+=$cantidad1;
//							}
//							if($cantidad1<$cantlotx){
//								$objProducto->ActualizaLote2($codlotx,$cantidad1);
//								$cantaux+=$cantidad1;
//							}						
//							}
//					}
//							
//endforeach;	
						
						
						
						
						
						$_SESSION['detalle'] = array();
						//session_destroy();
								
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
		


}
?>