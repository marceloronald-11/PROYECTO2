<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];
include('../php/conexion.php');

$proceso= $_POST['pro3'];
$idarx= $_POST['idper3'];
$codareax= $_POST['codarea3'];
$codalux= $_POST['codalum3'];
$nombclix = $_POST['nomcli23'];
$detcux = $_POST['detcu']; ///codigo curso
$fecadux = $_POST['fecadu'];

//$dett='';

//$registro = mysqli_query($conexion,"SELECT * FROM area WHERE codarea='$codarex' ");
//while($registro2 = mysqli_fetch_array($registro)){
//	$dett=$registro2['detarea'];
//}

$fecha = date('Y-m-d');


//var_dump ($_POST);

switch($proceso){
	case 'Registro':
		//$existe = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM alumno WHERE cialum='$cix' "));
		
		
		//if($existe<=0){	
			mysqli_query($conexion,"INSERT INTO cursoalumno (codalum,codarea,codigocurr,fechacurr,codaa)VALUES ('$codalux','$codareax','$detcux','$fecadux','$idarx')");
		
			mysqli_query($conexion,"UPDATE areaalumno SET ncursos=ncursos+1  WHERE codaa = '$idarx'");
	
//		}
		
	break;
	
	case 'Editar':
		
	//	mysqli_query($conexion,"UPDATE alumno SET nombrealum='$nombclix',telfalum='$telx',emailalum='$correo',cialum='$cix',coddep='$coddepx'  WHERE codalum = '$idarx'");

	break;
}

$registro = mysqli_query($conexion,"SELECT * FROM areaalumno WHERE codalum='$codalux' ");

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%" align="center">Area**</td>
			                <td width="8%" align="center">No Cursos</td>
							<td width="8%" align="center">Opciones</td>

			            </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							
							<td>'.$registro2['detarea2'].'</td>
<td align="center" ><span class="badge bag"><a href="javascript:VerCursos('.$registro2['codalum'].','.$registro2['codarea'].');" data-toggle="tooltip" title="Ver Cursos" >'.$registro2['ncursos'].'</a></span> <a href="javascript:anadircurso('.$registro2['codaa'].');" ><img src="../recursos/anadir.png" data-toggle="tooltip" title="Añadir Cursos"></a></td>							
							
							<td align="center">  <a href="javascript:eliminaDocu('.$registro2['codaa'].','.$registro2['codalum'].','.$registro2['codarea'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Area"></a></td>
							</tr>';
						  	}
echo '<tr><td colspan="4"><a href="crm_participantes.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Retornar"> SALIR</a></td>
</tr>';
echo '</table>';
?>