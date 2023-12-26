<?php

$dd = $_GET['idd'];
//$dd =6;

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once ('../dompdf/dompdf_config.inc.php');
//require_once '../dompdf/autoload.inc.php';
// Introducimos HTML de prueba
require('../php/conexion.php');
$row = mysql_query("SELECT * FROM aarticulo WHERE coda='$dd'");

//$html = '<div id="logito"><img src="../recursos/logo1.jpg" alt="Flores" width="90px" height="70px"/></div>';
$html = '<table border="0" WIDTH="100%">';
$html .= '<tr><td width="30%"><img src="../recursos/logo1.jpg" alt="Flores" width="60px" height="60px"/></td>';
$html .= '<td align="center">FICHA DEL ARTICULO</td><td align="right">Av. Las Banderas No 132 <br>Cel. 71836932</td></tr>';
$html .= '</table>';
//$html .= '<h4>Marmolera Flores</h4>';
//$html .= '<h5>Av. Las Banderas No 132</h5>';
//$html .= '<h5>Cel. 71836932</h5>';

//$html .= '<h3>FICHA DEL ARTICULO</h3>';


$html .='<style>body { font-family: arial; font-size: 14px; }
#cabeza {color: blue; font-size: 15px; }
H2 { text-align: center;}
H1,H3 { text-align: right;}
.datos { text-align: left;}
.tamletra {font-family: arial; font-size: 16px font-style: italic;}
.tamletra2 {font-family: arial; font-size: 18px font-style: italic; padding-left:250px;}

.norden {font-family: arial; font-size: 25px;}
.descrip {color: black; font-size: 12px; font-family: arial; }
.base {color: red; font-size: 14px; font-family: arial; }
.tot { text-align: right font-family: arial; font-size: 16px;  background: yellow; padding-left:315px; padding-top:10px;padding-bottom:10px;}
.usu { text-align: right font-family: arial; font-size: 12px; padding-top:12px}
#logito {
  position: absolute;
  top:  1px; 
  left: 1px;
}

</style>' ;

$html .= '<table border="1" cellspacing="5" cellpadding="8%" WIDTH="100%" class="descrip">';


$html .='<style>body { font-family: arial; font-size: 13px; }</style>' ;
$html .= '<tr><th>&nbsp;Codigo&nbsp;</th><th>Descripcion</th><th>Formato</th><th>Saldo m2</th><th>Cont.m2</th><th>Saldo Cjas</th><th>Foto</th></tr>';

while ($row2 = mysql_fetch_array($row)) {
//$it=$it+1;
$scja=$row2['saldo']/$row2['contiene'];
$html .= '<tr ><td WIDTH="13%" >'.$row2['codigo'].'</td>
<td WIDTH="40%">'.$row2['descripcion'].'</td><td WIDTH="10%">'.$row2['formato'].'</td><td WIDTH="10%">'.$row2['saldo'].'</td><td WIDTH="10%">'.$row2['contiene'].'</td><td WIDTH="10%">'.number_format($scja,2).'</td>';
$html .= '<td WIDTH="20%"><img src='.$row2['foto'].'  width="70" height="70" </td>';
$html .= '</tr>';
$tt=$row2['saldo'];
}
$html .= '</table>';

// listado de aarticulodetalle

$fila = mysql_query("SELECT * FROM aarticulodetalle WHERE grupo='CE' AND coda='$dd' ");
$cero=0.00;
$html .= '<table border="1" cellspacing="5" cellpadding="8%" WIDTH="100%" class="descrip">';
$html .= '<tr><th>&nbsp;Fecha&nbsp;</th><th>No Orden</th><th>Tipo</th><th>Ingreso</th><th>Egreso</th><th>Saldo.m2</th></tr>';
$saldoant=0.00;
$saldoa;
$sw=0;
$ti=0.00;
$te=0.00;
while ($fila2 = mysql_fetch_array($fila)) {
$html .= '<tr ><td WIDTH="13%" >'.$fila2['fechacot'].'</td><td WIDTH="10%" align="center">'.$fila2['norden'].'</td><td WIDTH="3%" align="center">'.$fila2['tm'].'</td>';
if($fila2['tm']=='I'){
	$ti+=$fila2['cant'];
	if ($sw=0){$saldoa=$saldoant+$fila2['cant'];$saldoant=$saldoa;$sw=1;}else{$saldoa=$saldoant+$fila2['cant'];$saldoant=$saldoa;}

	$html.='<td WIDTH="10%" align="right">'.$fila2['cant'].'</td>';
	$html.='<td WIDTH="10%" align="right">'.''.'</td>';	
}else{
	$te+=$fila2['cant'];

	if ($sw=0){$saldoa=$saldoant-$fila2['cant'];$saldoant=$saldoa;$sw=1;}else{$saldoa=$saldoant-$fila2['cant'];$saldoant=$saldoa;}

	$html.='<td WIDTH="10%" align="right">'.''.'</td>';	
	$html.='<td WIDTH="10%" align="right">'.$fila2['cant'].'</td>';
}


$html.='<td WIDTH="10%" align="right">'.$saldoa.'</td>';


$html .= '</tr>';
	
}
$html .= '</table>';

$html .= '<table border="1" cellspacing="5" cellpadding="8%" WIDTH="100%" class="base">';
$html .= '<tr ><td align="right">Total Ingresos m2:</td><td>'.number_format($ti,2).'</td><td align="right">Total Egresos m2:</td><td WIDTH="13%" >'.number_format($te,2).'</td><td align="right">Saldo m2:</td><td WIDTH="13%" >'.number_format($tt,2).'</td></tr>';
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