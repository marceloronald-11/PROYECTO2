<?php
if (!isset($_SESSION)) {session_start();}
$codde=$_SESSION['depto'];
$codsucx=$_SESSION['codsuc'];

	include('conexion.php');
	//require_once '../Config/conexion.php';
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM transporte AS tr JOIN sucursal
	AS su ON tr.codsuc=su.codsuc WHERE tr.cdtra='' "));

 //   $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM transporte WHERE cdtra='' "));


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

//  	$registro = mysql_query("SELECT * FROM habita LIMIT $limit, $nroLotes ");
	
$registro= mysqli_query($conexion,"SELECT * FROM transporte  AS tr JOIN sucursal
	AS su ON tr.codsuc=su.codsuc WHERE tr.cdtra='' LIMIT $limit, $nroLotes");

//$registro= mysqli_query($conexion,"SELECT * FROM transporte WHERE cdtra='' LIMIT $limit, $nroLotes");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover titi">
			            <tr>
			                <td>No Orden</td>
			                <td>Fecha</td>
			                <td>Cliente</td>
			                <td>Direccion</td>
			                <td>Fecha Ent.</td>
			                <td>Hora Ent.</td>
			                <td>Solicito</td>
			                <td colspan="2" align="center">Opciones</td>
			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td>'.$registro2['norden'].'</td>
							<td>'.$registro2['fechaact'].'</td>
							<td>'.$registro2['clientetra'].'</td>
							<td>'.$registro2['direcctra'].'</td>
							<td>'.$registro2['fechaentre'].'</td>
							<td>'.$registro2['horaentre'].'</td>
							<td>'.$registro2['nombresuc'].'</td>

							<td> <a href="javascript:ImprimeTra('.$registro2['codtra'].');" ><img src="../recursos/impresora.png" data-toggle="tooltip" title="Ver Solicitud"></a>
 </td><td><a href="javascript:EditaTra('.$registro2['codtra'].');" ><img src="../recursos/confirm.png" data-toggle="tooltip" title="Registrar Informe"></a>
							</td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>