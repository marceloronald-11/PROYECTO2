<?php
//include('2_numletras.php');
require('../php/conexion.php');
require_once ('../dompdf/dompdf_config.inc.php');

//$norden = $_GET['norden'];

//mysqli_query($conexion,"UPDATE movimtot SET imprimio='SI' WHERE norden='$norden'");




$row = mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN clasificacion AS cl ON ar.codcla=cl.codcla LEFT JOIN proveedor AS pv ON ar.codpv=pv.codpv");

$html ='<style>body { font-family: arial; font-size: 14px; }
.cab {color: blue; font-size: 20px; }
.le { text-align: right font-family: arial; font-size: 16px;}
.bor {border: 1px solid black;border-radius: 4px; text-align: center; font-family:arial; font-size: 16px;}
.bor1 {border: 1px solid black;border-radius: 1px; font-family:arial; font-size: 11px;}

</style>' ;




$html .= '<table border="0" WIDTH="100%" class="arriba">';
$html .= '<tr><td width="30%"><img src="../recursos/jachalogo.jpg" alt="raul.webnet" width="70px" height="70px"/></td><td align="center" class="cab">LISTA DE PRECIOS</td><td align="center" class="profo">Enc: Luis Chaca<br>Cel.77775495 </td></tr>';




$html .= '<table WIDTH="100%" >
			            <tr>
			                <td width="30%" class="bor">Producto</td>
			                <td width="5%" class="bor">U.Med</td>
			                <td width="7%" class="bor">Precio</td>
			                <td width="15%" class="bor">Grupo</td>
			                <td width="15%" class="bor">Proveedor</td>
							<td width="20%" class="bor">Observacion</td>
			            </tr>';


while ($registro2 = mysqli_fetch_array($row)) {
//$it=$it+1;
$html .= '<tr>
							<td class="bor1">'.$registro2['descripar'].'</td>
							<td class="bor1">'.$registro2['umed'].'</td>
							<td class="bor1">'.$registro2['pvp'].'</td>
							<td class="bor1">'.$registro2['descripcla'].'</td>
							<td class="bor1">'.$registro2['nombrepv'].'</td>
							<td class="bor1">'.$registro2['observar'].'</td>
														
						  </tr>';
}

$html .= '</table>';


$pdf = new DOMPDF();
 
$pdf->set_paper("A4", "portrait");

// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));
// Renderizamos el documento PDF.
$pdf->render();

$pdf->stream("lista_"."No_".rand(10,1000).".pdf", array("Attachment" => false));
?>