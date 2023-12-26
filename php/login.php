<?php
include('../php/conexion.php');
if(isset($_SESSION['usuario'])==true and isset($_SESSION['id_area'])==true){
	if($_SESSION['id_area'] == 'admin'){
		header('Location:../php/ventas.php');
	}else if($_SESSION['id_area'] == 'usuarios'){
		header('Location: ../php/almacen.php');
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Articulos VENTAS</title>

<link href="../css/estilo2.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjava2.js"></script>
</head>

<body>
<img id="fondo" src="../recursos/ventas_fondo-log.jpg"/>

    <div class="login" align="center">
    	<h2>INICIE SESION</h2>
    	<label>Ingrese su Usuario:</label>
        <br />
        <input type="text" id="usu"/>
        <br />
        <br />
        <label>Ingrese su Contraseña:</label>
        <br />
        <input type="password" id="pass"/>
        <br />
        <br />
        <label>Elija su Area:</label>
        <br />
        <select id="area">
            <option value="admin">Administrador</option>
            <option value="usuarios">Usuarios</option>
        </select>
        <br />
        <br />
        <button id="ingresar">Ingresar</button>
        <br />
        <br />
        <div id="mensaje"></div>
    </div>
</body>
</html>
