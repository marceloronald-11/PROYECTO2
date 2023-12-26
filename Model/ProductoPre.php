<?php
class Producto
{
	function guardarDetallePre($idar,$desscri,$cantx,$pvpx,$subtotal,$nnordenx,$umedx,$hoyx,$iduux,$codclix){
		$sql = "INSERT INTO movimdet (codar,descripdt,cant,precio,subtot,norden,umed,fechadt,tipo,tmm,id_usu,codcli) values 
		('$idar','$desscri','$cantx','$pvpx','$subtotal','$nnordenx','$umedx','$hoyx','E','Pedido','$iduux','$codclix')";
		global $cnx;
		return $cnx->query($sql);
	}
	
function guardarTotalPre($iduux,$hoyx,$nnordenx,$ttotal,$respox,$itt,$codclix)
	{
		$sql = "INSERT INTO movimtot (id_usu,fechato,tipo,norden,totimporte,afavor,imprimio,itm,tmm,codcli) values 
		('$iduux','$hoyx','E','$nnordenx','$ttotal','$respox','NO','$itt','Pedido','$codclix')";
		global $cnx;
		return $cnx->query($sql);
	}	
	
	
	
	function getCodnu(){
		$sql = "SELECT * FROM codnu";
		global $cnx;
		return $cnx->query($sql);
	}	
	
function Actualizarec($nnordenx){
		$sql = "UPDATE codnu SET norden='$nnordenx' ";
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