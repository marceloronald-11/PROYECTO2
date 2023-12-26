<?php
	include('../php/conexion.php');
	
  	$registro = mysqli_query($conexion,"SELECT * FROM elemento ");




	while($registro2 = mysqli_fetch_array($registro)){
	
        $xcod=$registro2['codeliso'];
        $id=$registro2['codel'];

        $nro=strlen($xcod);
            if($nro==1){
                $nw='0'.$xcod;
                mysqli_query($conexion,"UPDATE elemento SET codeliso='$nw' WHERE codel = '$id'");
            }else{
                 $nw=$xcod;
            }
              	
	}
        
    echo 'FINALIZANDO DOBLE';

?>