<?php
class Producto
{

	
	
	function getufv(){
		$sql = "SELECT * FROM ufv_registro";
		global $cnx;
		return $cnx->query($sql);
	}

	function Verifiufv($hoyx){
		$sql = "SELECT * FROM ufv_registro WHERE fechaufv='$hoyx' ";
		global $cnx;
		global $totalreg;
					//return $cnx->query($sql);
		$STH=$cnx->query($sql);
		return $STH->rowCount();
	}


	function RegSolitot($nordenx,$nombre_u,$idusu,$coddocx,$versionx,$fedoc,$codarex,$codcargox,$codsolix,$it){
		$sql = "INSERT INTO solicitudtot2 (norden,afavor,id_usu,coddoc,versionn,fechasol,tmm,codarea,codcargo,codsoli,itm,itmreg) values ('$nordenx','$nombre_u','$idusu','$coddocx','$versionx','$fedoc','Proceso','$codarex','$codcargox','$codsolix','$it','0')";
		global $cnx;
		return $cnx->query($sql);
	}


	function RegSolidet($codrepx,$detrepu,$codigox,$umedx,$nordenx,$preciodtx,$saldox,$saldominx){
		$sql = "INSERT INTO solicituddet2 (codrep,detrepdt,codigo,umed,norden,preciodt,saldodt,saldomindt) values ('$codrepx','$detrepu','$codigox','$umedx','$nordenx','$preciodtx','$saldox','$saldominx')";
		global $cnx;
		return $cnx->query($sql);
	}


	function getRepuesto(){
		$sql = "SELECT * FROM repuesto WHERE saldomin=5 ";
		global $cnx;
		return $cnx->query($sql);
	}


