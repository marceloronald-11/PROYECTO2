<?php
	include('../php/conexion.php');
	
  	$registro = mysqli_query($conexion,"SELECT * FROM elemento ");

	while($registro2 = mysqli_fetch_array($registro)){
	
        $xcod=$registro2['codproiso'];
        $id=$registro2['codel'];
        $idnw='0';
        $reg = mysqli_query($conexion,"SELECT * FROM proceso WHERE codproiso='$xcod' ");
        while($re = mysqli_fetch_array($reg)){
                $idnw=$re['codpro'];
        }

        mysqli_query($conexion,"UPDATE elemento SET codpro='$idnw' WHERE codel = '$id'");
	}
        
    echo 'finalizo ids';

?>