<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];


	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM creditos AS cre LEFT JOIN clientes AS cli ON cre.codcli=cli.codcli WHERE cre.saldocr>0 AND codsuc='$codsucss' "));
    $nroLotes = 10;
    $nroPaginas = ceil($nroProductos/$nroLotes);
    $lista = '';
    $tabla = '';

    if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';
    }
  
  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}

  	$registro = mysqli_query($conexion,"SELECT * FROM creditos AS cre LEFT JOIN clientes AS cli ON cre.codcli=cli.codcli WHERE cre.saldocr>0 AND codsuc='$codsucss' LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="9%">Fecha</td>
			                <td width="15%">Cliente</td>
			                <td width="7%">No Orden</td>
			                <td width="9%"  align="right">Imp.Total</td>
			                <td width="9%"  align="right">Saldo</td>
			                <td width="8%" align="center">Estado</td>
			                <td width="10%">Opciones</td>

			            </tr>';
//	$tadm='';			
$tt=0;
$tcr=0;
	while($registro2 = mysqli_fetch_array($registro)){
	$tt=$tt+$registro2['totalcr'];
	$tcr=$tcr+$registro2['saldocr'];

		$tabla = $tabla.'<tr>
							<td>'.$registro2['fechacre'].'</td>
							<td>'.$registro2['nombreclii'].'</td>
							<td>'.$registro2['norden'].'</td>
							<td align="right">'.number_format($registro2['totalcr'],2).'</td>
							<td align="right">'.number_format($registro2['saldocr'],2).'</td>
							<td  align="center">'.$registro2['estado'].'</td>
							
							<td><a href="javascript:PagandoCre('.$registro2['codcre'].');" ><img src="../recursos/pagos.png" data-toggle="tooltip" title="Realizar Pago"></a>
							 <a href="javascript:VerPaguos('.$registro2['codcre'].');" ><img src="../recursos/detalles.png" data-toggle="tooltip" title="Detalles de Pagos"></a> 
							 <a href="javascript:ImprimePagos('.$registro2['codcre'].','.$registro2['norden'].');" ><img src="../recursos/impresora.png" data-toggle="tooltip" title="Imprimir Pagos"></a></td>
						  </tr>';		
	}
        
    $tabla = $tabla.'<tr><td colspan="3">Totales...</td><td align="right">'.number_format($tt,2).'</td><td align="right">'.number_format($tcr,2).'</td></tr>';

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>