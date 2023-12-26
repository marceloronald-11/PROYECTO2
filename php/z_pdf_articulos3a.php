<?php
session_start();
$coddepx= $_SESSION['depto'];

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
.tamletra {font-family: arial; font-size: 11px font-style: italic;}
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
$html .= '<tr><td width="30%"><img src="../recursos/log.jpg" alt="WEBNET" width="150px" height="50px"/></td>';
$html .= '<td align="center" class="profo">Articulos Etiquetas</td><td align="center"  width="40%"></td></tr>';
$html .= '</table>';





$html .= '<br>';
$html .= '<table border="1"  WIDTH="60%" class="tamletra">';


$html .='<style>body { font-family: arial; font-size: 13px; }</style>' ;
$it=0;
$row = mysqli_query($conexion,"SELECT * FROM activos AS ac JOIN departamento AS dp ON ac.coddep=dp.coddep WHERE ac.coddep='$coddepx' ");
while ($row2 = mysqli_fetch_array($row)) {
$it=$it+1;
$ndepto=$row2['descripdepto'];
//$fechh= date("d-m-Y", strtotime($row2['fecha_nac']) );
$html .= '<tr ><td WIDTH="18%" align="left">'.$row2['descripcion'].' '.'Codigo :'.$row2['codigo'].' '.'U.med :'.$row2['umed'].' '.'Precio :'.number_format($row2['pvp'],2).'</td>';
//$html .= '<td WIDTH="40%"><img src='.$row2['foto'].'  width="250" height="250" </td>';
$html .= '</tr>';

}

$html .= '</table>';
$html .= '<table>  <tr><td>'.'Departamento  :'.$ndepto.'</td></tr>';






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