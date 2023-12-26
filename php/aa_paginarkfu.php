<?php
if (!isset($_SESSION)) {session_start();}
$codsucx=$_SESSION['codsuc'];
//data:'codarx='+codarx+'&desde='+desde+'&hasta='+hasta,
$codarx=$_POST['codarx'];
//$desde=$_POST['desde']; //idbco
//$hasta=$_POST['hasta']; //idbco
date_default_timezone_set('America/La_Paz');

$desde='2020/01/01';
$hasta='2027/01/01';
	include('../php/conexion.php');
    $lista = '';
    $tabla = '';
$saldoant=0.00;
$saldoa=0;
$sw=0;
$ti=0.00;
$te=0.00;

  	$re4 = mysqli_query($conexion,"SELECT * FROM articulos  WHERE codar='$codarx' ");
		while($rexx4 = mysqli_fetch_array($re4)){
			//$costouu=$rexx4['pneto']*0.87;
			$costouu1=$rexx4['pneto'];
			//$tmmx=$rexx4['tmm'];

			//if($rexx4['tmm']=='Ventas'){
//				$costouu=$rexx4['pneto']*0.87;
//			}
			
		}



  	$re = mysqli_query($conexion,"SELECT * FROM movimdet AS mv JOIN movimtot AS mt ON mv.norden=mt.norden WHERE mv.codar='$codarx'  ORDER BY mv.norden ASC");
		while($rexx = mysqli_fetch_array($re)){
			$ddescrip=$rexx['descripdt'];
		}

  	$registro = mysqli_query($conexion,"SELECT * FROM movimdet AS mv JOIN movimtot AS mt ON mv.norden=mt.norden WHERE mv.codar='$codarx' AND mv.codsuc='$codsucx'   ORDER BY mv.norden ASC");

  	$tabla = $tabla.'<table class="table table-striped table-bordered table-condensed table-hove titi">
			            <tr><td colspan="3">'.$ddescrip.'</td></tr>
						<tr>
			                <td width="9%" align="center">Fecha</td>
			                <td width="5%" align="center">No Orden</td>
			                <td width="11%" align="center">Nombre</td>
			                <td width="8" align="center">Detalle</td>
							
			                <td width="8%" align="center">Ingreso</td>
			                <td width="5%" align="center">Costo Unit.</td>
			                <td width="7%" align="center">Tot.Entrada</td>
							
			                <td width="5%" align="center">Egreso</td>
			                <td width="5%" align="center">Costo Unit.</td>
			                <td width="7%" align="center">Tot.Salida</td>
							
							
							
							
			                <td width="5%" align="center">Saldo</td>
			                <td width="5%" align="center">Costo Unit.</td>
			                <td width="7%" align="center">Tot.Saldo</td>
							
			            </tr>';

while($registro2 = mysqli_fetch_array($registro)){
		$fdia= date("d-m-Y", strtotime($registro2['fechadt']) );
		$tix=$registro2['tipo'];
		$tmmx=$registro2['tmm'];
	
			if($registro2['tmm']=='Ventas' ){
				$costouu=($costouu1+($costouu1*0.30)) + (($costouu1+($costouu1*0.30)))*0.149425287;
			}else{
				$costouu=$costouu1;
			}

	
		
		$tabla = $tabla.'<tr>';
				if($registro2['fechadt']>="$desde" AND $registro2['fechadt']<="$hasta" ){
							$tabla=$tabla.'<td align="center">'.$fdia.'</td>
							<td align="center">'.$registro2['norden'].'</td>
							<td>'.$registro2['afavor'].'</td>
							<td align="center">'.$registro2['tmm'].'</td>';
				}
							
if($registro2['tipo']=='I' OR $registro2['tmm']=='Envio'){
	$ti+=$registro2['cant'];
	if ($sw=0){$saldoa=$saldoant+$registro2['cant'];$saldoant=$saldoa;$sw=1;}else{$saldoa=$saldoant+$registro2['cant'];$saldoant=$saldoa;}
	if($registro2['fechadt']>="$desde" AND $registro2['fechadt']<="$hasta" ){
		
	$tabla = $tabla.='<td WIDTH="9%" align="center">'.number_format($registro2['cant'],0).'</td>';
	$tabla = $tabla.='<td WIDTH="9%" align="center">'.number_format($costouu,2).'</td>';
		$cosi=$costouu*$registro2['cant'];
	$tabla = $tabla.='<td WIDTH="9%" align="right">'.number_format($cosi,2).'</td>';
		
	$tabla = $tabla.='<td WIDTH="9%" align="center">'.''.'</td>';
	$tabla = $tabla.='<td WIDTH="9%" align="center">'.''.'</td>';
	$tabla = $tabla.='<td WIDTH="9%" align="center">'.''.'</td>';
	}
}else{
	$te+=$registro2['cant'];

	if ($sw=0){$saldoa=$saldoant-$registro2['cant'];$saldoant=$saldoa;$sw=1;}else{$saldoa=$saldoant-$registro2['cant'];$saldoant=$saldoa;
	}
	if($saldoa<0){
		$saldoa=$saldoa*(-1);
	}
	
	
	if($registro2['fechadt']>="$desde" AND $registro2['fechadt']<="$hasta" ){
	$tabla = $tabla.'<td WIDTH="9%" align="center">'.''.'</td>';
	$tabla = $tabla.'<td WIDTH="9%" align="center">'.''.'</td>';
	$tabla = $tabla.'<td WIDTH="9%" align="center">'.''.'</td>';		
	$tabla = $tabla.'<td WIDTH="9%" align="center">'.number_format($registro2['cant'],0).'</td>';
	$tabla = $tabla.='<td WIDTH="9%" align="center">'.number_format($costouu,2).'</td>';
		$totsal=$costouu*$registro2['cant'];
	$tabla = $tabla.='<td WIDTH="9%" align="right">'.number_format($totsal,2).'</td>';		
		
	}
}							
if($registro2['fechadt']>="$desde" AND $registro2['fechadt']<="$hasta" ){ 
	$tabla = $tabla.'<td WIDTH="5%" align="center">'.number_format($saldoa,0).'</td>';
}
	if($tix=='I' OR $tmmx=='Envio' ){ //ingreso precio sino neto2
	$tabla = $tabla.'<td WIDTH="5%" align="center">'.number_format($costouu,2).'</td>';
	$cosi=$costouu*$saldoa;	
	$tabla = $tabla.='<td WIDTH="9%" align="center">'.number_format($cosi,2).'</td>';
		
	}else{
		
		$tabla = $tabla.='<td WIDTH="9%" align="center">'.number_format($costouu,2).'</td>';
		$totsal=$costouu*$saldoa;
		$tabla = $tabla.='<td WIDTH="9%" align="right">'.number_format($totsal,2).'</td>';		
	}
	$tabla = $tabla.'</tr>';		
	} ///do while	
        
$tabla=$tabla.'<tr><td><a href="javascript:Recargar();" ><img src="../recursos/cancelarg.png" data-toggle="tooltip" title="SALIR DEL MODULO"> CERRAR</a></td></tr>';
$tabla = $tabla.'</table>';








    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>