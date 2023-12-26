<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA
$registro = mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN clasificacion AS cl ON ar.codcla=cl.codcla LEFT JOIN articulossuc AS ar2 ON ar.codar=ar2.codar WHERE concat(ar.descripar,ar.codigo) LIKE '%$dato%' ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15% align="center">Producto</td>
			                <td width="5%" align="center">Codigo</td>
			                <td width="7%" align="center">Grupo</td>
			                <td width="7%" align="center">Precio</td>
			                <td width="7%" align="center">Marca</td>
			                <td width="7%" align="center">Modelo</td>
			                <td width="7%" align="center">Proced.</td>
			                <td width="5%" align="center">Saldo Oficina</td>
			                <td width="5%" align="center">Saldo Almacen</td>
			                <td width="5%" align="center">Saldo Total</td>
							
							<td width="12%" align="center">Observacion</td>

			            </tr>';
$tadm='';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		$sal=$registro2['saldo'];
		$stom=$registro2['stockmin'];	
$saltot=$registro2['saldo']+$registro2['saldosuc'];		

		echo '<tr>
							
							<td>'.$registro2['descripar'].'</td>
							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['descripcla'].'</td>
							<td>'.$registro2['pvp'].'</td>
							<td>'.$registro2['marca'].'</td>
							<td>'.$registro2['modelo'].'</td>
							<td>'.$registro2['procedencia'].'</td>
							<td align="center">'.$registro2['saldo'].'</td>
							<td align="center">'.$registro2['saldosuc'].'</td>
							<td align="center">'.$saltot.'</td>
							
							<td >'.$registro2['observar'].'</td>
							
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>