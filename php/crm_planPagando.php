<?php
include('conexion.php');

$codsolix = $_POST['id'];
$codclix = $_POST['codclix'];


?>
<?php
$registro = mysqli_query($conexion,"SELECT * FROM planpagos AS pla LEFT JOIN clientes AS cli ON pla.codcli=cli.codcli WHERE pla.codcli='$codclix' AND codsoli='$codsolix' ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
					            <td align="center" width="9%">Fecha</td>
					            <td align="center" width="5%">Capital</td>
					            <td align="center" width="5%">Interes</td>
					            <td align="center" width="5%">Cargos</td>			
								<td align="center" width="5%">Garantia</td>
								<td align="center" width="5%">Cuota</td>
								<td align="center" width="5%">Acciones</td>
					        </tr>';

$totcap=0;
$totinter=0;
$totcargo=0;
$totgara=0;
$totcuota=0;
$totcap=0;
$totsaldo=0;

while($registro2 = mysqli_fetch_array($registro)){
		$fexx= date("d-m-Y", strtotime($registro2['fechaplan']) );
		$totcap+=$registro2['capital'];
$totcuota=$registro2['capital']+$registro2['interes']+$registro2['cargos']+$registro2['garantia'];	
	$pago=$registro2['pagado'];
	$xcapital=$registro2['capital'];
	if($xcapital>0){
		echo '<tr>
							<td align="center">'.$fexx.'</td>
							<td align="right">'.$registro2['capital'].'</td>
							<td align="right">'.$registro2['interes'].'</td>
							<td align="right">'.$registro2['cargos'].'</td>
							<td align="right">'.$registro2['garantia'].'</td>
							<td align="right">'.number_format($totcuota,2).'</td>';
							
	if($pago!='SI'){
							echo'<td align="center"><a href="javascript:editarPlanCuota('.$registro2['codplan'].');" ><img src="../recursos/caja.png" data-toggle="tooltip" title="PAGAR CUOTA "></a> <a href="javascript:ImprimirCuota('.$registro2['codplan'].');" ><img src="../recursos/impresora.png" data-toggle="tooltip" title="Imprimir CUOTA "></a></td>';
	}else{
		echo'<td align="center">Pagado</td>';
	}
							
						  echo'</tr>';
	}
	
	
	}
echo '<tr><td>Totales</td><td align="right">'.number_format($totcap,2).'</td></tr>';
echo '<tr><td colspan="4"><a href="crm_PagoCuotas.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Retornar "> SALIR</a></td></tr>'.'  ';
echo '</table>';
?>