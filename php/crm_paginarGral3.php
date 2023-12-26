<?php
	include('../php/conexion.php');
mysqli_query($conexion,"TRUNCATE TABLE saldos");



  	$registro = mysqli_query($conexion,"SELECT * FROM articulos");
	
	while($registro2 = mysqli_fetch_array($registro)){
		$codarx=$registro2['codar'];
		$descripx=$registro2['descripar'];
		$saldox=$registro2['saldo'];
		$pvpx=$registro2['pvp'];
		$codsucx=$registro2['codsuc'];
		$tot=$registro2['saldo']*$registro2['pvp'];
		
		
		mysqli_query($conexion,"INSERT INTO saldos (codar,descripar,saldo,pvp,codsuc,importetot)VALUES ('$codarx','$descripx','$saldox','$pvpx','$codsucx','$tot')");
	}
	
//$reg = mysqli_query($conexion,"SELECT * FROM articulossuc AS ar1 LEFT JOIN articulos AS ar2 ON ar1.codar=ar2.codar");
$reg = mysqli_query($conexion,"SELECT * FROM articulos AS ar1 LEFT JOIN articulossuc AS ar2 ON ar1.codar=ar2.codar");


while($regg = mysqli_fetch_array($reg)){
		$codar2=$regg['codar'];
		$saldo2=$regg['saldosuc'];
		$codsuc2=$regg['codsuc'];
		$descrip2=$regg['descripar'];
		$pvp2=$regg['pvp'];
		$tot=$regg['saldosuc']*$regg['pvp'];

		mysqli_query($conexion,"INSERT INTO saldos (codar,descripar,saldo,pvp,codsuc,importetot)VALUES ('$codar2','$descrip2','$saldo2','$pvp2','$codsuc2','$tot')");
}

/////reporte 
$rm = mysqli_query($conexion,"SELECT * FROM saldos AS sa LEFT JOIN sucursal AS su ON sa.codsuc=su.codsuc ORDER BY sa.codar ASC");

echo '<table border="1" class="table table-striped table-condensed table-hover table-bordered titi">';

	$sw=0;
	while($rett = mysqli_fetch_array($rm)){
		if($sw==0){
			$codarx=$rett['codar'];
			echo '<tr><td>'.$rett['descripar'].'</td></tr>';
			echo'<tr>
			<td width="15%" align="center">Sucursal</td>
			<td width="5%" align="center">Saldo</td>
			<td width="5%" align="center">Preciooo</td>
			<td width="7%" align="center">Total</td>
			</tr>';
			echo '<tr>
							<td align="center">'.$rett['nombresuc'].'</td>
							<td align="center">'.$rett['saldo'].'</td>
							<td align="center">'.$rett['pvp'].'</td>
							<td align="center">'.$rett['importetot'].'</td>
						  </tr>';
			$sw=1;
		}else{
			if($codarx==$rett['codar']){
				echo '<tr>
							<td align="center">'.$rett['nombresuc'].'</td>
							<td align="center">'.$rett['saldo'].'</td>
							<td align="center">'.$rett['pvp'].'</td>
							<td align="center">'.$rett['importetot'].'</td>
						  </tr>';
			}else{
				$codarx=$rett['codar'];
				echo '<tr><td>'.$rett['descripar'].'</td></tr>';
			echo'<tr>
			<td width="15%" align="center">Sucursal</td>
			<td width="5%" align="center">Saldo</td>
			<td width="5%" align="center">Precio</td>
			<td width="7%" align="center">Total</td>
			</tr>';
			echo '<tr>
							<td align="center">'.$rett['nombresuc'].'</td>
							<td align="center">'.$rett['saldo'].'</td>
							<td align="center">'.$rett['pvp'].'</td>
							<td align="center">'.$rett['importetot'].'</td>
						  </tr>';
			}
			
		}
		
		
		
	}
        

    echo '</table>';

?>