	function getCabeza(){
		$sql = "SELECT * FROM cabecera ";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function guardarValedet($hoyx,$codd2,$detar2,$cant2,$peu2,$cost2,$iimporte,$sto2,$idusu,$nord2){
		$sql = "INSERT INTO valesdet (fechavdet,codigo,detrepuesto,cant,punitdt,costodt,importedt,stockdt,norden,idusu) values ('$hoyx','$codd2','$detar2','$cant2','$peu2','$cost2','$iimporte','$sto2','$nord2','$idusu')";
		global $cnx;
		return $cnx->query($sql);
	}
	function guardarValetot($hoyx,$nord2,$itt,$tcax,$codotex,$codigotecx,$notecx,$fesalx){
		$sql = "INSERT INTO valestot (fechatot,norden,itm,tc,codote,codtec,nomtec,fechasal) values ('$hoyx','$nord2','$itt','$tcax','$codotex','$codigotecx','$notecx','$fesalx')";
		global $cnx;
		return $cnx->query($sql);
	}

	function Actcodnuvale($nord2){
		$sql = "UPDATE codnu SET nvales='$nord2' ";
		global $cnx;
		return $cnx->query($sql);
	}	

	function Actcodnusol($nord2){
		$sql = "UPDATE codnu SET nordensol='$nord2' ";
		global $cnx;
		return $cnx->query($sql);
	}	

	function guardarSoli($idusu,$hoyx,$nord2,$nomb2,$coddoc2,$vver2,$fea2,$fesol2,$nsol2,$codarea2,$codcargo2,$area2,$carg2,$codsoli2,$itt){
		$sql = "INSERT INTO solicitudtot (id_usu,fechasol,norden,afavor,coddoc,versionn,nrosol,codarea,codcargo,codsoli,itm,fechaa) values ('$idusu','$fesol2','$nord2','$nomb2','$coddoc2','$vver2','$nsol2','$codarea2','$codcargo2','$codsoli2','$itt','$hoyx')";
		global $cnx;
		return $cnx->query($sql);
	}

	function guardarSoli2($idusu,$hoyx,$nord2,$nomb2,$coddoc2,$vver2,$fea2,$fesol2,$nsol2,$codarea2,$codcargo2,$area2,$carg2,$codsoli2,$itt){
		$sql = "INSERT INTO solicitudtot (id_usu,fechasol,norden,afavor,coddoc,versionn,nrosol,codarea,codcargo,codsoli,itm,fechaa,tmm) values ('$idusu','$fesol2','$nord2','$nomb2','$coddoc2','$vver2','$nsol2','$codarea2','$codcargo2','$codsoli2','$itt','$hoyx','Proceso')";
		global $cnx;
		return $cnx->query($sql);
	}

	function guardarDetSoli($codrep2,$codd2,$detar2,$ume2,$cant2,$tpri2,$idusu,$hoyx,$nord2){
		$sql = "INSERT INTO solicituddet (codrep,detrepdt,codigo,umed,cantsoli,tpriodt,id_usu,fechasoldt,norden) values ('$codrep2','$detar2','$codd2','$ume2','$cant2','$tpri2','$idusu','$hoyx','$nord2')";
		global $cnx;
		return $cnx->query($sql);
	}

		

	function guardarDetSoli2($codrep2,$codd2,$detar2,$ume2,$cant2,$tpri2,$idusu,$hoyx,$nord2){
		$sql = "INSERT INTO solicituddet (codrep,detrepdt,codigo,umed,cantsoli,tpriodt,id_usu,fechasoldt,norden) values ('0','$detar2','$codd2','$ume2','$cant2','$tpri2','$idusu','$hoyx','$nord2')";
		global $cnx;
		return $cnx->query($sql);
	}	



	function getTipoSucursal(){
		$sql = "SELECT * FROM tiposucursal ";
		global $cnx;
		return $cnx->query($sql);
	}

		function getSucursalxfa(){
		$sql = "SELECT * FROM sucursal ";
		global $cnx;
		return $cnx->query($sql);
	}

	
	function getClasifica(){
		$sql = "SELECT * FROM clasificacion ";
		global $cnx;
		return $cnx->query($sql);
	}
	function getProveedor(){
		$sql = "SELECT * FROM proveedor";
		global $cnx;
		return $cnx->query($sql);
	}
	


	function getImprimirInventario(){
		$sql = "SELECT * FROM movimtot WHERE imprimio='NO' AND tmm='Inventario' ";
		global $cnx;
		return $cnx->query($sql);
	}

	function getImprimirDevPer(){
		$sql = "SELECT * FROM movimtot WHERE imprimio='NO' AND tmm='PersonalDv' ";
		global $cnx;
		return $cnx->query($sql);
	}

	function getImprimirOrden(){
		$sql = "SELECT * FROM ordentot WHERE imprimio='NO' AND tipo='I' ";
		global $cnx;
		return $cnx->query($sql);
	}

	
	
	function getCodnu(){
		$sql = "SELECT * FROM codnu";
		global $cnx;
		return $cnx->query($sql);
	}

	function getTipoo(){
		$sql = "SELECT * FROM tipogym ";
		global $cnx;
		return $cnx->query($sql);
	}

	function getusu($id_usu){
		$sql = "SELECT * FROM usuarios WHERE id_usu='$id_usu'";
		global $cnx;
		return $cnx->query($sql);
	}
	function getdepto(){
		$sql = "SELECT * FROM departamento";
		global $cnx;
		return $cnx->query($sql);
	}
	function getdeptounico($coddepto){
		$sql = "SELECT * FROM departamento WHERE coddep='$coddepto' ";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function getreg(){
		$sql = "SELECT * FROM codnu";
		global $cnx;
		return $cnx->query($sql);
	}

	function getImprimirPPer(){
		$sql = "SELECT * FROM movimtot WHERE imprimio='NO' AND tmm='Personal' ";
		global $cnx;
		return $cnx->query($sql);
	}


/////////////////





	function getSolicitud(){
		$sql = "SELECT * FROM abastetot ";
		global $cnx;
		return $cnx->query($sql);
	}

	function getImprimirE(){
		$sql = "SELECT * FROM movimtot WHERE imprimio='NO' And tipo='E' ";
		global $cnx;
		return $cnx->query($sql);
	}

	function getImprimir(){
		$sql = "SELECT * FROM movimtot WHERE imprimio='NO' AND tipo='I' ";
		global $cnx;
		return $cnx->query($sql);
	}


	function getarticulo(){
		$sql = "SELECT * FROM movimtot WHERE imprimio='NO' ";
		global $cnx;
		return $cnx->query($sql);
	}

	function getcompra(){
		$sql = "SELECT * FROM compra";
		global $cnx;
		return $cnx->query($sql);
	}

	function getestado(){
		$sql = "SELECT * FROM estado";
		global $cnx;
		return $cnx->query($sql);
	}

	
	function getpersonas($idpe){
		$sql = "SELECT * FROM personas  WHERE id_per='$idpe' ";
		global $cnx;
		return $cnx->query($sql);
	}

	function getpersonass(){
		$sql = "SELECT * FROM personas ";
		global $cnx;
		return $cnx->query($sql);
	}

	function getarea(){
		$sql = "SELECT * FROM area";
		global $cnx;
		return $cnx->query($sql);
	}


	

	function getp(){
		$sql = "SELECT * FROM proveedor ORDER BY nombre ASC";
		global $cnx;
		return $cnx->query($sql);
	}
	
	
	
	function guardarVenta(){
		$sql = "INSERT INTO venta (fecha,tmov) values (NOW(),'I')";
		global $cnx;
		return $cnx->query($sql);
	}
	function guardarTotal($tot,$id,$enc){
		//$sql = "INSERT INTO venta (fecha,tmov) values (NOW(),'E')";
		$sql = "UPDATE venta SET totalbs='$tot',encargado='$enc' WHERE id='$id'";
		global $cnx;
		return $cnx->query($sql);
	}	
	
	function getUltimaVenta()
	{
		$sql = "SELECT LAST_INSERT_ID() as ultimo";
		global $cnx;
		return $cnx->query($sql);
	}
	

}
?>