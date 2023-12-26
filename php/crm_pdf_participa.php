<?php
ob_start(); 
include('2_numletras.php');
require('../php/conexion.php');
date_default_timezone_set('America/La_Paz');

$codalux =$_GET['codalx'];// norden

//mysqli_query($conexion,"UPDATE movimtot SET imprimio='NO' WHERE norden='$nordenx'");




//$row = mysqli_query($conexion,"SELECT * FROM personal  WHERE codper='$codperx'");
?>
<style type="text/css">
body { font-family: arial; font-size: 14px; }
#cabeza {color: blue; font-size: 15px; }
H2 { text-align: center;}
H1,H3 { text-align: right;}
.tablita {
    border-collapse: collapse;
    border: 1px solid gray;padding:3px;margin:0;
}	
.raya {border: 1px solid black;border-radius: 2px;}	
.letra {border: 1px solid;border-radius: 2px;font-family: arial; font-size: 12px;padding: 3px; }		
.fa6 {
		font-size: 13px;
		color: #12046C;
	padding-left: 100px;
	
	
	}
.fax2 {
		font-size: 17px;
		color:#F7090D;
	}	
	
.fa2 {border: 1px solid black;border-radius: 9px;background:#E8E1CE; padding:3px;text-align: center;font-size: 18px;}
.fa22 {border: 1px solid black;border-radius: 5px;background:#DBCD6F; padding:3px;text-align: center;font-size: 13px;}	
.border {text-align: center;font-family: arial; font-size: 14px;padding: 3px;color:#221C6E;}
.colo {font-family: arial; font-size: 25px;color:#221C6E;}	
	
.fa1 {text-align: center;font-size: 14px;}	
	
 </style>


<?php
$nombreImagen = '../recursos/log1.png';
$ima1 = "data:image/jpg;base64," . base64_encode(file_get_contents($nombreImagen));

$ttt=0.00;

$row = mysqli_query($conexion,"SELECT * FROM alumno AS al LEFT JOIN departamento AS dp ON al.coddep=dp.coddep WHERE al.codalum='$codalux'");
$ttt=0.00;
while ($row2 = mysqli_fetch_array($row)) {
$nombrex=$row2['nombrealum'];
$telfx=$row2['telfalum'];
$emailx=$row2['emailalum'];
$cix=$row2['cialum'];
$nareasx=$row2['nareas'];
$detdeptox=$row2['descripdepto'];
	
}
?>

<table border="0" WIDTH="100%">';
<tr><td width="15%"><img src="<?php echo $ima1 ?>" alt="marceloronald111@gmail.com" width="80px" height="80px"/></td>
	<td WIDTH="35%" class="fa1" ><p class="colo">"NAABOL"</p> 
<br>La Paz - Bolivia  <p class="fax2">Codigo :<?php echo $codalux; ?></p></td><td  class="border" width="25%"><p></p></td></tr>
</table>
<table  border="0"  WIDTH="100%" >
<tr><td width="70%" class="fa6"><h2>NOTA DE INFORMACION</h2></td><td align="left" class="fa5"></td></tr>
</table>

<table  border="0"  WIDTH="80%" >
<tr><td width="50%" class="fa22">Nombre :</td><td align="left" class="fa22" colspan="2"><?php echo $nombrex; ?></td></tr>	
<tr><td width="50%" class="fa22">Departamento :</td><td align="left" class="fa22" colspan="2"><?php echo $detdeptox; ?></td></tr>	
<tr><td width="50%" class="fa22">Telefono :</td><td align="left" class="fa22" colspan="2"><?php echo $telfx; ?></td></tr>	
<tr><td width="50%" class="fa22">Carnet No :</td><td align="left" class="fa22" colspan="2"><?php echo $cix; ?></td></tr>	
<tr><td width="50%" class="fa22">Correo :</td><td align="left" class="fa22" colspan="2"><?php echo $emailx; ?></td></tr>	

<?php
$row2 = mysqli_query($conexion,"SELECT * FROM areaalumno WHERE codalum='$codalux' ");
$ttt=0.00;
while ($row22 = mysqli_fetch_array($row2)) {
$detareax=$row22['detarea2'];
$ncursosx=$row22['ncursos'];
$codareax=$row22['codarea'];
?>
	<tr><td width="50%" class="fa2">Area :</td><td align="left" class="fa2" colspan="2"><?php echo $detareax; ?></td></tr>
<?php
	$row3 = mysqli_query($conexion,"SELECT * FROM cursoalumno WHERE codalum='$codalux' AND codarea='$codareax' ");
	$codigox='';
	$fechax='';
	while ($row23 = mysqli_fetch_array($row3)) {
		$codigox=$row23['codigocurr'];
		$fechax=$row23['fechacurr'];
		$fe= date("d-m-Y", strtotime($fechax) );
	?>
		<tr><td width="40%" align="right" >Curso :</td><td align="left" ><?php echo $codigox; ?></td><td align="left" width="30%">Caduca :<br><?php echo $fe; ?></td></tr>
	<?php } 
	
	
	
}

?>

</table>


<?php
require '../vendor/autoload.php';

use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->set_paper('A4');
$dompdf->render();
$pdf = $dompdf->output();
$filename = "Venta.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream("Naabol_".rand(10,10000).".pdf", array("Attachment" => false));


?>