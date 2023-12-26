<?php
//include('conexion.php');
include('../php/conexion.php');
$idrepx = $_POST['idrep1'];
$proceso = $_POST['pro1'];
$nomm = $_POST['nomrep'];
$umd = $_POST['umm'];
$npar = $_POST['npar1'];
$ubi = $_POST['ubi1'];
$espe = $_POST['espe1'];
$cossto = $_POST['cossto1'];
$sal = $_POST['sal1'];
$salcr = $_POST['salcr'];
$codigoanx = $_POST['codigoan'];


//var_dump ($_POST);
$fecha = date('Y-m-d');

switch($proceso){
	case 'Registro':
		//mysqli_query($conexion,"INSERT INTO repuesto (detrepuesto,codigo,codcc,codpro,codmq,codel,codmd,umed,nparte,ubicacion,especificacion,costo,saldo,saldomin,codcct,codprot,codmqt,codelt,codit)VALUES('$detx','$codautox','$lb1x','$lb2x','$lb3x','$lb4x','$medx','$tmed','$nparx','$ubix','$espex','$cosx','$salx','$salmx','$ccosto1x','$procc1x','$maqq1x','$ele1x','$ditt')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE repuesto SET detrepuesto='$nomm',umed='$umd',nparte='$npar',ubicacion='$ubi',especificacion='$espe',costo='$cossto',saldo='$sal',saldomin='$salcr',codigoanti='$codigoanx' WHERE codrep = '$idrepx'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
$registro = mysqli_query($conexion,"SELECT * FROM repuesto ");


//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-bordered titi">
<tr>
                            <td width="25%">Detalle</td>
                            <td width="7%" align="center">Codigo</td>
			                <td width="3%" align="center">U.Med.</td>
			                <td width="10%" align="center">Ubicacion</td>
			                <td width="10%" align="center">Especif.</td>
			                <td width="5%" align="center">Costo Unit.</td>
			                <td width="5%" align="center">Stock</td>
			                <td width="5%" align="center">Stock_CR</td>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
        <td><a href="javascript:editarRepu('.$registro2['codrep'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['detrepuesto'].'</a></td>        
                            <td>'.$registro2['codigo'].'</td>
                            <td>'.$registro2['umed'].'</td>
                            <td>'.$registro2['ubicacion'].'</td>
                            <td>'.$registro2['especificacion'].'</td>
                            <td align="right">'.$registro2['costo'].'</td>
                            <td align="right">'.$registro2['saldo'].'</td>
                            <td align="right">'.$registro2['saldomin'].'</td>
							
						  </tr>';
	}
echo '</table>';
?>