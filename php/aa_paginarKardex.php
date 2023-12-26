<?php
if (!isset($_SESSION)) {session_start();}
$codsucx=$_SESSION['codsuc'];

$codarx=$_POST['codarx'];
//$desde=$_POST['desde']; //idbco
//$hasta=$_POST['hasta']; //idbco
$desde='2019/01/01';
$hasta='2022/01/01';
	include('../php/conexion.php');
    $lista = '';
    $tabla = '';
$saldoant=0.00;
$saldoa=0;
$sw=0;
$ti=0.00;
$te=0.00;

//	$registro = mysql_query("SELECT * FROM diario WHERE idbco='$iduu' ");
  	$re = mysqli_query($conexion,"SELECT * FROM movimdet AS mv JOIN movimtot AS mt ON mv.norden=mt.norden WHERE mv.codar='$codarx'  ORDER BY mv.norden ASC");
		while($rexx = mysqli_fetch_array($re)){
			$ddescrip=$rexx['descripdt'];
		}

  	$registro = mysqli_query($conexion,"SELECT * FROM movimdet AS mv JOIN movimtot AS mt ON mv.norden=mt.norden WHERE mv.codar='$codarx' AND mv.codsucx='1'   ORDER BY mv.norden ASC");

  	$tabla = $tabla.'<table class="table table-striped table-bordered table-condensed table-hove titi">
			            <tr><td colspan="3">'.$ddescrip.'</td></tr>
						<tr>
			                <td width="10%">Fecha</td>
			                <td width="9%">No Orden</td>
			                <td width="15%">Responsable</td>
			                <td width="8%" align="center">Ingreso</td>
			                <td width="8%" align="center">Egreso</td>
			                <td width="10%" align="center">Saldo</td>
			            </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
		$fdia= date("d-m-Y", strtotime($registro2['fechadt']) );
		$tabla = $tabla.'<tr>';
				if($registro2['fechadt']>="$desde" AND $registro2['fechadt']<="$hasta" ){
							$tabla=$tabla.'<td>'.$fdia.'</td>
							<td align="center">'.$registro2['norden'].'</td>
							<td>'.$registro2['afavor'].'</td>';
				}
							
if($registro2['tipo']=='I'){
	$ti+=$registro2['cant'];
	if ($sw=0){$saldoa=$saldoant+$registro2['cant'];$saldoant=$saldoa;$sw=1;}else{$saldoa=$saldoant+$registro2['cant'];$saldoant=$saldoa;}
	if($registro2['fechadt']>="$desde" AND $registro2['fechadt']<="$hasta" ){
	$tabla = $tabla.='<td WIDTH="9%" align="right">'.number_format($registro2['cant'],0).'</td>';
	$tabla = $tabla.='<td WIDTH="9%" align="right">'.''.'</td>';
	}
}else{
	$te+=$registro2['cant'];

	if ($sw=0){$saldoa=$saldoant-$registro2['cant'];$saldoant=$saldoa;$sw=1;}else{$saldoa=$saldoant-$registro2['cant'];$saldoant=$saldoa;}
	if($registro2['fechadt']>="$desde" AND $registro2['fechadt']<="$hasta" ){
	$tabla = $tabla.'<td WIDTH="9%" align="right">'.''.'</td>';	
	$tabla = $tabla.'<td WIDTH="9%" align="right">'.number_format($registro2['cant'],0).'</td>';
	}
}							
if($registro2['fechadt']>="$desde" AND $registro2['fechadt']<="$hasta" ){ 
	$tabla = $tabla.'<td WIDTH="9%" align="right">'.number_format($saldoa,0).'</td>';							
}
	$tabla = $tabla.'</tr>';		
	} ///do while
        
$tabla = $tabla.'</table>';










//$regg = mysqli_query($conexion,"SELECT * FROM lotes WHERE codme='$codarx'");
//
//$tabla = $tabla.'<table class="table table-striped table-bordered table-condensed table-hove titi">
//			            <tr><td colspan="3">LOTES :'.$ddescrip.'</td></tr>
//						<tr>
//			                <td width="10%">Fecha</td>
//			                <td width="9%">No Orden</td>
//			                <td width="15%">Saldo</td>
//			            </tr>';
//$tr=0;
//while($reg2 = mysqli_fetch_array($regg)){
//	$tr+=$reg2['cantlot'];
//		$tabla = $tabla.'<tr>
//							<td>'.$reg2['fechalot'].'</td>
//							<td align="center">'.$reg2['norden'].'</td>
//							<td align="right">'.$reg2['cantlot'].'</td></tr>';
//
//}
//$tabla = $tabla.'<tr><td colspan="2">Totales </td><td align="right">'.$tr.'</td></tr>';
//$tabla=$tabla.'<tr><td><a href="javascript:Recargar();" ><img src="../recursos/cancelarg.png" data-toggle="tooltip" title="SALIR DEL MODULO"> CERRAR</a></td></tr>';
//
//    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>