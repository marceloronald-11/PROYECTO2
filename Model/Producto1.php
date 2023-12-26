<?php
class Producto1
{
function getProveedor(){
		$sql = "SELECT * FROM proveedor ";
		global $cnx;
		return $cnx->query($sql);
	}

	
	function CrearCredito($idusu,$cosuc,$fecha2,$nroing,$ttotal,$respo,$colab){
		$sql = "INSERT INTO creditos(id_usu,codsuc,fechacre,norden,totcre,imprimio,pagoscre,saldocre,tipotra,nomcliente,codlab) values
		('$idusu','$cosuc','$fecha2','$nroing','$ttotal','NO','0','$ttotal','CO','$respo','$colab')";
		global $cnx;
		return $cnx->query($sql);
	}

	function VerificarVtas(){
		$sql = "SELECT * FROM clientes  ";
		global $cnx;
		global $totalreg;
					//return $cnx->query($sql);
		$STH=$cnx->query($sql);
		//$totalregA = $STH->rowCount();
		return $STH->rowCount();

	}


	function VerificaCi($nitv){
		$sql = "SELECT * FROM clientes WHERE cicli='$nitv' ";
		global $cnx;
		global $totalreg;
					//return $cnx->query($sql);
		$STH=$cnx->query($sql);
		//$totalregA = $STH->rowCount();
		return $STH->rowCount();

	}
	
	function VerificaNit($nitv){
		$sql = "SELECT * FROM clientes WHERE nitcli='$nitv' ";
		global $cnx;
		global $totalreg;
					//return $cnx->query($sql);
		$STH=$cnx->query($sql);
		return $STH->rowCount();
	}
	
	function ActualizarDClientes($nitv,$respo){
		$sql = "INSERT INTO clientes (nitcli,nombrecli) values('$nitv','$respo')";
		global $cnx;
		return $cnx->query($sql);
	}

	
	
