<?php
include('conexion.php');
$id = $_POST['idper1'];
$proceso = $_POST['pro1'];
$nnota = $_POST['nnota1'];
$cli = $_POST['cli1'];
$cla = $_POST['cla1'];
$pre = $_POST['pre1'];
$observ = $_POST['observ1'];
$idu = $_POST['idu1'];
$ac = $_POST['ac1'];
$fei = $_POST['fei1'];
$fef = $_POST['fef1'];

$debe=$pre-$ac;
$ffi= date("Y-m-d", strtotime($fei) );
$fff= date("Y-m-d", strtotime($fef) );
//$cantt=1;
//$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO
//$fnac= date("Y-m-d", strtotime($fenac) );
$ter='';
switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO movgymtot (fechamv,nordengym,importe,idcli,id_usu,coddisi,idtip,nombre,modulo)VALUES
		(NOW(),'$nnota','$ac', '$id', '$idu','$cla','1','$cli','GYM')");

		mysqli_query($conexion,"UPDATE codnu SET nordengym = '$nnota' "); // actualizando codnu
		
		if($debe>0){$ter='DEUDA';}else{$ter='CANCELADO';}
		
		
		mysqli_query($conexion,"INSERT INTO creditosgym (fechagym,nordengym,totalcr,saldocr,idcli,id_usu,coddisi,idtip,gm,fechaini,fechafin,estado)VALUES
		(NOW(),'$nnota','$pre','$debe', '$id', '$idu','$cla','1','PG','$ffi','$fff','$ter')");
		
		
	//	if ($debe>0){mysqli_query($conexion,"INSERT INTO creditosgym (fechagym,nordengym,totalcr,saldocr,idcli,id_usu,coddisi,idtip,gm,fechaini,fechafin,estado)VALUES
	//	(NOW(),'$nnota','$pre','$debe', '$id', '$idu','$cla','1','PG','$ffi','$fff','$ter')"); }
		
		mysqli_query($conexion,"INSERT INTO pagosgym (fechapg,nordengym,importepg,idcli,id_usu)VALUES(NOW(),'$nnota','$ac','$id','$idu')");

		mysqli_query($conexion,"INSERT INTO histocliente (codcli,nombre,fechahisto,observcli,tiporg)VALUES
		('$id','$cli',NOW(),'$observ','Mensuales')");
		
		
		
	break;
	
	case 'Edicion':
		mysqli_query($conexion,"UPDATE clientes SET nombre = '$nomb', ci = '$ci',codigo = '$cod', fechanac = '$fenac', edad = '$edad' , direccion = '$dire',cel='$cel', email='$email',observcli='$observ', sexo='$sex' WHERE idcli = '$id'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM clientes ORDER BY idcli ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
  			             <tr>
			                <th width="25%">Cliente </th>
			                <th width="15%">No Carnet</th>
			                <th width="10%">Codigo</th>
			                <th width="15%">Observ.</th>
							<th width="5%">Imagen</th>
			                <th width="15%" align="center">Opcion</th>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nombre'].'</td>
							<td>'.$registro2['ci'].'</td>
							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['observcli'].'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>	
							<td><a href="javascript:VerCaja('.$registro2['idcli'].');"><img src="../recursos/caja.png" data-toggle="tooltip" title="Caja Movimientos"></a> 
							<a href="javascript:PagoMes('.$registro2['idcli'].');"><img src="../recursos/pagos.png" data-toggle="tooltip" title="Pagos Mensuales"></a></td>
						  </tr>';
	}
echo '</table>';
?>