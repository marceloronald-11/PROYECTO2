<?php
//include('conexion.php');
include('../php/conexion.php');
$nordenx = $_POST['nordenx'];
$proceso = $_POST['proa'];
$des = $_POST['nomrepu'];
$um = $_POST['um'];
$sald = $_POST['sald'];
$saldcr = $_POST['saldcr'];
$precc = $_POST['precc'];
$codree = $_POST['codree'];
$codigoxx = $_POST['codigoxx'];


//var_dump ($_POST);
$fecha = date('Y-m-d');

///validar codigo antes de grabar

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO solicituddet2 (detrepdt,norden,umed,saldodt,saldomindt,preciodt,codrep,codigo)VALUES('$des','$nordenx','$um','$sald','$saldcr','$precc','$codree','$codigoxx')");

	break;
	
	case 'Editar':
		//mysqli_query($conexion,"UPDATE clasificacion SET descripcla='$nomcla' WHERE codcla = '$idcla'");

	break;
}

$registro = mysqli_query($conexion,"SELECT * FROM solicituddet2 WHERE norden='$nordenx' " );

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX




echo '
<form id="formulario" class="form-horizontal " onsubmit="return agregaRegistroModelo();">

<table class="table table-striped  table-bordered titi">
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



</form>';

?>