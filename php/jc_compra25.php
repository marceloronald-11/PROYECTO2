<?php
include('conexion.php');

$nordenx = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

//mysqli_query($conexion,"UPDATE solicitudtot SET tmm='Confirmado' WHERE norden = '$nordenx' ");
mysqli_query($conexion,"UPDATE solicitudtot SET tmm='Confirmado' WHERE norden = '$nordenx'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

//$registro = mysqli_query($conexion,"SELECT * FROM solicitudtot AS so LEFT JOIN areas AS ar ON so.codarea=ar.codarea LEFT JOIN cargo AS ca ON so.codcargo=ca.codcargo ");

$registro = mysqli_query($conexion,"SELECT * FROM solicitudtot AS so LEFT JOIN areas AS ar ON so.codarea=ar.codarea LEFT JOIN cargo AS ca ON so.codcargo=ca.codcargo WHERE so.tmm='Confirmado' OR so.tmm='Entregado' ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-bordered titi">
<tr>
<td width="15%">Solicitante</td>
<td width="9%">Area</td>
<td width="9%">Cargo</td>
<td width="6%">Cod.Doc.</td>
<td width="9%" align="center">Estado</td>
<td width="5%" align="center">Acciones</td>
</tr>';

	while($registro2 = mysqli_fetch_array($registro)){
    $op1= $registro2['tmm'];

		echo '<tr>
    <td>'.$registro2['afavor'].'</td>
    <td>'.$registro2['detarea'].'</td>
    <td>'.$registro2['detcargo'].'</td>
    <td>'.$registro2['coddoc'].'</td>
    <td align="center">'.$registro2['tmm'].'</td>';
                  if($op1=='Entregado'){
                    echo ' <td align="center"><a href="javascript:envia25('.$registro2['norden'].');" ><img src="../recursos/usu3.png" data-toggle="tooltip" title="Confirmar Compra "></a> <a href="javascript:Imprii('.$registro2['norden'].');" ><img src="../recursos/impresora.png" data-toggle="tooltip" title="Imprimir "></a>
                      </td>
                    </tr>';
                  }else{
                    echo ' <td align="center"> <a href="javascript:Imprii('.$registro2['norden'].');" ><img src="../recursos/impresora.png" data-toggle="tooltip" title="Imprimir "></a>
                      </td>
                    </tr>';
                  }
	}
echo '</table>';
?>