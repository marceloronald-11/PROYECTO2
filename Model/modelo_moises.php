<?php
class Producto
{
	function getGrupo(){
		$sql = "SELECT * FROM grupo ";
		global $cnx;
		return $cnx->query($sql);
	}		
	function getMarca(){
		$sql = "SELECT * FROM marca ";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function getTipo(){
		$sql = "SELECT * FROM tipo ";
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

}
?>