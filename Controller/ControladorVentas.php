<?php
if (!isset($_SESSION)) {session_start();}
$codsucse=$_SESSION['codsuc'];
$idperx=$_SESSION['id_per'];


require_once '../Config/conexion.php';
require_once '../Model/Producto1.php';

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
				//$cantidad = $_POST['cantidad'];
//				$producto_id = $_POST['producto_id'];
				//$pneto = $_POST['pneto'];
					
				
				
				//$resultado_producto = $objProducto->getById($producto_id);
//				$dservicio = $resultado_producto->fetchObject();
//				$descripcion = $dservicio->descripar;
//				$pneto = $dservicio->pneto;
//				$saldo = $dservicio->saldo;
//				$umed = $dservicio->umed;
//				$fotox = $dservicio->fotoar;
//				$observx = $dservicio->observar;
//				$codsucx = $dservicio->codsuc;
//				$codclax = $dservicio->codcla;
//				$codpvx = $dservicio->codpv;
//				
//				
//				$subtotal = $cantidad * $pneto;
				
	//$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'descripcion'=>$descripcion,'umed'=>$umed,'cantidad'=>$cantidad,'precio'=>$pneto,'subtotal'=>$subtotal,'saldo'=>$saldo,'observ'=>$observx,'codsucx'=>$codsucx,'codclax'=>$codclax,'codpvx'=>$codpvx);

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
require('../php/codigo_control.class.php');		
		$objProducto = new Producto1();
		//$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$respo=$_POST['respo']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$fechavv= date("Y-m-d", strtotime($fechav) );
		$nitv=$_POST['nitv']; // recoge datos de ajax JSON
		$cosuc=$_POST['cosuc']; // recoge datos de ajax JSON

$nnota = $objProducto->getcodnu();
		foreach($nnota as $nro):
			$nroing= $nro['norden']+1;
		endforeach;

		
$nxr=0;
//$cosuc=1;
$buss = $objProducto->getDosificaconx($cosuc);
		foreach($buss as $nnn):
			$nxr=$nxr+1;
			$buu= $nnn['codsuc'];
			$faac= $nnn['facactual']+1;
			$nautoriza= $nnn['nautorizacion'];
			$nnit= $nnn['nit'];
			$llave= $nnn['llave'];
			$felim= $nnn['fechalim'];
			$leyenda= $nnn['leyenda'];
			$cdfac= $nnn['cdfac'];
			$coddox= $nnn['coddo'];

		endforeach;
	$codsucfa=$buu;		
		
		
$fecha2= date("Y-m-d", strtotime($fechav) );
$fechal= date("Y-m-d", strtotime($felim) );
$fechaqr= date("d-m-Y", strtotime($fechav) );
		

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
					$codigoo = $datos['codigo'];
					$foto = $datos['foto'];
					$observ1 = $datos['observ'];
					$umed = $datos['umed'];

					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
			$objProducto->GuardarMvDetvv($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$codigoo,$idusu,$cosuc);
			$objProducto->ActualizarArt($idservicio, $cantidad);

				endforeach;

$fecha3=str_replace('-', '', $fecha2);
//$fecha33= date("d-m-Y", strtotime($fecha3) );
//str_replace('/','',$fecha)
$CodigoControl = new CodigoControl($nautoriza,$faac,$nnit,$fecha3,round(str_replace(',', '.', $ttotal), 0),$llave);
$generado=$CodigoControl->generar();	
////////////////////// generando codigo qr

include "../phpqrcode/qrlib.php";      
$ma=$generado;
//QRcode::png($ma);
//$tempDir = EXAMPLE_TMP_SERVERPATH;
$tempDir = $ma;//codigocontrol;//nombre del archivo

$codeContents = $nnit.'|'.$faac.'|'.$nautoriza.'|'.$fechaqr.'|'.$ttotal.'|'.$ttotal.'|'.$ma.'|'.$nitv;// contenido del codigo de control

//$fileName = 'qrcode_name.png';
$fileName = '.png';
$filename2 = '../Controller/'.$ma.'.png';
$pngAbsoluteFilePath = $tempDir.$fileName;
//$url = EXAMPLE_TMP_URLRELPATH.$fileName;

