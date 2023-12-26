<?php
if (!isset($_SESSION)) {session_start();}

require_once '../Config/conexion.php';
require_once '../Model/Producto1.php';

//$codmovv=$_SESSION['codmov'];
//$codh=$_SESSION['codh'];
//$nturno=$_SESSION['nturno'];
//$idusu=$_SESSION['id_usu'];

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
		if (isset($_POST['producto_id']) && $_POST['producto_id']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='') {
			try {
				//if($_POST['tipop']=='CR'){$mr='2';}
				$cantidad = $_POST['cantidad'];
				$producto_id = $_POST['producto_id'];
				$pventa = $_POST['pventa'];
				$tvv=$_POST['tvv'];
				//$dcto = $_POST['dcto'];  // viene si / no
				//$fac = $_POST['fac']; // viene si / no
					
				
				
				$resultado_producto = $objProducto->getByIdActivo($producto_id);
				$dservicio = $resultado_producto->fetchObject();
				$descripcion = $dservicio->descripcion;
				$precio = $dservicio->pvp;
				$existencia = $dservicio->existencia;
				$umed = $dservicio->umed;
				$codigo= $dservicio->codigo;
				$observ = $dservicio->observ;
				$foto = $dservicio->foto;
				
				
				$subtotal = $cantidad * $pventa;
				
	$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'descripcion'=>$descripcion, 'umed'=>$umed,
	'cantidad'=>$cantidad, 'precio'=>$pventa, 'subtotal'=>$subtotal,'saldo'=>$existencia,'codigo'=>$codigo,
	'foto'=>$foto,'observ'=>$observ,'tvv'=>$tvv);

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


	case 88:
		$objProducto = new Producto1();
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;
		if (isset($_POST['producto_id']) && $_POST['producto_id']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='') {
			try {
				//if($_POST['tipop']=='CR'){$mr='2';}
				$cantidad = $_POST['cantidad'];
				$producto_id = $_POST['producto_id'];
				$pventa = $_POST['pventa'];
				//$tvv=$_POST['tvv'];
				//$dcto = $_POST['dcto'];  // viene si / no
				//$fac = $_POST['fac']; // viene si / no
					
				
				
				$resultado_producto = $objProducto->getByIdActivo($producto_id);
				$dservicio = $resultado_producto->fetchObject();
				$descripcion = $dservicio->descripcion;
				$precio = $dservicio->pvp;
				$existencia = $dservicio->existencia;
				$umed = $dservicio->umed;
				$codigo= $dservicio->codigo;
				$observ = $dservicio->observ;
				$foto = $dservicio->foto;
				
				
				$subtotal = $cantidad * $pventa;
				
	$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'descripcion'=>$descripcion, 'umed'=>$umed,
	'cantidad'=>$cantidad, 'precio'=>$pventa, 'subtotal'=>$subtotal,'saldo'=>$existencia,'codigo'=>$codigo,
	'foto'=>$foto,'observ'=>$observ);

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


	case 33:
//require('../php/codigo_control.class.php');
//data: {'nnota':nnota,'idusu':idusu,'nomcli':nomcli,'fechav':fechav}
		$objProducto = new Producto1();
		$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$nomcli=$_POST['nomcli']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
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
			$objProducto->GuardarMvDet($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nnota,$umed,$fechavv);
			$objProducto->ActualizarArtMov($idservicio, $cantidad);

				endforeach;

$objProducto->Actualizarcodnu($nnota);


$objProducto->guardarTotMv($fechavv,$nnota,$idusu,$ttotal,$nomcli,$itm);
	
	
	
				
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


	case 34:
//require('../php/codigo_control.class.php');
//data: {'nnota':nnota,'idusu':idusu,'nomcli':nomcli,'fechav':fechav}
		$objProducto = new Producto1();
		$nnota=$_POST['nnota']; // recoge datos de ajax JSON este es nro TICKET
		$idusu=$_POST['idusu'];												
		$nomcli=$_POST['nomcli']; // recoge datos de ajax JSON
		$fechav=$_POST['fechav']; // recoge datos de ajax JSON
		$iddcli=$_POST['idcli']; // recoge datos de ajax JSON

		 // recoge datos de ajax JSON
	//	$codarea=$_POST['codarea']; // recoge datos de ajax JSON
		
		
		$fechavv= date("Y-m-d", strtotime($fechav) );


		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$tocr=0.00;
		$toct=0.00;
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
					$tvv = $datos['tvv'];

					$ttotal=$ttotal+$subtotal;
					$itm=$itm+1;
					if($tvv=='CT'){$toct=$toct+$subtotal;}else{$tocr=$tocr+$subtotal;}

			$objProducto->GuardarMvDetE($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nnota,$umed,$fechavv,$tvv);
			$objProducto->ActualizarArtMovE($idservicio, $cantidad);
				endforeach;

$objProducto->ActualizarcodnuE($nnota);
$objProducto->guardarTotMvE($fechavv,$nnota,$idusu,$ttotal,$nomcli,$itm);
if ($toct>0){
$objProducto->guardarTgym($iddcli,$idusu,$nomcli,$fechav,$nnota,$toct);
}
if ($tocr>0){
$objProducto->guardarCredito($iddcli,$idusu,$fechav,$nnota,$tocr);
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