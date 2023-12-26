<?php
	include('../php/conexion.php');
	
  	$registro = mysqli_query($conexion,"SELECT * FROM tableproceso ");




	while($registro2 = mysqli_fetch_array($registro)){
	
        $xcoss=$registro2['ccosto'];
        $xcodp=$registro2['codigop'];
        $xdet=$registro2['detproc'];

        mysqli_query($conexion,"INSERT INTO proceso (detproceso,codcciso,codproiso)VALUES ('$xdet','$xcoss','$xcodp')");
         	
	}
        
    echo 'finalizo';

?>