QRcode::png($codeContents, $pngAbsoluteFilePath,'L', 4, 2); 
				
				
				
//$objProducto->guardarTott($nomcli,$ttotal,$nnota,$idusu,$generado,$filename2,$nit,$nitcli,$nautoriza,$felim,$fecha2,$nfact);
				
$objProducto->Actualizarcodnu($nroing);
$objProducto->guardarTotMvvv($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$faac,$nnit,$nitv,$nautoriza,$felim,$ma,$filename2,$cosuc,$leyenda,$coddox); /// fpg = IN,DEV,BJ
//$nfact=$nfact+1;
$objProducto-> ActualizarFac($faac,$codsucfa);	

///registrar clientes
//$tt=$objProducto-> VerificaCi($nitv);
//	if($tt==0){ $objProducto-> ActualizarDClientes($nitv,$respo);	}			
				
$tt=$objProducto-> VerificaNit($nitv);	
	if($tt==0){ $objProducto-> ActualizarDClientes($nitv,$respo);	}			
				

				
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
//require('../php/codigo_control.class.php');
//require('../php/codigo_control.class.php');		
		$objProducto = new Producto1();
		//$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$respo=$_POST['respo']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$fechavv= date("Y-m-d", strtotime($fechav) );
		$tpago=$_POST['tpago']; // recoge datos de ajax JSON
		$colab=$_POST['colab']; // recoge datos de ajax JSON

$nnota = $objProducto->getcodnu();
		foreach($nnota as $nro):
			$nroing= $nro['norden']+1;
		endforeach;

		
$nxr=0;
//$cosuc=1;
//$buss = $objProducto->getDosificaconx($cosuc);
//		foreach($buss as $nnn):
//			$nxr=$nxr+1;
//			$buu= $nnn['codsuc'];
//			$faac= $nnn['facactual']+1;
//			$nautoriza= $nnn['nautorizacion'];
//			$nnit= $nnn['nit'];
//			$llave= $nnn['llave'];
//			$felim= $nnn['fechalim'];
//			$leyenda= $nnn['leyenda'];
//			$cdfac= $nnn['cdfac'];
//			$coddox= $nnn['coddo'];
//
//		endforeach;
//	$codsucfa=$buu;		
		
		
$fecha2= date("Y-m-d", strtotime($fechav) );
//$fechal= date("Y-m-d", strtotime($felim) );
//$fechaqr= date("d-m-Y", strtotime($fechav) );
		

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
					$codigoo = $datos['codigo'];
					$foto = $datos['foto'];
					$observ1 = $datos['observ'];
					$umed = $datos['umed'];

					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
			$objProducto->GuardarCompra11($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$codigoo,$idusu,$codsucse,$tpago,$colab);
			$objProducto->ActualizarArt11($idservicio, $cantidad);

				endforeach;

		
$objProducto->Actualizarcodnu($nroing);
$objProducto->guardarTot11($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$codsucse,$tpago,$colab); 
$xx=1;
if($tpago=='CR'){
	$objProducto->CrearCredito($idusu,$codsucse,$fecha2,$nroing,$ttotal,$respo,$colab);
}


//$nfact=$nfact+1;
//$objProducto-> ActualizarFac($faac,$codsucfa);	

///registrar clientes
//$tt=$objProducto-> VerificaCi($nitv);
//	if($tt==0){ $objProducto-> ActualizarDClientes($nitv,$respo);	}			
				
//$tt=$objProducto-> VerificaNit($nitv);	
//	if($tt==0){ $objProducto-> ActualizarDClientes($nitv,$respo);	}			
				

				
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





		
	case 22:
//require('../php/codigo_control.class.php');
//require('../php/codigo_control.class.php');		
		$objProducto = new Producto1();
		//$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$respo=$_POST['respo']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$fechavv= date("Y-m-d", strtotime($fechav) );
		$nitv=$_POST['nitv']; // recoge datos de ajax JSON