	function getDosificaconx($codsucse){
		$sql = "SELECT * FROM dosificacion WHERE codsuc='$codsucse' AND cdfac='X' ";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function getImprimirvvta(){
		$sql = "SELECT * FROM movimtot WHERE imprimio='NO' AND tipo='I' ORDER BY norden DESC ";
		global $cnx;
		return $cnx->query($sql);
	}

	function getSucursalx(){
		$sql = "SELECT * FROM sucursal ";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function ActualizarFac($nfact,$codsucfa){
		$sql = "UPDATE dosificacion SET facactual='$nfact'  WHERE codsuc='$codsucfa'  ";
		global $cnx;
		return $cnx->query($sql);
		
	//	$STH=$cnx->query($sql);
	//	$total = $STH->rowCount();

	}	
	function getById($id){
		$sql = "SELECT * FROM articulos WHERE codar='$id' ";
		global $cnx;
		return $cnx->query($sql);
	}

function getsni($codsucfa){
		$sql = "SELECT * FROM dosificacion WHERE cdfac='X' AND codsuc='$codsucfa' ";
		global $cnx;
		return $cnx->query($sql);
	}
	function getcodnu(){
		$sql = "SELECT * FROM codnu ";
		global $cnx;
		return $cnx->query($sql);
	}

	function getdosificacion($codsuc){
		$sql = "SELECT * FROM dosificacion WHERE codsuc='$codsuc' ";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function getDepartamento(){
		$sql = "SELECT * FROM departamento ";
		global $cnx;
		return $cnx->query($sql);
	}

	function getcodnuped(){
		$sql = "SELECT * FROM codnu ";
		global $cnx;
		return $cnx->query($sql);
	}


	function GuardarMvDet($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$codigoo,$idusu,$codsucse){
		$sql = "INSERT INTO movimdet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tipo,codigo,tmm,id_usu,codsuc) values
		('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$nroing','$umed','$fechavv','I','$codigoo','Compras','$idusu','1')";
		global $cnx;
		return $cnx->query($sql);
	}

		function Guardar21($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$codigoo,$idusu,$codsucse){
		$sql = "INSERT INTO movimdet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tipo,codigo,tmm,id_usu,codsuc) values
		('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$nroing','$umed','$fechavv','E','$codigoo','Compras','$idusu','1')";
		global $cnx;
		return $cnx->query($sql);
	}

function guardarTot21($fechavv,$nroing,$idusu,$ttotal,$respo,$itm){
$sql = "INSERT INTO movimtot (id_usu,fechato,tipo,norden,totimporte,afavor,imprimio,itm,codsuc)
 values('$idusu','$fechavv','I','$nroing','$ttotal','$respo','NO','$itm','1')";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function GuardarCompra11($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$codigoo,$idusu,$cosuc,$tpago,$colab){
		$sql = "INSERT INTO movimdet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tipo,tmm,id_usu,codsuc,tpago,codlab) values
		('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$nroing','$umed','$fechavv','I','Compras','$idusu','$cosuc','$tpago','$colab')";
		global $cnx;
		return $cnx->query($sql);
	}
	function ActualizarArt11($idservicio,$cantidad){
		$sql = "UPDATE articulos SET saldo=saldo+'$cantidad'  WHERE codar='$idservicio'";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function guardarTot11($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$cosuc,$tpago,$colab){
		$sql = "INSERT INTO movimtot (id_usu,fechato,tipo,norden,totimporte,afavor,imprimio,itm,codsuc,tpago,codlab)
 		values('$idusu','$fechavv','I','$nroing','$ttotal','$respo','NO','$itm','$cosuc','$tpago','$colab')";
		global $cnx;
		return $cnx->query($sql);
	}
function getImprimirVta11(){
		$sql = "SELECT * FROM movimtot WHERE imprimio='NO' AND tipo=I' ";
		global $cnx;
		return $cnx->query($sql);
	}


	function GuardarMvDetvv($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$codigoo,$idusu,$cosuc){
		$sql = "INSERT INTO movimdet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tipo,tmm,id_usu,codsuc) values
		('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$nroing','$umed','$fechavv','E','Ventas','$idusu','$cosuc')";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function ActualizarArt($idservicio,$cantidad){
		$sql = "UPDATE articulos SET saldo=saldo-'$cantidad'  WHERE codar='$idservicio'";
		global $cnx;
		return $cnx->query($sql);
	}

function Actualizarcodnu($nroing){
		$sql = "UPDATE codnu SET norden='$nroing'";
		global $cnx;
		return $cnx->query($sql);
		
	//	$STH=$cnx->query($sql);
	//	$total = $STH->rowCount();

	}	
function ActualizarcodnuPed($nroing){
		$sql = "UPDATE codnu SET nordenped='$nroing'";
		global $cnx;
		return $cnx->query($sql);
		
	//	$STH=$cnx->query($sql);
	//	$total = $STH->rowCount();

	}	



function guardarTotMv($fechavv,$nroing,$idusu,$ttotal,$respo,$itm){
$sql = "INSERT INTO movimtot (id_usu,fechato,tipo,norden,totimporte,afavor,imprimio,itm,codsuc)
 values('$idusu','$fechavv','I','$nroing','$ttotal','$respo','NO','$itm','1')";
		global $cnx;
		return $cnx->query($sql);
	}
function guardarTotMvvv($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$faac,$nnit,$nitv,$nautoriza,$felim,$ma,$filename2,$cosuc,$leyenda,$coddox){
$sql = "INSERT INTO movimtot (id_usu,fechato,tipo,norden,totimporte,afavor,imprimio,itm,codsuc,nfactura,nit,nitcliente,nautoriza,fechalim,control,qrfoto,leyenda,coddo)
 values('$idusu','$fechavv','E','$nroing','$ttotal','$respo','NO','$itm','$cosuc','$faac','$nnit','$nitv','$nautoriza','$felim','$ma','$filename2','$leyenda','$coddox')";
		global $cnx;
		return $cnx->query($sql);
	}
	
function getUsuarios($id_usu){
		$sql = "SELECT * FROM usuarios WHERE id_usu='$id_usu' ";
		global $cnx;
		return $cnx->query($sql);
	}
function getUsuariosTra(){
		$sql = "SELECT * FROM usuarios WHERE id_area='movil' ";
		global $cnx;
		return $cnx->query($sql);
	}

function getUsuariosVen(){
		$sql = "SELECT * FROM usuarios WHERE id_area='vendedor' ";
		global $cnx;
		return $cnx->query($sql);
	}


function getImprimir(){
		$sql = "SELECT * FROM movimtot WHERE imprimio='NO' AND tipo='I' ORDER BY norden DESC ";
		global $cnx;
		return $cnx->query($sql);
	}

function getImprimirvv(){
		$sql = "SELECT * FROM movimtot AS mo JOIN sucursal AS su ON mo.codsuc=su.codsuc WHERE imprimio='NO' AND mo.tipo='E' ORDER BY norden DESC ";
		global $cnx;
		return $cnx->query($sql);
	}
	
	
function getImprimirVta(){
		$sql = "SELECT * FROM movimtot WHERE imprimio='NO' AND tipo='E' ";
		global $cnx;
		return $cnx->query($sql);
	}

	function getSucursal(){
		$sql = "SELECT * FROM sucursal ";
		global $cnx;
		return $cnx->query($sql);
	}
	function getSucursal5($codsucx){
		$sql = "SELECT * FROM sucursal WHERE codsuc!='$codsucx' ";
		global $cnx;
		return $cnx->query($sql);
	}

	function getSucursalVar($codsucx){
		$sql = "SELECT * FROM sucursal WHERE codsuc!='$codsucx' ";
		global $cnx;
		return $cnx->query($sql);
	}


	function GuardarMvDetS($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$nsuc,$codg,$idusu,$codsucse){
		$sql = "INSERT INTO movimdet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tipo,codigo,tmm,id_usu,xcodsuc,codsuc) values
		('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$nroing','$umed','$fechavv','E','$codg','EnvioSucursal','$idusu','$nsuc','$codsucse')";
		global $cnx;
		return $cnx->query($sql);
	}


	
function ActualizarArtS($idservicio,$cantidad){
		$sql = "UPDATE articulos SET saldo=saldo-'$cantidad'  WHERE codar='$idservicio'";
		global $cnx;
		return $cnx->query($sql);
	}
function guardarTotMvS($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$nsuc){
$sql = "INSERT INTO movimtot (id_usu,fechato,tipo,norden,totimporte,afavor,imprimio,itm)
 values('$idusu','$fechavv','E','$nroing','$ttotal','$respo','NO','$itm')";
		global $cnx;
		return $cnx->query($sql);
	}


function guardarTotVende($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$cven){
$sql = "INSERT INTO movimtot (id_usu,fechato,tipo,norden,totimporte,afavor,imprimio,itm,codven)
 values('$idusu','$fechavv','E','$nroing','$ttotal','$respo','NO','$itm','$cven')";
		global $cnx;
		return $cnx->query($sql);
	}


	function GuardarMvDetVen($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$codg,$idusu,$cven){
		$sql = "INSERT INTO movimdet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tipo,codigo,tmm,id_usu,codven) values
		('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$nroing','$umed','$fechavv','E','$codg','EntVendedor',$idusu,'$cven')";
		global $cnx;
		return $cnx->query($sql);
	}


	function Verificar($idservicio,$nsuc,$codg){
		$sql = "SELECT * FROM articulos WHERE codigo='$codg' AND codsuc='$nsuc' ";
		global $cnx;
		global $totalreg;
		//return $cnx->query($sql);
		
		$STH=$cnx->query($sql);
		$totalreg = $STH->rowCount();

	}


function ActualizarSuc($idservicio, $cantidad,$nsuc,$codg){
		$sql = "UPDATE articulos SET saldo=saldo+'$cantidad'  WHERE codigo='$codg' AND codsuc='$nsuc' ";
		global $cnx;
		return $cnx->query($sql);
	}

function DuplicaArt($descripcion, $cantidad, $nsuc,$codg,$codcla,$codpv,$observx,$umed,$dctoar,$fotox,$qrfotox,$coddep,$pneto,$pvpx,$stock){
$sql = "INSERT INTO articulos (descripar,saldo,codsuc,codigo,codcla,codpv,observart,umed,dctoar,fotoar,qrfotoar,coddep,pnetoar,pvpar,stockmin)
 values('$descripcion','$cantidad','$nsuc','$codg','$codcla','$codpv','$observx','$umed','$dctoar','$fotox','$qrfotox','$coddep','$pneto','$pvpx','$stock')";
		global $cnx;
		return $cnx->query($sql);
	}


	function GuardarTraDet($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$nsuc,$codg,$idusu){
		$sql = "INSERT INTO transferdet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tipo,codigo,tmm,id_usu) values
		('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$nroing','$umed','$fechavv','E','$codg','Sucursal','$idusu')";
		global $cnx;
		return $cnx->query($sql);
	}

	function GuardarVendeDet($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$codg,$idusu,$cven){
		$sql = "INSERT INTO transferdet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tipo,codigo,tmm,id_usu,codven) values
		('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$nroing','$umed','$fechavv','E','$codg','Vendedor',$idusu,'$cven')";
		global $cnx;
		return $cnx->query($sql);
	}

function guardarVendeTot($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$cven){
$sql = "INSERT INTO transfertot (id_usu,fechato,tipo,norden,totimporte,afavor,imprimio,itm,codven)
 values('$idusu','$fechavv','E','$nroing','$ttotal','$respo','NO','$itm','$cven')";
		global $cnx;
		return $cnx->query($sql);
	}




function guardarTraTot($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$nsuc){
$sql = "INSERT INTO transfertot (id_usu,fechato,tipo,norden,totimporte,afavor,imprimio,itm,codsuc)
 values('$idusu','$fechavv','E','$nroing','$ttotal','$respo','NO','$itm','$nsuc')";
		global $cnx;
		return $cnx->query($sql);
	}

function getpersonasgral(){
		$sql = "SELECT * FROM personal ";
		global $cnx;
		return $cnx->query($sql);
	}
function getVehiculo(){
		$sql = "SELECT * FROM vehiculos ";
		global $cnx;
		return $cnx->query($sql);
	}


function GuardarMvDetVenta($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$fpg,$codigoo,$idusu,$codsucx,$codclax,$codpvx){
		$sql = "INSERT INTO movimdet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tmv,tipo,codigo,tmm,id_usu,codsuc,codcla,codpv) values
		('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$nroing','$umed','$fechavv','$fpg','E','$codigoo','VentaSucu','$idusu','$codsucx','$codclax','$codpvx')";
		global $cnx;
		return $cnx->query($sql);
	}

function GuardarMvDetVenta10($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$fpg,$codigoo,$idusu,$codsucx,$codclax,$codpvx,$idperx){
		$sql = "INSERT INTO movimdet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tmv,tipo,codigo,tmm,id_usu,codsuc,codcla,codpv,codven) values
		('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$nroing','$umed','$fechavv','$fpg','E','$codigoo','VentaVendedor','$idusu','$codsucx','$codclax','$codpvx','$idperx')";
		global $cnx;
		return $cnx->query($sql);
	}


function ActualizarArtVenta($idservicio,$cantidad){
		$sql = "UPDATE articulos SET saldo=saldo-'$cantidad'  WHERE codar='$idservicio'";
		global $cnx;
		return $cnx->query($sql);
	}

function guardarTotMvVenta($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$fpg,$codsucx,$codclix){
$sql = "INSERT INTO movimtot (id_usu,fechato,tipo,norden,totimporte,afavor,imprimio,itm,tmv,codsuc,tipodoc,codcli)
 values('$idusu','$fechavv','E','$nroing','$ttotal','$respo','NO','$itm','$fpg','$codsucx','REC','$codclix')";
		global $cnx;
		return $cnx->query($sql);
	}

function guardarTotMvVenta10($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$fpg,$codsucx,$codclix,$idperx){
$sql = "INSERT INTO movimtot (id_usu,fechato,tipo,norden,totimporte,afavor,imprimio,itm,tmv,codsuc,tipodoc,codcli,codven)
 values('$idusu','$fechavv','E','$nroing','$ttotal','$respo','NO','$itm','$fpg','$codsucx','REC','$codclix','$idperx')";
		global $cnx;
		return $cnx->query($sql);
	}


function GuardarMvDetPed($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$fpg,$codigoo,$idusu,$codsucx,$codclax,$codpvx){
		$sql = "INSERT INTO pedidodet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tmv,tipo,codigo,tmm,id_usu,codsuc,codcla,codpv) values
		('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$nroing','$umed','$fechavv','$fpg','E','$codigoo','Pedido','$idusu','$codsucx','$codclax','$codpvx')";
		global $cnx;
		return $cnx->query($sql);
	}

function guardarTotMvPed($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$fpg,$codsucx,$codclix){
$sql = "INSERT INTO pedidotot (id_usu,fechato,tipo,norden,totimporte,afavor,imprimio,itm,tmv,codsuc,tipodoc,codcli)
 values('$idusu','$fechavv','E','$nroing','$ttotal','$respo','NO','$itm','$fpg','$codsucx','REC','$codclix')";
		global $cnx;
		return $cnx->query($sql);
	}






function RegistrarCredito($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$fpg,$codsucx,$codclix,$nroing,$idperx){
$sql = "INSERT INTO creditos (id_usu,totalcr,saldocr,fechacre,codsuc,codcli,nordencre,estado,codven)
 values('$idusu','$ttotal','$ttotal','$fechavv','$codsucx','$codclix','$nroing','Pendiente','$idperx')";
		global $cnx;
		return $cnx->query($sql);
	}



	function GuardarMvDetS2($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$nsuc,$codg,$idusu){
		$sql = "INSERT INTO movimdet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tipo,codigo,tmm,id_usu,xcodsuc) values
		('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$nroing','$umed','$fechavv','E','$codg','EnvioAlmacen',$idusu,'$nsuc')";
		global $cnx;
		return $cnx->query($sql);
	}
function ActualizarArtS2($idservicio,$cantidad){
		$sql = "UPDATE articulos SET saldo=saldo-'$cantidad'  WHERE codar='$idservicio'";
		global $cnx;
		return $cnx->query($sql);
	}
	function GuardarTraDet2($idservicio, $descripcion, $cantidad, $precio, $subtotal,$nroing,$umed,$fechavv,$nsuc,$codg,$idusu){
		$sql = "INSERT INTO transferdet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tipo,codigo,tmm,id_usu) values
		('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$nroing','$umed','$fechavv','E','$codg','Almacen',$idusu)";
		global $cnx;
		return $cnx->query($sql);
	}

function guardarTotMvS2($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$nsuc){
$sql = "INSERT INTO movimtot (id_usu,fechato,tipo,norden,totimporte,afavor,imprimio,itm)
 values('$idusu','$fechavv','E','$nroing','$ttotal','$respo','NO','$itm')";
		global $cnx;
		return $cnx->query($sql);
	}
function guardarTraTot2($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$nsuc){
$sql = "INSERT INTO transfertot (id_usu,fechato,tipo,norden,totimporte,afavor,imprimio,itm,codsuc)
 values('$idusu','$fechavv','E','$nroing','$ttotal','$respo','NO','$itm','$nsuc')";
		global $cnx;
		return $cnx->query($sql);
	}



}
?>