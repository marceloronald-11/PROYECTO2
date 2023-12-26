<?php
if (!isset($_SESSION)) {session_start();}
//$codde=$_SESSION['depto'];
$codsucx=1;//$_SESSION['codsuc'];


include('2_numletras.php');
require('../php/conexion.php');
require_once ('../dompdf/dompdf_config.inc.php');

$norden = $_GET['norden'];

mysqli_query($conexion,"UPDATE movimtot SET imprimio='SI' WHERE norden='$norden'");

//$leyy = mysqli_query($conexion,"SELECT * FROM dosificacion WHERE cdfac='X' AND codsuc='$codsucx' ");
//
//while ($lee = mysqli_fetch_array($leyy)) {
//	$leyendax=$lee['leyenda'];
//}


$row = mysqli_query($conexion,"SELECT * FROM movimtot WHERE norden='$norden'");

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
//$html .= '<tr><td width="30%"><img src="../recursos/logo1.jpg" alt="raul.webnet" width="40px" height="40px"/></td>';
$html .= '<tr><td align="center" class="profo">ADMINISTRACION</td></tr><tr><td align="center">LA PAZ -BOLIVIA</td></tr>';
$html .= '<tr><td align="center" class="lfactura">NOTA DE COMPRA</td></tr>';

$html .= '</table>';
 
//$html .='<hr></hr>';
$ttt=0.00;

while ($row2 = mysqli_fetch_array($row)) {
$xnorden=$row2['norden'];
$xafavor=$row2['afavor'];
$ttt=$ttt+$row2['totimporte'];
$fe2= date("d-m-Y", strtotime($row2['fechato']) );
//$xcontrol=$row2['control'];
//$xqr=$row2['qrfoto'];
//$xfli= date("d-m-Y", strtotime($row2['fechalim']) );
//$nit=$row2['nit'];
//$nitcli=$row2['nitcliente'];
//$nrofactura=$row2['nfactura'];
//$nautorizax=$row2['nautoriza'];

}
$cambio = valorEnLetras($ttt); 

//$fe2= date("d-m-Y", strtotime($row2['fecham']) );

$roww = mysqli_query($conexion,"SELECT * FROM movimdet WHERE norden='$norden'");

$html .= '<table  border="0"  WIDTH="70%" class="deticket1">';
$html .= '<tr><td >No Orden :</td><td align="left" class="tick">'.$xnorden.'</td></tr>';
$html .= '<tr><td>Fecha :</td><td align="left">'.$fe2.'</td></tr>'; 
$html .= '<tr><td>Sr(a) :</td><td align="left">'.$xafavor.'</td></tr>';

$html .= '</table>';

$html .= '<table border="1" cellspacing="1" cellpadding="1%" WIDTH="78%" class="deticket" >';
//$html .='<style>body { font-family: arial; font-size: 14px; }</style>' ;
$html .= '<tr><th>Cant.</th><th>Concepto</th><th>Precio</th><th>Total</th>';

while ($row22 = mysqli_fetch_array($roww)) {
//$it=$it+1;
$html .= '<tr ><td WIDTH="5%" align="center">'.number_format($row22['cant'],0).'</td><td WIDTH="30%">'.$row22['descripdt'].'</td><td WIDTH="7%" align="right">'.$row22['precio'].'</td><td WIDTH="10%" align="right">'.$row22['subtot'].'</td>';
$html .= '</tr>';
}

$html .= '</table>';

$html .= '<table border="0" cellspacing="1" cellpadding="1%" WIDTH="78%" class="deticket" >';
$html .= '<tr><td align="left" colspan="5"  width="30%" align="right">Total Bs.-</td><td align="right">'.number_format($ttt,2).'</td>';
$html .= '<tr><td align="left" colspan="5">Son:</td><td align="left" >'.$cambio.'</td>';
$html .= '</tr>';
$html .= '</table>';

//$html .= '<table border="0" cellspacing="1" cellpadding="3%" WIDTH="80%" class="elcontrol">';
//$html .= '<tr><td align="right" colspan="5" width="45%" class="descripp">Codigo de Control :</td><td align="left">'.$xcontrol.'</td>';
//$html .= '<tr><td align="right" colspan="5" class="descripp">Fecha Limite Emision :</td><td align="left">'.$xfli.'</td>';
//$html .= '</tr>';
//$html .= '</table>';

//$html .= '<img src='.$xqr.'  width="110" height="110"';
//$html .='<br>';
//$html .='<p class="slogan">'.$leyendax.'</p>';



$pdf = new DOMPDF();
 
//$pdf->set_paper("A4", "portrait");

//$paper_size = array(0,0,500,900);
//$paper_size = array(0,0,209.76,297.64);
//$paper_size = array(0,0,297.64,419.53);
$paper_size =array(0,0,419.53,595.28);


$pdf->set_paper($paper_size);
 
 
 
// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));
 
// Renderizamos el documento PDF.
$pdf->render();

//   header('Content-type: application/pdf');
 //   echo $pdf->output();
//$pdf->stream(); 
// Enviamos el fichero PDF al navegador.
//$pdf->stream('FicheroEjemplo.pdf');
$pdf->stream('codexworld',array('Attachment'=>0));



?>