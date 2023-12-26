<?php
if (!isset($_SESSION)) {session_start();}
ob_start(); 
//include('2_numletras.php');
require('../php/conexion.php');
date_default_timezone_set('America/La_Paz');

$codarx = $_GET['codarx'];

$desde='2020/01/01';
$hasta='2027/01/01';
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
		}

$re = mysqli_query($conexion,"SELECT * FROM movimdet AS mv JOIN movimtot AS mt ON mv.norden=mt.norden WHERE mv.codar='$codarx'  ORDER BY mv.norden ASC");
		while($rexx = mysqli_fetch_array($re)){
			$ddescrip=$rexx['descripdt'];
		}

$registro = mysqli_query($conexion,"SELECT * FROM movimdet AS mv JOIN movimtot AS mt ON mv.norden=mt.norden WHERE mv.codar='$codarx'   ORDER BY mv.codt ASC");

?>

<style type="text/css">
body { font-family: arial; font-size: 14px; }
#cabeza {color: blue; font-size: 15px; }
H2 { text-align: center;}
H1,H3 { text-align: right;}
.datos { text-align: left;}
.profo {font-family: arial; font-size: 20px; color: #CD0A0D;}
.profo1 {font-family: arial; font-size: 9px; }
.slogan {font-family: arial; font-size: 12px; font-style: italic;}
.tot { text-align: right font-family: arial; font-size: 14px;  background-color: rgba(237, 238, 238); padding-left:390px; padding-top:10px;padding-bottom:10px;}
.tick { text-align: left; font-family: arial; font-size: 11px;}	
.border {border: 1px solid black;padding-left: 9px;border-radius: 4px;}
.border2 {border: 1px solid black;padding-left: 9px;border-radius: 4px;background-color: #F7E8AA;}
.cabeza {border: 1px solid black;paddingt: 5px;border-radius: 4px;background-color: #F7E8AA;font-size: 13px;text-align: center;}
.texto {border: 1px solid black;paddingt: 3px;border-radius: 4px;font-size: 10px;font-family: arial;}
.texto1 {paddingt: 5px;font-size: 12px}
	
	
 </style>

<?php
$nombreImagen = '../recursos/jachalogo.jpg';
$ima1 = "data:image/jpg;base64," . base64_encode(file_get_contents($nombreImagen));
?>
<table border="0" WIDTH="78%" class="arriba">
<tr><td width="25%" align="left"><img src="<?php echo $ima1 ?>" alt="rs" width="170px" height="70px"/></td>
	<td align="center" class="profo">TARJETA DE KARDEX</td><td align="right" class="profo1">La Paz</td></tr>
</table>


<table border="1">
     <tr><td colspan="3"><?php echo $ddescrip; ?></td></tr>
</table >

<table border="1" class="texto">
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
			            </tr>
<?php
while($registro2 = mysqli_fetch_array($registro)){
		$fdia= date("d-m-Y", strtotime($registro2['fechadt']) );
		$tix=$registro2['tipo'];
	
			if($registro2['tmm']=='Ventas' ){
				//$costouu=($costouu1+($costouu1*0.30)) + (($costouu1+($costouu1*0.30)))*0.149425287;
				$costouu=$registro2['precio'];//$costouu1;
			}else{
				$costouu=$registro2['precio'];//$costouu1;
			} ?>

	
		
		<tr>
			<?php	if($registro2['fechadt']>="$desde" AND $registro2['fechadt']<="$hasta" ){ ?>
							<td align="center"><?php echo $fdia; ?></td>
							<td align="center"><?php echo $registro2['norden']; ?></td>
							<td><?php echo $registro2['afavor']; ?></td>
							<td align="center"><?php echo $registro2['tmm']; ?></td>
				<?php }
							
if($registro2['tipo']=='I'){
	$ti+=$registro2['cant'];
	if ($sw=0){$saldoa=$saldoant+$registro2['cant'];$saldoant=$saldoa;$sw=1;}else{$saldoa=$saldoant+$registro2['cant'];$saldoant=$saldoa;}
	if($registro2['fechadt']>="$desde" AND $registro2['fechadt']<="$hasta" ){ ?>
		
	<td WIDTH="9%" align="center"><?php echo number_format($registro2['cant'],0); ?></td>
	<td WIDTH="9%" align="center"><?php echo number_format($costouu,2); ?></td>
		<?php $cosi=$costouu*$registro2['cant']; ?>
	<td WIDTH="9%" align="right"><?php echo number_format($cosi,2); ?></td>
		
	<td WIDTH="9%" align="center"><?php echo ' '; ?></td>'
	<td WIDTH="9%" align="center"><?php echo ' '; ?></td>'
	<td WIDTH="9%" align="center"><?php echo ' '; ?></td>'
	<?php }
}else{
	$te+=$registro2['cant'];

	if ($sw=0){$saldoa=$saldoant-$registro2['cant'];$saldoant=$saldoa;$sw=1;}else{$saldoa=$saldoant-$registro2['cant'];$saldoant=$saldoa;}
	
	if($registro2['fechadt']>="$desde" AND $registro2['fechadt']<="$hasta" ){ ?>
	<td WIDTH="9%" align="center"><?php echo ' '; ?></td>
	<td WIDTH="9%" align="center"><?php echo ' '; ?></td>
	<td WIDTH="9%" align="center"><?php echo ' '; ?></td>		
	<td WIDTH="9%" align="center"><?php echo number_format($registro2['cant'],0); ?></td>
	<td WIDTH="9%" align="center"><?php echo number_format($costouu,2); ?></td>
		<?php $totsal=$costouu*$registro2['cant']; ?>
	<td WIDTH="9%" align="right"><?php echo number_format($totsal,2); ?></td>		
<?php		
	}
}							
if($registro2['fechadt']>="$desde" AND $registro2['fechadt']<="$hasta" ){ ?>
	<td WIDTH="5%" align="center"><?php echo number_format($saldoa,0); ?></td>
<?php }
	if($tix=='I'){ ?>
	<td WIDTH="5%" align="center"><?php echo number_format($costouu,2); ?></td>
	<?php $cosi=$costouu*$saldoa; ?>
	<td WIDTH="9%" align="center"><?php echo number_format($cosi,2); ?></td>
		
	<?php }else{ ?>
		
		<td WIDTH="9%" align="center"><?php echo number_format($costouu,2); ?></td>
		<?php $totsal=$costouu*$saldoa; ?>
		<td WIDTH="9%" align="right"><?php echo number_format($totsal,2); ?></td>		
	<?php } ?>
	</tr>		
	<?php } ?> 	

        
</table>

	




<?php
require '../vendor/autoload.php';

use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->set_paper('A4');
$dompdf->render();
$pdf = $dompdf->output();
$filename = "Venta.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream("dom_".rand(10,10000).".pdf", array("Attachment" => false));


?>