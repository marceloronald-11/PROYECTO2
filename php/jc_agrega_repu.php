<?php
//include('conexion.php');
include('../php/conexion.php');
$idrepx = $_POST['idrep'];
$proceso = $_POST['pro'];
$lb1x = $_POST['lb1'];
$ccosto1x = $_POST['ccosto1'];
$lb2x = $_POST['lb2'];
$procc1x = $_POST['procc1'];
$lb3x = $_POST['lb3'];
$maqq1x = $_POST['maqq1'];
$lb4x = $_POST['lb4'];
$ele1x = $_POST['ele1'];
$codautox = $_POST['codauto'];
$detx = $_POST['det'];
$medx = $_POST['med'];//codmd
$nparx = $_POST['npar'];
$ubix = $_POST['ubi'];
$espex = $_POST['espe'];
$cosx = $_POST['cos'];
$salx = $_POST['sal'];
$salmx = $_POST['salm'];
$sw = $_POST['sw'];
$nrox = $_POST['nrox'];
$codantx = $_POST['codant'];
$tmed='';
$swww=0;
$ncod=strlen($codautox);


$mjee='NO SE REGISTRO DEBE LLENAR LOS CAMPOS ';
///validar
if($detx==''){
	$mjee .=' Detalle, ';
	$swww=1;
}
if($ubix==''){
	$mjee.=' Ubicacion,';
	$swww=1;
}
if($espex==''){
	$mjee.=' Especificacion,';
	$swww=1;
}
if($ncod!=16){
	$mjee.=' Codigo Generado,';
	$swww=1;
}


///fin validar
if ($swww==0){

$re = mysqli_query($conexion,"SELECT * FROM medidas WHERE codmd='$medx' ");
while($rex = mysqli_fetch_array($re)){
    $tmed=$rex['detmedida'];
}

$itt = explode(".",$codautox);
		$ditt=$itt[4];
$bux=$lb1x.$lb2x.$lb3x.$lb4x;
//var_dump ($_POST);
$fecha = date('Y-m-d');

///validar codigo antes de grabar
$ncodigos=0;
$ncodigos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM repuesto WHERE codigo='$codautox' "));


switch($proceso){
	case 'Registro':
		if($ncodigos==0){

		mysqli_query($conexion,"INSERT INTO repuesto (detrepuesto,codigo,codcc,codpro,codmq,codel,codmd,umed,nparte,ubicacion,especificacion,costo,saldo,saldomin,codcct,codprot,codmqt,codelt,codit,codigobu,codigoanti)VALUES('$detx','$codautox','$lb1x','$lb2x','$lb3x','$lb4x','$medx','$tmed','$nparx','$ubix','$espex','$cosx','$salx','$salmx','$ccosto1x','$procc1x','$maqq1x','$ele1x','$ditt','$bux','$codantx')");



		if($sw==0){//crear corelativo registro insert
			mysqli_query($conexion,"INSERT INTO corelativo (codigobus,nro)VALUES('$bux','$nrox')");
		}else{//incrementar nro update
			mysqli_query($conexion,"UPDATE corelativo SET nro=nro+1 WHERE codigobus = '$bux'");
		}

	}
	break;
	
	case 'Editar':
		//mysqli_query($conexion,"UPDATE clasificacion SET descripcla='$nomcla' WHERE codcla = '$idcla'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
$registro = mysqli_query($conexion,"SELECT * FROM repuesto ORDER BY codigo ASC");

echo '<table class="table table-striped table-condensed table-bordered titi">
<tr>
<td width="7%" align="center">Codigo</td>
<td width="25%">Detalle</td>
<td width="3%" align="center">U.Med.</td>
<td width="10%" align="center">Especif.</td>
<td width="10%" align="center">Ubicacion</td>
<td width="5%" align="center">Stock</td>
<td width="5%" align="center">Costo U$</td>
<td width="5%" align="center">Stock_CR</td>
<td width="7%" align="center">Cod.Antig.</td>

</tr>';
$tadm='';	
$itm=0;		

	while($registro2 = mysqli_fetch_array($registro)){
		$itm+=1;

		echo '<tr>
        <td align="center">'.$registro2['codigo'].'</td>
        <td><a href="javascript:editarRepu('.$registro2['codrep'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['detrepuesto'].'</a></td>  
             
                            <td align="center">'.$registro2['umed'].'</td>
                            <td>'.$registro2['especificacion'].'</td>
                            <td>'.$registro2['ubicacion'].'</td>
                            <td align="right">'.$registro2['saldo'].'</td>

                            <td align="right">'.$registro2['costo'].'</td>
							<td align="right">'.$registro2['saldomin'].'</td>
                            <td align="right">'.$registro2['codigoanti'].'</td>
							
						  </tr>';
	}
echo '</table>';


}else{
	echo $mjee;

	$registro = mysqli_query($conexion,"SELECT * FROM repuesto ");

	echo '<table class="table table-striped table-condensed table-bordered titi">
	<tr>
	<td width="7%" align="center">Codigo</td>
	<td width="25%">Detalle</td>
	<td width="3%" align="center">U.Med.</td>
	<td width="10%" align="center">Especif.</td>
	<td width="10%" align="center">Ubicacion</td>
	<td width="5%" align="center">Stock</td>
	<td width="5%" align="center">Costo U$</td>
	<td width="5%" align="center">Stock_CR</td>
	<td width="7%" align="center">Cod.Antig.</td>
	
	</tr>';
	$tadm='';	
	$itm=0;		
	
		while($registro2 = mysqli_fetch_array($registro)){
			$itm+=1;
	
			echo '<tr>
			<td align="center">'.$registro2['codigo'].'</td>
			<td><a href="javascript:editarRepu('.$registro2['codrep'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['detrepuesto'].'</a></td>  
				 
								<td align="center">'.$registro2['umed'].'</td>
								<td>'.$registro2['especificacion'].'</td>
								<td>'.$registro2['ubicacion'].'</td>
								<td align="right">'.$registro2['saldo'].'</td>
	
								<td align="right">'.$registro2['costo'].'</td>
								<td align="right">'.$registro2['saldomin'].'</td>
								<td align="right">'.$registro2['codigoanti'].'</td>
								
							  </tr>';
		}
	echo '</table>';
	









}

?>