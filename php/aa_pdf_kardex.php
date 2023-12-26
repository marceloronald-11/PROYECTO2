<?php
if (!isset($_SESSION)) {session_start();}

date_default_timezone_set('America/La_Paz');
include('2_numletras.php');
require('../php/conexion.php');
require_once ('../dompdf/dompdf_config.inc.php');

$codarx = $_GET['codarx'];


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
$registro = mysqli_query($conexion,"SELECT * FROM movimdet AS mv JOIN movimtot AS mt ON mv.norden=mt.norden WHERE mv.codar='$codarx'   ORDER BY mv.norden ASC");


$html ='<style>body { font-family: arial; font-size: 14px; }
#cabeza {color: blue; font-size: 15px; }
.bor {border: 1px solid black;padding: 2px;border-radius: 5px;font-family: arial; font-size: 13px;}
H2 { text-align: center;}
H1,H3 { text-align: right;}
.datos { text-align: left;}
.profo {font-family: arial; font-size: 15px font-style: italic;}
.lfactura {font-family: arial; font-size: 16px font-style: italic;}
.slogan {font-family: arial; font-size: 12px font-style: italic;}

.elcontrol {font-family: arial; font-size: 13px font-style: italic;}
.tick {font-family: arial; font-size: 25px;}
.norden {font-family: sans-serif; font-size: 14px;}
.deticket {color: black; font-size: 10px; font-family: sans-serif; }
.deticket1 {color: black; font-size: 13px; font-family: sans-serif; }

.tot { text-align: right font-family: arial; font-size: 14px;  background-color: rgba(237, 238, 238); padding-left:390px; padding-top:10px;padding-bottom:10px;}
.usu { text-align: right font-family: arial; font-size: 14px; padding-top:12px}
.control { text-align: right font-family: arial; font-size: 18px; padding-top:12px}
</style>' ;




$html .= '<table border="0" WIDTH="50%" class="arriba">';
$html .= '<tr><td width="30%"><img src="../recursos/jachalogo.jpg" alt="raul.webnet" width="80px" height="40px"/></td>';
$html .= '<tr><td align="center" class="lfactura">TARJETA DE KARDEX</td></tr>';

$html .= '</table>';

$html .= '<table border="1">
			            <tr><td colspan="3">'.$ddescrip.'</td></tr>
		</table><table>
						<tr>
			                <td width="4%" align="center" class="bor">Fecha</td>
			                <td width="4%" align="center" class="bor">No Orden</td>
			                <td width="11%" align="center" class="bor">Nombre</td>
			                <td width="8%" align="center" class="bor">Detalle</td>
							
			                <td width="8%" align="center" class="bor">Ingreso</td>
			                <td width="5%" align="center" class="bor">Costo Unit.</td>
			                <td width="7%" align="center" class="bor">Tot.Entrada</td>
							
			                <td width="5%" align="center" class="bor">Egreso</td>
			                <td width="5%" align="center" class="bor">Costo Unit.</td>
			                <td width="7%" align="center" class="bor">Tot.Salida</td>
							
							
							
							
			                <td width="5%" align="center" class="bor">Saldo</td>
			                <td width="5%" align="center" class="bor">Costo Unit.</td>
			                <td width="7%" align="center" class="bor">Tot.Saldo</td>
							
			            </tr>';



while($registro2 = mysqli_fetch_array($registro)){
		$fdia= date("d-m-Y", strtotime($registro2['fechadt']) );
		$tix=$registro2['tipo'];
	
			if($registro2['tmm']=='Ventas' ){
				//$costouu=($costouu1+($costouu1*0.30)) + (($costouu1+($costouu1*0.30)))*0.149425287;
				$costouu=$costouu1;
			}else{
				$costouu=$costouu1;
			}

	
		
		$html .='<tr>';
				if($registro2['fechadt']>="$desde" AND $registro2['fechadt']<="$hasta" ){
							$html .='<td align="center" class="bor">'.$fdia.'</td>
							<td align="center" class="bor">'.$registro2['norden'].'</td>
							<td class="bor">'.$registro2['afavor'].'</td>
							<td align="center" class="bor">'.$registro2['tmm'].'</td>';
				}
							
if($registro2['tipo']=='I'){
	$ti+=$registro2['cant'];
	if ($sw=0){$saldoa=$saldoant+$registro2['cant'];$saldoant=$saldoa;$sw=1;}else{$saldoa=$saldoant+$registro2['cant'];$saldoant=$saldoa;}
	if($registro2['fechadt']>="$desde" AND $registro2['fechadt']<="$hasta" ){
		
	$html .='<td WIDTH="9%" align="center" class="bor">'.number_format($registro2['cant'],0).'</td>';
	$html .='<td WIDTH="9%" align="center" class="bor">'.number_format($costouu,2).'</td>';
		$cosi=$costouu*$registro2['cant'];
	$html .='<td WIDTH="9%" align="right" class="bor">'.number_format($cosi,2).'</td>';
		
	$html .='<td WIDTH="9%" align="center" class="bor">'.''.'</td>';
	$html .='<td WIDTH="9%" align="center" class="bor">'.''.'</td>';
	$html .='<td WIDTH="9%" align="center" class="bor">'.''.'</td>';
	}
}else{
	$te+=$registro2['cant'];

	if ($sw=0){$saldoa=$saldoant-$registro2['cant'];$saldoant=$saldoa;$sw=1;}else{$saldoa=$saldoant-$registro2['cant'];$saldoant=$saldoa;}
	
	if($registro2['fechadt']>="$desde" AND $registro2['fechadt']<="$hasta" ){
	$html.='<td WIDTH="9%" align="center" class="bor">'.''.'</td>';
	$html.='<td WIDTH="9%" align="center" class="bor">'.''.'</td>';
	$html.='<td WIDTH="9%" align="center" class="bor">'.''.'</td>';		
	$html.='<td WIDTH="9%" align="center" class="bor">'.number_format($registro2['cant'],0).'</td>';
	$html.='<td WIDTH="9%" align="center" class="bor">'.number_format($costouu,2).'</td>';
		$totsal=$costouu*$registro2['cant'];
	$html.='<td WIDTH="9%" align="right" class="bor">'.number_format($totsal,2).'</td>';		
		
	}
}							
if($registro2['fechadt']>="$desde" AND $registro2['fechadt']<="$hasta" ){ 
	$html .= '<td WIDTH="5%" align="center" class="bor">'.number_format($saldoa,0).'</td>';
}
	if($tix=='I'){ //ingreso precio sino neto2
	$html .='<td WIDTH="5%" align="center" class="bor">'.number_format($costouu,2).'</td>';
	$cosi=$costouu*$saldoa;	
	$html .='<td WIDTH="9%" align="center" class="bor">'.number_format($cosi,2).'</td>';
		
	}else{
		
		$html .='<td WIDTH="9%" align="center" class="bor">'.number_format($costouu,2).'</td>';
		$totsal=$costouu*$saldoa;
		$html .= '<td WIDTH="9%" align="right" class="bor">'.number_format($totsal,2).'</td>';		
	}
	$html .='</tr>';		
	} ///do while	
        
$html .= '</table>';


 

$pdf = new DOMPDF();
 
$pdf->set_paper("A4", "landscape");
 
// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));
 
// Renderizamos el documento PDF.
$pdf->render();

$pdf->stream("kAREX_"."No_".$codarx."_".rand(10,1000).".pdf", array("Attachment" => false));




?>