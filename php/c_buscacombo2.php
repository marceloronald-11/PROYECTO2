<?php

if (!isset($_SESSION)) {session_start();}
date_default_timezone_set('America/La_Paz');
$nousuario=$_SESSION['nomb_usu'];
$idusux=$_SESSION['id_usu'];
//$idper=$_SESSION['id_usu'];
//$fotito=$_SESSION['fotou'];


require_once '../Config/conexion.php';
//require_once '../Model/Producto.php';
require_once '../Model/modelo1.php';
$objProducto = new Producto();

$id = $_POST['id']; //E I

$buscareg3 = $objProducto->getMaquina($id);



//	if(mysql_num_rows($buscareg2)>0){
	echo '<option selected="selected" disabled="disabled">Elija Cuenta</option>';
		foreach($buscareg3 as $nnn): 
			echo '<option value="'.$nnn['codmq'].'">'.$nnn['detmaquina']."/".$nnn['codmqiso'].'</option>';
		endforeach;

//}
?>
