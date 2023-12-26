<?php
if (!isset($_SESSION)) {session_start();}

include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion,"SELECT * FROM repuesto WHERE concat(detrepuesto,codigo) LIKE '%$dato%' OR ubicacion LIKE '%$dato%'  ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-bordered titi">
<tr>
                            <td width="7%" align="center">Codigo</td>
                            <td width="25%">Detalle</td>
			                <td width="3%" align="center">U.Med.</td>
                            <td width="10%" align="center">Especif.</td>
			                <td width="10%" align="center">Ubicacion</td>
			                <td width="5%" align="center">Stock</td>
			                <td width="5%" align="center">Costo U$</td>
			                <td width="5%" align="center">Stock_CR</td>
                            
                            

			            </tr>';
$itm=0;
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		$itm+=1;
		echo '<tr>
        <td align="center">'.$registro2['codigo'].'</td>
        <td><a href="javascript:editarRepu('.$registro2['codrep'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['detrepuesto'].'</a></td>  
             
                            <td align="center">'.$registro2['umed'].'</td>
                            <td>'.$registro2['especificacion'].'</td>
                            <td>'.$registro2['ubicacion'].'</td>
                            <td align="right">'.$registro2['saldo'].'</td>

                            <td align="right">'.$registro2['costo'].'</td>
                            <td align="right">'.$registro2['saldomin'].'</td>
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>