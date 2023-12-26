<?php
ini_set('max_execution_time', 900); //300 seconds = 5 minutes
require_once('codigo_control.class.php');
	include('conexion.php');

		$filename = dirname(__FILE__).'/casossin.txt';
		$handle = fopen($filename, 'r');
		$contents = fread($handle, filesize($filename));
		fclose($handle);
		
		$filas = explode("\n", $contents);
		//$filas = explode(chr(13).chr(10), $contents);

		//echo $filas[4];
		//echo 'resultado'; 
		for ($i=0;$i<= count($filas)-2;$i++){
			//echo $filas[$i].'<br>';
			$columna=explode("|",$filas[$i]);
			$codigo=$columna[10];
			$nauto=$columna[0];
			$nfac=$columna[1];
			$nitt=$columna[2];
			$fee=$columna[3];
			$impo=$columna[4];
			$lla=$columna[5];
			echo 'archivo:'.$codigo.'----> Generado:'.$i.'<br>';
//			$CodigoControl = new CodigoControl( 
//					$columna[0],//autorizacion
//					$columna[1],//No factura
//					$columna[2], // NIt CI
//					str_replace('/', '', $columna[3]), // cambia la fecha 2007/08/10 a 20070810  ..fecha
//					round(str_replace(',', '.', $columna[4]), 0), // cambia , a . y redondea el importe de la factura 208.95 a 209
//					$columna[5] //llave
//			
//			);
			mysqli_query($conexion,"INSERT INTO sin5000 (nautoriza,nfactura,nit,fecha,importe,llave,codigo)VALUES ('$nauto','$nfac','$nitt','$fee','$impo','$lla','$codigo')");

//			$generado=$CodigoControl->generar();
//			echo $generado.' Estado -->';
//			if ($codigo==$generado){
//					echo ' Corrrecto'.'<br>';
//				}else{
//					echo 'Incorrecto'.'<br>';
//				}
			
			//echo $palabra[3].'<br>';
			
		}
		
//		foreach ($filas as $fila) {
//			if ($fila[0] != 'N' && $fila[0] != '') {
///				$factura = explode('|', $fila);
//				$CodigoControl = new CodigoControl(
//					$factura[0],
//					$factura[1],
//					$factura[2],
///					str_replace('/', '', $factura[3]), // cambia la fecha 2007/08/10 a 20070810
//					round(str_replace(',', '.', $factura[4]), 0), // cambia , a . y redondea el importe de la factura 208.95 a 209
//					$factura[5]
//					);
//				echo $CodigoControl->generar();
//			}
//		}
//	fclose($handle);
?>