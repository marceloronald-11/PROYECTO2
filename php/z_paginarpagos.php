<?php
	include('conexion.php');
	//require_once '../Config/conexion.php';
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM creditosgym AS cre JOIN clientes AS cli ON cre.idcli=cli.idcli JOIN
 disiplina AS disi ON cre.coddisi=disi.coddisi AND saldocr>0 ORDER BY nombre ASC"));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM creditosgym AS cre JOIN clientes AS cli ON cre.idcli=cli.idcli JOIN
 disiplina AS disi ON cre.coddisi=disi.coddisi AND saldocr>0
 ORDER BY nombre ASC LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered ">
			            <tr>
			                <th width="9%">Fecha </th>
			                <th width="15%">Nombre</th>
			                <th width="8%" align="center">No Orden</th>
			                <th width="5%">Disciplina</th>
							<th width="7%">Total</th>
							<th width="7%">Saldo</th>
			                <th width="10%" align="center">Opciones</th>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$ffe= date("d-m-Y", strtotime($registro2['fechagym']) );
		$tabla = $tabla.'<tr>
							<td>'.$ffe.'</td>
							<td>'.$registro2['nombre'].'</td>
							<td align="center">'.$registro2['nordengym'].'</td>
							<td>'.$registro2['descripdici'].'</td>
							<td>'.$registro2['totalcr'].'</td>
							<td>'.$registro2['saldocr'].'</td>
							<td align="center"><a href="javascript:PagoDeuda('.$registro2['nordengym'].');"><img src="../recursos/cajero.png" data-toggle="tooltip" title="Pagar"></a>
							<a href="javascript:PagoMees('.$registro2['nordengym'].');"><img src="../recursos/recibo.png" data-toggle="tooltip" title="Ver Pagos"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>