<?php
include('../php/conexion.php');
if(isset($_SESSION['usuario'])==false or isset($_SESSION['id_area'])==false){
	header('Location: index.php');
}else{
	if($_SESSION['id_area'] == 'admin'){
		header('Location: ventas.php');
	}else{
		$nombre = mysql_query("SELECT * FROM usuarios WHERE usuario = '".$_SESSION['usuario']."'");
		$nombre2 = mysql_fetch_array($nombre);
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ventas USUARIOS 2015</title>

<link href="../css/estilo2.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjava.js"></script>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
<img id="fondo" src="../recursos/almacen_fondo.jpg"/>
<header>
	<table align="left" border="0" height="100%" width="100%">
    	<tr>
        	<td><b>AREA USUARIO</b></td>
            <td width="300" align="left"><label>Bienvenido/a: <?php echo $nombre2['nomb_usu']; ?></label></td>
            <!--<td width="50"><a href="../php/logout.php">Salir</a></td> -->
        </tr>
    </table>
</header>

<header>
	<nav class="navbar navbar-default navbar-static-top navbar-inverse">
    		<div class="container-fluid">
            	<div class="navbar-header">
                	<button type="button" class="navbar-toggle collapsed" data-toggle="collapsed" data-target="#navbar-1" >
                    	<span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
						<a href="#" class="navbar-brand">VENTAS</a>
                </div>
                	<div class="collapse navbar-collapse" id="navbar-1">
                    	<ul class="nav navbar-nav">
                        		<li class="active"> <a href="#">MODULO ARTICULOS</a></li>
                        		<li> <a href="#">ASIGNACION</a></li>
                        		<li> <a href="#">TRANSFERENCIA</a></li>
                           		<li> <a href="#">REGISTRO DEL PERSONAL</a></li>
                        		<li> <a href="#">USUARIOS</a></li>

                        		<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">REPORTES<span class="caret"></span></a>
                                		<ul class="dropdown-menu">
                                        	<li> <a href="#">REPORTES MODULO-1</a></li>
                                            <li class="divider"></li>
                                            <li> <a href="#">REPORTE MODULO-2</a></li>
                                        </ul>
                                
                                </li>
                                
                                <li> <a href="../php/logout.php">SALIR</a></li>

                        </ul>
                    </div>
                
            </div>
    </nav>
</header>



</div>
<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
