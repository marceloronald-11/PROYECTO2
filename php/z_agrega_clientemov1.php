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

//$cantt=1;
//$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO
//$fnac= date("Y-m-d", strtotime($fenac) );

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO movgymtot (fechamv,nordengym,importe,idcli,id_usu,coddisi,idtip,nombre,modulo)VALUES
		(NOW(),'$nnota','$pre', '$id', '$idu','$cla','1','$cli','GYM')");

		mysqli_query($conexion,"UPDATE codnu SET nordengym = '$nnota' "); // actualizando codnu
		
	break;
	
	case 'Edicion':
		mysqli_query($conexion,"UPDATE clientes SET nombre = '$nomb', ci = '$ci',codigo = '$cod', fechanac = '$fenac', edad = '$edad' , direccion = '$dire',cel='$cel', email='$email',observcli='$observ', sexo='$sex' WHERE idcli = '$id'");
	break;
}

echo 'ok';
//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
?>