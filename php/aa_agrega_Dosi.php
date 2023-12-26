<?php
//include('conexion.php');
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro'];

$idcod= $_POST['idcod'];
$cosuc = $_POST['cosuc'];
$nauto = $_POST['nauto'];
$nnit = $_POST['nnit'];
$llav = $_POST['llav'];
$felim = $_POST['felim'];
$ley = $_POST['ley'];
//$est = $_POST['est'];

$fecha = date('Y-m-d');

		mysqli_query($conexion,"UPDATE dosificacion SET cdfac =''  WHERE codsuc = '$cosuc' ");
if(isset($_POST['est'])){
	$est = $_POST['est'];
if($est=='SI'){
	$ha='X';
}else{
	$ha='';
}

}else{
	$ha='';
}
//var_dump ($_POST);
//VERIFICAMOS EL PROCESO
//$fee= date("Y-m-d", strtotime($fepag) );
//$nroSucursales = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM sucursal  WHERE codtisuc=1 "));


switch($proceso){
	case 'Registro':
			
			mysqli_query($conexion,"INSERT INTO dosificacion (codsuc,nautorizacion,nit,llave,fechalim,leyenda,cdfac)VALUES ('$cosuc','$nauto','$nnit','$llav','$felim','$ley','$ha')");
	break;
	
	case 'Editar':
		
		mysqli_query($conexion,"UPDATE dosificacion SET codsuc ='$cosuc',nautorizacion='$nauto', nit='$nnit',llave='$llav',fechalim='$felim',leyenda='$ley',cdfac='$ha'  WHERE coddo = '$idcod' ");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
//	$registro = mysqli_query($conexion,"SELECT * FROM sucursal  AS su JOIN tiposucursal AS ts ON su.codtisuc=ts.codtisuc  ");

$registro = mysqli_query($conexion,"SELECT * FROM dosificacion AS do JOIN sucursal AS su on do.codsuc=su.codsuc ");

echo '<table class="table table-striped table-condensed table-hover titi">
        	<tr>
			                <td width="15%">Sucursal</td>
			                <td width="15%">Nro Autorizacion</td>
			                <td width="15%">Nit</td>
			                <td width="15%">Llave</td>
			                <td width="10%">Fecha limite</td>
			                <td width="15%">Leyenda</td>
							<td width="5%">Habilitado</td>
							<td width="10%" class="hidden-xs">Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
							<td>'.$registro2['nombresuc'].'</td>
							<td>'.$registro2['nautorizacion'].'</td>
							<td>'.$registro2['nit'].'</td>
							<td>'.$registro2['llave'].'</td>
							<td>'.$registro2['fechalim'].'</td>
							<td>'.$registro2['leyenda'].'</td>
							<td>'.$registro2['cdfac'].'</td>
							

							<td align="center"><a href="javascript:editarSucFac('.$registro2['coddo'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Registro"></a>
							 <a href="javascript:eliminarSuc('.$registro2['coddo'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							   </td>
						  </tr>';
	}
	
//    echo '<tr><td colspan="4">Totales...</td><td align="right">'.number_format($tt,2).'</td><td align="right">'.number_format($tcr,2).'</td></tr>';
	
echo '</table>';
?>