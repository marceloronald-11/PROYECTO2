<?php

include('../php/conexion.php');
include_once 'usuarios.classjca.php';

$usuario = new Usuarios();
$type = $_GET['type'];
/**
 * Type 1: Resultados del autocomplete.
 * Type 2: Formulario para agregar usuarios.
 * Type 3: Funcion para agregar usuario.
 */
switch ($type) {
    
    case 1:
        echo json_encode($usuario->buscarArticulo($_GET['term']));
    	break;
    case 2:
        echo json_encode($usuario->buscarNombre($_GET['term']));
    	break;
        case 3:
        echo json_encode($usuario->buscarOte($_GET['term']));
    	break;
    case 4:
        echo json_encode($usuario->buscarTecnico($_GET['term']));
        break;    
        
    case 5:
        echo json_encode($usuario->buscarSolis($_GET['term']));
    	break;    

    default:
    break;
}