$nnota = $objProducto->getcodnu();
		foreach($nnota as $nro):
			$nroing= $nro['nordenrec']+1;
		endforeach;

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
					$codigoo = $datos['codigo'];
					$foto = $datos['foto'];
					$observ1 = $datos['observ'];
					$umed = $datos['umed'];

					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
			$objProducto->Guardar21($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$codigoo,$idusu,$codsucse);
			$objProducto->ActualizarArt($idservicio, $cantidad);

				endforeach;


				
$objProducto->Actualizarcodnu($nroing);
				
$objProducto->guardarTot21($fechavv,$nroing,$idusu,$ttotal,$respo,$itm); /// fpg = IN,DEV,BJ

				
	
				
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
		
				
	case 33:
		//$objProducto = new Producto1();
		//$encargado=$_POST['encargado']; // recoge datos de ajax JSON
		$json = array();
		$json['msj'] = 'Nota Eliminada correctamente';
		$json['success'] = true;
				
				$_SESSION['detalle'] = array();
				$json['success'] = true;
				echo json_encode($json);
	
		break;
		
	case 4:
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

	case 5:
//require('../php/codigo_control.class.php');
		$objProducto = new Producto1();
		//$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$respo=$_POST['respo']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$fechavv= date("Y-m-d", strtotime($fechav) );
		$nsuc=$_POST['nsuc']; // recoge datos de ajax JSON

