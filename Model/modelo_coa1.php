<?php
class Producto
{
	function getlaboratorio(){
		$sql = "SELECT * FROM laboratorio ";
		global $cnx;
		return $cnx->query($sql);
	}		
	function getProveedor(){
		$sql = "SELECT * FROM proveedor ";
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
					//return $cnx->query($sql);
		$STH=$cnx->query($sql);
		//$totalregA = $STH->rowCount();
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
	function getSucursalx(){
		$sql = "SELECT * FROM sucursal ";
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