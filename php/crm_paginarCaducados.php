<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];
date_default_timezone_set('America/La_Paz');
    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM cursoalumno AS cu LEFT JOIN alumno AS al ON cu.codalum=al.codalum LEFT JOIN areaalumno AS aa ON cu.codarea=aa.codarea LEFT JOIN departamento AS de ON al.coddep=de.coddep "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM cursoalumno AS cu LEFT JOIN alumno AS al ON cu.codalum=al.codalum LEFT JOIN areaalumno AS aa ON cu.codarea=aa.codarea LEFT JOIN departamento AS de ON al.coddep=de.coddep  LIMIT $limit, $nroLotes ");

  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%" align="center">Alumno</td>
			                <td width="15%" align="center">Area</td>
			                <td width="9%" align="center">Codigo</td>
			                <td width="9%" align="center">Caduca</td>
			                <td width="9%" align="center">Dias Restantes</td>
							
			                <td width="9%" align="center">Departamento</td>
							
							<td width="15%" align="center">Acciones</td>

			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
	$fechavx= date("d-m-Y", strtotime($registro2['fechacurr']) );
		$ui=date(strtotime($registro2['fechacurr'])); //UNIX
		$hoy = time(); // formato unix 
		$dif=(($ui-$hoy)/86400);
		$dif1=number_format($dif,0);
	
		$tabla = $tabla.'<tr>
							<td>'.$registro2['nombrealum'].'</td>
							<td>'.$registro2['detarea2'].'</td>
							<td align="center">'.$registro2['codigocurr'].'</td>
							<td align="center">'.$fechavx.'</td>';
							if($dif<=2 ){
								$tabla = $tabla.'<td align="center" style="background-color:red; color:white;font-size:18px;" >'.$dif1.'</td>';
							}else{
								$tabla = $tabla.'<td align="center" >'.$dif1.'</td>';
							}							
							
							
							$tabla = $tabla.'<td align="center">'.$registro2['descripdepto'].'</td>
							
							
							<td align="center"> <a href="javascript:imprimepar('.$registro2['codalum'].');" ><img src="../recursos/impresora.png" data-toggle="tooltip" title="Reporte"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>