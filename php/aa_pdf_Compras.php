<?php
if (!isset($_SESSION)) {session_start();}
ob_start(); 
include('2_numletras.php');
require('../php/conexion.php');
date_default_timezone_set('America/La_Paz');


$norden = $_GET['nordenx'];

//mysqli_query($conexion,"UPDATE movimtot SET imprimio='SI' WHERE norden='$norden'");

?>


<style type="text/css">
body { font-family: arial; font-size: 14px; }
#cabeza {color: blue; font-size: 15px; }
H2 { text-align: center;}
H1,H3 { text-align: right;}
.fa1 {font-family: arial; font-size: 13px ; text-align: center;}
.fa2 {font-family: arial; font-size: 17px font-style: italic; text-align: center;}
.fa3 {font-family: arial; font-size: 15px }
.fa4 {font-family: arial; font-size: 12px }
.fa5 {font-family: arial; font-size: 11px }
.fa6 {font-family: arial; font-size: 17px font-style: italic;color:#FF0000;padding-left: 190px;}
.empre {font-family: arial; font-size: 25px font-style: italic;color:#FF0000;padding-left: 190px;}
.bordeiz { border-left: 2px solid blue;}
.bordede {border-right: 2px solid blue;}
.bordearr {border-top: 2px solid blue;}
.bordeaba {border-bottom: 2px solid blue;}
.border {border: 1px solid black;padding-left: 10px;border-radius: 10px;}
.raya {border: 1px solid black;border-radius: 2px;}
.border2 {border: 2px solid black;border-radius: 25px;}
.border3 {border: 1px solid black;border-radius: 10px;}

.tablita {
    border-collapse: collapse;
    border: 1px solid gray;padding:3px;margin:0;
}

.norden {font-family: sans-serif; font-size: 16px;}
.ori {color: black; font-size: 15px; font-family: sans-serif; align:center; padding-left: 60px; }
.deticket1 {color: black; font-size: 13px; font-family: sans-serif; }

.tot { text-align: right font-family: arial; font-size: 14px;  background-color: rgba(237, 238, 238); padding-left:390px; padding-top:10px;padding-bottom:10px;}
.usu { text-align: right font-family: arial; font-size: 14px; padding-top:12px}
.control { text-align: right font-family: arial; font-size: 18px; padding-top:12px}
	
	
 </style>

<?php
$nombreImagen = '../recursos/jachalogo.jpg';
$ima1 = "data:image/jpg;base64," . base64_encode(file_get_contents($nombreImagen));




$row = mysqli_query($conexion,"SELECT * FROM movimtot AS mv LEFT JOIN usuarios AS u On mv.id_usu=u.id_usu  LEFT JOIN proveedor AS pvv ON mv.codsucx=pvv.codpv WHERE mv.norden='$norden'");
$ttt=0.00;
while ($row2 = mysqli_fetch_array($row)) {
$nordenx=$row2['norden'];
$afavorx=$row2['afavor'];
$nombusu=$row2['nomb_usu'];
$nompv=$row2['nombrepv'];
$ttt=$ttt+$row2['totimporte'];
	
	
$fe2= date("d-m-Y", strtotime($row2['fechato']) );

}
$cambio = valorEnLetras($ttt); 
?>
<tr ><td WIDTH="15%"  align="center" class="texto"><img src=<?php echo $ima1; ?>  width="250px" height="250px"> </td>';

 </tr>	

<table border="0" WIDTH="100%">
<tr><td width="20%"><img src=<?php echo $ima1; ?> alt="raul.webnet" width="90px" height="90px"/></td>
<td WIDTH="35%" class="fa1" >COMERCIAL MOISES E HIJOS<br>Calle 10 No 220 Zona Villa Dolores<br>Tel/fax 591-2-2812722 Cel.71957807<br> email: sirubbamoises@hotmail.com
<br>El Alto - Bolivia</td><td  class="border" width="25%"><p class="fa2">No Orden :<?php echo $nordenx; ?></p></td></tr>
</table>

<table  border="0"  WIDTH="100%" >
<tr><td width="70%" class="fa6"><h2>NOTA DE INGRESO</h2></td><td align="left" class="fa5">VENTA AL POR MAYOR Y MENOR CALIDAD GARANTIZADA</td></tr>
</table>

<table  border="0"  WIDTH="100%" class="border">

<tr><td>Fecha :</td><td align="left"><?php echo $fe2; ?></td></tr> 
<tr><td>Encargado :</td><td align="left"><?php echo $afavorx; ?></td>
<td>Proveedor:</td><td align="left"><?php echo $nompv; ?></td></tr>

</table>


<?php
$roww = mysqli_query($conexion,"SELECT * FROM movimdet WHERE norden='$norden'");
?>
<table border="0"  WIDTH="100%" class="tablita" >';
<tr class="raya"><td>CANT.</td><td>DETALLES</td><td>COSTO UNIT.</td><td>SUBTOTAL</td></tr>';
<?php
while ($row22 = mysqli_fetch_array($roww)) {
//$it=$it+1;
?>	
<tr ><td WIDTH="5%" align="center" class="tablita"><?php echo number_format($row22['cant'],0); ?></td><td WIDTH="30%" class="tablita"><?php echo $row22['descripdt'] ?></td><td WIDTH="7%" align="right" class="tablita"><?php echo $row22['precio']?></td><td WIDTH="10%" align="right" class="tablita"><?php echo number_format($row22['subtot'],2) ?></td>
</tr>
<?php } ?>

</table>

<table border="0"  WIDTH="100%" class="border3" >
<tr><td>SON:<?php echo $cambio ?></td><td align="right"  align="right">Total Bs.-</td><td align="right"><?php echo number_format($ttt,2) ?></td></tr>
</table>
<br><br><br>
<table border="0"  WIDTH="50%" class="borderc3" >
	<tr><td> </td><td> </td></td><td align="center">_____________________</td></tr>
<tr><td></td> <td></td> <td align="center"> Firma Encargado</td></tr>	
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
$dompdf->stream("recibo_".rand(10,10000).".pdf", array("Attachment" => false));


?>