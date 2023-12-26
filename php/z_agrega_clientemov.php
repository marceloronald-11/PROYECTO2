<?php
include('conexion.php');
$id = $_POST['idper'];
$proceso = $_POST['pro'];
$nnota = $_POST['nnota'];
$cli = $_POST['cli'];
$cla = $_POST['cla'];
$pre = $_POST['pre'];
$observ = $_POST['observ'];
$idu = $_POST['idu'];
$tmv = $_POST['tmv'];
date_default_timezone_set('America/La_Paz'); 
//$cantt=1;
//$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO
//$fnac= date("Y-m-d", strtotime($fenac) );

switch($proceso){
	case 'Registro':

		mysqli_query($conexion,"UPDATE codnu SET nordengym = '$nnota' "); // actualizando codnu
		
		if ($tmv=='CR'){mysqli_query($conexion,"INSERT INTO creditosgym (fechagym,nordengym,totalcr,saldocr,idcli,id_usu,coddisi,idtip,gm,estado)VALUES
		(NOW(),'$nnota','$pre','$pre', '$id', '$idu','$cla','1','MV','DEUDA')"); }else{
			
		mysqli_query($conexion,"INSERT INTO movgymtot (fechamv,nordengym,importe,idcli,id_usu,coddisi,idtip,nombre,modulo)VALUES
		(NOW(),'$nnota','$pre', '$id', '$idu','$cla','1','$cli','GYM')");
			}
		mysqli_query($conexion,"INSERT INTO histocliente (codcli,nombre,fechahisto,observcli,tiporg)VALUES
		('$id','$cli',NOW(),'$observ','Caja Diario')");
		
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
							<a href="javascript:EditarForma('.$registro2['idcli'].');"><img src="../recursos/pagos.png" data-toggle="tooltip" title="Pagos Mensuales"></a>
							<a href="javascript:EditarForma('.$registro2['idcli'].');"><img src="../recursos/credito.png" data-toggle="tooltip" title="Credito"></a>
							<a href="javascript:EditarForma('.$registro2['idcli'].');"><img src="../recursos/tarjeta.png" data-toggle="tooltip" title="Pagos de Creditos"></a></td>
						  </tr>';
	}
echo '</table>';
?>