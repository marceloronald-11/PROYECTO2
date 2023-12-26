<?php
if (!isset($_SESSION)) {session_start();}
$nombre_u=$_SESSION['nomb_usu'];

include('2_numletras.php');
require('../php/conexion.php');
require_once ('../dompdf/dompdf_config.inc.php');

$norden = $_GET['idd'];

//mysqli_query($conexion,"UPDATE movimtot SET imprimio='SI' WHERE norden='$norden'");




$row = mysqli_query($conexion,"SELECT * FROM valestot AS va LEFT JOIN otes AS ot ON va.codote=ot.codote");

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
.alto { text-align: right font-family: arial; font-size: 18px; padding-top:25px}
</style>' ;




 
//$html .='<hr></hr>';
$ttt=0.00;

while ($row2 = mysqli_fetch_array($row)) {
$nordenx=$row2['norden'];
$afavorx=$row2['nomtec'];
$fechaax=$row2['fechatot'];
$tcx=$row2['tc'];
$nrootex=$row2['nroote'];
$detotex=$row2['detote'];
$fesal=$row2['fechasal'];
$fe1= date("d-m-Y", strtotime($row2['fechatot']) );
$fe2= date("d-m-Y", strtotime($row2['fechasal']) );

 }
//$cambio = valorEnLetras($ttt); 






$html .= '<table border="1" width="100%">';
$html .= '<tr><td rowspan="3" width="14%" align="center"><img src="../recursos/jachalogo.jpg" alt="raul.webnet" width="50px" height="50px"/></td><td rowspan="3" align="center"><h2>VALES DE SALIDA</h2></td><td align="right">No Orden:</td><td align="center">'.$nordenx.'</td></tr>';
$html .= '<tr><td align="right">Tipo Cambio:</td><td align="center">'.$tcx.'</td></tr>
<tr><td align="right">Fecha: </td><td align="center">'.$fe1.'</td></tr>';
$html .= '</table>';


$html .= '<table border="1" width="100%">';
$html .= '<tr><td>Tecnico:</td><td>'.$afavorx.'</td></tr>';
$html .= '<tr><td>ORDEN DE TRABAJO :</td><td>'.$nrootex.'</td></tr>';
$html .= '<tr><td>DETALLE DE ORDEN DE TRABAJO :</td><td>'.$detotex.'</td></tr>';
$html .= '<tr><td>Fecha de Salida :</td><td>'.$fe2.'</td></tr>';

$html .= '</table>';



$html .= '<table border="1" cellspacing="1" cellpadding="1%" WIDTH="100%" class="deticket" >';
$html .= '<tr><td align="center">Itm</td><td align="center">Codigo</td><td align="center">Descripcion</td><td align="center">Cant.</td><td align="center">P.Unit</td><td align="center">Costo U$</td><td align="center">Importe Bs</td><td align="center">Saldo</td></tr>';
$it=0;
$to=0;
 $fi = mysqli_query($conexion,"SELECT * FROM valesdet WHERE norden='$norden'");

 while ($row22 = mysqli_fetch_array($fi)) {
 $it=$it+1;
$to+=$row22['importedt'];
 $html .= '<tr><td WIDTH="5%" align="center">'.$it.'</td><td WIDTH="10%" align="right">'.$row22['codigo'].'</td><td WIDTH="30%">'.$row22['detrepuesto'].'</td><td WIDTH="5%" align="center">'.$row22['cant'].'</td><td WIDTH="10%" align="center">'.$row22['punitdt'].'</td><td WIDTH="10%" align="center">'.$row22['costodt'].'</td><td WIDTH="10%" align="right">'.$row22['importedt'].'</td><td WIDTH="10%" align="center">'.$row22['stockdt'].'</td>';
 $html .= '</tr>';
 }
 $html .= '<tr><td colspan="6" align="right">Totales :</td><td align="right">'.number_format($to,2).'</td></tr>';
$html .= '</table> <hr>';


$html .= '<table> ';

$html .= '<tr><td  align="right">Autorizado Por :</td><td align="left">'.$nombre_u.'</td></tr>';
$html .= '<tr><td  class="alto" align="right">__________________</td><td align="right"></td></tr>';
$html .= '<tr><td  align="center">Firma</td><td align="right"></td></tr>';

$html .= '</table>';




// $html .= '<table border="0" cellspacing="1" cellpadding="1%" WIDTH="70%" class="deticket" >';
// $html .= '<tr><td align="left" colspan="5"  width="30%" align="right">Total Bs.-</td><td align="right">'.number_format($ttt,2).'</td>';
// $html .= '<tr><td align="left" colspan="5">Son:</td><td align="left" >'.$cambio.'</td>';
// $html .= '</tr>';
// $html .= '</table>';




$pdf = new DOMPDF();
 
//$pdf->set_paper("A4", "portrait");

//$paper_size = array(0,0,500,900);
//$paper_size = array(0,0,209.76,297.64);
//$paper_size = array(0,0,297.64,419.53);
//$paper_size =array(0,0,419.53,595.28);


//$pdf->set_paper($paper_size);
 
$pdf->set_paper('A4');
 
// Cargamos el contenido HTML.
//$pdf->load_html(utf8_decode($html));
$pdf->load_html($html, 'UTF-8'); 
// Renderizamos el documento PDF.
$pdf->render();

//   header('Content-type: application/pdf');
 //   echo $pdf->output();
//$pdf->stream(); 
// Enviamos el fichero PDF al navegador.
//$pdf->stream('FicheroEjemplo.pdf');
//$pdf->stream('codexworld',array('Attachment'=>0));
$pdf->stream("Vales_".rand(10,10000).".pdf", array("Attachment" => false));


?>