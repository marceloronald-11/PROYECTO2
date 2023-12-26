<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

//mysqli_query($conexion,"DELETE FROM clasificacion WHERE codcla = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM solicituddet WHERE norden='$id' " );

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '
<table class="table table-striped  table-bordered titi">
			       <tr>
			                <td width="15%">Detalle</td>
			                <td width="4%" align="center">U.Med.</td>
			                <td width="7%" align="center">Prioridad</td>
			                <td width="5%" align="center">Cant.Solic.</td>
			                <td width="5%" align="center">Cant.Recib.</td>
			                <td width="6%" align="center">Precio Unit.</td>
			                <td width="9%" align="center">No Factura</td>

                            <td width="6%">Opciones</td>

			            </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
        $pr=$registro2['tpriodt'];
        $tpr='';
        if($pr=='AL'){$tpr='ALTA';}
        if($pr=='MD'){$tpr='MEDIA';}
        if($pr=='BJ'){$tpr='BAJA';}

        echo '<tr>

                            <td><a href="javascript:editar23('.$registro2['codsoldt'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['detrepdt'].'</a></td>

                            <td align="center">'.$registro2['umed'].'</td>
                            <td align="center">'.$tpr.'</td>
                            <td align="center">'.$registro2['cantsoli'].'</td>

                            <td align="center">'.$registro2['cantllego'].'</td>


                            <td align="right">'.$registro2['preciodt'].'</td>
                            <td align="center">'.$registro2['nfactura'].'</td>
                            
							<td><a href="javascript:eliminaCla('.$registro2['codsoldt'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
						  </tr>';
    }
    
    echo '<tr><td colspan="8"><a href="jc_entregaCompra.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Retornar a Recetas"> SALIR</a></td></tr> ';    
echo '</table>';

?>
