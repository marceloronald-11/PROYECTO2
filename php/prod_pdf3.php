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
require('conexion.php');

$pdf = new FPDF();
$pdf->AddPage('L');
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../recursos/tienda.gif' , 10 ,8, 10 , 13,'GIF');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, 'SICORET"', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Hoy: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'ARTICULOS ASIGNADOS', 0);
$pdf->Ln(10);
$pdf->Cell(60, 8, '', 0);
//$pdf->Cell(100, 8, 'Desde: '.$verDesde.' hasta: '.$verHasta, 0);
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(10, 8, 'Item', 0);
$pdf->Cell(60, 8, 'Descrip.Articulo', 0);
$pdf->Cell(50, 8, 'Asignado a', 0);
$pdf->Cell(30, 8, 'Marca', 0);
$pdf->Cell(30, 8, 'Modelo', 0);
$pdf->Cell(40, 8, 'Serial', 0);
$pdf->Cell(18, 8, 'Registro', 0);
$pdf->Cell(15, 8, 'Precio Bs.', 0);

$pdf->Ln(8);
$pdf->SetFont('Arial', '', 7);
//CONSULTA
//$productos = mysql_query("SELECT * FROM productos WHERE id_per<1");
$productos = mysql_query("SELECT * FROM productos INNER JOIN personal ON personal.id_per = productos.id_per");


//SELECT * FROM productos INNER JOIN personal ON personal.id_per = productos.id_per
$item = 0;
$totaluni = 0;
$totaldis = 0;
while($productos2 = mysql_fetch_array($productos)){
	$item = $item+1;
	$totaluni = $totaluni + $productos2['precio_unit'];
	$pdf->Cell(10, 8, $item, 0);
	$pdf->Cell(60, 8,$productos2['nomb_prod'], 0);
	$pdf->Cell(50, 8, $productos2['nombre'], 0);
	$pdf->Cell(30, 8, $productos2['marca'], 0);
	$pdf->Cell(30, 8, $productos2['modelo'], 0);
	$pdf->Cell(40, 8, $productos2['serial'], 0);
	$pdf->Cell(18, 8, date('d/m/Y', strtotime($productos2['fecha_reg'])), 0);
	$pdf->Cell(15, 8, $productos2['precio_unit'], 0);
	
	$pdf->Ln(8);
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(104,8,'',0);
//$pdf->Cell(31,8,'Total Unitario: Bs. '.$totaluni,0);

$pdf->Output('reporte.pdf','I');
?>