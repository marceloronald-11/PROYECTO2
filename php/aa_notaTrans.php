<?php
//if(strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0){
//	$desde = $_GET['desde'];
	$codtrax = $_GET['codtrax'];
//
//	$verDesde = date('d/m/Y', strtotime($desde));
//	$verHasta = date('d/m/Y', strtotime($hasta));
//}else{
//	$desde = '1111-01-01';
//	$hasta = '9999-12-30';
//
//	$verDesde = '__/__/____';
//	$verHasta = '__/__/____';
//}


//$nor = $_GET['norden'];
//$dd =6;

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once ('../dompdf/dompdf_config.inc.php');
//require_once '../dompdf/autoload.inc.php';
// Introducimos HTML de prueba
require('../php/conexion.php');
//$row1= mysql_query($conexion,"SELECT * FROM personas WHERE id_per='$dd'");


$html ='<style>body { font-family: arial; font-size: 14px; }
#cabeza {color: blue; font-size: 15px; }
H2 { text-align: center;}
H1,H3 { text-align: right;}
.datos { text-align: left;}
.tamletra {font-family: arial; font-size: 13px font-style: italic;}
.tamletra2 {font-family: arial; font-size: 18px font-style: italic;}
.profo {font-family: arial; font-size: 13px;}
.norden {font-family: arial; font-size: 25px;}
.descrip {color: black; font-size: 14px; font-family: arial; }
.tot { text-align: right font-family: arial; font-size: 16px;  background: yellow; padding-left:315px; padding-top:10px;padding-bottom:10px;}
.usu { text-align: right font-family: arial; font-size: 12px; padding-top:12px}
#logito {
  position: absolute;
  top:  1px; 
  left: 1px;
}

</style>' ;
$html .= '<table border="0" WIDTH="100%" class="arriba">';
$html .= '<tr><td width="30%"><img src="../recursos/login.png" alt="WEBNET" width="60px" height="50px"/></td>';
$html .= '<td align="left" class="tamletra2">Solicitud de Transporte</td></tr>';
$html .= '</table>';





$html .= '<br>';
$html .= '<table border="1" cellspacing="1" cellpadding="2%" WIDTH="60%" class="tamletra">';


$html .='<style>body { font-family: arial; font-size: 13px; }</style>' ;
//$html .= '<tr><td>Nro</td><th>&nbsp;Fecha&nbsp;</td><th>&nbsp;No Orden &nbsp;</td><td>Importe Bs.-</td><td>Hora</td><td>Usuario</td></tr>';
$it=0;
$ttot=0.00;

$row= mysqli_query($conexion,"SELECT * FROM transporte  AS tr JOIN sucursal
	AS su ON tr.codsuc=su.codsuc WHERE tr.codtra='$codtrax' ");


//$row = mysqli_query($conexion,"SELECT * FROM pagosgym WHERE nordengym='$nor' ");
while ($row2 = mysqli_fetch_array($row)) {
$it=$it+1;
//$ttot=$ttot+$row2['importepg'];
//$ff = date('d/m/Y', strtotime($row2['fechaact']));
$ff= date("d-m-Y", strtotime($row2['fechaact']) );
$html.='<tr><td>SOLICITUD</td></tr>';
$html .= '<tr ><td>No Orden:</td><td align="center">'.$row2['norden'].'</td></tr>
<tr ><td>Fecha:</td><td  align="center">'.$ff.'</td></tr>
<tr ><td>Solicito:</td><td align="center">'.$row2['solicito'].'</td></tr>
<tr ><td>Cliente:</td><td align="center">'.$row2['clientetra'].'</td></tr>
<tr ><td>Fecha Entrega:</td><td align="center">'.$row2['fechaentre'].'</td></tr>
<tr ><td>Hora Entrega:</td><td align="center">'.$row2['horaentre'].'</td></tr>
<tr ><td>Direccion:</td><td align="center">'.$row2['direcctra'].'</td></tr>
<tr ><td>Telf/Cel:</td><td align="center">'.$row2['telftra'].'</td></tr>
<tr ><td>Importe Total:</td><td align="center">'.$row2['totaltra'].'</td></tr>
<tr ><td>Saldo a Cobrar:</td><td align="center">'.$row2['saldotra'].'</td></tr>
<tr ><td>INFORME DEL CONDUCTOR</td></tr>
<tr ><td>Entrego:</td><td align="center">'.$row2['fechadejo'].'</td></tr>
<tr ><td>Hora Entrega:</td><td align="center">'.$row2['horadejo'].'</td></tr>';


}
// $html .='<tr><td colspan="2"></td><td> Total Bs.- </td><td align="right">'.number_format($ttot,2).'</td><tr>';
$html .= '</table>';






//echo $html;
//$html = urlencode($html);
//echo "<a href='toPDF.php?html=$html'>Click Aqui para descargar el informe</a>";

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("A4", "portrait");
 
// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));
 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
//$pdf->stream('FicheroEjemplo.pdf');
$pdf->stream('codexworld',array('Attachment'=>0));


?>