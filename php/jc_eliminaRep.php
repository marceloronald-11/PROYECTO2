<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM repuesto WHERE codrep = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM repuesto");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
<tr>
<td width="20%">Detalle</td>
<td width="9%">Codigo</td>
<td width="4%">U.Med.</td>
<td width="9%">No Parte</td>
<td width="10%">Ubicacion</td>
<td width="10%">Especif.</td>
<td width="6%">Costo</td>
<td width="7%">Saldo</td>
<td width="7%">Stock-Min.</td>
<td width="7%">Opciones</td>

</tr>';

	while($registro2 = mysqli_fetch_array($registro)){
	
		echo '<tr>
        <td><a href="javascript:editarProducto('.$registro2['codrep'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['detrepuesto'].'</a></td>        
                            <td>'.$registro2['codigo'].'</td>
                            <td>'.$registro2['umed'].'</td>
                            <td>'.$registro2['nparte'].'</td>
                            <td>'.$registro2['ubicacion'].'</td>
                            <td>'.$registro2['especificacion'].'</td>
                            <td>'.$registro2['costo'].'</td>
                            <td>'.$registro2['saldo'].'</td>
                            <td>'.$registro2['saldomin'].'</td>
                            

							<td><a href="javascript:eliminaRep('.$registro2['codrep'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
						  </tr>';
	}
echo '</table>';
?>