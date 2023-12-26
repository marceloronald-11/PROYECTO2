<?php
if (!isset($_SESSION)) {session_start();}
//$codsucss=$_SESSION['codsuc'];


	include('../php/conexion.php');
	$codcrexxx = $_POST['codcrexxx'];

  	$registro = mysqli_query($conexion,"SELECT *FROM creditospagos AS cr LEFT JOIN usuarios AS us ON cr.id_usu=us.id_usu WHERE cr.codcre='$codcrexxx'  ");


  	echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="9%">Fecha</td>
			                <td width="15%" align="center">Cobrador</td>
			                <td width="9%" align="center">No Orden</td>
			                <td width="9%" align="right">Importe</td>

			            </tr>';
//	$tadm='';			
$tt=0;
	while($registro2 = mysqli_fetch_array($registro)){
	$tt=$tt+$registro2['importepg'];
	$fexx= date("d-m-Y", strtotime($registro2['fechapg']) );

		echo '<tr>
							<td>'.$fexx.'</td>
							<td align="center">'.$registro2['nomb_usu'].'</td>
							<td align="center">'.$registro2['nordencre'].'</td>
							<td align="right">'.$registro2['importepg'].'</td>
						
						  </tr>';		
	}
        
    echo '<tr><td colspan="3">Totales...</td><td align="right">'.number_format($tt,2).'</td></tr>';
    echo '</table>';
	echo '<a href="crm_pagosCreditos.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Cerrar Vista"> SALIR</a>'.'  ';



//    $array = array(0 => $tabla,
//    			   1 => $lista);
//
//    echo json_encode($array);
?>