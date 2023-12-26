<?php
class Producto
{

function getArea(){
		$sql = "SELECT * FROM area ";
		global $cnx;
		return $cnx->query($sql);
	}	
	
	
function getImprimirEnvio(){
		$sql = "SELECT * FROM movimtot WHERE imprimio='NO' AND tipo='E' AND tmm='Envio' ";
		global $cnx;
		return $cnx->query($sql);
	}	
	
	
	function VerificarVtas3($codsucx){
		$sql = "SELECT * FROM movimtot WHERE imprimio='NO' AND tipo='E' AND codsuc='$codsucx' ";
		global $cnx;
		global $totalreg;
		$STH=$cnx->query($sql);
		return $STH->rowCount();
	}	
	
function getImprimirvta3($codsucx){
		$sql = "SELECT * FROM movimtot  WHERE imprimio='NO' AND tipo='E' AND codsuc='$codsucx' ORDER BY norden DESC ";
		global $cnx;
		return $cnx->query($sql);
	}	
	
function getUsus(){
		$sql = "SELECT * FROM usuarios";
		global $cnx;
		return $cnx->query($sql);
	}	
	
function getClientes($passx){
		$sql = "SELECT * FROM clientes WHERE cicli='$passx' ";
		global $cnx;
		return $cnx->query($sql);
	}	
	
function getClientes2(){
		$sql = "SELECT * FROM clientes ";
		global $cnx;
		return $cnx->query($sql);
	}		
	
function getZonas(){
		$sql = "SELECT * FROM zonas";
		global $cnx;
		return $cnx->query($sql);
	}

	function getlaboratorio(){
		$sql = "SELECT * FROM laboratorio ";
		global $cnx;
		return $cnx->query($sql);
	}	




	
	
	


	
	function getCodnu(){
		$sql = "SELECT * FROM codnu ";
		global $cnx;
		return $cnx->query($sql);
	}	


	function getProveedor(){
		$sql = "SELECT * FROM proveedor ";
		global $cnx;
		return $cnx->query($sql);
	}	

	function getSolicitudes(){
		$sql = "SELECT * FROM solicitudtot ";
		global $cnx;
		return $cnx->query($sql);
	}	
		
	




	function getMedida(){
		$sql = "SELECT * FROM medidas ";
		global $cnx;
		return $cnx->query($sql);
	}	

	
	function getDepto(){
		$sql = "SELECT * FROM departamento ";
		global $cnx;
		return $cnx->query($sql);
	}


	function getpersonasgral(){
		$sql = "SELECT * FROM personal ";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function VerificarVtas(){
		$sql = "SELECT * FROM movimtot WHERE imprimio='NO' AND tipo='E' ";
		global $cnx;
		global $totalreg;
		$STH=$cnx->query($sql);
		return $STH->rowCount();
	}

	function getClasifica(){
		$sql = "SELECT * FROM clasificacion ";
		global $cnx;
		return $cnx->query($sql);
	}

	
function getImprimirvta(){
		$sql = "SELECT * FROM movimtot AS mo JOIN sucursal AS su ON mo.codsuc=su.codsuc WHERE imprimio='NO' AND mo.tipo='E' ORDER BY norden DESC ";
		global $cnx;
		return $cnx->query($sql);
	}
function getImprimirvta2(){
		$sql = "SELECT * FROM movimtot  WHERE imprimio='NO' AND tipo='E' ORDER BY norden DESC ";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function getSucursalx(){
		$sql = "SELECT * FROM sucursal  ";
		global $cnx;
		return $cnx->query($sql);
	}
function getSucursaladm(){
		$sql = "SELECT * FROM sucursal WHERE codsuc>1 ";
		global $cnx;
		return $cnx->query($sql);
	}	
function getImprimirVta11(){
		$sql = "SELECT * FROM movimtot WHERE imprimio='NO' AND tipo='I' ";
		global $cnx;
		return $cnx->query($sql);
	}





}
?>