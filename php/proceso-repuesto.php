<?php
	include('../php/conexion.php');
	
  	//$registro = mysqli_query($conexion,"SELECT * FROM backrepuesto WHERE codrre='2' ");
  	$registro = mysqli_query($conexion,"SELECT * FROM backrepuesto ");




	while($registro2 = mysqli_fetch_array($registro)){
	
        $xcoss=$registro2['dtcostos'];
        $xprocc=$registro2['dtproceso'];
        $xmaqq=$registro2['dtmaquina'];
        $xelem=$registro2['dtelemento'];
        $xitm=$registro2['item'];
        $xcodi=$registro2['codigoge'];
        $xdet=$registro2['detrepuesto'];
//echo $xdet;
//echo $xcodi;
       //  mysqli_query($conexion,"INSERT INTO repuesto2 (detrespuesto,codigo,codcc,codpro,codmq,codel,codcct,codprot,codmqt,codelt,codit,codmd,umed,nparte,ubicacion,especificacion,costo,saldo,saldomin)VALUES('$xdet','$xcodi','1','1','1','1','$xcoss','$xprocc','$xmaqq','$xelem','$xitm','1','','','','','1.00','1.00','1.00')");
    mysqli_query($conexion,"INSERT INTO repuesto (detrepuesto,codigo,codcct,codprot,codmqt,codelt,codit)VALUES ('$xdet','$xcodi','$xcoss','$xprocc','$xmaqq','$xelem','$xitm')");
         	
	}
        
    echo 'finalizo';

?>