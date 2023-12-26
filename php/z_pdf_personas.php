<?php

//$dd = $_GET['idd'];
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
.tamletra {font-family: arial; font-size: 10px font-style: italic;}
.tamletra2 {font-family: arial; font-size: 18px font-style: italic;}
.profo {font-family: arial; font-size: 15px;}
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
$html .= '<tr><td width="30%"><img src="../recursos/logo1.png" alt="WEBNET" width="150px" height="50px"/></td>';
$html .= '<td align="center" class="profo">LISTADO DEL PERSONAL</td><td align="center"  width="40%">Software<br>Activos</td></tr>';
$html .= '</table>';





$html .= '<br>';
$html .= '<table border="1" cellspacing="1" cellpadding="2%" WIDTH="100%" class="tamletra">';


$html .='<style>body { font-family: arial; font-size: 13px; }</style>' ;
$html .= '<tr><th>Nro</th><th>&nbsp;Nombre&nbsp;</th><th>Direccion</th><th>Telf/Cel.</th><th>E-mail</th><th>No CI</th><th>Observ.</th></tr>';
$it=0;
$row = mysqli_query($conexion,"SELECT * FROM personas ORDER BY nombre ASC");
while ($row2 = mysqli_fetch_array($row)) {
$it=$it+1;
//$fechh= date("d-m-Y", strtotime($row2['fecha_nac']) );
$html .= '<tr ><td WIDTH="3%" align="center">'.$it.'</td><td WIDTH="15%" align="left">'.$row2['nombre'].'</td><td WIDTH="15%" align="left">'.$row2['direccion'].'</td>
<td WIDTH="7%" align="left">'.$row2['cel'].'</td><td WIDTH="10%" align="left">'.$row2['email'].'</td><td WIDTH="8%" align="right">'.$row2['ci'].'</td><td WIDTH="15%" align="center">'.$row2['observ'].'</td>';
//$html .= '<td WIDTH="40%"><img src='.$row2['foto'].'  width="250" height="250" </td>';
$html .= '</tr>';

}

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