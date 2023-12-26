<?php
if (!isset($_SESSION)) {session_start();}
//$codsucx=1;//$_SESSION['codsuc'];


include('2_numletras.php');
require('../php/conexion.php');
require_once ('../dompdf/dompdf_config.inc.php');

$codcrex = $_GET['codcrex'];
$nordenx = $_GET['nordenx'];

//mysqli_query($conexion,"UPDATE creditos  WHERE codcre='$codcrex'");

$html ='<style>body { font-family: arial; font-size: 14px; }
#cabeza {color: blue; font-size: 15px; }
H2 { text-align: center;}
H1,H3 { text-align: right;}
.fa1 {font-family: arial; font-size: 10px ;}
.fa2 {font-family: arial; font-size: 17px font-style: italic;}
.fa3 {font-family: arial; font-size: 15px }
.fa4 {font-family: arial; font-size: 12px }
.fa5 {font-family: arial; font-size: 11px }
.fa6 {font-family: arial; font-size: 17px font-style: italic;color:#FF0000;padding-left: 190px;}

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
</style>' ;



$row = mysqli_query($conexion,"SELECT * FROM movimtot WHERE norden='$nordenx'");
$ttt=0.00;
while ($row2 = mysqli_fetch_array($row)) {
$xnordenmv=$row2['norden'];
$xafavor=$row2['afavor'];
$ttt=$ttt+$row2['totimporte'];
$fe2= date("d-m-Y", strtotime($row2['fechato']) );
}
$cambio = valorEnLetras($ttt); 



$html .= '<table border="0" WIDTH="100%">';
$html .= '<tr><td width="20%"><img src="../recursos/jachalogo.jpg" alt="raul.webnet" width="100px" height="50px"/></td>
<td WIDTH="35%" class="fa1" >DE:ALBERTO MANO GONZALES <br>CASA MATRIZ <br> AV. Tomas de Lezo Nro.251 Z/Barrio Santa Rosa
Uv:.027 Mza:027. TELF.: 3 21 3827  - CEL.: 768 85970
<br>SANTA CRUZ - BOLIVIA</td><td  class="border" width="25%" align="center"><br>No Orden :'.$xnordenmv.'</td></tr>';
$html .= '</table>';

$html .= '<table  border="0"  WIDTH="100%" >';
$html .= '<tr><td width="70%" class="fa6" ><h2>NOTA DE VENTA</h2></td><td align="center" class="fa5">CREDITO</td></tr>'; 
$html .= '</table>';


$html .= '<table  border="0"  WIDTH="100%" class="border">';

$html .= '<tr><td>Fecha :</td><td align="left">'.$fe2.'</td></tr>'; 
$html .= '<tr><td>Sr(es) :</td><td align="left">'.$xafavor.'</td>';
$html .= '</table>';


$roww = mysqli_query($conexion,"SELECT * FROM movimdet WHERE norden='$nordenx'");

$html .= '<table border="0"  WIDTH="100%" class="tablita" >';
$html .='<style>body { font-family: arial; font-size: 14px; }</style>' ;
$html .= '<tr class="raya"><th>CANT.</th><th>DETALLES</th><th>P.UNIT.</th><th>SUBTOTAL</th></tr>';
$it=0;
while ($row22 = mysqli_fetch_array($roww)) {
$it=$it+1;
$html .= '<tr ><td WIDTH="5%" align="center" class="tablita">'.number_format($row22['cant'],0).'</td><td WIDTH="30%" class="tablita">'.$row22['descripdt'].'</td><td WIDTH="7%" align="right" class="tablita">'.$row22['precio'].'</td><td WIDTH="10%" align="right" class="tablita">'.number_format($row22['subtot'],2).'</td>';
$html .= '</tr>';
}

$html .= '</table>';
//
$html .= '<table border="0"  WIDTH="100%" class="border3" >';
$html .= '<tr><td>SON:'.$cambio.'</td><td align="right"  align="right">Total Bs.-</td><td align="right">'.number_format($ttt,2).'</td></tr>';
$html .= '</table>';






$r1 = mysqli_query($conexion,"SELECT * FROM creditospagos AS cr LEFT JOIN usuarios AS us ON cr.id_usu=us.id_usu WHERE cr.nordencre='$nordenx'");
$html .= '<h2>PAGOS</h2>';
$html .= '<table border="0"  WIDTH="100%" class="tablita" >';
$html .='<style>body { font-family: arial; font-size: 14px; }</style>' ;
$html .= '<tr class="raya"><th>Fecha.</th><th>Operador</th><th>Importe</th></tr>';
$t7=0;
while ($r2 = mysqli_fetch_array($r1)) {
$t7=$t7+$r2['importepg'];
$html .= '<tr ><td WIDTH="5%" align="center" class="tablita">'.$r2['fechapg'].'</td><td WIDTH="30%" class="tablita">'.$r2['nomb_usu'].'</td><td WIDTH="10%" align="right" class="tablita">'.number_format($r2['importepg'],2).'</td>';
$html .= '</tr>';
}
$html .= '<tr><td colspan="2" align="center">Total Pagos :</td><td class="tablita"  align="right">'.number_format($t7,2).'</td></tr>';
$salx=$ttt-$t7;
$html .= '<tr><td colspan="2" align="center">Saldo :</td><td class="tablita"  align="right">'.number_format($salx,2).'</td></tr>';

$html .= '</table>';





$pdf = new DOMPDF();
 
$pdf->set_paper("A4", "portrait");
// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));
// Renderizamos el documento PDF.
$pdf->render();
$pdf->stream("Orden_"."No_".$nrofactura."_".rand(10,1000).".pdf", array("Attachment" => false));


?>