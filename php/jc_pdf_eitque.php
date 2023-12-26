<?php
include('2_numletras.php');
require('../php/conexion.php');
require_once ('../dompdf/dompdf_config.inc.php');
if (!isset($_SESSION)) {session_start();}
$_SESSION['detalle'] = array();



ini_set('max_execution_time', 300); //300 seconds = 5 minutes
ini_set('memory_limit', '512M'); //128-512


//$norden = $_GET['norden'];

//mysqli_query($conexion,"UPDATE movimtot SET imprimio='SI' WHERE norden='$norden'");



$registro = mysqli_query($conexion,"SELECT * FROM repuesto  ");

//while($registro2 = mysqli_fetch_array($registro)){

//}





$html ='<style>body { font-family: arial; font-size: 14px; }
#cabeza {color: blue; font-size: 15px; }
H2 { text-align: center;}
H1,H3 { text-align: right;}
.datos { text-align: left;}
.bordes {
    border: 2px solid blue;
  }
  .bordes1 {
    border: 1px solid black;
  }
.letra {font-family: arial; font-size: 15px font-style: italic; text-align: center;}
.tick {font-family: arial; font-size: 25px;}
.norden {font-family: sans-serif; font-size: 14px;}
.deticket {color: black; font-size: 10px; font-family: sans-serif; }
.deticket1 {color: black; font-size: 13px; font-family: sans-serif; }

.tot { text-align: right font-family: arial; font-size: 14px;  background-color: rgba(237, 238, 238); padding-left:390px; padding-top:10px;padding-bottom:10px;}
.usu { text-align: right font-family: arial; font-size: 14px; padding-top:12px}
.control { text-align: right font-family: arial; font-size: 18px; padding-top:12px}
</style>' ;



$html .='<table class="bordes" width="30%">
 <tr><td  width="14%" align="left"><img src="../recursos/jachalogo.jpg" alt="raul.webnet" width="60px" height="60px"/></td><td class="letra">REPORTE DE ETIQUETAS</td></tr>';
$html .='</table>';


$html .='<table class="bordes" width="30%">';
 
 $itm=0;	
//$cambio = valorEnLetras($ttt); 

while($registro2 = mysqli_fetch_array($registro)){
	$itm+=1;
        $html.='<tr><td align="left" >'.$registro2['codigo'].'</td></tr>
        <tr><td align="left" >'.$registro2['detrepuesto'].'</td></tr>
        <tr><td align="left" > '.$registro2['codigoanti'].'</td></tr>
        <tr><td>_______________________</td></tr>';		
	}




$pdf = new DOMPDF();
 
$pdf->set_paper("A4", "landscape");
// Cargamos el contenido HTML.

$pdf->load_html($html, 'UTF-8'); 
$pdf->render();
$pdf->stream("Repuestos_".rand(10,1000).".pdf", array("Attachment" => false));


?>