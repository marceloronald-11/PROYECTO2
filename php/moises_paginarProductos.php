<?php
	include('../php/conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN grupo  AS gru ON ar.codgru=gru.codgru LEFT JOIN marca AS mar ON ar.codmar=mar.codmar LEFT JOIN tipo AS ti ON ar.codti= ti.codti "));
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


  	$registro = mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN grupo  AS gru ON ar.codgru=gru.codgru LEFT JOIN marca AS mar ON ar.codmar=mar.codmar LEFT JOIN tipo AS ti ON ar.codti= ti.codti  LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="12% align="center">Descripcion</td>
			                <td width="12%" align="center">Grupo</td>
			                <td width="7%" align="center">Marca</td>
			                <td width="7%" align="center">Tipo</td>
			                <td width="7%" align="center">Serie</td>
			                <td width="7%" align="center">Precio Vta</td>
			                <td width="7%" align="center">Precio Factura</td>
							
			                <td width="5%" align="center">Saldo</td>
			                <td width="5%" align="center">Stock Min.</td>
							
			                <td width="5%" align="center">Imagen</td>
							<td width="10%" align="center">Acciones</td>

			            </tr>';
	$tadm='';			
	while($registro2 = mysqli_fetch_array($registro)){
	
		$tabla = $tabla.'<tr>
							<td><a href="javascript:editarPer('.$registro2['codar'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['descripar'].'</a></td>
							<td align="center">'.$registro2['detgrupo'].'</td>
							<td align="center">'.$registro2['detmarca'].'</td>
							<td align="center">'.$registro2['dettipo'].'</td>
							<td align="center">'.$registro2['serie'].'</td>
							<td align="right">'.$registro2['pvp'].'</td>
							<td align="right">'.$registro2['pneto'].'</td>
							
							<td align="center">'.$registro2['saldo'].'</td>';
		if($registro2['saldo']<=$registro2['stockmin']){
			$tabla = $tabla.'<td align="center" style="background-color:red; font-size:17px;color:white">'.$registro2['stockmin'].'</td>';
		}else{
			$tabla = $tabla.'<td align="center">'.$registro2['stockmin'].'</td>';
		}
		
							$tabla = $tabla.'
							
							<td align="center"><a href="javascript:mostrarfoto('.$registro2['codar'].');" ><img src="'.$registro2['fotoar'].'"width="30" height="30"> </a></td>
							<td align="center"> <a href="javascript:eliminaPer('.$registro2['codar'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar "></a> </a>
							 <a href="javascript:reportePDF('.$registro2['codar'].');" ><img src="../recursos/impresora.png" data-toggle="tooltip" title="Imprimir Ficha"></a> 
							 <a href="javascript:reportePDF2('.$registro2['codar'].');" ><img src="../recursos/qr.png" data-toggle="tooltip" title="Imprimir QR"></a> </td>
							
								
							
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>