<?php
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro'];

$idarx= $_POST['idper'];
$nombar = $_POST['nomar'];


$fecha = date('Y-m-d');
//var_dump ($_POST);
mysqli_query($conexion,"UPDATE ticket SET aprobotk ='A' WHERE codtk = '$idarx'");




echo '';
?>