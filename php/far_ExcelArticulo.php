<?php
	require '../Classes/PHPExcel.php';
	include('../php/conexion.php');


//include('conexion.php');

$codsucx = $_GET['codsucx'];
$diax = $_GET['diax'];


	$objPHPExcel = new PHPExcel();
	$objPHPExcel->getProperties()->setCreator("Prog.Raul Rodriguez Cel.77766269")->setDescription("Reporte de Articulosa");
	
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Articulos");
	
	$estiloTituloColumnas = array(
    'font' => array(
	'name'  => 'Arial',
	'bold'  => true,
	'size' =>9,
	'color' => array(
	'rgb' => 'FFFFFF'
	)
    ),
    'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => '538DD5')
    ),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
    'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);

	

$objPHPExcel->getActiveSheet()->setCellValue('B1', 'ARTICULOS');
	
	$objPHPExcel->getActiveSheet()->getStyle('A3:F3')->applyFromArray($estiloTituloColumnas);


	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
	$objPHPExcel->getActiveSheet()->setCellValue('A3', 'ARTICULO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
	$objPHPExcel->getActiveSheet()->setCellValue('B3', 'CODIGO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
	$objPHPExcel->getActiveSheet()->setCellValue('C3', 'FECHA ING.');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(9);
	$objPHPExcel->getActiveSheet()->setCellValue('D3', 'U.MED.');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(9);
	$objPHPExcel->getActiveSheet()->setCellValue('E3', 'P.NETO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(9);
	$objPHPExcel->getActiveSheet()->setCellValue('F3', 'PVP');

	
//EJECUTAMOS LA CONSULTA DE BUSQUEDA


$fila = 4;
$row= mysqli_query($conexion,"SELECT * FROM articulos ");

while ($roww = mysqli_fetch_array($row)) {
//$fex= date("d-m-Y", strtotime($roww['fechad']) );
		

$objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(9);

		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila,  $roww['descripar']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $roww['codigoba']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $roww['fechaing']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $roww['umed']);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $roww['pneto']);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $roww['pvp']);

		$fila++;

}




	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Articulos_Farmacia.xlsx"');
	header('Cache-Control: max-age=0');
	
	$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
	$objWriter->save('php://output');


?>