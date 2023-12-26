<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

//$registro = mysqli_query($conexion,"SELECT * FROM usuarios WHERE nomb_usu LIKE '%$dato%' ");

$registro = mysqli_query($conexion,"SELECT * FROM movimtot AS mv LEFT JOIN sucursal AS su ON mv.codsuc=su.codsuc  WHERE mv.tipo='E' AND mv.codcli='$dato'  ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="9%" align="center">Fecha</td>
						
			                <td width="15%" align="center">Clienteff</td>
			                <td width="5%" align="center">No Orden</td>
			                <td width="5%" align="center">No Items</td>
			                <td width="8%"align="center" >Importe</td>
			                <td width="9%"align="center" >Sucursal</td>
							<td width="8%" align="center">Acciones</td>

			            </tr>';
$tadm='';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
	

		echo '<tr>
							<td align="center">'.$registro2['fechato'].'</td>
							<td>'.$registro2['afavor'].'</td>
							<td align="center">'.$registro2['norden'].'</td>
							<td align="center">'.$registro2['itm'].'</td>
							<td align="right">'.$registro2['totimporte'].'</td>
							<td align="center">'.$registro2['nombresuc'].'</td>
							
							<td align="center"> <a href="javascript:ImprimePedido('.$registro2['norden'].');" ><img src="../recursos/impresora.png" data-toggle="tooltip" title="Imprimir Nota"></a> <a href="javascript:VerDocs('.$registro2['norden'].');" ><img src="../recursos/buscar3.png" data-toggle="tooltip" title="Ver Documentos"></a> </td> 
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>