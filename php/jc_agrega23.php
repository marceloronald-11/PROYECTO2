<?php
//include('conexion.php');
include('../php/conexion.php');
$idhe = $_POST['idar23'];
$proceso = $_POST['pro23'];
$dtt = $_POST['dtt'];
$cantt = $_POST['carec'];
$pree = $_POST['pree'];
$nfac = $_POST['nfac'];
$nordenx = $_POST['norden23'];

//var_dump ($_POST);
$fecha = date('Y-m-d');

switch($proceso){
	case 'Registro':
		//mysqli_query($conexion,"INSERT INTO areas (detarea)VALUES('$nomhe')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE solicituddet SET cantllego='$cantt',preciodt='$pree',nfactura='$nfac' WHERE codsoldt = '$idhe'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM solicituddet WHERE norden='$nordenx' " );
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-bordered titi">
<tr>
<td width="15%">Detalle</td>
<td width="4%" align="center">U.Med.</td>
<td width="7%" align="center">Prioridad</td>
<td width="5%" align="center">Cant.Solic.</td>
<td width="5%" align="center">Cant.Recib.</td>
<td width="6%" align="center">Precio Unit.</td>
<td width="9%" align="center">No Factura</td>

<td width="6%">Opciones</td>

</tr>';
	while($registro2 = mysqli_fetch_array($registro)){
        $pr=$registro2['tpriodt'];
        $tpr='';
        if($pr=='AL'){$tpr='ALTA';}
        if($pr=='MD'){$tpr='MEDIA';}
        if($pr=='BJ'){$tpr='BAJA';}

		echo '<tr>

                            <td><a href="javascript:editar23('.$registro2['codsoldt'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['detrepdt'].'</a></td>

                            <td align="center">'.$registro2['umed'].'</td>
                            <td align="center">'.$tpr.'</td>
                            <td align="center">'.$registro2['cantsoli'].'</td>

                            <td align="center">'.$registro2['cantllego'].'</td>


                            <td align="right">'.$registro2['preciodt'].'</td>
                            <td align="center">'.$registro2['nfactura'].'</td>
                            
							<td><a href="javascript:eliminaCla('.$registro2['codsoldt'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
						  </tr>';
    }
    echo '<tr><td colspan="8"><a href="jc_entregaCompra.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Retornar a Recetas"> SALIR</a></td></tr> '; 
echo '</table>';
?>