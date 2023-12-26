<?php

if (!isset($_SESSION)) {session_start();}

//include('2_numletras.php');
require('../php/conexion.php');
require_once ('../dompdf/dompdf_config.inc.php');
$_SESSION['listado'] = array();



ini_set('max_execution_time', 300); //300 seconds = 5 minutes
ini_set('memory_limit', '512M'); //128-512


//$norden = $_GET['norden'];

//mysqli_query($conexion,"UPDATE movimtot SET imprimio='SI' WHERE norden='$norden'");



$registro = mysqli_query($conexion,"SELECT * FROM repuesto WHERE saldo>0 ");

while($registro2 = mysqli_fetch_array($registro)){

  $det=$registro2['detrepuesto'];
  $codi=$registro2['codigo'];
  $codrr=$registro2['codrep'];

  $_SESSION['listado'][$codrr] = array('codrep1'=>$codrr,'detrepuesto'=>$det,'codigox'=>$codi);


}





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
.letra {font-family: arial; font-size: 25px font-style: italic; text-align: center;}
.tick {font-family: arial; font-size: 25px;}
.norden {font-family: sans-serif; font-size: 14px;}
.deticket {color: black; font-size: 10px; font-family: sans-serif; }
.deticket1 {color: black; font-size: 13px; font-family: sans-serif; }

.tot { text-align: right font-family: arial; font-size: 14px;  background-color: rgba(237, 238, 238); padding-left:390px; padding-top:10px;padding-bottom:10px;}
.usu { text-align: right font-family: arial; font-size: 14px; padding-top:12px}
.control { text-align: right font-family: arial; font-size: 18px; padding-top:12px}
</style>' ;


$html .='<table class="bordes" width="100%">
 <tr><td class="letra">REPORTE DE REPUESTOS</td></tr>';
$html .='</table>';


$html .='<table class="bordes" width="100%">
                        <tr>
                            <td width="7%" align="center" class="bordes1">Codigo</td>
                            <td width="25%" class="bordes1">Detalle</td>
			                <td width="3%" align="center" class="bordes1">U.Med.</td>
                            <td width="10%" align="center" class="bordes1">Especif.</td>
			                <td width="10%" align="center" class="bordes1">Ubicacion</td>
			                <td width="5%" align="center" class="bordes1">Stock</td>
			                <td width="5%" align="center" class="bordes1">Costo U$</td>
			                <td width="5%" align="center" class="bordes1">Stock_CR</td>
                            
                            

			            </tr>';
 
 $itm=0;	
//$cambio = valorEnLetras($ttt); 

foreach($_SESSION['listado'] as $det){ 
  $itm += 1;

 
     $html.=' <tr>
     <td align="center">'.$det['codigox'].'</td>
     <td align="center">'.$det['detrepuesto'].'</td>

      </tr>';
 }



$pdf = new DOMPDF();
 
$pdf->set_paper("A4", "landscape");
// Cargamos el contenido HTML.

$pdf->load_html($html, 'UTF-8'); 
$pdf->render();
$pdf->stream("Repuestos_".rand(10,1000).".pdf", array("Attachment" => false));


?>