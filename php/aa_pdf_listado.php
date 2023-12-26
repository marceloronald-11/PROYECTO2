<?php
if (!isset($_SESSION)) {session_start();}
ob_start(); 
require('../php/conexion.php');
date_default_timezone_set('America/La_Paz');

?>


<style type="text/css">
body { font-family: arial; font-size: 14px; }
#cabeza {color: blue; font-size: 15px; }
H2 { text-align: center;}
H1,H3 { text-align: right;}
.fa1 {font-family: arial; font-size: 13px ; text-align: center;}
.fa6 {font-family: arial; font-size: 17px font-style: italic;color:#FF0000;padding-left: 190px;}
.empre {font-family: arial; font-size: 25px font-style: italic;color:#FF0000;padding-left: 190px;}
.bor {border: 1px solid black;padding: 1px;border-radius: 5px;text-align: center;}
.borr {border: 1px solid black;padding: 1px;border-radius: 5px;font-family: arial; font-size: 12px;}
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



?>
<tr ><td WIDTH="15%"  align="center" class="texto"><img src=<?php echo $ima1; ?>  width="250px" height="200px"> </td>';

 </tr>	

<table border="0" WIDTH="100%">
<tr><td width="20%"><img src=<?php echo $ima1; ?> alt="raul.webnet" width="90px" height="90px"/></td>
<td WIDTH="35%" class="fa1" >COMERCIAL MOISES E HIJOS<br>Calle 10 No 220 Zona Villa Dolores<br>Tel/fax 591-2-2812722 Cel.71957807<br> email: sirubbamoises@hotmail.com
<br>El Alto - Bolivia</td><td  class="borderc" width="25%"></td></tr>
</table>
<!--
<table  border="0"  WIDTH="100%" >
<tr><td width="70%" class="fa6"><h2>NOTA DE INGRESO</h2></td><td align="left" class="fa5">VENTA AL POR MAYOR Y MENOR CALIDAD GARANTIZADA</td></tr>
</table>-->




<?php
$roww = mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN grupo  AS gru ON ar.codgru=gru.codgru LEFT JOIN marca AS mar ON ar.codmar=mar.codmar LEFT JOIN tipo AS ti ON ar.codti= ti.codti");
?>
<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="12%" align="center" class="bor">Descripcion</td>
			                <td width="7%" align="center" class="bor">Grupo</td>
			                <td width="7%" align="center" class="bor">Marca</td>
			                <td width="7%" align="center" class="bor">Tipo</td>
			                <td width="7%" align="center" class="bor">Serie</td>
			                <td width="7%" align="center" class="bor">Precio Vta</td>
			                <td width="5%" align="center" class="bor">Saldo</td>
			                <td width="5%" align="center" class="bor">Stock Min.</td>
			            </tr>
<?php
while ($registro2 = mysqli_fetch_array($roww)) {
//$it=$it+1;
?>	
<tr>
		<td align="center" class="borr"><?php echo $registro2['descripar']; ?></td>
							<td align="center" class="borr"><?php echo $registro2['detgrupo']; ?></td>
							<td align="center" class="borr"><?php echo $registro2['detmarca']; ?></td>
							<td align="center" class="borr"><?php echo $registro2['dettipo']; ?></td>
							<td align="center" class="borr"><?php echo $registro2['serie']; ?></td>
							<td align="right" class="borr"><?php echo $registro2['pvp']; ?></td>
							<td align="center" class="borr"><?php echo $registro2['saldo']; ?></td>
			<td align="center" class="borr"><?php echo $registro2['stockmin']; ?></td>
	
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
$dompdf->stream("recibo_".rand(10,10000).".pdf", array("Attachment" => false));


?>