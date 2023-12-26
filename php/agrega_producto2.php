<?php
//include('conexion.php');
include('../php/conexion.php');
if (!isset($_SESSION)){
	session_start();
}

$numnota=$_SESSION['codnu'];
$numnota2=$numnota+1;
$_SESSION['codnu']=$numnota2;
//echo $numnota;



$id = $_POST['id-prod'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$precio_uni = $_POST['precio-uni'];
//$precio_dis = $_POST['precio-dis'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$serial = $_POST['serial'];
$codigo = $_POST['codigo'];
$cant = $_POST['cant'];
$persona=$_POST['persona'];
//echo $persona;


//$numnota=$_POST['numnota'];
//$nnota2=$nnota+1;
//echo $nnota;
$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO
$saldo=0;
$tm="A"; // significa asignacion
if ($persona == 1) {
	///no hace NADA PORQUE ES DEVOLUCION
}else{
switch($proceso){
	case 'Registro':
		mysql_query("INSERT INTO productos (nomb_prod, tipo_prod, precio_unit, precio_dist, fecha_reg,marca,modelo,serial,codigo,saldo)VALUES('$nombre','$tipo','$precio_uni','$precio_dis', '$fecha', '$marca', '$modelo', '$serial', '$codigo', '$cant')");
	break;
	
	case 'Asignacion':
if ($cant == 1) {
		mysql_query("UPDATE productos SET asignado = 'SI', id_per = '$persona', saldo = '$saldo' WHERE id_prod = '$id'");

mysql_query("INSERT INTO movim (id_per, id_prod, serial, modelo, codigo, cant, fechamov, tipom, precio,nnota)VALUES('$persona','$id','$serial','$modelo','$codigo','$cant','$fecha','A','$precio_uni','$numnota')");	

		mysql_query("UPDATE codnu SET nnota = '$numnota2' WHERE id_codnu = '1'");
}


	break;
}
}

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM productos WHERE id_per<1 ORDER BY id_prod ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
 		            <tr>
			                <th width="200">Nombre</th>
			                <th width="100">Tipo</th>
			                <th width="50">Precio</th>
			                <th width="60">Marca</th>
			                <th width="100">Modelo</th>
			                <th width="150">Serie</th>
			                <th width="90">Codigo</th>
			                <th width="30">Disp.</th>
			                <th width="60">Registro</th>
			                <th width="50">Asignar</th>
			            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['nomb_prod'].'</td>
							<td>'.$registro2['tipo_prod'].'</td>
							<td>'.$registro2['precio_unit'].'</td>
							<td>'.$registro2['marca'].'</td>
							<td>'.$registro2['modelo'].'</td>
							<td>'.$registro2['serial'].'</td>
							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['saldo'].'</td>
							<td>'.fechaNormal($registro2['fecha_reg']).'</td>
				<td><a href="javascript:editarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-hand-right"></a> </td>
				</tr>';
	}
echo '</table>';
?>