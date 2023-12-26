<?php
class Producto1
{
function getlote($idservicio){
$sql = "SELECT * FROM lotes WHERE codme='$idservicio' AND cantlot>'0' ORDER BY codlot DESC";		
		global $cnx;
		return $cnx->query($sql);
	}	
	
function ActualizaLote2($codlotx,$cantlotx){
		$sql = "UPDATE lotes SET cantlot=cantlot-'$cantlotx' WHERE codlot='$codlotx'";
		global $cnx;
		return $cnx->query($sql);
}	

		 
	
function GuardarCompra12($idservicio, $descripcion, $cantidad, $precio,$subtotal,$nroing,$umed,$fechavv,$idusu,$codsucse,$pvp){
		$sql = "INSERT INTO movimdet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tipo,tmm,id_usu,codsuc,tpago,coddep,codsucx,pvp) values
		('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$nroing','$umed','$fechavv','E','Ventas','$idusu','$codsucse','CT','1','1','$pvp')";
		global $cnx;
		return $cnx->query($sql);
}
	
function guardarTot12($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$codsucse,$codclix,$cix){
		$sql = "INSERT INTO movimtot (id_usu,fechato,tipo,norden,totimporte,afavor,imprimio,itm,codsuc,coddep,tmm,codcli,tipodoc,nit)
 		values('$idusu','$fechavv','E','$nroing','$ttotal','$respo','NO','$itm','$codsucse','1','Ventas','$codclix','REC','$cix')";
		global $cnx;
		return $cnx->query($sql);
	}
		
	
function ActualizarIngreso($idservicio,$cantidad){
		$sql = "UPDATE articulos SET saldo=saldo-'$cantidad'  WHERE codar='$idservicio' ";
		global $cnx;
		return $cnx->query($sql);
	}	
function VerificaCodigoenvio($idservicio,$codsucev){
		$sql = "SELECT * FROM articulossuc WHERE codar='$idservicio' AND codsuc='$codsucev' ";
		global $cnx;
		$STH=$cnx->query($sql);
		return $STH->rowCount();
}	
function crearArticuloSuc($idservicio,$cantidad,$codsucev){
$sql = "INSERT INTO articulossuc (codar,saldosuc,codsuc) values('$idservicio','$cantidad','$codsucev')";
		global $cnx;
		return $cnx->query($sql);
	}	

function sumarArticuloSuc($idservicio,$cantidad,$codsucev){
		$sql = "UPDATE articulossuc SET saldosuc=saldosuc+'$cantidad'  WHERE codar='$idservicio' AND codsuc='$codsucev'";
		global $cnx;
		return $cnx->query($sql);
	}	
	
function ActualizarSucuu($idservicio,$cantidad,$codsucse){
		$sql = "UPDATE articulossuc SET saldosuc=saldosuc-'$cantidad'  WHERE codar='$idservicio' AND codsuc='$codsucse' ";
		global $cnx;
		return $cnx->query($sql);
	}	
	
function GuardarEnvio($idservicio, $descripcion, $cantidad,$precio,$subtotal,$nroing,$umed,$fechavv,$idusu,$codsucev,$codpvv,$codigo1,$feven1){
		$sql = "INSERT INTO movimdet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tipo,tmm,id_usu,codsuc,tpago,coddep,codpv,codigo,codsucx) values
		('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$nroing','$umed','$fechavv','E','Envio','$idusu','$codsucev','CT','1','$codpvv','$codigo1','1')";
		global $cnx;
		return $cnx->query($sql);
	}

function ActualizarEnvio($idservicio,$cantidad){
		$sql = "UPDATE articulos SET saldo=saldo-'$cantidad'  WHERE codar='$idservicio'";
		global $cnx;
		return $cnx->query($sql);
}	
	
function guardarTotEnvio($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$codsucse){
		$sql = "INSERT INTO movimtot (id_usu,fechato,tipo,norden,totimporte,afavor,imprimio,itm,codsuc,tpago,coddep,tmm,codcli,tipodoc)
 		values('$idusu','$fechavv','E','$nroing','$ttotal','$respo','NO','$itm','$codsucse','CT','1','Envio','0','REC')";
		global $cnx;
		return $cnx->query($sql);
}
	
function VerificaCodigo($idservicio){
		$sql = "SELECT * FROM articulossuc WHERE codar='$idservicio' ";
		global $cnx;
		$STH=$cnx->query($sql);
		return $STH->rowCount();
}
	
	
function guardarTotIngreso($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$codsucse){
		$sql = "INSERT INTO movimtot (id_usu,fechato,tipo,norden,totimporte,afavor,imprimio,itm,codsuc,tpago,coddep,tmm,codcli,tipodoc)
 		values('$idusu','$fechavv','I','$nroing','$ttotal','$respo','NO','$itm','$codsucse','CT','1','Ingresosuc','0','REC')";
		global $cnx;
		return $cnx->query($sql);
	}	
	
function GuardarIngreso($idservicio, $descripcion, $cantidad,$precio,$subtotal,$nroing,$umed,$fechavv,$idusu,$codsucse,$codpvv,$codigo1,$feven1){
		$sql = "INSERT INTO movimdet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tipo,tmm,id_usu,codsuc,tpago,coddep,codpv,codigo,fechavenc) values
		('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$nroing','$umed','$fechavv','I','Ingresosuc','$idusu','$codsucse','CT','1','$codpvv','$codigo1','$feven1')";
		global $cnx;
		return $cnx->query($sql);
	}	
	
	
	
	
	
	
	
	
		
	
function getByIdr(){
		$sql = "SELECT LAST_INSERT_ID() as ultimo";
		global $cnx;
		return $cnx->query($sql);
	}
	
	
	
	
	
	
function GuardaraLote($idservicio,$cantidad,$precio,$nroing,$fechavv,$idusu,$lote,$feven1){
		$sql = "INSERT INTO lotes (codme,norden,nlotee,fechalot,cantlot,preciolot,cdlot,id_usu,fechaven)		 values('$idservicio','$nroing','$lote','$fechavv','$cantidad','$precio','SI','$idusu','$feven1')";
				global $cnx;
				return $cnx->query($sql);
	}
	
	

	
	

function GuardarCompra122($idservicio, $descripcion, $cantidad, $precio,$subtotal,$nroing,$umed,$fechavv,$idusu,$codsucse){
		$sql = "INSERT INTO movimdet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tipo,tmm,id_usu,codsuc,tpago,coddep,codsucx) values
		('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$nroing','$umed','$fechavv','E','Ventas','$idusu','$codsucse','CT','1','0')";
		global $cnx;
		return $cnx->query($sql);
	}	
	function ActualizarArt12($idservicio,$cantidad){
		$sql = "UPDATE articulos SET saldo=saldo-'$cantidad'  WHERE codar='$idservicio'";
		global $cnx;
		return $cnx->query($sql);
	}	
	
