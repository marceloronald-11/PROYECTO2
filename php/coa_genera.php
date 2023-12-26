<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA




//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-bordered table-condensed table-hover titi">
        	  <tr>
			                <td width="15%">Descripcion</td>
							<td width="10%" class="hidden-xs">Cant.</td>

			            </tr>';
$sw=0;
$can=0;
$registro = mysqli_query($conexion,"SELECT * FROM movimdet ORDER BY codar");


if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		if($sw==0){
			$codarx=$registro2['codar'];
			$sw=1;
		}
		if($registro2['codar']==$codarx){
			$can+=$registro2['cant'];
							echo '<tr>
							<td>'.$registro2['descripdt'].'</td>
							<td>'.$registro2['cant'].'</td>
						  </tr>';
		}else{
			echo '<tr><td align="right">Total :</td><td>'.$can.'</td></tr>';
			$can=0;
			$can+=$registro2['cant'];
			$codarx=$registro2['codar'];
							echo '<tr>
							<td>'.$registro2['descripdt'].'</td>
							<td>'.$registro2['cant'].'</td>
							 </tr>';
			
		}
		
		
	}
	echo '<tr><td align="right">Total :</td><td>'.$can.'</td></tr>';
	
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>