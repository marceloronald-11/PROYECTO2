<?php
include('conexion.php');

$codigop = $_POST['codigop'];// codigo 1112
$tdt = $_POST['tdt']; //codigo 01.01.01.02


$nitm = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM corelativo WHERE codigobus='$codigop' "));

if($nitm==0){
    //crear
    $sw=0;
    $nrox=1;
}else{
    //creado incrementar
    $sw=1;
    //buscar correlativo
    $re = mysqli_query($conexion,"SELECT * FROM corelativo WHERE codigobus='$codigop' ");
    while($rex = mysqli_fetch_array($re)){
        $nrox=$rex['nro']+1;
    }
}

//agregar ceros
$nd=strlen($nrox);
// if($nd==1){$nnrox='00'.$nrox;}
// if($nd==2){$nnrox='0'.$nrox;}
// if($nd==3){$nnrox=$nrox;}


if($nd==1){$nnrox='000'.$nrox;}
if($nd==2){$nnrox='00'.$nrox;}
if($nd==3){$nnrox='0'.$nrox;}

if($nd==4){$nnrox=$nrox;}




//$resp=$tdt.'.'.$nrox;
$resp=$tdt.'.'.$nnrox;

//OBTENEMOS LOS VALORES DEL PRODUCTO

//$valores = mysqli_query($conexion,"SELECT * FROM elemento WHERE codel = '$id4'");
//$valores2 = mysqli_fetch_array($valores);

$datos = array(
                0 => $codigop, 
                1 => $sw, 
                2 => $nrox, //nro
                3 => $resp, //nro


				//1 => $valores2['codeliso'], 
            );
echo json_encode($datos);
?>