<?php
include('conexion.php');

$idusx = $_POST['id'];
$xdesde = $_POST['desde'];
$xhasta = $_POST['hasta'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion,"SELECT * FROM movimdet AS mv LEFT JOIN usuarios AS us ON mv.id_usu=us.id_usu WHERE mv.fechadt BETWEEN '$xdesde' AND '$xhasta'  ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%" align="center">Productooo</td>
			                <td width="5%" align="center">U.Med.</td>
			                <td width="5%" align="center">Cant.</td>
			                <td width="5%" align="center">Precio</td>
			                <td width="7%" align="center">Subtot.</td>
			                <td width="5%" align="center">Comision</td>
			                <td width="9%" align="center">Fecha</td>
			                <td width="12%" align="center">Usuario</td>
							
							

			            </tr>';
$tadm='';
$tcomi=0;
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
	$tcomi+=$registro2['comibs'];
		

		echo '<tr>
							<td>'.$registro2['descripdt'].'</td>
							<td>'.$registro2['umed'].'</td>
							<td align="center">'.$registro2['cant'].'</td>
							<td align="right">'.$registro2['precio'].'</td>
							<td align="right">'.$registro2['subtot'].'</td>
							<td align="right">'.$registro2['comibs'].'</td>
							<td align="center">'.$registro2['fechadt'].'</td>
							<td>'.$registro2['nomb_usu'].'</td>
							
						  </tr>';
	}
	echo '<tr><td colspan="5">Total :</td><td align="right">'.number_format($tcomi,2).'</td></tr>';
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>