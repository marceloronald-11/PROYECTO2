<?php

if(strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0){
	$desde = $_GET['desde'];
	$hasta = $_GET['hasta'];

	$verDesde = date('d/m/Y', strtotime($desde));
	$verHasta = date('d/m/Y', strtotime($hasta));
}else{
	$desde = '1111-01-01';
	$hasta = '9999-12-30';

	$verDesde = '__/__/____';
	$verHasta = '__/__/____';
}
require('../fpdf/fpdf.php');
require('../php/conexion.php');

$pdf = new FPDF();
$pdf->AddPage('L');
$pdf->SetFont('Arial', '', 10);
//$pdf->Image('../recursos/tienda.gif' , 10 ,8, 10 , 13,'GIF');
$pdf->Cell(18, 10, '', 0);
//$pdf->Cell(150, 10, 'Listado de Articulos"', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Hoy: '.date('d-m-Y').'', 0);
$pdf->Ln(4);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'LISTADO DE ARTICULOS', 0);
$pdf->Ln(7);
$pdf->Cell(60, 8, '', 0);
//$pdf->Cell(100, 8, 'Desde: '.$verDesde.' hasta: '.$verHasta, 0);
$pdf->Ln(2);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 8, 'Item', 0);
$pdf->Cell(60, 8, 'Articulo', 0);
$pdf->Cell(40, 8, 'Tipo', 0);
$pdf->Cell(40, 8, 'Precio', 0);
$pdf->Cell(40, 8, 'Neto', 0);
$pdf->Cell(40, 8, 'Codigo', 0);
$pdf->Cell(20, 8, 'Se Registro', 0);
$pdf->Cell(18, 8, 'Saldo', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 7);
//CONSULTA
$productos = mysql_query("SELECT * FROM productos ");
$item = 0;
$totaluni = 0;
$totaldis = 0;
while($productos2 = mysql_fetch_array($productos)){
	$item = $item+1;
	$totaluni = $totaluni + $productos2['precio_dist'];
	$pdf->Cell(15, 8, $item, 0);
	$pdf->Cell(60, 8,$productos2['nomb_prod'], 0);
	$pdf->Cell(40, 8, $productos2['tipo_prod'], 0);
	$pdf->Cell(40, 8,$productos2['precio_unit'], 2);
	$pdf->Cell(40, 8,$productos2['precio_dist'], 2);
	$pdf->Cell(40, 8, $productos2['codigo'], 0);
	$pdf->Cell(20, 8, date('d/m/Y', strtotime($productos2['fecha_reg'])), 0);
	$pdf->Cell(18, 8, $productos2['saldo'], 0);
	$pdf->Ln(10);
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(104,8,'',0);
$pdf->Cell(30,8,'Total Neto: Bs. '.$totaluni,0);

$pdf->Output('reporte.pdf','I');
?>