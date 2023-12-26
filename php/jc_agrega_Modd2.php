<?php
if (!isset($_SESSION)) {session_start();}

//include('conexion.php');
include('../php/conexion.php');
$idhe = $_POST['idalu'];
$proceso = 'Editar'; //$_POST['pro'];
//$caant = $_POST['idalu2'];
$canllex = $_POST['canlle'];
$preziox = $_POST['prezio'];
//$stotx = $_POST['stot'];
$priix = $_POST['prii'];
$nordenx = $_POST['nordenx'];

$codareax=0;
$codcargox=0;
$nomsoli='';


if (isset($_SESSION['codarease1'])){
    $codareax=$_SESSION['codarease1'];// = $datos[0]['codarea3'];
    $codcargox=$_SESSION['codcargose1'];// = $datos[0]['codcargo3'];
    $nomsoli=$_SESSION['nomsolicita'];// = $dtnom;
}

//$codsolix=$_SESSION['codsolise'] ;//= $datos[0]['codsoli3'];

//var_dump ($_POST);
//echo $codareax;

$fecha = date('Y-m-d');
    


if ($codareax!=0){

switch($proceso){
	case 'Registro':
		//mysqli_query($conexion,"INSERT INTO profesiones (detprofesion,codigopf)VALUES('$nomhe','$cohh')");
	break;
	case 'Editar':
        foreach ($_POST['idalu'] as $clave=>$ids) 
        {
            $iddd=$ids;
            //$xcant=$caant[$clave];
            $xcanlle=$canllex[$clave];
            $xprecio=$preziox[$clave];
            $xprii=$priix[$clave];

            mysqli_query($conexion,"UPDATE solicituddet2 SET cantsoli='$xcanlle',preciodt='$xprecio',tpriodt='$xprii' WHERE codsoldt = '$iddd' ");

            mysqli_query($conexion,"UPDATE solicitudtot2 SET codarea='$codareax',codcargo='$codcargox',afavor='$nomsoli' WHERE norden='$nordenx' ");

        }

        unset($_SESSION['codarease1']);
	break;
}

}else{
    echo 'NO SE REGISTRO COMPLETE DATOS ...!';
}

?>