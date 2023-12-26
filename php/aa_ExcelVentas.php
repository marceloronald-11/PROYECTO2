<?php
	require '../Classes/PHPExcel.php';
	include('../php/conexion.php');


//include('conexion.php');

$codsucx = $_GET['codsucx'];
$diax = $_GET['diax'];


	$objPHPExcel = new PHPExcel();
	$objPHPExcel->getProperties()->setCreator("Prog.Raul Rodriguez Cel.77766269")->setDescription("Reporte de Ventas");
	
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Ventas");
	
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

	

$objPHPExcel->getActiveSheet()->setCellValue('B1', 'VENTAS REPORTE');
	
	$objPHPExcel->getActiveSheet()->getStyle('A3:G3')->applyFromArray($estiloTituloColumnas);


	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
	$objPHPExcel->getActiveSheet()->setCellValue('A3', 'No FACTURA');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('B3', 'FECHA');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
	$objPHPExcel->getActiveSheet()->setCellValue('C3', 'NOMBRE DEL CLIENTE');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
	$objPHPExcel->getActiveSheet()->setCellValue('D3', 'NIT CLIENTE');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
	$objPHPExcel->getActiveSheet()->setCellValue('E3', 'IMPORTE');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('F3', 'SUCURSAL');
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
	$objPHPExcel->getActiveSheet()->setCellValue('G3', 'ESTADO');

	
//EJECUTAMOS LA CONSULTA DE BUSQUEDA


$fila = 4;
$row= mysqli_query($conexion,"SELECT * FROM movimtot AS mt JOIN sucursal AS su ON mt.codsuc=su.codsuc WHERE mt.codsuc='$codsucx' AND 
fechato='$diax' ");

while ($roww = mysqli_fetch_array($row)) {
//$fex= date("d-m-Y", strtotime($roww['fechad']) );
		$tp=$roww['tmv'];
			if($tp=='X'){$est='ANULADO';}else{$est='';}

$objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(9);

		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila,  $roww['nfactura']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $roww['fechato']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $roww['afavor']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $roww['nitcliente']);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $roww['totimporte']);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $roww['nombresuc']);
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $est);

		$fila++;

}




	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Ventas Excel.xlsx"');
	header('Cache-Control: max-age=0');
	
	$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
	$objWriter->save('php://output');


?>