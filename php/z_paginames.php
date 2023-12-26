<?php
	include('conexion.php');
	//require_once '../Config/conexion.php';
	$paginaActual = $_POST['partida'];
$ttot=0.00;
    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM clientess AS cli JOIN pagosgym AS pg ON cli.idcli=pg.idcli"));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM clientess AS cli JOIN pagosgym AS pg ON cli.idcli=pg.idcli LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered">
			            <tr>
			                <th width="9%">Fecha </th>
			                <th width="15%">Nombre</th>
			                <th width="8%">No Orden</th>
							<th width="5%">Importe</th>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
	//$ttot=$ttot+$registro2['importepg'];
		//$feee= date("d-m-Y", strtotime($registro2['fechapg']) );
		$tabla = $tabla.'<tr>
							<td align="center">'.$registro2['fechapg'].'</td>
							<td>'.$registro2['nombre'].'</td>
							<td align="center">'.$registro2['nordenpg'].'</td>
							<td align="right">'.$registro2['importepg'].'</td>
						  </tr>';		
	}
       // $tabla=$tabla.'<tr><td colspan="2"></td><td align="right"> Total Bs.- </td><td align="right">'.number_format($ttot,2).'</td><tr>';

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>