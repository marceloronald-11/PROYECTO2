<?php

$dd = $_GET['idd'];
//$dd =6;

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once ('../dompdf/dompdf_config.inc.php');
//require_once '../dompdf/autoload.inc.php';
// Introducimos HTML de prueba
require('../php/conexion.php');
$row1= mysql_query("SELECT * FROM alumnosof WHERE idcur='$dd'");


$html ='<style>body { font-family: arial; font-size: 14px; }
#cabeza {color: blue; font-size: 15px; }
H2 { text-align: center;}
H1,H3 { text-align: right;}
.datos { text-align: left;}
.tamletra {font-family: arial; font-size: 10px font-style: italic;}
.tamletra2 {font-family: arial; font-size: 18px font-style: italic;}
.profo {font-family: arial; font-size: 18px;}
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
$html .= '<tr><td width="30%"><img src="../recursos/logo_colegio.png" alt="WEBNET" width="50px" height="50px"/></td>';
$html .= '<td align="center" class="profo">LISTADO DEL ALUMNO</td><td align="center"  width="40%">Unidad Educativa Privada<br>Sagrado Corazon de Jesus</td></tr>';
$html .= '</table>';


while ($roww = mysql_fetch_array($row1)) {
$decurso=$roww['descripcion'];
}

$html .= '<table border="0" WIDTH="100%" class="arriba">';
$html .= '<tr ><td width="5%"> Curso:</td><td align="left" class="tamletra2">'.$decurso.'</td></tr>';
$html .= '</table>';



$html .= '<br>';
$html .= '<table border="1" cellspacing="1" cellpadding="2%" WIDTH="100%" class="tamletra">';


$html .='<style>body { font-family: arial; font-size: 13px; }</style>' ;
$html .= '<tr><th>Nro</th><th>Nro Id</th><th>&nbsp;Nombres&nbsp;</th><th>Ap.Paterno</th><th>Ap.Materno</th><th>Fecha Nac.</th><th>No Rude</th><th>Telefono</th><th>Celular</th></tr>';
$it=0;
$row = mysql_query("SELECT * FROM alumnosof WHERE idcur='$dd' ORDER BY apellp ASC");
while ($row2 = mysql_fetch_array($row)) {
$it=$it+1;
$fechh= date("d-m-Y", strtotime($row2['fecha_nac']) );
$html .= '<tr ><td WIDTH="3%" align="center">'.$it.'</td><td WIDTH="5%" align="left">'.$row2['id_al'].'</td><td WIDTH="10%" align="left">'.$row2['nombres'].'</td>
<td WIDTH="10%" align="left">'.$row2['apellp'].'</td><td WIDTH="10%" align="left">'.$row2['apellm'].'</td><td WIDTH="10%" align="center">'.$fechh.'</td><td WIDTH="10%" align="right">'.$row2['rude'].'</td><td WIDTH="10%" align="center">'.$row2['telfijo'].'</td><td WIDTH="10%" align="center">'.$row2['celular'].'</td>';
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