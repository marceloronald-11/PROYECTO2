<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM alumno AS al LEFT JOIN departamento AS dp ON al.coddep=dp.coddep "));
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

  	$registro = mysqli_query($conexion,"SELECT * FROM alumno AS al LEFT JOIN departamento AS dp ON al.coddep=dp.coddep LIMIT $limit, $nroLotes ");

  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="18%" align="center">Nombre</td>
			                <td width="9%" align="center">No Carnet</td>
			                <td width="10%" align="center">Telf/Cel</td>
			                <td width="10%" align="center">Correo</td>
			                <td width="10%" align="center">Departamento</td>
							
			                <td width="10%" align="center">No Docum.</td>
							
							<td width="12%" align="center">Acciones//</td>

			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
	
	
		$tabla = $tabla.'<tr>
							<td><a href="javascript:editarCli('.$registro2['codalum'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['nombrealum'].'</a></td>
							<td>'.$registro2['cialum'].'</td>
							<td>'.$registro2['telfalum'].'</td>
							<td>'.$registro2['emailalum'].'</td>
							<td>'.$registro2['descripdepto'].'</td>
							
<td align="center" ><span class="badge bag"><a href="javascript:VerDocumentoss('.$registro2['codalum'].');" data-toggle="tooltip" title="Ver Documentos *" >'.$registro2['ndoc'].'</a> </span> <a href="javascript:SubirDoc3('.$registro2['codalum'].');" ><img src="../recursos/anadir.png" data-toggle="tooltip" title="Añadir Area"></a></td>
							
							
							<td align="center">   <a href="javascript:eliminaCli('.$registro2['codalum'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a></td> 
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>