<?php
	include('../php/conexion.php');
	
  	$registro = mysqli_query($conexion,"SELECT * FROM tablemaquina ");




	while($registro2 = mysqli_fetch_array($registro)){
	
        $xcoss=$registro2['ccosto'];
        $xcopro=$registro2['cproce'];
        $xcodd=$registro2['codigo'];
        $xdet=$registro2['detmaq'];

        mysqli_query($conexion,"INSERT INTO maquina (detmaquina,codcciso,codproiso,codmqiso)VALUES ('$xdet','$xcoss','$xcopro','$xcodd')");
         	
	}
        
    echo 'finalizo MAQUINAS';

?>