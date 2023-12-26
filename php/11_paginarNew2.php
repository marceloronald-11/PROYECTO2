<?php
//if (!isset($_SESSION)) {session_start();}
//$codde=$_SESSION['depto'];

$iduu=$_POST['idu'];
$mess=$_POST['mess']; //idbco
$anioo=$_POST['anioo']; //idbco

	include('../php/conexion.php');
    $lista = '';
    $tabla = '';
$saldoant=0.00;
$saldoa=0;
$sw=0;
$ti=0.00;
$te=0.00;

//	$registro = mysql_query("SELECT * FROM diario WHERE idbco='$iduu' ");
  	$registro = mysql_query("SELECT * FROM diario WHERE idbco='$iduu'  ORDER BY fechadiario ASC");

  	$tabla = $tabla.'<table class="table table-striped table-bordered table-condensed table-hover">
			            <tr>
			                <td width="10%">Fecha</td>
			                <td width="9%">No Orden</td>
			                <td width="15%">Responsable</td>
			                <td width="35%">Detalle</td>
			                <td width="8%" align="center">Ingreso</td>
			                <td width="8%" align="center">Egreso</td>
			                <td width="10%" align="center">Saldo</td>

			            </tr>';
				
	while($registro2 = mysql_fetch_array($registro)){
		//if($registro2['tmv']=='ID'){$dtt='INGRESO';}else{$dtt='GASTOS';}
		$fdia= date("d-m-Y", strtotime($registro2['fechadiario']) );
		$xxm=substr($fdia, 3, 2);
		$xxa=substr($fdia, 6, 4);
		$tabla = $tabla.'<tr>';
				if($xxm=="$mess" AND $xxa=="$anioo" ){
							$tabla=$tabla.'<td>'.$fdia.'</td>
							<td align="center">'.$registro2['nrecibo'].'</td>
							<td>'.$registro2['responsable'].'</td>
							<td>'.$registro2['detalle'].'</td>';
				}
							
if($registro2['tmv']=='ID'){
	$ti+=$registro2['importe'];
	if ($sw=0){$saldoa=$saldoant+$registro2['importe'];$saldoant=$saldoa;$sw=1;}else{$saldoa=$saldoant+$registro2['importe'];$saldoant=$saldoa;}
	if($xxm=="$mess" AND $xxa=="$anioo" ){
	$tabla = $tabla.='<td WIDTH="9%" align="right">'.number_format($registro2['importe'],2).'</td>';
	$tabla = $tabla.='<td WIDTH="9%" align="right">'.''.'</td>';
	}
}else{
	$te+=$registro2['importe'];

	if ($sw=0){$saldoa=$saldoant-$registro2['importe'];$saldoant=$saldoa;$sw=1;}else{$saldoa=$saldoant-$registro2['importe'];$saldoant=$saldoa;}
	if($xxm=="$mess" AND $xxa=="$anioo" ){
	$tabla = $tabla.'<td WIDTH="9%" align="right">'.''.'</td>';	
	$tabla = $tabla.'<td WIDTH="9%" align="right">'.number_format($registro2['importe'],2).'</td>';
	}
}							
if($xxm=="$mess" AND $xxa=="$anioo" ){ 
	$tabla = $tabla.'<td WIDTH="9%" align="right">'.number_format($saldoa,2).'</td>';							
	$tabla=$tabla.'<td>  <a href="javascript:ImprimeRecibo('.$registro2['coddia'].');" ><img src="../recursos/factura.png" data-toggle="tooltip" title="Imprimir Recibo"></a>  </td>';							
}
	$tabla = $tabla.'</tr>';		
	} ///do while
        
$tabla=$tabla.'<td><a href="javascript:Recargar();" ><img src="../recursos/cancelarg.png" data-toggle="tooltip" title="SALIR DEL MODULO"> CERRAR</a></td>';

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>