<?php
if (!isset($_SESSION)) {session_start();}
date_default_timezone_set('America/La_Paz'); 
require_once '../Config/conexion.php';
require_once '../Model/Producto1.php';

//$codmovv=$_SESSION['codmov'];
//$codh=$_SESSION['codh'];
//$nturno=$_SESSION['nturno'];
$idusu=$_SESSION['id_usu'];

if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=0;
}


switch($page){

	case 1: //ventas2017
		$objProducto = new Producto1();
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;
		if (isset($_POST['producto_id']) && $_POST['producto_id']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='') {
			try {
				$cantidad = $_POST['cantidad'];
				$producto_id = $_POST['producto_id'];
				$pventa = $_POST['pventa'];
				//$sel=$_POST['sel'];

				
				
				$resultado_producto = $objProducto->getByIdActivo($producto_id);
				$dservicio = $resultado_producto->fetchObject();
				$descripcion = $dservicio->descriparti;
				$precio = $dservicio->precioarti;
				$existencia = $dservicio->canact;
				$umed = $dservicio->umed;
				$codigo= $dservicio->codarti;
				
				$subtotal = $cantidad * $pventa;
				
	$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'descripcion'=>$descripcion, 'umed'=>$umed,'cantidad'=>$cantidad,
	 'precio'=>$pventa, 'subtotal'=>$subtotal,'saldo'=>$existencia,'codigo'=>$codigo);

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
	case 111: //ventas2017
//data: {'codar':codar, 'descrip':descrip, 'cod':cod, 'ume':ume, 'pn':pn, 'pv':pv, 'stm':stm, 'observ':observ, 'cla':cla, 'coprov':coprov},
	
	
		$objProducto = new Producto1();
		$json = array();
		$json['msj'] = 'Item Agregado';
		$json['success'] = true;
		if (isset($_POST['descrip']) && $_POST['descrip']!='' && isset($_POST['cod']) && $_POST['cod']!='') {
			try {

				$codar = $_POST['codar'];
				$descrip = $_POST['descrip'];
				$cod = $_POST['cod'];
				$ume = $_POST['ume'];
				$pn = $_POST['pn'];
				$pv = $_POST['pv'];
				$stm = $_POST['stm'];
				$observ = $_POST['observ'];
				$cla = $_POST['cla'];
				$codprov= $_POST['coprov'];
				$cant= $_POST['cant'];
				$coddepx= $_POST['coddepx'];
				
$_SESSION['detalle'][$cod] = array('id'=>$codar,'descrip'=>$descrip,'cod'=>$cod, 'ume'=>$ume,'pn'=>$pn,
 'pv'=>$pv,'stm'=>$stm,'observ'=>$observ,'cla'=>$cla,'codprov'=>$codprov,'cant'=>$cant,'coddepx'=>$coddepx);


				$json['success'] = true;

				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'Datos Incorrectos...!';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;

	case 222: //ventas2017
		$objProducto = new Producto1();

		$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$nomcli=$_POST['nomcli']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$coddepx=$_POST['coddepx']; // recoge datos de ajax JSON
		$facx=$_POST['fac']; // recoge datos de ajax JSON

		$fechavv= date("Y-m-d", strtotime($fechav) );


		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;
		if (count($_SESSION['detalle'])>0) {
			try {

//$_SESSION['detalle'][$codar] = array('id'=>$codar,'descrip'=>$descrip,'cod'=>$cod, 'ume'=>$ume,'pn'=>$pn,
// 'pv'=>$pv,'stm'=>$stm,'observ'=>$observ,'cla'=>$cla,'codprov'=>$codprov);
 				
				foreach($_SESSION['detalle'] as $datos):
					$idar = $datos['id'];
					$descrip= $datos['descrip'];
					$cod = $datos['cod'];
					$umed = $datos['ume'];
					$pn = $datos['pn'];
					$pv = $datos['pv'];
					$stm = $datos['stm'];
					$observ = $datos['observ'];
					$cla = $datos['cla'];
					$codprov = $datos['codprov'];
					$cant = $datos['cant'];
					//$coddepx = $datos['coddepx'];
					
					$subt=$cant*$pn;
					$ttotal=$ttotal+$subt;
					$itm=$itm+1;
			if ($idar==0){ // no existe el codigo debo crearlo y sacar y id codar
				$objProducto->CrearArticulo($cod,$descrip,$umed,$pn,$pv,$cla,$codprov,$fechavv,$stm,$observ,$coddepx);
					$registro_ultima_venta = $objProducto->getUltimoMov();
					$result_ultima_venta = $registro_ultima_venta->fetchObject();
					$idar = $result_ultima_venta->ultimo;
				}
			
			$objProducto->GuardarDet($idar,$cod,$descrip,$umed,$cant,$pn,$subt,$cla,$codprov,$nnota,$fechavv,$coddepx,$facx);
			
			
			$objProducto->ActualizarArticulo($idar, $cant);

				endforeach;

$objProducto->Actualizarcodnu($nnota);
$objProducto->GuardarTot($idusu,$fechavv,$ttotal,$nomcli,$itm,$nnota,$coddepx);
				
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

	case 333: //ventas2017
//data: {'codar':codar, 'descrip':descrip, 'cod':cod, 'ume':ume, 'pn':pn, 'pv':pv, 'stm':stm, 'observ':observ, 'cla':cla, 'coprov':coprov},
	
	
		$objProducto = new Producto1();
		$json = array();
		$json['msj'] = 'Item Agregado';
		$json['success'] = true;
		if (isset($_POST['descrip']) && $_POST['descrip']!='' && isset($_POST['cod']) && $_POST['cod']!='') {
			try {

				$codar = $_POST['codar'];
				$descrip = $_POST['descrip'];
				$cod = $_POST['cod'];
				$ume = $_POST['ume'];
				$pn = $_POST['pn'];
				$pv = $_POST['pv'];
				$stm = $_POST['stm'];
				$observ = $_POST['observ'];
				$cla = $_POST['cla'];
				$codprov= $_POST['coprov'];
				$cant= $_POST['cant'];
				$coddepx= $_POST['coddepx'];
				//$idperr= $_POST['idperr'];
				
$_SESSION['detalle'][$cod] = array('id'=>$codar,'descrip'=>$descrip,'cod'=>$cod, 'ume'=>$ume,'pn'=>$pn,
 'pv'=>$pv,'stm'=>$stm,'observ'=>$observ,'cla'=>$cla,'codprov'=>$codprov,'cant'=>$cant,'coddepx'=>$coddepx);


				$json['success'] = true;

				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'Datos Incorrectos...!';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;


	case 444: //ventas2017
		$objProducto = new Producto1();

		$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$nomcli=$_POST['nomcli']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$iidper=$_POST['iidper']; // recoge datos de ajax JSON

		$fechavv= date("Y-m-d", strtotime($fechav) );


		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;
		if (count($_SESSION['detalle'])>0) {
			try {

//$_SESSION['detalle'][$codar] = array('id'=>$codar,'descrip'=>$descrip,'cod'=>$cod, 'ume'=>$ume,'pn'=>$pn,
// 'pv'=>$pv,'stm'=>$stm,'observ'=>$observ,'cla'=>$cla,'codprov'=>$codprov);
 				
				foreach($_SESSION['detalle'] as $datos):
					$idar = $datos['id'];
					$descrip= $datos['descrip'];
					$cod = $datos['cod'];
					$umed = $datos['ume'];
					$pn = $datos['pn'];
					$pv = $datos['pv'];
					$stm = $datos['stm'];
					$observ = $datos['observ'];
					$cla = $datos['cla'];
					$codprov = $datos['codprov'];
					$cant = $datos['cant'];
					$coddepx = $datos['coddepx'];
					
					$subt=$cant*$pn;
					$ttotal=$ttotal+$subt;
					$itm=$itm+1;
//			if ($idar==0){ // no existe el codigo debo crearlo y sacar y id codar
//				$objProducto->CrearArticulo($cod,$descrip,$umed,$pn,$pv,$cla,$codprov,$fechavv,$stm,$observ,$coddepx);
//					$registro_ultima_venta = $objProducto->getUltimoMov();
//					$result_ultima_venta = $registro_ultima_venta->fetchObject();
//					$idar = $result_ultima_venta->ultimo;
//				}
			
			$objProducto->GuardarDetpp($idar,$cod,$descrip,$umed,$cant,$pn,$subt,$cla,$codprov,$nnota,$fechavv,$coddepx);
			//$objProducto->GuardarMatPer($idar,$cant,$nnota,$fechavv,$coddepx,$iidper,$idusu);

									$contador=0;
						$contaper= $objProducto->getcontadorper($coddepx,$iidper,$idar); //ACTIVOS
						foreach($contaper as $nnu):
							//$codaee=$nnu['codar'];//$nombre_u= $nnu['nomb_usu'];
							$contador=$contador+1;
						endforeach;
						if ($contador>0){$objProducto->ActualizaMatPer($idar,$cant,$coddepx,$iidper);}else{
							$objProducto->AgregaMatPer($idar,$cant,$nnota,$fechavv,$coddepx,$iidper,$idusu);
							}
						
			$objProducto->ActualizarArticulopp($idar, $cant);

				endforeach;

$objProducto->Actualizarcodnu($nnota);
$objProducto->GuardarTotpp($idusu,$fechavv,$ttotal,$nomcli,$itm,$nnota,$iidper,$coddepx);
				
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

	case 555: //ventas2017
		$objProducto = new Producto1();

		$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$nomcli=$_POST['nomcli']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$iidper=$_POST['iidper']; // recoge datos de ajax JSON

		$fechavv= date("Y-m-d", strtotime($fechav) );


		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;
		if (count($_SESSION['detalle'])>0) {
			try {

//$_SESSION['detalle'][$codar] = array('id'=>$codar,'descrip'=>$descrip,'cod'=>$cod, 'ume'=>$ume,'pn'=>$pn,
// 'pv'=>$pv,'stm'=>$stm,'observ'=>$observ,'cla'=>$cla,'codprov'=>$codprov);
 				
				foreach($_SESSION['detalle'] as $datos):
					$idar = $datos['id'];
					$descrip= $datos['descrip'];
					$cod = $datos['cod'];
					$umed = $datos['ume'];
					$pn = $datos['pn'];
					$pv = $datos['pv'];
					$stm = $datos['stm'];
					$observ = $datos['observ'];
					$cla = $datos['cla'];
					$codprov = $datos['codprov'];
					$cant = $datos['cant'];
					$coddepx = $datos['coddepx'];
					
					$subt=$cant*$pn;
					$ttotal=$ttotal+$subt;
					$itm=$itm+1;
			
			$objProducto->GuardarDetppDv($idar,$cod,$descrip,$umed,$cant,$pn,$subt,$cla,$codprov,$nnota,$fechavv,$coddepx);
			$objProducto->ActualizaMatPerDv($idar,$cant,$coddepx,$iidper); //RESTANDO MATERIALPER
			
			$objProducto->ActualizarArticuloppDv($idar, $cant); // AUMENTA ACTIVOS 
				endforeach;

$objProducto->Actualizarcodnu($nnota);
$objProducto->GuardarTotppDvv($idusu,$fechavv,$ttotal,$nomcli,$itm,$nnota,$iidper,$coddepx);
				
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

	case 666: //ventas2017
		$objProducto = new Producto1();
$date22 = time(); // formato unix 
$fefor= date("d-m-Y(H:i:s)", $date22); //formateando el UNIX
$hora=substr($fefor,11,8);

		$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$nomcli=$_POST['nomcli']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$iidper=$_POST['iidper']; // recoge datos de ajax JSON

		$fechavv= date("Y-m-d", strtotime($fechav) );


		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;
		if (count($_SESSION['detalle'])>0) {
			try {

//$_SESSION['detalle'][$codar] = array('id'=>$codar,'descrip'=>$descrip,'cod'=>$cod, 'ume'=>$ume,'pn'=>$pn,
// 'pv'=>$pv,'stm'=>$stm,'observ'=>$observ,'cla'=>$cla,'codprov'=>$codprov);
 				
				foreach($_SESSION['detalle'] as $datos):
					$idar = $datos['id'];
					$descrip= $datos['descrip'];
					$cod = $datos['cod'];
					$umed = $datos['ume'];
					$pn = $datos['pn'];
					$pv = $datos['pv'];
					$stm = $datos['stm'];
					$observ = $datos['observ'];
					$cla = $datos['cla'];
					$codprov = $datos['codprov'];
					$cant = $datos['cant'];
					$coddepx = $datos['coddepx'];
					
					$subt=$cant*$pn;
					$ttotal=$ttotal+$subt;
					$itm=$itm+1;
			
			$objProducto->GuardarOrdenDetC($idar,$cod,$descrip,$umed,$cant,$pn,$subt,$cla,$codprov,$nnota,$fechavv,$coddepx);
			//$objProducto->ActualizaMatPerDv($idar,$cant,$coddepx,$iidper); //RESTANDO MATERIALPER
			
			//$objProducto->ActualizarArticuloppDv($idar, $cant); // AUMENTA ACTIVOS 
				endforeach;

$objProducto->ActualizarcodnuOrden($nnota);
$objProducto->GuardarOrdenTotC($idusu,$fechavv,$ttotal,$nomcli,$itm,$nnota,$iidper,$coddepx);
$obvv='Nota:'.$nnota.' a nombre: '.$nomcli.' Tablas : ordendet, ordentot,codnu';
$objProducto->GuardarAuditor($idusu,$fechavv,$hora,$obvv,$coddepx);
				
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
		
		
	case 777: //ventas2017
		$objProducto = new Producto1();

		$nnota=$_POST['nnotaxx']; // recoge datos de ajax JSON este es nro TICKET
//		$idusu=$_POST['idusu'];												
//		$nomcli=$_POST['nomcli']; // recoge datos de ajax JSON
//		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
//		$iidper=$_POST['iidper']; // recoge datos de ajax JSON
//
//		$fechavv= date("Y-m-d", strtotime($fechav) );

		$hoy=date('Y-m-d');
$date22 = time(); // formato unix 
$fefor= date("d-m-Y(H:i:s)", $date22); //formateando el UNIX
$hora=substr($fefor,11,8);





		$json = array();
		$json['msj'] = 'Orden Compras Guardado';
		$json['success'] = true;
		$ttotal=0.00;
		$itm=0;
						$contador=0;
						$contaor= $objProducto->getcontadorOrden($nnota); /// la nota de orden de compra diferente orden movimdet
						foreach($contaor as $nnu):
							//$codaee=$nnu['codar'];//$nombre_u= $nnu['nomb_usu'];
							$contador=$contador+1;
						endforeach;

		
		
		
		if ($contador>0) {
			try {
				$NuevaOrden= $objProducto->getNueva(); //ACTIVOS
				foreach($NuevaOrden as $norr):
					$ordmv=$norr['nordenmv']+1;
				endforeach;
				
				
				
				$RegOrden= $objProducto->getcontadorOrden($nnota); //ACTIVOS
 				
				foreach($RegOrden as $datos):
					$idar = $datos['codar'];
					$cod= $datos['codigo'];
					$descrip = $datos['descripdt'];
					$umed = $datos['umed'];
					$cla = $datos['codcla'];
					$codprov = $datos['codpv'];
					$coddepx = $datos['coddep'];
					$cant = $datos['cant'];
					$afavor = $datos['afavor'];
					$idperr=$datos['id_per'];
					$facc=$datos['nfactura'];
					
//					$subt=$cant*$pn;
//					$ttotal=$ttotal+$subt;
					$itm=$itm+1;
			
			
			$objProducto->GuardarOrdenCompraDet($idar,$cod,$descrip,$umed,$cant,$cla,$codprov,$nnota,$coddepx,$ordmv,$hoy,$facc);
			$objProducto->ActualizarArticuloOrden($idar, $cant,$coddepx);

			$objProducto->MarcarOrdenTot($nnota); // marcar para que no salga lista campo CD

				endforeach;

$objProducto->Actualizarcodnu($ordmv);
$objProducto->GuardarOrdenTotal($idusu,$hoy,$itm,$ordmv,$coddepx,$afavor,$nnota,$idperr);

$obvv='Nota:'.$nnota.' a nombre: '.$afavor.' Tablas : ordendet, ordentot,codnu';
$objProducto->GuardarAuditor2($idusu,$hoy,$hora,$obvv,$coddepx);				
				//$_SESSION['detalle'] = array();
				//session_destroy();
						
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'No tiene Registros';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;






	case 15: //ventas2017
		$objProducto = new Producto1();
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;
		if (isset($_POST['producto_id']) && $_POST['producto_id']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='') {
			try {
				$cantidad = $_POST['cantidad'];
				$producto_id = $_POST['producto_id'];
				$pventa = $_POST['pventa'];
				$pventan = $_POST['pventan'];

				$sel=$_POST['sel'];

				$util_unit=$cantidad*($pventa-$pventan);
				
				$resultado_producto = $objProducto->getByIdActivo($producto_id);
				$dservicio = $resultado_producto->fetchObject();
				$descripcion = $dservicio->descripart;
				$precio = $dservicio->pvp;
				$existencia = $dservicio->saldo;
				$umed = $dservicio->umed;
				$codigo= $dservicio->codigo;
				$observ = $dservicio->observart;
				$foto = $dservicio->fotoart;
				$codprov = $dservicio->codprov;
				
				
				$subtotal = $cantidad * $pventa;
				
	$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'descripcion'=>$descripcion, 'umed'=>$umed,'cantidad'=>$cantidad,
	 'precio'=>$pventa, 'subtotal'=>$subtotal,'saldo'=>$existencia,'codigo'=>$codigo,'foto'=>$foto,'observ'=>$observ,'sel'=>$sel,'codprov'=>$codprov,'util'=>$util_unit);

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
		

	case 33: //ventas2017

		$objProducto = new Producto1();
		$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$nomcli=$_POST['nomcli']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$nfac=$_POST['nfac']; // recoge datos de ajax JSON
		$note=$_POST['note']; // recoge datos de ajax JSON
		$dote=$_POST['dote']; // recoge datos de ajax JSON
		$codtec=$_POST['codtec']; // recoge datos de ajax JSON

		$fechavv= date("Y-m-d", strtotime($fechav) );


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

//	$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'descripcion'=>$descripcion, 'umed'=>$umed,'cantidad'=>$cantidad,
//	 'precio'=>$pventa, 'subtotal'=>$subtotal,'saldo'=>$existencia,'codigo'=>$codigo);
				
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codg = $datos['codigo'];
					$umed = $datos['umed'];
					
					
					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
			$objProducto->GuardarMvDet($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nnota,$umed,$fechavv,$codg);
			$objProducto->ActualizarArtMov($idservicio, $cantidad);

				endforeach;

$objProducto->Actualizarcodnu($nnota);
$objProducto->guardarTotMv($fechavv,$nnota,$idusu,$ttotal,$nomcli,$itm,$nfac,$note,$dote,$codtec);
				
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


	case 12:
		$objProducto = new Producto1();
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;
		if (isset($_POST['descripcion']) && $_POST['descripcion']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='') {
			try {
				$cantidad = $_POST['cantidad'];
				$descripcion = $_POST['descripcion'];
				$pventa = $_POST['pventa'];
				$umed = $_POST['umed'];
		
	$_SESSION['detalle'][$descripcion] = array('descripcion'=>$descripcion, 'umed'=>$umed,'cantidad'=>$cantidad);

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
		
	case 13:
		$json = array();
		$json['msj'] = 'Registro Eliminado';
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
		
	case 14:
		$objProducto = new Producto1();
		$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$nomcli=$_POST['nomcli']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$idper=$_POST['idper']; // recoge datos de ajax JSON
		$idarea=$_POST['idarea']; // recoge datos de ajax JSON


		$fechavv= date("Y-m-d", strtotime($fechav) );


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

			//	$_SESSION['detalle'][$descripcion] = array('descripcion'=>$descripcion, 'umed'=>$umed,'cantidad'=>$cantidad);
				foreach($_SESSION['detalle'] as $datos):
				//	$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
				//	$precio = $datos['precio'];
				//	$subtotal = $datos['subtotal'];
				//	$codg = $datos['codigo'];
				//	$foto = $datos['foto'];
				//	$observ1 = $datos['observ'];
					$umed = $datos['umed'];

				//	$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
			$objProducto->GuardarAbaDet($descripcion, $cantidad,$nnota,$umed);
//			$objProducto->ActualizarArtMov($idservicio, $cantidad);

				endforeach;

$objProducto->Actualizarcodnuaba($nnota);

$objProducto->guardarTotAba($fechavv,$nnota,$idusu,$itm,$idper,$idarea,$nomcli);
	
	
	
				
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


	case 34: //ventas2017
		$objProducto = new Producto1();
		$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$nomcli=$_POST['nomcli']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
	//	$codper=$_POST['codper']; // recoge datos de ajax JSON
		$codarea=0; //$_POST['codarea']; // recoge datos de ajax JSON
		$selpg=$_POST['selpg'];												
		$nncli=$_POST['nncli'];												
	
//	data: {'nnota':nnota,'idusu':idusu,'nomcli':nomcli,'fechav':fechav,'selpg':selpg,'nncli':nncli},
	
		$fechavv= date("Y-m-d", strtotime($fechav) );

//				$rr = $objProducto->getPerr($codper);
//				$ddato = $rr->fetchObject();
//				$nomcli2 = $ddato->nombre;
//				$codarea=$ddato->id_areaa;


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
//	$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'descripcion'=>$descripcion, 'umed'=>$umed,'cantidad'=>$cantidad,
//	 'precio'=>$pventa, 'subtotal'=>$subtotal,'saldo'=>$existencia,'codigo'=>$codigo,'foto'=>$foto,'observ'=>$observ,'sel'=>$sel,'codprov'=>$codprov);

				
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
					$sel = $datos['sel'];
					$codprov = $datos['codprov'];
					$util = $datos['util'];

					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;

			$objProducto->GuardarMvDetE($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nnota,$umed,$fechavv,$sel,$codprov,$util);
			$objProducto->ActualizarArtMovE($idservicio, $cantidad);

					
	//		$objProducto->GuardarAsignado($idservicio, $fechav, $cantidad, $codper, $idusu,$codarea,$codest,$codcla,$codprov);
			

				endforeach;

//if($selpg=='CR'){$tctcr='CR';}else{$tctcr='CT';}
$objProducto->ActualizarcodnuE($nnota);
$objProducto->guardarTotMvE($fechavv,$nnota,$idusu,$ttotal,$nncli,$itm,$selpg);

if($selpg=='CR'){$objProducto->crearCredito($fechavv,$nnota,$idusu,$ttotal,$nncli);}

	
	
	
				
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

		
	case 11:
		$objProducto = new Producto1();
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;
		if (isset($_POST['producto_id']) && $_POST['producto_id']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='') {
			try {
				$cantidad = $_POST['cantidad'];
				$producto_id = $_POST['producto_id'];
				$pventa = $_POST['pventa'];

				
				$resultado_producto = $objProducto->getById($producto_id);
				$dservicio = $resultado_producto->fetchObject();
				$descripcion = $dservicio->descripcion;
				$precio = $dservicio->ppvp;
				$precion = $dservicio->pneto;
				$saldo = $dservicio->saldo;
				$codg = $dservicio->codprov;
				$codigo = $dservicio->codigo;
				$foto = $dservicio->foto;
				$gru = $dservicio->grupo;
				
				
				$subtotal = $cantidad * $pventa;
				
	$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'descripcion'=>$descripcion, 'cantidad'=>$cantidad, 'precio'=>$pventa, 'subtotal'=>$subtotal,'saldo'=>$saldo,'codg'=>$codg,'codigo'=>$codigo,'foto'=>$foto,'grupo'=>$gru);

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
	
		$objProducto = new Producto1();
		$observ=$_POST['observ']; // recoge datos de ajax JSON
		$nnota=$_POST['nnota']; // recoge datos de ajax JSON
		$idusu=$_POST['idusu'];												

		//$norden=$_POST['norden']; // recoge datos de ajax JSON

		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		if (count($_SESSION['detalle'])>0) {
			try {
			//	$objProducto->guardarVenta();
			//	$registro_ultima_venta = $objProducto->getUltimaVenta();
			//	$result_ultima_venta = $registro_ultima_venta->fetchObject();
			//	$idventa = $result_ultima_venta->ultimo;
				
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
					$codg = $datos['codg'];
					$codigo = $datos['codigo'];
					$foto = $datos['foto'];
					$grupo = $datos['grupo'];

					$ttotal=$ttotal+$subtotal;
					$objProducto->GuardarCotizacion($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nnota,$codigo,$foto,$codg,$grupo);
					$objProducto->ActualizarArticulo($idservicio, $cantidad);

				endforeach;
				$objProducto->Actualizarcodnu($nnota);

				//$objProducto->guardarTotal($ttotal,$idventa,$encargado,$nnota);
	$objProducto->guardarTotCot($observ,$ttotal,$nnota,$idusu,$grupo);
				
				$_SESSION['detalle'] = array();
						
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
	
		$objProducto = new Producto1();
		//$encargado=$_POST['encargado']; // recoge datos de ajax JSON
		$nnota=$_POST['nnota']; // recoge datos de ajax JSON

		//$norden=$_POST['norden']; // recoge datos de ajax JSON

		$json = array();
		
		$ttotal=0.00;
		if (isset($_POST['nnota'])) {
			try {
				$json['msj'] = 'Imprimiendo';
				$json['success'] = true;

				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'No existe la nota';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;





	case 4:
		//$objProducto = new Producto1();
		//$encargado=$_POST['encargado']; // recoge datos de ajax JSON
		$json = array();
		$json['msj'] = 'Nota Eliminada correctamente';
		$json['success'] = true;
				
				$_SESSION['detalle'] = array();
				$json['success'] = true;
				echo json_encode($json);
	
		break;

	case 5:
		$objProducto = new Producto1();
		$encargado=$_POST['encargado']; // recoge datos de ajax JSON
		$nnota=$_POST['nnota']; // recoge datos de ajax JSON
		$norden=$_POST['norden']; // recoge datos de ajax JSON

		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		if (count($_SESSION['detalle'])>0) {
			try {
			//	$objProducto->guardarVenta();
			//	$registro_ultima_venta = $objProducto->getUltimaVenta();
			//	$result_ultima_venta = $registro_ultima_venta->fetchObject();
			//	$idventa = $result_ultima_venta->ultimo;
				
				foreach($_SESSION['detalle'] as $detalle):
					$idservicio = $detalle['id'];
					$umed = $detalle['umed'];
					$mr= $detalle['mr'];
					$cantidad = $detalle['cantidad'];
					$tpago= $detalle['tipop'];
					$precio = $detalle['precio'];
					$subtotal = $detalle['subtotal'];
					$detalle = $detalle['producto'];
					$observ= $detalle['observ'];
					

					$ttotal=$ttotal+$subtotal;
$objProducto->GuardarMovservi($idservicio, $detalle, $cantidad, $precio, $subtotal, $codmovv, $codh, $encargado, $nnota, $nturno, $umed,$tpago,$idusu,$norden);
$objProducto->GuardarCtaTotal($idservicio, $detalle, $cantidad, $precio, $subtotal, $codmovv, $codh, $encargado, $nnota, $nturno, $umed,$tpago,$mr,$norden,$idusu);

				//	$objProducto->GuardarMovservi1($idservico);
					
				//	$objProducto->guardarDetalleVenta($idventa, $idproducto, $cantidad, $precio, $subtotal,$precio_dist,$id_prov);
				//	$objProducto->incrementa_saldo($cantidad,$idproducto);
				endforeach;
				$objProducto->Actualizarcodnu($norden);

				//$objProducto->guardarTotal($ttotal,$idventa,$encargado,$nnota);
				
				$_SESSION['detalle'] = array();
						
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