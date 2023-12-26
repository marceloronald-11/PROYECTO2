<?php
include('conexion.php');

$nordenx = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

//mysqli_query($conexion,"UPDATE solicitudtot2 SET tmm='Confirmado' WHERE norden = '$nordenx'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

//$registro = mysqli_query($conexion,"SELECT * FROM solicitudtot AS so LEFT JOIN areas AS ar ON so.codarea=ar.codarea LEFT JOIN cargo AS ca ON so.codcargo=ca.codcargo ");

$registro = mysqli_query($conexion,"SELECT * FROM solicituddet2 WHERE norden='$nordenx' ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-bordered titi">
<tr>
<td width="15%">Detalle</td>
<td width="9%">Codigo</td>
<td width="9%">U.Med.</td>
<td width="6%">Cant.Solic</td>
<td width="9%" align="center">Saldo</td>
<td width="9%" align="center">Saldo Min.</td>
<td width="9%" align="center">Prioridad</td>
<td width="9%" align="center">Precio</td>

<td width="5%" align="center">Acciones</td>
</tr>';

	while($registro2 = mysqli_fetch_array($registro)){
    $op1= $registro2['tmm'];
		echo '<tr>
    <td>'.$registro2['detrepdt'].'</td>
    <td>'.$registro2['codigo'].'</td>
    <td>'.$registro2['umed'].'</td>
    <td>'.$registro2['cantsoli'].'</td>
    <td>'.$registro2['saldodt'].'</td>
    <td>'.$registro2['saldomindt'].'</td>
    <td>'.$registro2['tpriodt'].'</td>

    <td align="center">'.$registro2['preciodt'].'</td>';
                  if($op1=='Check'){
                      echo' <td align="center">                       </td>
                    </tr>';
                  }else{
                      echo' <td align="center"><a href="javascript:envia25('.$registro2['codsoldt'].','.$registro2['norden'].');" ><img src="../recursos/confirm.png" data-toggle="tooltip" title="Marcar Compra "></a> 
                      </td>
                    </tr>';
  }
}
echo '</table>';
?>