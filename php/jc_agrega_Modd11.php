<?php
if (!isset($_SESSION)) {session_start();}

//include('conexion.php');
include('../php/conexion.php');
$idhe = $_POST['idalu'];
$proceso = 'Editar'; //$_POST['pro'];
//$caant = $_POST['idalu2'];
$canllex = $_POST['canlle'];
$preziox = $_POST['prezio'];
$nfactx = $_POST['nfactt'];
$nordenx = $_POST['nordenx'];

$codareax=$_SESSION['codarease1'];// = $datos[0]['codarea3'];
$codcargox=$_SESSION['codcargose1'];// = $datos[0]['codcargo3'];
$nomsoli=$_SESSION['nomsolicita'];// = $dtnom;


//var_dump ($_POST);
$fecha = date('Y-m-d');
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
            $xfac=$nfactx[$clave];

            mysqli_query($conexion,"UPDATE solicituddet2 SET cantllego='$xcanlle',preciodt='$xprecio',nfactura='$xfac' WHERE codsoldt = '$iddd' ");

        }

        mysqli_query($conexion,"UPDATE solicitudtot2 SET codarea='$codareax',codcargo='$codcargox',afavor='$nomsoli' WHERE norden='$nordenx' ");

	break;
}

?>