$nnota = $objProducto->getcodnu();
		foreach($nnota as $nro):
			$nroing= $nro['nordenrec']+1;
		endforeach;



		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;
		if (count($_SESSION['detalle'])>0) {
			try {
			//	$objProducto->guardarTotMovim($nnota,$idusu,$nomcli);
			//	$registro_ultima_venta = $objProducto->getUltimoMov();
			//	$result_ultima_venta = $registro_ultima_venta->fetchObject();
			//	$idmov = $result_ultima_venta->ultimo;
			
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codg = $datos['codigo'];
					$foto = $datos['foto'];
					$observ1 = $datos['observ'];
					$umed = $datos['umed'];

					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
			$objProducto->GuardarMvDetS($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$nsuc,$codg,$idusu,$codsucse);
			$objProducto->ActualizarArtS($idservicio, $cantidad);
			$objProducto->GuardarTraDet($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$nsuc,$codg,$idusu);




//			$objProducto->Verificar($idservicio,$nsuc,$codg);
//				if ($totalreg>0){
//					//$x='si';
//					$objProducto->ActualizarSuc($idservicio, $cantidad,$nsuc,$codg);
//					
//					}else{
//					//$x='no';
//					
//							$resultado_producto = $objProducto->getById($idservicio);
//							$dservicio = $resultado_producto->fetchObject();
//							$descripcion = $dservicio->descripar;
//							$codcla = $dservicio->codcla;
//							$codpv = $dservicio->codpv;
//							$dctoar = $dservicio->dctoar;
//							$pneto = $dservicio->pnetoar;
//							$pvpx = $dservicio->pvpar;
//							$stock= $dservicio->stockmin;
//							$saldo = $dservicio->saldo;
//							$umed = $dservicio->umed;
//							$codigox= $dservicio->codigo;
//							$subcodigox = $dservicio->subcodigo;
//							$fotox = $dservicio->fotoar;
//							$qrfotox = $dservicio->qrfotoar;
//							$observx = $dservicio->observart;
//							$coddep = $dservicio->coddep;
//
//$objProducto->DuplicaArt($descripcion, $cantidad, $nsuc,$codg,$codcla,$codpv,$observx,$umed,$dctoar,$fotox,$qrfotox,$coddep,$pneto,$pvpx,$stock);
//
//					}

				endforeach;

$objProducto->Actualizarcodnu($nroing);

$objProducto->guardarTotMvS($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$nsuc); /// fpg = IN,DEV,BJ
	
$objProducto->guardarTraTot($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$nsuc); /// fpg = IN,DEV,BJ
	
	
				
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
		
		
	case 6:
//require('../php/codigo_control.class.php');
		$objProducto = new Producto1();
		//$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$respo=$_POST['respo']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$fechavv= date("Y-m-d", strtotime($fechav) );
		$fpg=$_POST['fpg']; // recoge datos de ajax JSON
		$codclix=$_POST['codclix']; // recoge datos de ajax JSON

$nnota = $objProducto->getcodnu();
		foreach($nnota as $nro):
			$nroing= $nro['nordenrec']+1;
		endforeach;



		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;
		if (count($_SESSION['detalle'])>0) {
			try {
			//	$objProducto->guardarTotMovim($nnota,$idusu,$nomcli);
			//	$registro_ultima_venta = $objProducto->getUltimoMov();
			//	$result_ultima_venta = $registro_ultima_venta->fetchObject();
			//	$idmov = $result_ultima_venta->ultimo;
			
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codigoo = $datos['codigo'];
					$foto = $datos['foto'];
					$observ1 = $datos['observ'];
					$umed = $datos['umed'];
				$codsucx = $datos['codsucx'];
				$codclax = $datos['codclax'];
				$codpvx = $datos['codpvx'];

					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
			$objProducto->GuardarMvDetVenta($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$fpg,$codigoo,$idusu,$codsucx,$codclax,$codpvx);
			$objProducto->ActualizarArtVenta($idservicio, $cantidad);

				endforeach;

$objProducto->Actualizarcodnu($nroing);
$objProducto->guardarTotMvVenta($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$fpg,$codsucx,$codclix); /// fpg = IN,DEV,BJ
	
if ($fpg=='CR'){
	/// crear un registro de credito
	$objProducto->RegistrarCredito($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$fpg,$codsucx,$codclix,$nroing);	
	}	
	
				
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
		

	case 7:
//require('../php/codigo_control.class.php');
		$objProducto = new Producto1();
		//$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$respo=$_POST['respo']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$fechavv= date("Y-m-d", strtotime($fechav) );
		$nsuc=$_POST['nsuc']; // recoge datos de ajax JSON

$nnota = $objProducto->getcodnu();
		foreach($nnota as $nro):
			$nroing= $nro['nordenrec']+1;
		endforeach;



		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;
		if (count($_SESSION['detalle'])>0) {
			try {
			//	$objProducto->guardarTotMovim($nnota,$idusu,$nomcli);
			//	$registro_ultima_venta = $objProducto->getUltimoMov();
			//	$result_ultima_venta = $registro_ultima_venta->fetchObject();
			//	$idmov = $result_ultima_venta->ultimo;
			
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codg = $datos['codigo'];
					$foto = $datos['foto'];
					$observ1 = $datos['observ'];
					$umed = $datos['umed'];

					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
			$objProducto->GuardarMvDetS2($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$nsuc,$codg,$idusu);
			$objProducto->ActualizarArtS2($idservicio, $cantidad);
			$objProducto->GuardarTraDet2($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$nsuc,$codg,$idusu);

				endforeach;

$objProducto->Actualizarcodnu($nroing);

$objProducto->guardarTotMvS2($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$nsuc); /// fpg = IN,DEV,BJ
	
$objProducto->guardarTraTot2($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$nsuc); /// fpg = IN,DEV,BJ
	
	
				
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
		
	case 8:
//require('../php/codigo_control.class.php');
		$objProducto = new Producto1();
		//$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$respo=$_POST['respo']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$fechavv= date("Y-m-d", strtotime($fechav) );
		$fpg=$_POST['fpg']; // recoge datos de ajax JSON
		$codclix=$_POST['codclix']; // recoge datos de ajax JSON

$nnota = $objProducto->getcodnuped();
		foreach($nnota as $nro):
			$nroing= $nro['nordenped']+1;
		endforeach;



		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;
		if (count($_SESSION['detalle'])>0) {
			try {
			//	$objProducto->guardarTotMovim($nnota,$idusu,$nomcli);
			//	$registro_ultima_venta = $objProducto->getUltimoMov();
			//	$result_ultima_venta = $registro_ultima_venta->fetchObject();
			//	$idmov = $result_ultima_venta->ultimo;
			
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codigoo = $datos['codigo'];
					$foto = $datos['foto'];
					$observ1 = $datos['observ'];
					$umed = $datos['umed'];
				$codsucx = $datos['codsucx'];
				$codclax = $datos['codclax'];
				$codpvx = $datos['codpvx'];

					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
			$objProducto->GuardarMvDetPed($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$fpg,$codigoo,$idusu,$codsucx,$codclax,$codpvx);
			//$objProducto->ActualizarArtVenta($idservicio, $cantidad);

				endforeach;

$objProducto->ActualizarcodnuPed($nroing);
$objProducto->guardarTotMvPed($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$fpg,$codsucx,$codclix); /// fpg = IN,DEV,BJ
	
//if ($fpg=='CR'){
//	/// crear un registro de credito
//	$objProducto->RegistrarCredito($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$fpg,$codsucx,$codclix,$nroing);	
//	}	
	
				
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
		

	case 9:
//require('../php/codigo_control.class.php');
		$objProducto = new Producto1();
		//$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$respo=$_POST['respo']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$fechavv= date("Y-m-d", strtotime($fechav) );
		$cven=$_POST['cven']; // recoge datos de ajax JSON

$nnota = $objProducto->getcodnu();
		foreach($nnota as $nro):
			$nroing= $nro['nordenrec']+1;
		endforeach;



		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;
		if (count($_SESSION['detalle'])>0) {
			try {
			//	$objProducto->guardarTotMovim($nnota,$idusu,$nomcli);
			//	$registro_ultima_venta = $objProducto->getUltimoMov();
			//	$result_ultima_venta = $registro_ultima_venta->fetchObject();
			//	$idmov = $result_ultima_venta->ultimo;
			
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codg = $datos['codigo'];
					$foto = $datos['foto'];
					$observ1 = $datos['observ'];
					$umed = $datos['umed'];

					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
//			$objProducto->GuardarMvDetVen($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$nsuc,$codg,$idusu,$codsucse);
			$objProducto->GuardarMvDetVen($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$codg,$idusu,$cven);

			$objProducto->ActualizarArtS($idservicio, $cantidad);
			$objProducto->GuardarVendeDet($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$codg,$idusu,$cven);


				endforeach;

$objProducto->Actualizarcodnu($nroing);

$objProducto->guardarTotVende($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$cven); /// fpg = IN,DEV,BJ
	
$objProducto->guardarVendeTot($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$cven); /// fpg = IN,DEV,BJ
	
	
				
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


	case 10:
//require('../php/codigo_control.class.php');
		$objProducto = new Producto1();
		//$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$respo=$_POST['respo']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$fechavv= date("Y-m-d", strtotime($fechav) );
		$fpg=$_POST['fpg']; // recoge datos de ajax JSON
		$codclix=$_POST['codclix']; // recoge datos de ajax JSON

$nnota = $objProducto->getcodnu();
		foreach($nnota as $nro):
			$nroing= $nro['nordenrec']+1;
		endforeach;



		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;
		if (count($_SESSION['detalle'])>0) {
			try {
			//	$objProducto->guardarTotMovim($nnota,$idusu,$nomcli);
			//	$registro_ultima_venta = $objProducto->getUltimoMov();
			//	$result_ultima_venta = $registro_ultima_venta->fetchObject();
			//	$idmov = $result_ultima_venta->ultimo;
			
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codigoo = $datos['codigo'];
					$foto = $datos['foto'];
					$observ1 = $datos['observ'];
					$umed = $datos['umed'];
				$codsucx = $datos['codsucx'];
				$codclax = $datos['codclax'];
				$codpvx = $datos['codpvx'];

					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
			$objProducto->GuardarMvDetVenta10($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$fpg,$codigoo,$idusu,$codsucx,$codclax,$codpvx,$idperx);
			$objProducto->ActualizarArtVenta($idservicio, $cantidad);

				endforeach;

$objProducto->Actualizarcodnu($nroing);
$objProducto->guardarTotMvVenta10($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$fpg,$codsucx,$codclix,$idperx); /// fpg = IN,DEV,BJ
	
if ($fpg=='CR'){
	/// crear un registro de credito
	$objProducto->RegistrarCredito($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$fpg,$codsucx,$codclix,$nroing,$idperx);	
	}	
	
				
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