<?php
include('../php/conexion.php');
include_once 'usuarios.classregmoi.php';

$usuario = new Usuarios();
$type = $_GET['type'];
/**
 * Type 1: Resultados del autocomplete.
 * Type 2: Formulario para agregar usuarios.
 * Type 3: Funcion para agregar usuario.
 */
switch ($type) {
    
    case 1:
        echo json_encode($usuario->buscarProdu($_GET['term']));
    	break;
    case 2:
        echo json_encode($usuario->buscarVentas($_GET['term']));
    	break;
    case 3:
        echo json_encode($usuario->buscarTip($_GET['term']));
    break;
   
    default:
    break;
}