	function getById($id){
		$sql = "SELECT * FROM articulos WHERE codar='$id' ";
		global $cnx;
		return $cnx->query($sql);
	}
	

	
function GuardarCompra11($idservicio, $descripcion, $cantidad, $precio,$subtotal,$nroing,$umed,$fechavv,$idusu,$codsucse,$codpvv,$codigo1,$feven1,$lote,$idid){
		$sql = "INSERT INTO movimdet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tipo,tmm,id_usu,codsuc,tpago,coddep,codpv,codigo,fechavenc,nlotee,codlot,codsucx) values
		('$idservicio','$descripcion','$cantidad','$precio','$subtotal','$nroing','$umed','$fechavv','I','Compras','$idusu','$codsucse','CT','1','$codpvv','$codigo1','$feven1','$lote','$idid','1')";
		global $cnx;
		return $cnx->query($sql);
	}	
	
	

	function ActualizarArt11($idservicio,$cantidad){
		$sql = "UPDATE articulos SET saldo=saldo+'$cantidad'  WHERE codar='$idservicio'";
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

	function guardarTot11($fechavv,$nroing,$idusu,$ttotal,$respo,$itm,$codsucse,$codpvv){
		$sql = "INSERT INTO movimtot (id_usu,fechato,tipo,norden,totimporte,afavor,imprimio,itm,codsuc,tpago,coddep,tmm,codcli,tipodoc,codsucx)
 		values('$idusu','$fechavv','I','$nroing','$ttotal','$respo','NO','$itm','$codsucse','CT','1','Compras','0','REC','$codpvv')";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function CrearCredito($idusu,$codsucse,$fechavv,$nroing,$ttotal,$respo,$codclix){
		$sql = "INSERT INTO creditos(id_usu,codsuc,fechacre,norden,totalcr,saldocr,codcli,estado,nombreclii) values
		('$idusu','$codsucse','$fechavv','$nroing','$ttotal','$ttotal','$codclix','Pendiente','$respo')";
		global $cnx;
		return $cnx->query($sql);
	}	

	function getcodnu(){
		$sql = "SELECT * FROM codnu ";
		global $cnx;
		return $cnx->query($sql);
	}

}
?>