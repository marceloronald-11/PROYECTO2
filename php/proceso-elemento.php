<?php
	include('../php/conexion.php');
	
  	$registro = mysqli_query($conexion,"SELECT * FROM tableelemento ");




	while($registro2 = mysqli_fetch_array($registro)){
	
        $xcoss=$registro2['ccosto'];
        $xcopro=$registro2['cproce'];
        $xcmq=$registro2['ccmaq'];

        $xcodd=$registro2['codigo'];
        $xdet=$registro2['detelem'];

        mysqli_query($conexion,"INSERT INTO elemento (detelemento,codcciso,codproiso,codmqiso,codeliso)VALUES ('$xdet','$xcoss','$xcopro','$xcmq','$xcodd')");
         	
	}
        
    echo 'finalizo ELEMENTOS';

?>