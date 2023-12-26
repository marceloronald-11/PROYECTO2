<?php
//include('conexion.php');
include('../php/conexion.php');
$idhe = $_POST['idalu'];
$proceso = 'Editar'; //$_POST['pro'];
//$caant = $_POST['idalu2'];
$canllex = $_POST['canlle'];
$preziox = $_POST['prezio'];
$nfactx = $_POST['nfactt'];
//var_dump ($_POST);
$fecha = date('Y-m-d');
switch($proceso){
	case 'Registro':
		//mysqli_query($conexion,"INSERT INTO profesiones (detprofesion,codigopf)VALUES('$nomhe','$cohh')");
	break;
	case 'Editar':
        foreach ($_POST['idalu'] as $clave=>$ids) 
        {
            $iddd=$ids;
            //$xcant=$caant[$clave];
            $xcanlle=$canllex[$clave];
            $xprecio=$preziox[$clave];
            $xfac=$nfactx[$clave];

            mysqli_query($conexion,"UPDATE solicituddet SET cantllego='$xcanlle',preciodt='$xprecio',nfactura='$xfac' WHERE codsoldt = '$iddd' ");

        }


	break;
}

//$registro = mysqli_query($conexion,"SELECT * FROM solicitudtot AS so LEFT JOIN areas AS ar ON so.codarea=ar.codarea LEFT JOIN cargo AS ca ON so.codcargo=ca.codcargo WHERE so.tmm='Proceso'");





//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

//$registro = mysqli_query($conexion,"SELECT * FROM profesiones");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

// echo '<table class="table table-striped table-condensed table-bordered titi">
// <tr>
// <td width="15%">Detalle</td>
// <td width="7%">Codigo</td>

// <td width="10%">Acciones</td>

// </tr>';
// 	while($registro2 = mysqli_fetch_array($registro)){

// 		echo '<tr>
// 		<td>'.$registro2['detprofesion'].'</td>
// 		<td>'.$registro2['codigopf'].'</td>

// 		<td><a href="javascript:editarPf('.$registro2['codpf'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar "></a>
// 		 </td>
// 	  </tr>';
// 	}
// echo '</table>';
?>