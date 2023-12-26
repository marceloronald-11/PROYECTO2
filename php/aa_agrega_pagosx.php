<?php
//include('conexion.php');
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro'];

$codcrexx= $_POST['codcrexx'];
$fepag = $_POST['fepag'];
$pagui = $_POST['pagui'];
$impto = $_POST['impto'];
$sal = $_POST['sal'];
$nordenxx = $_POST['nordenxx'];

//var_dump ($_POST);
//VERIFICAMOS EL PROCESO
$fee= date("Y-m-d", strtotime($fepag) );

switch($proceso){
	case 'Registro':

	break;
	
	case 'Editar':
if ($pagui>$sal){
		//importe no puede ser mayor a saldo
		
	}else{
		mysqli_query($conexion,"INSERT INTO creditospagos (codcre,nordenrec, importepg, fechapg, id_usu)VALUES
		('$codcrexx','$nordenxx','$pagui','$fee','$id_usux')");
		
		mysqli_query($conexion,"UPDATE creditos SET saldocr =saldocr- '$pagui' WHERE codcre = '$codcrexx'");
		
}


	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM creditos AS cre JOIN clientes AS cli ON cre.codcli=cli.codcli
	 JOIN sucursal AS su ON cre.codsuc=su.codsuc WHERE cre.codsuc='$codsucss' AND cre.saldocr>0");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
        	 <tr>
			                <td width="9%">Fecha</td>
			                <td width="15%">Nombre Cliente</td>
			                <td width="9%">Sucursal</td>
			                <td width="7%">No Orden</td>
			                <td width="9%"  align="right">Imp.Total</td>
			                <td width="9%"  align="right">Saldo</td>
			                <td width="8%" align="center">Estado</td>
			                <td width="10%">Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
	$tt=$tt+$registro2['totalcr'];
	$tcr=$tcr+$registro2['saldocr'];

		echo '<tr>
							<td>'.$registro2['fechacre'].'</td>
							<td>'.$registro2['nombrecli'].'</td>
							<td>'.$registro2['nombresuc'].'</td>
							<td>'.$registro2['nordencre'].'</td>
							<td align="right">'.number_format($registro2['totalcr'],2).'</td>
							<td align="right">'.number_format($registro2['saldocr'],2).'</td>
							<td  align="center">'.$registro2['estado'].'</td>
							
							<td><a href="javascript:PagandoCre('.$registro2['codcre'].');" ><img src="../recursos/pagos.png" data-toggle="tooltip" title="Realizar Pago"></a>
							 <a href="javascript:VerPaguos('.$registro2['codcre'].');" ><img src="../recursos/detalles.png" data-toggle="tooltip" title="Detalles de Pagos"></a></td>
						  </tr>';
	}
	
    echo '<tr><td colspan="4">Totales...</td><td align="right">'.number_format($tt,2).'</td><td align="right">'.number_format($tcr,2).'</td></tr>';
	
echo '</table>';
?>