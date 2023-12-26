<?php
include('conexion.php');

$id = $_POST['id'];//codcli


$registro = mysqli_query($conexion,"SELECT * FROM solicitudes AS so LEFT JOIN clientes AS cl ON so.codcli=cl.codcli  WHERE so.codcli='$id' ");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="20">Nombre</td>
			                <td width="8%">No Carnet</td>
			                <td width="10%">Telf/Cel</td>
			                <td width="12%">Solicito Bs.</td>
							<td width="10%">Aprobado Bs.</td>
			                <td width="3%">Imagen</td>
							<td width="12%">Opciones</td>

			            </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
	$aprob=$registro2['aprobado'];
		echo '<tr>
							<td>'.$registro2['nombrecli'].'</a></td>
							<td>'.$registro2['cicli'].'</a></td>
							<td>'.$registro2['telfcli'].'</a></td>
							
							<td>'.$registro2['montosolicita'].'</td>
							<td>'.$registro2['montoaprobado'].'</td>

							<td><a href="javascript:mostrarfoto('.$registro2['codsoli'].');" ><img src="'.$registro2['fotocli'].'"width="30" height="30"> </a></td>
							<td><a href="javascript:DatSoli('.$registro2['codsoli'].','.$id.');" ><img src="../recursos/factura.png" data-toggle="tooltip" title="Formulario de Interesado"></a> <a href="javascript:DatSoli211('.$registro2['codsoli'].','.$id.');" ><img src="../recursos/usu2.png" data-toggle="tooltip" title="Formulario de Codeudor"></a>
							<a href="javascript:DatSoli212('.$registro2['codsoli'].','.$id.');" ><img src="../recursos/usu3.png" data-toggle="tooltip" title="Formulario del Garante"></a>';
							if($aprob!='SI'){
								
							echo '<a href="javascript:AprobarSolic('.$registro2['codsoli'].','.$id.');" ><img src="../recursos/refrescar.png" data-toggle="tooltip" title="Aprobar Solicitud"></a>';
							}
							
							echo'</td> 
						  </tr>';
	}
echo '<tr><td colspan="4"><a href="crm_solicitud.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Retornar "> SALIR</a></td></tr>'.'  ';
echo '</table>';
?>