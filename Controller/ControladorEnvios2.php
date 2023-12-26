<?php
if (!isset($_SESSION)) {session_start();}
$codsucse=$_SESSION['codsuc'];
$idperx=$_SESSION['id_per'];


require_once '../Config/conexion.php';
require_once '../Model/Producto2.php';


if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=0;
}
//$page=1;

switch($page){
	
	case 1:
		$objProducto = new Producto1();
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;
		//data: {'producto_id':producto_id, 'cantidad':cantidad, 'pneto':pneto},
		if (isset($_POST['producto_id']) && $_POST['producto_id']!='') {
			try {
				$cantidad = $_POST['cantidad'];
				$producto_id = $_POST['producto_id'];
				$pneto = $_POST['pneto'];
				$fevenx = $_POST['feven'];
					
				
				
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
				$codigox = $dservicio->codigo;
				
				$subtotal = $cantidad * $pneto;
	
					$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'descripcion'=>$descripcion,'umed'=>$umed,'cantidad'=>$cantidad,'precio'=>$pneto,'subtotal'=>$subtotal,'saldo'=>$saldo,'observ'=>$observx,'codsucx'=>$codsucx,'codclax'=>$codclax,'codpvx'=>$codpvx,'fevenx'=>$fevenx,'codigox'=>$codigox);

				

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

		case 3:
		
				$objProducto = new Producto1();
				$idusu=$_POST['idusu'];												
				$respo=$_POST['respo']; // recoge datos de ajax JSON
				$fechav=$_POST['fechav']; // recoge datos de ajax JSON
				$codsucev=$_POST['codsucev']; // sucursal elegida
		
				$fechavv= date("Y-m-d", strtotime($fechav) );
				 // recoge datos de ajax JSON
				
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
		
				$lote = time();		
		
						
						foreach($_SESSION['detalle'] as $datos):
							$idservicio = $datos['id'];
							$descripcion= $datos['descripcion'];
							$cantidad = $datos['cantidad'];
							$precio = $datos['precio'];
							$subtotal = $datos['subtotal'];
							$observ1 = $datos['observ'];
							$umed = $datos['umed'];
							$codpvv = $datos['codpvx'];
							$feven1 = $datos['fevenx'];
							$codigo1 = $datos['codigox'];

		
							$ttotal=$ttotal+$subtotal;
							$itm=$itm+1;
						
//$objProducto->GuardaraLote($idservicio,$cantidad,$precio,$nroing,$fechavv,$idusu,$lote,$feven1);
//
//$registro_ultima_venta = $objProducto->getByIdr();
//$result_ultima_venta = $registro_ultima_venta->fetchObject();
//$idid = $result_ultima_venta->ultimo;
						
						
						
						$objProducto->GuardarEnvio($idservicio, $descripcion, $cantidad,$precio,$subtotal,$nroing,$umed,$fechavv,$idusu,$codsucev,$codpvv,$codigo1,$feven1);
	
					//	$objProducto->GuardarIngreso($idservicio, $descripcion, $cantidad,$precio,$subtotal,$nroing,$umed,$fechavv,$idusu,$codsucse,$codpvv,$codigo1,$feven1);
						
						
					//$objProducto->ActualizarEnvio($idservicio,$cantidad);
						
					$tt=$objProducto-> VerificaCodigoenvio($idservicio,$codsucev);
					if($tt==0){
						$objProducto->crearArticuloSuc($idservicio,$cantidad,$codsucev);
					}else {
						$objProducto->sumarArticuloSuc($idservicio,$cantidad,$codsucev);
					}	
						
						
					$objProducto->ActualizarIngreso($idservicio,$cantidad);
		
						endforeach;
		
				
$objProducto->Actualizarcodnu($nroing);
		
$objProducto->guardarTotEnvio($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$codsucev); 

//$objProducto->guardarTotIngreso($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$codsucse);
					
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