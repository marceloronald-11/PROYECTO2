<?php
	include('../php/conexion.php');
	
  	$registro = mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN sucursal AS su ON ar.codsuc=su.codsuc ORDER BY ar.descripar ASC  ");


  	echo '<table border="1" class="table table-striped table-condensed table-hover table-bordered titi">';

	$sw=0;			
	while($registro2 = mysqli_fetch_array($registro)){
		$codarx=$registro2['codar'];
		
		
		
		
	if($sw==0){
		echo '<tr><td>'.$registro2['descripar'].'</td></tr>';
		echo'<tr>
			<td width="15%" align="center">Sucursal</td>
			<td width="5%" align="center">Saldo</td>
			<td width="5%" align="center">Precio</td>
			<td width="7%" align="center">Total</td>

		</tr>';		
		$sw=1;
		
	}	
		
		echo '<tr>
							<td align="center">'.$registro2['nombresuc'].'</td>
							<td align="center">'.$registro2['saldo'].'</td>
							<td align="center">'.$registro2['saldo'].'</td>
							<td align="center">'.$registro2['saldo'].'</td>
							
						  </tr>';		
	}
        

    echo '</table>';
?>