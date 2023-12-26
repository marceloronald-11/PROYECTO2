<?php
//if (!isset($_SESSION)) {session_start();}
//$codsucss=$_SESSION['codsuc'];
//

	include('../php/conexion.php');
	$codcrexxx = $_POST['codcrexxx'];

//	$paginaActual = $_POST['partida'];
//
//    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM creditos AS cre JOIN clientes AS cli ON cre.codcli=cli.codcli
//	 JOIN sucursal AS su ON cre.codsuc=su.codsuc  WHERE cre.codsuc='$codsucss' AND cre.saldocr>0 "));
//    $nroLotes = 10;
//    $nroPaginas = ceil($nroProductos/$nroLotes);
//    $lista = '';
//    $tabla = '';
//
//    if($paginaActual > 1){
//        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
//    }
//    for($i=1; $i<=$nroPaginas; $i++){
//        if($i == $paginaActual){
//            $lista = $lista.'<li class="active"><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
//        }else{
//            $lista = $lista.'<li><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
//        }
//    }
//    if($paginaActual < $nroPaginas){
//        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';
//    }
//  
//  	if($paginaActual <= 1){
//  		$limit = 0;
//  	}else{
//  		$limit = $nroLotes*($paginaActual-1);
//  	}

  	$registro = mysqli_query($conexion,"SELECT *FROM creditospagos WHERE codcre='$codcrexxx'  ");


  	echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="9%">Fecha</td>
			                <td width="9%" align="center">No Orden</td>
			                <td width="9%" align="right">Importe</td>
			                <td width="7%">Opciones</td>

			            </tr>';
//	$tadm='';			
$tt=0;
	while($registro2 = mysqli_fetch_array($registro)){
	$tt=$tt+$registro2['importepg'];
	$fexx= date("d-m-Y", strtotime($registro2['fechapg']) );

		echo '<tr>
							<td>'.$fexx.'</td>
							<td align="center">'.$registro2['nordenrec'].'</td>
							<td align="right">'.$registro2['importepg'].'</td>
						
							<td><a href="javascript:PagandoCre('.$registro2['codpag'].');" ><img src="../recursos/pagos.png" data-toggle="tooltip" title="Realizar Pago"></a>
						  </tr>';		
	}
        
    echo '<tr><td colspan="2">Totales...</td><td align="right">'.number_format($tt,2).'</td></tr>';

    echo '</table>';



//    $array = array(0 => $tabla,
//    			   1 => $lista);
//
//    echo json_encode($array);
?>