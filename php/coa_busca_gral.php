<?php
include('conexion.php');

$dato = $_POST['dato'];

$reg = mysqli_query($conexion,"SELECT * FROM articulos AS ar1 LEFT JOIN  sucursal AS su ON ar1.codsuc=su.codsuc  WHERE ar1.descripar LIKE '%$dato%' AND ar1.saldo>0 ORDER BY ar1.descripar ASC  ");

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="20%">Producto</td>
			                <td width="5%" align="center">Principal</td>
			                <td width="7%" align="center">Saldo</td>
			                <td width="7%" align="center">Precio</td>
			                <td width="7%" align="center">Total </td>
							

			            </tr>';
if(mysqli_num_rows($reg)>0){
	while($regx = mysqli_fetch_array($reg)){
$pvpx=$regx['pvp'];
$saldox=$regx['saldo'];	
$tot1=$pvpx*$saldox;		
		echo '<tr>
							<td>'.$regx['descripar'].'</td>
							<td align="center">'.$regx['nombresuc'].'</td>
							<td align="center">'.$saldox.'</td>
							<td align="center">'.$pvpx.'</td>
							<td align="center">'.$tot1.'</td>
							
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';








$registro = mysqli_query($conexion,"SELECT * FROM articulossuc AS ar1 LEFT JOIN articulos AS ar2 ON ar1.codar=ar2.codar LEFT JOIN sucursal AS su ON ar1.codsuc=su.codsuc  WHERE ar2.descripar LIKE '%$dato%' ORDER BY ar2.descripar ASC  ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="20%">Producto</td>
			                <td width="5%" align="center">Sucursal</td>
			                <td width="7%" align="center">Saldo</td>
			                <td width="7%" align="center">Precio</td>
			                <td width="7%" align="center">Total </td>
							

			            </tr>';
$tadm='';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
$pvpx=$registro2['pvp'];
$saldox=$registro2['saldosuc'];	
$tot2=$pvpx*$saldox;		

		echo '<tr>
							<td>'.$registro2['descripar'].'</td>
							<td align="center">'.$registro2['nombresuc'].'</td>
							<td align="center">'.$registro2['saldosuc'].'</td>
							<td align="center">'.$pvpx.'</td>
							<td align="center">'.$tot2.'</td>
							
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>