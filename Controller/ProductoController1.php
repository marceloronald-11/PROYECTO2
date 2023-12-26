<?php
//session_start();
if (!isset($_SESSION)) {session_start();}
if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=0;
}

require_once '../Config/conexion.php';
require_once '../Model/Producto1.php';

switch($page){

	case 1:
		$objProducto = new Producto1();
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;
	
		if (isset($_POST['producto_id']) && $_POST['producto_id']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='') {
			try {
				$cantidad = $_POST['cantidad'];
				$producto_id = $_POST['producto_id'];
				
				$resultado_producto = $objProducto->getById($producto_id);
				$producto = $resultado_producto->fetchObject();
				$descripcion = $producto->nomb_prod;
				$precio = $producto->precio_unit;
				$id_prov = $producto->id_prov;
				$precio_dist = $producto->precio_dist;
				
				
				$subtotal = $cantidad * $precio;
				
				$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'producto'=>$descripcion, 'cantidad'=>$cantidad, 'precio'=>$precio, 'subtotal'=>$subtotal,'precio_dist'=>$precio_dist,'id_prov'=>$id_prov);

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
		
	case 10: // USANDO PARA TRANSFERENCIA 2017 *******************TOTAL**********************************
		$objProducto = new Producto1();
		$nordentr=$_POST['norden']; // recoge datos de ajax JSON
//		$cant=$_POST['canti']; // recoge datos de ajax JSON
//		$codtttx=$_POST['codtttx']; // recoge datos de ajax JSON

		//$norden=$_POST['norden']; // recoge datos de ajax JSON

		$json = array();
		$json['msj'] = 'Guardado Correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$clasem="Transf";
		if (isset($_POST['norden']) && $_POST['norden']!='') {
			try {
				$NuevaOrden= $objProducto->getNueva();
				foreach($NuevaOrden as $nor):
					$nnregg= $nor['nordenmv']+1;
				endforeach;
				
				
				$codanorden= $objProducto->getTraa($nordentr); ///TRANSFERDETALLE
				foreach($codanorden as $budat):
						$bucoda= $budat['codar'];
						$bucant= $budat['cant'];
						$bucodigo= $budat['codigo'];
						$nordenn= $budat['norden'];
						$codigoo= $budat['codigo']; /// codigo unico del articulo
						$coddepp= $budat['coddep']; /// este es el codigo depto que recibira los articulos arch TRANSFERDETALLE
						$decoddepp= $budat['decoddep']; /// este es el codigo depto que envio arch TRANSFERDETALLE				
					
				$resultado_producto = $objProducto->getById($bucoda);
				$dservicio = $resultado_producto->fetchObject();
				$descripcion = $dservicio->descripcion;
				$codigo = $dservicio->codigo;
				$precio = $dservicio->pvp;
				$precion = $dservicio->pneto;
				$saldo = $dservicio->existencia;
				$foto = $dservicio->foto;
				$codcla = $dservicio->codcla;
				$codpv = $dservicio->codpv;
				$observ = $dservicio->observart;
				$umed = $dservicio->umed;
				$codde = $dservicio->coddep;
				
				
						$contador=0;
						$contar_coda= $objProducto->getcontador($codigoo,$decoddepp); //ACTIVOS
						foreach($contar_coda as $nnu):
							$codaee=$nnu['codar'];//$nombre_u= $nnu['nomb_usu'];
							$contador=$contador+1;
						endforeach;

				$sw=0;
		if ($contador>0){ // no encontro registro identico entonces hara creara nuevo con INSERT sino UPDATE cant
			$bucoda=$codaee;
			$objProducto->ActuuTransfe($decoddepp,$bucant,$bucoda,$bucodigo); // actualizando ACTIVOS saldo
		}else{
			$objProducto->InsertarTransfe($descripcion,$decoddepp,$codigo,$precio,$precion,$umed,$codcla,$codpv,$foto,$observ,$bucant);
			// insertando a aarticulo
			
						$registro_ultima_venta = $objProducto->getUltimaVenta();
						$result_ultima_venta = $registro_ultima_venta->fetchObject();
						$idid = $result_ultima_venta->ultimo;
					$sw=1;
			
		}

	if ($sw==1){$bucoda=$idid;} //$iddd;}else{} // sw=1 cuando se genera nuevo item para almacen colocar el nuevo item

//	$objProducto->GuardarAlmacenTr($bucoda, $descripcion, $bucant, $precio,$nordentr,$codigoo,$foto,$decoddep,$clasem,$codcla,$codpv,$umed);
	$objProducto->GuardarAlmacenTrrr($bucoda, $descripcion, $bucant, $precio,$nnregg,$codigoo,$foto,$decoddepp,$clasem,$codcla,$codpv,$umed);


		endforeach;

		//$objProducto->GuardarTot($idusu,$fechavv,$ttotal,$nomcli,$itm,$nnota);// reg transfertotal
		$objProducto->GuardarTot2($nnregg,$decoddepp,$clasem);// reg transfertotal

		$objProducto->ActualizaCdtr2($nordentr);			
		$objProducto->Actualizarcodnu($nnregg);			

			
//				$_SESSION['detalle'] = array();
						
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'Datos de Transferencia incorrectos';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;		
				
	case 11: /// esta usando compras y COTIZACION
		$objProducto = new Producto1();
		$json = array();
		$json['msj'] = 'Articulo Agregado...';
		$json['success'] = true;
		if (isset($_POST['producto_id']) && $_POST['producto_id']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='') {
			try {
				//if($_POST['tipop']=='CR'){$mr='2';}
				$dcto=0;
				$cantidad = $_POST['cantidad'];
				$producto_id = $_POST['producto_id'];
				$pventa = $_POST['pventa'];
				$precioreal=$pventa*$cantidad;

			
				$resultado_producto = $objProducto->getById($producto_id);
				$dservicio = $resultado_producto->fetchObject();
				$descripcion = $dservicio->descripcion;
				$precio = $dservicio->pvp;
				$precion = $dservicio->pneto;
				$saldo = $dservicio->existencia;
				$codg = $dservicio->codpv;
				$codigo = $dservicio->codigo;
				$foto = $dservicio->foto;
				$stockm = $dservicio->stockmin;
				$coddep = $dservicio->coddep;
				$umed = $dservicio->umed;
				$codcla = $dservicio->codcla;
				$codpv = $dservicio->codpv;
				
		//		if($dcto=='SI'){
		//			if($fac=='SI'){
		//				$pventa=$pventa-($pventa*($cf/100));
		//			}else{
		//				$pventa=$pventa-($pventa*($sf/100));
		//			}
		//		}
				
				
				
				$subtotal = $cantidad * $pventa;
				
	$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'descripcion'=>$descripcion, 'cantidad'=>$cantidad, 'precio'=>$pventa,
	 'subtotal'=>$subtotal,'saldo'=>$saldo,'foto'=>$foto,'codigo'=>$codigo,'coddep'=>$coddep,'umed'=>$umed,'codcla'=>$codcla,'codpv'=>$codpv);

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

case 8: // USANDO PARA TRANSFERENCIA 2017
	

		$objProducto = new Producto1();
		$observ=$_POST['observ']; // recoge datos de ajax JSON
		$nnota=$_POST['nnota']; // recoge datos de ajax JSON
		$idusu=$_POST['idusu'];												
	//	$nproff=$_POST['nproff'];												
		$clasem=$_POST['clasemov']; /// se refiere a alquiler o venta	
		$adepto=$_POST['adepto'];												
		$fechat=$_POST['fecha'];												
		$fechavv= date("Y-m-d", strtotime($fechat) );
		$json = array();
		$json['msj'] = 'Guardado Correctamente';
		$json['success'] = true;
		$ttotal=0.00;
		$itt=0;
		if (count($_SESSION['detalle'])>0) {
			try {

				
				foreach($_SESSION['detalle'] as $datos):
					$idservicio = $datos['id'];
					$descripcion= $datos['descripcion'];
					$cantidad = $datos['cantidad'];
					//$preal = $datos['preal'];
					$precio = $datos['precio'];
					$subtotal = $datos['subtotal'];
				//	$codg = $datos['codg'];
					$codigo = $datos['codigo'];
					$foto = $datos['foto'];
					$codde = $datos['coddep'];
					$umed = $datos['umed'];
					$codcla = $datos['codcla'];
					$codpv = $datos['codpv'];


					//$ttotal=$ttotal+$subtotal;
					$ttotal=$ttotal+($precio*$cantidad);
					$itt=$itt+1;

			$objProducto->GuardarTransfe($idservicio, $descripcion, $cantidad,$codde,$nnota,$codigo,$adepto); //reg transferdetalle
			$objProducto->ActualizaCantTransf($idservicio, $cantidad); // Actualiza activos resta existencia  //////errro
			$objProducto->GuardarAlmacen($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nnota,$codigo,$foto,$codde,$clasem,$umed,$codcla,$codpv);//movimdet reg
			
				endforeach;
				
				$objProducto->ActCodnuTransfe($nnota); // ACTUALIZAR NRO DE COTIZACION ES PROFORMA NO VA
				$objProducto->guardarTotTransfe($nnota,$observ,$ttotal,$idusu,$codde,$adepto,$fechavv);// reg transfertotal  
				$objProducto->guardarTotMovim($nnota,$observ,$ttotal,$idusu,$codde,$itt,$clasem);// reg transfertotal
	
				
				$_SESSION['detalle'] = array();
						
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'No hay Registros agregados';
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
		$encargado=$_POST['encargado']; // recoge datos de ajax JSON
		$nnota=$_POST['nnota']; // recoge datos de ajax JSON
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

				$objProducto->guardarTotal($ttotal,$idventa,$encargado,$nnota);
				
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


}
?>