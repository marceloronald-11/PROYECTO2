<?php

$dd = $_GET['codact']; // codigo del activo
//$dd =6;

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once ('../dompdf/dompdf_config.inc.php');
//require_once '../dompdf/autoload.inc.php';
// Introducimos HTML de prueba
require('../php/conexion.php');
$row = mysqli_query($conexion,"SELECT * FROM activos WHERE codar='$dd'");

//$html = '<div id="logito"><img src="../recursos/logo1.jpg" alt="Flores" width="90px" height="70px"/></div>';
$html = '<table border="0" WIDTH="100%">';
$html .= '<tr><td width="30%"><img src="../recursos/logintit.png" alt="Flores" width="50px" height="50px"/></td>';
$html .= '<td align="center">FICHA DEL ARTICULO</td><td align="right">Inventario</td></tr>';
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
.descrip {color: black; font-size: 10px; font-family: arial; }
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
$html .= '<tr><th>&nbsp;Codigo&nbsp;</th><th>Descripcion</th><th>Fecha Ing.</th><th>Saldo </th><th>Observacion</th><th>Foto</th></tr>';

while ($row2 = mysqli_fetch_array($row)) {
//$it=$it+1;
//$scja=$row2['saldo']/$row2['contiene'];
$html .= '<tr ><td WIDTH="13%" >'.$row2['codigo'].'</td>
<td WIDTH="30%">'.$row2['descripcion'].'</td><td WIDTH="15%">'.$row2['fecha_ing'].'</td><td WIDTH="10%">'.$row2['existencia'].'</td><td WIDTH="15%">'.$row2['observ'].'</td>';
$html .= '<td WIDTH="20%"><img src='.$row2['foto'].'  width="70" height="70" </td>';
$html .= '</tr>';
$tt=$row2['existencia'];
}
$html .= '</table>';




// listado de aarticulodetalle
//$fila = mysqli_query($conexion,"SELECT * FROM movimdet AS dt JOIN movimtot AS mt ON dt.norden=mt.norden WHERE dt.codar='$dd' ");
$fila = mysqli_query($conexion,"SELECT * FROM movimdet AS dt JOIN movimtot AS mt ON dt.norden=mt.norden JOIN proveedor AS pv ON dt.codpv=pv.codpv WHERE dt.codar='$dd' ");


$cero=0.00;
$html .= '<table border="1" cellspacing="5" cellpadding="8%" WIDTH="100%" class="descrip">';
$html .= '<tr><th>&nbsp;Fecha&nbsp;</th><th>No Orden</th><th>Tipo</th><th>Ingreso</th><th>Egreso</th><th>Saldo</th>
<th>Nombre</th><th>P.Neto</th><th>No Fact.</th><th>Proveedor</th><th>Area</th></tr>';
$saldoant=0.00;
$saldoa;
$sw=0;
$ti=0.00;
$te=0.00;
while ($fila2 = mysqli_fetch_array($fila)) {
	$fff= date("d-m-Y", strtotime($fila2['fechadt']) );
//	$ff=$fila2['fechadt'];
$html .= '<tr ><td WIDTH="9%" >'.$fff.'</td><td WIDTH="8%" align="center">'.$fila2['norden'].'</td><td WIDTH="2%" align="center">'.$fila2['tipo'].'</td>';
if($fila2['tipo']=='I'){
	$ti+=$fila2['cant'];
	if ($sw=0){$saldoa=$saldoant+$fila2['cant'];$saldoant=$saldoa;$sw=1;}else{$saldoa=$saldoant+$fila2['cant'];$saldoant=$saldoa;}

	$html.='<td WIDTH="7%" align="right">'.$fila2['cant'].'</td>';
	$html.='<td WIDTH="7%" align="right">'.''.'</td>';	
}else{
	$te+=$fila2['cant'];

	if ($sw=0){$saldoa=$saldoant-$fila2['cant'];$saldoant=$saldoa;$sw=1;}else{$saldoa=$saldoant-$fila2['cant'];$saldoant=$saldoa;}

	$html.='<td WIDTH="7%" align="right">'.''.'</td>';	
	$html.='<td WIDTH="7%" align="right">'.$fila2['cant'].'</td>';
}


$html.='<td WIDTH="8%" align="right">'.$saldoa.'</td><td WIDTH="12%" align="left">'.$fila2['afavor'].'</td>
<td WIDTH="8%" align="right">'.$fila2['precio'].'</td><td WIDTH="8%" align="left">'.$fila2['nfactura'].'</td><td WIDTH="8%" align="left">'.$fila2['nombre'].'</td><td WIDTH="10%" align="left">'.$fila2['tmm'].'</td>';


$html .= '</tr>';
	
}
$html .= '</table>';

$html .= '<table border="1" cellspacing="5" cellpadding="8%" WIDTH="100%" class="base">';
$html .= '<tr ><td align="right">Total Ingresos :</td><td>'.number_format($ti,0).'</td><td align="right">Total Egresos :</td><td WIDTH="13%" >'.number_format($te,0).'</td><td align="right">Saldo :</td><td WIDTH="13%" >'.number_format($tt,0).'</td></tr>';
$html .= '</table>';






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