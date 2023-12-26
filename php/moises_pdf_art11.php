<?php
ob_start(); 
require('../php/conexion.php');
date_default_timezone_set('America/La_Paz');

$codarx = $_GET['codarx'];


//$row = mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN grupo AS gru ON ar.codgru=gru.codgru LEFT JOIN marca AS mar ON ar.codmar=mar.codmar LEFT JOIN tipo AS ti ON ar.codti=ti.codti  WHERE ar.codar='$codarx'");
$row = mysqli_query($conexion,"SELECT * FROM articulos   WHERE codar='$codarx'");

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
.cabeza {border: 1px solid black;paddingt: 5px;border-radius: 4px;background-color:#31CB5F;font-size: 13px;text-align: center;}
.texto {border: 1px solid black;paddingt: 5px;border-radius: 4px;font-size: 10px}
.texto1 {paddingt: 5px;font-size: 10px}
	
	
 </style>


<?php
//$nombreImagen = '../recursos/logoetn.jpg';
//$ima1 = "data:image/jpg;base64," . base64_encode(file_get_contents($nombreImagen));
//$ttt=0.00;
?>


<table border="0" cellspacing="1" cellpadding="1%" width="30%" class="deticket" >
<style>body { font-family: arial; font-size: 14px; }</style>
<tr>

<td class="cabeza">CODIGO QR</td><td class="cabeza">IMAGEN</td>	
<?php
	$it=0;
	$ttt1=0;
while ($row22 = mysqli_fetch_array($row)) {
$it=$it+1;
$nombreImagen = $row22['qr'];
$ima1 = "data:image/jpg;base64," . base64_encode(file_get_contents($nombreImagen));	
	
	
if(is_null($row22['fotoar'])){
	$fotoo='../fotos/fondo.jpg';
	$nombreImagen2 = $fotoo;
$ima2 = "data:image/jpg;base64," . base64_encode(file_get_contents($nombreImagen2));
	}else{
	$fotoo=$row22['fotoar'];
	$nombreImagen2 = $fotoo;
$ima2 = "data:image/jpg;base64," . base64_encode(file_get_contents($nombreImagen2));
	}
	
		
	
	
?>
 <tr ><td class="texto" align="center" ><img src=<?php echo $ima1 ; ?>  width="200px" height="200px"> </td> 
 
<td class="texto" align="center" ><img src=<?php echo $ima2 ; ?>  width="200px" height="200px"> </td> 
  </tr>	
		 

	
<?php } ?>
	 




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