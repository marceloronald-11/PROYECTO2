<?php
//include('conexion.php');
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro'];

$idarx= $_POST['idper'];
$nomb = $_POST['nomper'];
$ci = $_POST['cii'];
$dire = $_POST['dirper'];
$correo = $_POST['email'];
$tel = $_POST['telper'];
$obv = $_POST['observ'];

$ccar = $_POST['ccar'];
$aar = $_POST['aar'];


$fecha = date('Y-m-d');
var_dump ($_POST);

switch($proceso){
	case 'Registro':
			
			mysqli_query($conexion,"INSERT INTO personal (nombreper,emailper,celper,direccper,observper,ciper,codarea,codcargo)VALUES ('$nomb','$correo','$tel','$dire','$obv','$ci','$aar','$ccar')");
		
	break;
	
	case 'Editar':
		
		mysqli_query($conexion,"UPDATE personal SET nombreper ='$nomb',emailper='$correo', celper='$tel',direccper='$dire',observper='$obv',ciper='$ci',codarea='$aar',codcargo='$ccar'  WHERE codper = '$idarx'");

        mysqli_query($conexion,"UPDATE usuarios SET nomb_usu  WHERE codper = '$idarx'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
$registro = mysqli_query($conexion,"SELECT * FROM personal ");

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
<tr>
<td width="15%">Nombre</td>
<td width="15%">Direccion</td>
<td width="9%">Cel/Telf.</td>
<td width="9%">Correo</td>
<td width="9%">No CI</td>
<td width="9%">Observaciones</td>
<td width="15%">Opciones</td>

</tr>';
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
        <td>'.$registro2['nombreper'].'</td>
        <td>'.$registro2['direccper'].'</td>
        <td>'.$registro2['celper'].'</td>
        <td>'.$registro2['emailper'].'</td>
        <td>'.$registro2['ciper'].'</td>
        <td>'.$registro2['observper'].'</td>

        <td><a href="javascript:editarPer('.$registro2['codper'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Usuario"></a>
         <a href="javascript:eliminaPer('.$registro2['codper'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
      </tr>';
	}
	
//    echo '<tr><td colspan="4">Totales...</td><td align="right">'.number_format($tt,2).'</td><td align="right">'.number_format($tcr,2).'</td></tr>';
	
echo '</table>';
?>