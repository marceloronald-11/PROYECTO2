<?php
include('2_numletras.php');
require('../php/conexion.php');
require_once ('../dompdf/dompdf_config.inc.php');

$codplanx = $_GET['codplanx'];

//mysqli_query($conexion,"UPDATE movimtot SET imprimio='SI' WHERE norden='$norden'");




$row = mysqli_query($conexion,"SELECT * FROM planpagos AS pl LEFT JOIN clientes AS cli ON pl.codcli=cli.codcli LEFT JOIN solicitudes AS so ON pl.codsoli=so.codsoli  WHERE pl.codplan='$codplanx'");

$html ='<style>body { font-family: arial; font-size: 14px; }
#cabeza {color: blue; font-size: 15px; }
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
$html .= '<tr><td width="30%"><img src="../recursos/jachalogo.jpg" alt="raul.webnet" width="40px" height="40px"/></td>';
$html .= '<tr><td align="center" class="profo">COOPERATIVA MAYA</td></tr><tr><td align="center">Boleta de Pago</td></tr>';
//$html .= '<tr><td align="center" class="lfactura">NOTA DE INGRESO</td></tr>';

$html .= '</table>';
 
//$html .='<hr></hr>';
$ttt=0.00;

while ($row2 = mysqli_fetch_array($row)) {
//$xnordenmv=$row2['nombrecli'];
//$xafavor=$row2['cicli'];
//$ttt=$ttt+$row2['totimporte'];
//$fe2= date("d-m-Y", strtotime($row2['fechato']) );

}
//$cambio = valorEnLetras($ttt); 
//
//
//$roww = mysqli_query($conexion,"SELECT * FROM movimdet WHERE norden='$norden'");
//
//$html .= '<table  border="0"  WIDTH="70%" class="deticket1">';
//$html .= '<tr><td >No Orden :</td><td align="left" class="tick">'.$xnordenmv.'</td></tr>';
//$html .= '<tr><td>Fecha :</td><td align="left">'.$fe2.'</td></tr>'; 
//$html .= '<tr><td>Sr(a) :</td><td align="left">'.$xafavor.'</td></tr>';
//$html .= '</table>';
//
//$html .= '<table border="1" cellspacing="1" cellpadding="1%" WIDTH="78%" class="deticket" >';
//
//$html .= '<tr><th>Cant.</th><th>Concepto</th><th>Precio</th><th>Total</th>';
//
//while ($row22 = mysqli_fetch_array($roww)) {
////$it=$it+1;
//$html .= '<tr ><td WIDTH="5%" align="center">'.number_format($row22['cant'],0).'</td><td WIDTH="30%">'.$row22['descripdt'].'</td><td WIDTH="7%" align="right">'.$row22['precio'].'</td><td WIDTH="10%" align="right">'.$row22['subtot'].'</td>';
//$html .= '</tr>';
//}
//
//$html .= '</table>';
//
//$html .= '<table border="0" cellspacing="1" cellpadding="1%" WIDTH="70%" class="deticket" >';
//$html .= '<tr><td align="left" colspan="5"  width="30%" align="right">Total Bs.-</td><td align="right">'.number_format($ttt,2).'</td>';
//$html .= '<tr><td align="left" colspan="5">Son:</td><td align="left" >'.$cambio.'</td>';
//$html .= '</tr>';
//$html .= '</table>';





// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("A4", "portrait");
 
// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));
 
// Renderizamos el documento PDF.
$pdf->render();
$pdf->stream("Reporte_".rand(10,10000).".pdf", array("Attachment" => false));


?>