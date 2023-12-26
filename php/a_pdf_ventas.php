<?php
include('2_numletras.php');
require('../php/conexion.php');
require_once ('../dompdf/dompdf_config.inc.php');

$norden = $_GET['idd'];
//$nnfactura = $_GET['nfac'];
//mysql_query("UPDATE aarticulototal SET imprimio='SI' WHERE norden='$norden'");
mysql_query("UPDATE aarticulototal SET imprimio='SI' WHERE nfactura='$nnfactura'");


if ($nnfactura!=0){ // INICIO IMPRESION
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
//require_once ('../dompdf/dompdf_config.inc.php');
//require_once '../dompdf/autoload.inc.php';
// Introducimos HTML de prueba
//require('../php/conexion.php');
$it=0;



//$row = mysql_query("SELECT * FROM aarticulototal WHERE norden='$norden'");
$row = mysql_query("SELECT * FROM aarticulototal WHERE nfactura='$nnfactura'");


$html ='<style>body { font-family: arial; font-size: 14px; }
#cabeza {color: blue; font-size: 15px; }
H2 { text-align: center;}
H1,H3 { text-align: right;}
.datos { text-align: left;}
.profo {font-family: arial; font-size: 15px font-style: italic;}
.lfactura {font-family: arial; font-size: 16px font-style: italic;}
.slogan {font-family: sans-serif; font-size: 12px ;}

.tamletra2 {font-family: sans-serif; font-size: 18px font-style: italic; padding-left:250px;}
.elcontrol {font-family: sans-serif; font-size: 15px font-style: italic;}

.norden {font-family: arial; font-size: 16px;}
.descripp {color: black; font-size: 10px; font-family: sans-serif; }
.cabecera {color: black; font-size: 10px; font-family: sans-serif; }

.titu {color: black; font-size: 12px; font-family: sans-serif; }

.tot { text-align: right font-family: arial; font-size: 14px;  background-color: rgba(237, 238, 238); padding-left:390px; padding-top:10px;padding-bottom:10px;}
.usu { text-align: right font-family: sans-serif; font-size: 14px; padding-top:12px}
.control { text-align: right font-family: sans-serif; font-size: 18px; padding-top:12px}
</style>' ;



$html .= '<div id="contenedor1">';

$html .= '<table border="0" WIDTH="50%" class="arriba">';
//$html .= '<tr><td width="30%"><img src="../recursos/logo1.jpg" alt="raul.webnet" width="40px" height="40px"/></td>';
$html .= '<tr><td align="center" class="profo">FULL FOOD</td></tr><tr><td align="center">Sucursal No 1 <br>LA PAZ -BOLIVIA</td></tr>';
$html .= '<tr><td align="center" class="lfactura">FACTURA</td></tr>';

$html .= '</table>';
 
//$html .='<hr></hr>';


while ($row2 = mysql_fetch_array($row)) {
$fe2= date("d-m-Y", strtotime($row2['fechacot']) );

$xnfactura=$row2['nfactura'];
$xcliente=$row2['cliente'];
$xnitcli=$row2['nitcli'];

$xcontrol=$row2['control'];
$xqr=$row2['qrfoto'];
$xfelimite=$row2['felimite'];
$xfli= date("d-m-Y", strtotime($row2['felimite']) );
$xleyenda=$row2['leyenda'];

}



//$row = mysql_query("SELECT * FROM aarticulototal WHERE norden='$norden'");
$row = mysql_query("SELECT * FROM aarticulototal WHERE nfactura='$nnfactura'");

//$html .= '<table id="cabeza" border="1" cellspacing="6" cellpadding="8%" WIDTH="100%">';

while ($row2 = mysql_fetch_array($row)) {
	$ttt=$row2['totalbs'];
//	$imprimio=$row2['imprimio'];
	$codusu=$row2['id_usu'];
	$znit=$row2['nit'];
	$znfactura=$row2['nfactura'];
	$znautoriza=$row2['nautoriza'];
	
}

$cambio = valorEnLetras($ttt); 

$fila = mysql_query("SELECT * FROM usuarios WHERE id_usu='$codusu'");
while ($fila2 = mysql_fetch_array($fila)) {
	$nombu=$fila2['nomb_usu'];
}

//$html .= '</table>';

$html .= '<table  border="0"  WIDTH="50%" class="titu">';
$html .= '<tr><td>Nit :</td><td align="left">'.$znit.'</td></tr>';
$html .= '<tr><td>Factura No :</td><td align="left">'.$znfactura.'</td></tr>';
$html .= '<tr><td>Autorizacion :</td><td align="left">'.$znautoriza.'</td></tr>';
$html .= '<tr><td>Fecha :</td><td align="left">'.$fe2.'</td></tr>';
$html .= '<tr><td>Sr(a) :</td><td align="left">'.$xcliente.'</td></tr>';
$html .= '<tr><td>Nit/CI :</td><td align="left">'.$xnitcli.'</td></tr>';
$html .= '</table>';


$row = mysql_query("SELECT * FROM aarticulodetalle WHERE nfactura='$nnfactura'");


$html .= '<table border="0"   WIDTH="48%"  class="cabecera" >';
$html .= '<tr><td>Cant.</td><td align="center">Concepto</td><td align="center">Precio</td><td align="right">Total</td></tr>';
$html .= '<tr><td>--------</td><td align="center">--------------------------------------------</td><td align="center">-----------</td><td align="center">-----------------</td></tr>';
while ($row2 = mysql_fetch_array($row)) {
$it=$it+1;
$html .= '<tr ><td WIDTH="2%" align="center">'.number_format($row2['cant'],0).'</td><td WIDTH="28%">'.$row2['descripcion'].'</td><td WIDTH="7%" align="right">'.$row2['precio'].'</td><td WIDTH="12%" align="right">'.$row2['subtot'].'</td>';
$html .= '</tr>';
}
$html .= '<tr><td>--------</td><td align="center">--------------------------------------------</td><td align="center">-----------</td><td align="center">-----------------</td></tr>';

$html .= '</table>';



$html .= '<table border="0"  WIDTH="48%" class="descripp" >';
$html .= '<tr><td align="left" colspan="5"  width="23%" align="left">Totas Bs.-</td><td align="right">'.$ttt.'</td>';
$html .= '<tr><td align="left" colspan="5">Son:</td><td align="left" >'.$cambio.'</td>';
$html .= '</tr>';
$html .= '</table>';


$html .= '<table border="0" cellspacing="1" cellpadding="3%" WIDTH="50%" class="elcontrol">';
$html .= '<tr><td align="right" colspan="5" width="45%" class="descripp">Codigo de Control :</td><td align="left">'.$xcontrol.'</td>';
$html .= '<tr><td align="right" colspan="5" class="descripp">Fecha Limite Emision :</td><td align="left">'.$xfli.'</td>';
$html .= '</tr>';
$html .= '</table>';


//$html .='<h2 class="usu">QR :'.$xqr.'</h2>';

//$html .= '<div > <img src="../Controller/55-89-EE-80-31.png" width="95" height="95"/></div>';

$html .= '<img src='.$xqr.'  width="110" height="110"';
$html .='<br>';
$html .='<p class="slogan">'.$xleyenda.'</p>';
 
$html .='<h5 class="usu">Caja :'.$nombu.'</h5>';

$html.='</div>';









}else{ ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// impresion de TICKET
	

$row = mysql_query("SELECT * FROM aarticulototal WHERE norden='$norden'");

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



$html .= '<div id="contenedor1">';

$html .= '<table border="0" WIDTH="50%" class="arriba">';
//$html .= '<tr><td width="30%"><img src="../recursos/logo1.jpg" alt="raul.webnet" width="40px" height="40px"/></td>';
$html .= '<tr><td align="center" class="profo">FULL FOOD</td></tr><tr><td align="center">Sucursal No 1 <br>LA PAZ -BOLIVIA</td></tr>';
$html .= '<tr><td align="center" class="lfactura">TICKET</td></tr>';

$html .= '</table>';
 
//$html .='<hr></hr>';
while ($row2 = mysql_fetch_array($row)) {
$fe2= date("d-m-Y", strtotime($row2['fechacot']) );

$xnfactura=$row2['nfactura'];
$xcliente=$row2['cliente'];
$xnitcli=$row2['nitcli'];

$xcontrol=$row2['control'];
$xqr=$row2['qrfoto'];
$xfelimite=$row2['felimite'];
$xfli= date("d-m-Y", strtotime($row2['felimite']) );
$xleyenda=$row2['leyenda'];

}

$row = mysql_query("SELECT * FROM aarticulototal WHERE norden='$norden'");
//$html .= '<table id="cabeza" border="1" cellspacing="6" cellpadding="8%" WIDTH="100%">';

while ($row2 = mysql_fetch_array($row)) {
	$ttt=$row2['totalbs'];
//	$imprimio=$row2['imprimio'];
	$codusu=$row2['id_usu'];
	$znit=$row2['nit'];
	$znfactura=$row2['nfactura'];
	$znautoriza=$row2['nautoriza'];
	
}

$cambio = valorEnLetras($ttt); 

$fila = mysql_query("SELECT * FROM usuarios WHERE id_usu='$codusu'");
while ($fila2 = mysql_fetch_array($fila)) {
	$nombu=$fila2['nomb_usu'];
}

//$html .= '</table>';
$html .= '<table  border="0"  WIDTH="50%" class="deticket1">';
$html .= '<tr><td >TICKET:</td><td align="left" class="tick">'.$norden.'</td></tr>';
$html .= '<tr><td>Fecha :</td><td align="left">'.$fe2.'</td></tr>'; 
$html .= '<tr><td>Sr(a) :</td><td align="left">'.$xcliente.'</td></tr>';
$html .= '</table>';


$roww = mysql_query("SELECT * FROM aarticulodetalle WHERE norden='$norden'");

$html .= '<table border="0" cellspacing="1" cellpadding="1%" WIDTH="48%" class="deticket" >';
//$html .='<style>body { font-family: arial; font-size: 14px; }</style>' ;
$html .= '<tr><th>Cant.</th><th>Concepto</th><th>Precio</th><th>Total</th>';
$html .= '<tr><td>--------</td><td align="center">---------------------------------------</td><td align="center">-----------</td><td align="center">---------</td></tr>';

while ($row22 = mysql_fetch_array($roww)) {
//$it=$it+1;
$html .= '<tr ><td WIDTH="5%" align="center">'.number_format($row22['cant'],0).'</td><td WIDTH="30%">'.$row22['descripcion'].'</td><td WIDTH="7%" align="right">'.$row22['precio'].'</td><td WIDTH="10%" align="right">'.$row22['subtot'].'</td>';
$html .= '</tr>';
}
$html .= '<tr><td>--------</td><td align="center">---------------------------------------</td><td align="center">-----------</td><td align="center">---------</td></tr>';

$html .= '</table>';

$html .= '<table border="0" cellspacing="1" cellpadding="1%" WIDTH="48%" class="deticket" >';
$html .= '<tr><td align="left" colspan="5"  width="23%" align="right">Total Bs.-</td><td align="right">'.$ttt.'</td>';
$html .= '<tr><td align="left" colspan="5">Son:</td><td align="left" >'.$cambio.'</td>';
$html .= '</tr>';
$html .= '</table>';

$html .='<h6 class="usu">Caja :'.$nombu.'</h6>';



$html.='</div>';



} // FIN IMPRESION




//$html = urlencode($html);
//echo "<a href='toPDF.php?html=$html'>Click Aqui para descargar el informe</a>";

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.

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