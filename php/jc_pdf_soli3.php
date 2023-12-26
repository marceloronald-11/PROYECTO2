<?php
include('2_numletras.php');
require('../php/conexion.php');
require_once ('../dompdf/dompdf_config.inc.php');

$norden = $_GET['norden'];

//mysqli_query($conexion,"UPDATE movimtot SET imprimio='SI' WHERE norden='$norden'");




$row = mysqli_query($conexion,"SELECT * FROM solicitudtot AS so LEFT JOIN areas AS ar ON so.codarea=ar.codarea LEFT JOIN cargo AS ca ON so.codcargo=ca.codcargo WHERE so.norden='$norden'");

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




 
//$html .='<hr></hr>';
$ttt=0.00;

while ($row2 = mysqli_fetch_array($row)) {
$nordenx=$row2['norden'];
$afavorx=$row2['afavor'];
$fechaax=$row2['fechaa'];
$fechasolx=$row2['fechasol'];
$coddocx=$row2['coddoc'];
$versionnx=$row2['versionn'];
$nrosolx=$row2['nrosol'];
$fe1= date("d-m-Y", strtotime($row2['fechaa']) );
$fe2= date("d-m-Y", strtotime($row2['fechasol']) );
$detarea=$row2['detarea'];
$detcargo=$row2['detcargo'];

//$nrosolx=$row2['nrosol'];

 }
//$cambio = valorEnLetras($ttt); 





// $html .= '<table  border="0"  WIDTH="70%" class="deticket1">';
// $html .= '<tr><td >No Orden :</td><td align="left" class="tick">'.$nordenx.'</td></tr>';
// $html .= '<tr><td>Fecha :</td><td align="left">'.$fe2.'</td></tr>'; 
// $html .= '<tr><td>Nombre :</td><td align="left">'.$afavorx.'</td></tr>';
// $html .= '<tr><td>Cod.Docum :</td><td align="left">'.$coddocx.'</td></tr>';
// $html .= '<tr><td>Version :</td><td align="left">'.$versionnx.'</td></tr>';
// $html .= '<tr><td>Nro Solicit.:</td><td align="left">'.$nrosolx.'</td></tr>';
// $html .= '</table>';



$html .= '<table border="1" width="100%">';
$html .= '<tr><td rowspan="3" width="14%" align="center"><img src="../recursos/jachalogo.jpg" alt="raul.webnet" width="50px" height="50px"/></td><td rowspan="3" align="center"><h2>REGISTRO</h2></td><td align="right">Cod.Documento:</td><td align="center">'.$coddocx.'</td></tr>';
$html .= '<tr><td align="right">Version:</td><td align="center">'.$versionnx.'</td></tr>
<tr><td align="right">Fecha: </td><td align="center">'.$fe2.'</td></tr>';
$html .= '</table>';

$html .= '<table border="1" width="100%">';
$html .= '<tr><td align="center"><h4>NOTA DE ENTREGA DE COMPRA</h4></td></tr>';
$html .= '</table>';

$html .= '<table border="1" width="100%">';
$html .= '<tr><td>Nombre:</td><td>'.$afavorx.'</td><td align="right">Fecha Solicitud :</td><td>'.$fe2.'</td></tr>';
$html .= '<tr><td>Area :</td><td>'.$detarea.'</td><td align="right">No de Solicitud :</td><td>'.$nrosolx.'</td></tr>';
$html .= '<tr><td>Cargo :</td><td>'.$detcargo.'</td><td></td><td></td></tr>';
$html .= '</table>';



$html .= '<table border="1" cellspacing="1" cellpadding="1%" WIDTH="100%" class="deticket" >';
$html .= '<tr><td align="center">Itm</td><td align="center">N/Codigo</td><td align="center">Descripcion</td><td align="center">U.Med</td><td align="center">Cant. Solic.</td><td align="center">Cant.Recib.</td><td align="center">Precio Unit.</td><td align="center">Factura No</td></tr>';
$it=0;
$topre=0;

$fi = mysqli_query($conexion,"SELECT * FROM solicituddet WHERE norden='$norden'");

 while ($row22 = mysqli_fetch_array($fi)) {
 $it=$it+1;
 $topre+=$row22['preciodt'];
 $nota="--";
 $prioo=$row22['tpriodt'];
    if($prioo=='AL'){$nota="Alta";}
    if($prioo=='MD'){$nota="Media";}
    if($prioo=='BJ'){$nota="Baja";}


 $html .= '<tr><td WIDTH="5%" align="center">'.$it.'</td><td WIDTH="10%" align="right">'.$row22['codigo'].'</td><td WIDTH="30%">'.$row22['detrepdt'].'</td><td WIDTH="5%" align="center">'.$row22['umed'].'</td><td WIDTH="10%" align="center">'.$row22['cantsoli'].'</td><td WIDTH="10%" align="center">'.$row22['cantllego'].'</td><td WIDTH="10%" align="right">'.$row22['preciodt'].'</td><td WIDTH="10%" align="center">'.$row22['nfactura'].'</td>';
 $html .= '</tr>';
 }
 $html .= '<tr><td colspan="6"  width="30%" align="right">Total Bs.-</td><td align="right">'.number_format($topre,2).'</td><td></td>';
$html .= '</table>';

 

$pdf = new DOMPDF();
 
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
$pdf->stream("Compras_".rand(10,10000).".pdf", array("Attachment" => false));


?>