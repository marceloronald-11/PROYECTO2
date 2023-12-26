<?php
//include('conexion.php');
include('../php/conexion.php');
$id = $_POST['idusux'];
$proceso = $_POST['pro'];
$iidper = $_POST['iidper'];
$usua = $_POST['usua'];
$pass = $_POST['pass'];
$csuc=$_POST['csuc'];
//$desar = $_POST['desar'];
$cdp = $_POST['cdp'];
$tiu = $_POST['tiu'];

$codts=0;
$nosuc="";
$tadm="";

//var_dump ($_POST);
$busnombre = mysqli_query($conexion,"SELECT * FROM personal WHERE id_per='$iidper' ");
	while($buss = mysqli_fetch_array($busnombre)){
		$nnombre=$buss['nombreper'];
		$fotoper=$buss['fotoper'];
		$ciper=$buss['ciper'];
		
	}

$nnsuc = mysqli_query($conexion,"SELECT * FROM sucursal WHERE codsuc='$csuc' ");
	while($cs = mysqli_fetch_array($nnsuc)){
		$nosuc=$cs['nombresuc'];
		$codts=$cs['codtisuc'];
	}

//$ndepa = mysqli_query($conexion,"SELECT * FROM departamento  WHERE coddep='$cdp'");
//	while($dxx = mysqli_fetch_array($ndepa)){
//		$nodepar=$dxx['descripdepto'];
//	}



$fecha = date('Y-m-d');
$xx='rolito';
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO usuarios (usuario, nomb_usu, pass_usu, id_area,id_per,codsuc,nomb_suc,foto_usu,coddep,codtisuc)VALUES
		('$usua','$nnombre','$pass','$tiu','$iidper','$csuc','$nosuc','$fotoper','$cdp','$codts')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE usuarios SET usuario='$usua', nomb_usu = '$nnombre',pass_usu = '$pass',
		id_area = '$tiu',id_per='$iidper', codsuc='$csuc', nomb_suc='$nosuc',foto_usu='$fotoper',coddep='$cdp',codtisuc='$codts'  WHERE id_usu = '$id'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM usuarios");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
        	 <tr>
			                <th width="15%">Nombre</th>
			                <th width="10%">Usuario</th>
			                <th width="10%">Password</th>
			                <th width="10%" class="hidden-xs">Acceso</th>
			                <th width="15%">Sucursal</th>

			                <th width="15%">Opciones</th>

			            </tr>';
$tadm='';
	while($registro2 = mysqli_fetch_array($registro)){
		if ($registro2['id_area']=='admin'){$tadm='Administrador';}
		if ($registro2['id_area']=='operador'){$tadm='Sucursal';}

		echo '<<tr>
							<td>'.$registro2['nomb_usu'].'</td>
							<td>'.$registro2['usuario'].'</td>
							<td>'.$registro2['pass_usu'].'</td>
							<td class="hidden-xs">'.$tadm.'</td>
							<td>'.$registro2['nomb_suc'].'</td>
							
							<td><a href="javascript:editarUsuario('.$registro2['id_usu'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Usuario"></a>
							 <a href="javascript:eliminarUsux('.$registro2['id_usu'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
						  </tr>';
	}
echo '</table>';
?>