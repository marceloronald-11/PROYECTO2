<?php
	include('../php/conexion.php');
	
  	$registro = mysqli_query($conexion,"SELECT * FROM tablecostos ");




	while($registro2 = mysqli_fetch_array($registro)){
	
        $xcod=$registro2['codigo'];
        $xdet=$registro2['detcoss'];

        mysqli_query($conexion,"INSERT INTO ccostos (detcostos,codcciso)VALUES ('$xdet','$xcod')");
         	
	}
        
    echo 'finalizo';

?>