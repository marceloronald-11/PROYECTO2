<?php
ob_start(); 
include('2_numletras.php');
require('../php/conexion.php');
date_default_timezone_set('America/La_Paz');

$codarx = $_GET['codarx'];


$row = mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN articuloresu AS are ON ar.codresu=are.codresu LEFT JOIN clasificacion AS cla ON ar.codcla=cla.codcla LEFT JOIN ubicacion AS ubi ON ar.codubi=ubi.codubi  WHERE ar.codar='$codarx'");
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
.texto {border: 1px solid black;paddingt: 5px;border-radius: 4px;font-size: 10px}
.texto1 {paddingt: 5px;font-size: 10px}
	
	
 </style>


<?php
$nombreImagen = '../recursos/logintit.png';
$ima1 = "data:image/jpg;base64," . base64_encode(file_get_contents($nombreImagen));
?>



<table border="0" WIDTH="78%" class="arriba">
<tr><td width="25%" align="left"><img src="<?php echo $ima1 ?>" alt="rs" width="70px" height="70px"/></td>
	<td align="center" class="profo">FICHA DEL ARTICULO</td><td align="right" class="profo1">Maranata</td></tr>
</table>
<?php


 

$ttt=0.00;

//while ($row2 = mysqli_fetch_array($row)) {
//$xafavor=$row2['nombreper'];
//$xdr=$row2['celper'];
//	
////$ttt=$ttt+$row2['totimporte'];
////$fe1= date("d-m-Y", strtotime($row2['fechareg']) );
////$fe2= date("d-m-Y", strtotime($row2['entregareg']) );
////$tot21=$row2['totimporte'];
////$acuenta21=$row2['acuenta1'];
////$saldo21=$row2['saldo1'];
//
//}


?>
<!--<table border="0" cellspacing="1" cellpadding="1%" WIDTH="78%" class="deticket" >
<style>body { font-family: arial; font-size: 14px; }</style>
<tr><td class="cabeza" >Nombre</td><td class="cabeza">Celular</td><td class="cabeza">imagen</td>
<td class="cabeza">QR</td>-->
	
<table border="0" cellspacing="1" cellpadding="1%" WIDTH="100%" class="deticket" >
<style>body { font-family: arial; font-size: 14px; }</style>
<tr>
<td class="cabeza" width="9%">Articulo</td>	
<td class="cabeza" width="9%">Cuenta</td>	
<td class="cabeza" width="9%">Ubicacion</td>	
<td class="cabeza" width="9%">Color</td>
<td class="cabeza" width="9%">Material</td>	
<td class="cabeza" width="9%">Marca</td>	
<td class="cabeza" width="9%">Costo</td>	
<td class="cabeza" width="9%">Ingreso</td>	
<td class="cabeza" width="15%">Observ</td>	
	
<td class="cabeza" width="9%">QR</td>	
<?php
	$it=0;
	$ttt1=0;
while ($row22 = mysqli_fetch_array($row)) {
$it=$it+1;
$nombreImagen = $row22['qr'];
$ima1 = "data:image/jpg;base64," . base64_encode(file_get_contents($nombreImagen));	
//	
//$nombreImagen2 = $row22['qrlink'];
//$ima2 = "data:image/jpg;base64," . base64_encode(file_get_contents($nombreImagen2));		
//$ttt1+=$row22['totimporte'];
?>
 <tr ><td WIDTH="10%" align="center" class="texto"><?php echo $row22['detarticuloresu'] ?></td><td WIDTH="15%" class="texto"><?php echo $row22['detclasifica'] ?></td><td WIDTH="10%" align="center" class="texto"><?php echo $row22['detubicacion'] ?></td><td WIDTH="10%" align="center" class="texto"><?php echo $row22['color'] ?></td><td WIDTH="10%" align="center" class="texto"><?php echo $row22['material'] ?></td><td WIDTH="10%" align="center" class="texto"><?php echo $row22['marca'] ?></td><td WIDTH="10%" align="center" class="texto"><?php echo $row22['pneto'] ?></td><td WIDTH="10%" align="center" class="texto"><?php echo $row22['fechaing'] ?></td><td WIDTH="10%" align="center" class="texto"><?php echo $row22['observar'] ?></td><td class="texto" align="center"3
 ><img src=<?php echo $ima1 ; ?>  width="100px" height="100px"> </td> ';

 </tr>
	<tr ><td WIDTH="10%" align="right" colspan="10"  ><?php echo 'Codigo:'.$row22['codigo'] ?></td></tr>	 

	
<?php } 
	 
	 //$cambio = valorEnLetras($ttt);
	 
	 ?>
 
<!--</table>-->

<!--<table border="0" cellspacing="1" cellpadding="1%" WIDTH="78%" class="deticket" >
<tr><td align="left" colspan="6"  width="30%" align="right" class="texto"><?php //echo 'Total Bs.-'.' '. number_format($ttt1,2) ?></td></tr>
<tr><td align="left" colspan="6" class="texto1"><?php //echo 'Son:'.$cambio ?></td>
</tr>
</table>-->



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