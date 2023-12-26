<?php
if (!isset($_SESSION)) {session_start();}

$nousuario=$_SESSION['nomb_usu'];
$idper=$_SESSION['id_per'];

date_default_timezone_set('America/La_Paz'); ///1 otro: date_default_timezone_set(‘America/La_Paz’);

include('conexion.php');

$idcli = $_POST['idclii'];
$proceso = $_POST['pro1'];
$nnota = $_POST['nnota1'];
//$cli = $_POST['cli1'];
$saldo = $_POST['saldo'];
$pre = $_POST['pre1'];
//$observ = $_POST['observ1'];
$idu = $_POST['idu1'];
//$ac = $_POST['ac1'];
//$fei = $_POST['fei1'];
//$fef = $_POST['fef1'];

//$debe=$pre-$ac;
//$ffi= date("Y-m-d", strtotime($fei) );
//$fff= date("Y-m-d", strtotime($fef) );
//$cantt=1;
//$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO
//$fnac= date("Y-m-d", strtotime($fenac) );
$ter='';
switch($proceso){
	case 'Registro':
		if ($pre<=$saldo){
		mysqli_query($conexion,"INSERT INTO pagosgym (fechapg,nordengym,importepg,idcli,id_usu,horapg,nomb_usu)VALUES(NOW(),'$nnota','$pre', '$idcli', '$idu',CURTIME(),'$nousuario' )");
		mysqli_query($conexion,"INSERT INTO movgymtot (idcli,id_usu,fechamv,nordengym,importe,idtip,modulo)VALUES ('$idcli','$idu',NOW(),'$nnota','$pre','1','CRE')");
		
		mysqli_query($conexion,"UPDATE creditosgym SET saldocr = saldocr-'$pre' WHERE nordengym='$nnota' "); // actualizando codnu
		}
	break;
	
	case 'Edicion':
		//mysqli_query($conexion,"UPDATE clientes SET nombre = '$nomb', ci = '$ci',codigo = '$cod', fechanac = '$fenac', edad = '$edad' , direccion = '$dire',cel='$cel', email='$email',observcli='$observ', sexo='$sex' WHERE idcli = '$id'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM creditosgym AS cre JOIN clientes AS cli ON cre.idcli=cli.idcli
	 AND saldocr>0 ORDER BY nombre ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
  			             <tr>
			                <th width="9%">Fecha </th>
			                <th width="15%">Nombre</th>
			                <th width="8%">No Orden</th>
			                <th width="5%">Tipo</th>
							<th width="7%">Total</th>
							<th width="7%">Saldo</th>
			                <th width="10%" align="center">Opcion</th>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['fechagym'].'</td>
							<td>'.$registro2['nombre'].'</td>
							<td>'.$registro2['nordengym'].'</td>
							<td>'.$registro2['gm'].'</td>
							<td>'.$registro2['totalcr'].'</td>
							<td>'.$registro2['saldocr'].'</td>
							<td><a href="javascript:PagoDeuda('.$registro2['nordengym'].');"><img src="../recursos/cajero.png" data-toggle="tooltip" title="Pagar"></a>
							<a href="javascript:VerCaja('.$registro2['nordengym'].');"><img src="../recursos/factura.png" data-toggle="tooltip" title="Ver No Orden"></a> 
							<a href="javascript:PagoMees('.$registro2['nordengym'].');"><img src="../recursos/recibo.png" data-toggle="tooltip" title="Ver Pagos"></a></td>
						  </tr>';
	}
echo '</table>';
?>