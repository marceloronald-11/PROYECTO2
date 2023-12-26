<?php
include('conexion.php');

$id = $_POST['id'];//norden

//ELIMINAMOS EL PRODUCTO

//mysqli_query($conexion,"DELETE FROM clasificacion WHERE codcla = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM solicituddet2 WHERE norden='$id' " );

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX
?>

<form id="formulario" class="form-horizontal " onsubmit="return agregaRegistroModelo();">


<?php

echo '<table class="table table-striped  table-bordered titi">
			       <tr>
			                <td width="15%">Detalle</td>
                            <td width="4%" align="center">U.Med.</td>
                            <td width="4%" align="center">Saldo</td>
			                <td width="4%" align="center">Saldo-CR</td>
                            <td width="5%" align="center">Cant.Solic.</td>
                            <td width="7%" align="center">Prioridad</td>

			                <td width="6%" align="center">P.Unit.</td>

                            <td width="4%" align="center">Acciones</td>

			            </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
        $pr=$registro2['tpriodt'];
        $tpr='';
       
        echo '<tr>
        <td hidden><input name="idalu[]" value="'.$registro2['codsoldt'].'" /></td>
        <td hidden><input name="nordenx" value="'.$id.'" /></td>

                            <td align="left">'.$registro2['detrepdt'].'</td>
                            <td align="center">'.$registro2['umed'].'</td>
                            <td align="center">'.$registro2['saldodt'].'</td>
                            <td align="center">'.$registro2['saldomindt'].'</td>
                            <td align="center"><input name="canlle[]" value="'.$registro2['cantsoli'].'" /></td> 
                    
                            <td align="center"> 
                            <select name="prii[]" id="tpri" class="form-control" >
                                <option value="AL">ALTA</option>
                                <option value="MD">MEDIA</option>
                                <option value="BJ">BAJA</option>
                            </select>
                            </td>





                            <td align="right"><input name="prezio[]" value="'.$registro2['preciodt'].'" /></td> 
                                                   

                            
						<td align="center"><a href="javascript:eliminaLin('.$registro2['codsoldt'].','.$registro2['norden'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Item"></a></td>
						  </tr>';
    }
    
    echo '<tr><td colspan="8"><a href="jc_modelo2.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Retornar a Recetas"> SALIR</a></td></tr> ';    
echo '</table>

<div class="modal-footer">

<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#modal-adicion">Adicionar Item</button>

<input type="submit" value="Guardar Cambios" class="btn btn-success" id="reg"/>
 
</div>

</form>

';

?>

 