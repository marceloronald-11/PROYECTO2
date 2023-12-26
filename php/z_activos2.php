<?php
if (!isset($_SESSION)) {session_start();}

$nousuario=$_SESSION['nomb_usu'];
$idper=$_SESSION['id_per'];

require_once '../Config/conexion.php';
require_once '../Model/Producto.php';
$objProducto = new Producto();
$re = $objProducto->getpersonas($idper);

		foreach($re as $usu):
			$fotito= $usu['foto'];
//			$id_usu= $usu['id_usu'];
//			$codde=$usu['coddep'];
		endforeach;

//proveedor
$prov = $objProducto->getproveedor();
//CLASIFICACION
$clasi = $objProducto->getclasifica();
//estado
//$estado = $objProducto->getestado();
//compra
//$compra = $objProducto->getcompra();


// $foto = $objProducto->getById($id);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
   	<link rel="stylesheet" href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" />
   	<script src="../js/jquery.js"> </script>
   	<script type="text/javascript" src="../js/script/jqueryui.js"></script>    
	<link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">

    <link rel="stylesheet" href="../libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="../libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../libs/js/alertify/lib/alertify.min.js"></script>


	<script src="../js/myjavactivo.js"></script>
    <script src="../js/jquery.numeric.js"></script>
<style type="text/css">
    body {
	background-image: url(../recursos/fondo_adm.jpg);
}

    .listita {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #006;
}
.tam {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #003;
}
</style>
  </head>
  <body>


<div class="container"> <!--A-->
    <div class="row">
    	<div class="col-md-4 r1l1 col-xs-12 hidden-sm-down">
    	<img src="../recursos/logintit.png" class="img-responsive" width="60px" height="60px" alt="Responsive image">
        </div>
    	<div class="col-md-4 r1l1 col-xs-12">
	<table align="left" border="0" height="100%" width="100%">
    	<tr>
            <td align="center"><label>Bienvenido/a: <?php echo $nombre2['nomb_usu']; ?></label></td>
        </tr>
    </table>
    	
        </div>
    	<div class="col-md-4 r1l1 col-xs-12 hidden-sm-down" align="right" >
			<div  class="d-inline-block bg-default">
 			<h5>Administrador</h5>
  			Gym- Bolivia
		</div>        
    	<!--<img src="../recursos/logintit.png" class="img-responsive" width="60px" height="60px" alt="Responsive image">-->
        </div>
        
    </div>

<div class="row"> <!--B-->
<div class="col-md-12 col-xs-12">
	
<nav class="navbar navbar-toggleable-md navbar-light bg-faded navbar-light" style="background-color: #ede3cc;">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Navbar</a>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    
	<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gimnasio
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="z_movim1.php">Movimientos</a>
          <a class="dropdown-item" href="z_pagos.php">Pagos</a>
          <a class="dropdown-item" href="logindatos.php">Datos en Cero</a>
        </div>
      </li>    

	<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Vitrina
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="z_activosing.php">Compras</a>
          <a class="dropdown-item" href="z_activosegreso.php">Ventas</a>
          <a class="dropdown-item" href="z_activosKardex.php">Kardex</a>
        </div>
      </li>

	<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Grupos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="z_activos.php">Articulos</a>
          <a class="dropdown-item" href="z_clientes.php">Clientes</a>
          <a class="dropdown-item" href="z_personas.php">Personal</a>
          <a class="dropdown-item" href="z_disiplina.php">Disciplina</a>
          <a class="dropdown-item" href="z_proveedor.php">Proveedores</a>

        </div>
      </li>

	<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Reportes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="z_reporte_fecha.php">Ingresos</a>
          <a class="dropdown-item" href="z_reporte_mensual.php">Pagos Mensual</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="usuarios3.php">Usuarios</a>
      </li>

    
      <li class="nav-item active">
        <a class="nav-link" href="../php/logout.php">Cerrar Sesion <span class="sr-only">(current)</span></a>
      </li>
      
    </ul>
  </div>
</nav>
</div> <!--md12 fin -->
</div> <!--B-->

<div class="row"> <!--C-->
<div class="col-md-12">
        <div class="registros" id="agrega-registros" style="width:100%;"></div>
            <center>
                <ul class="pagination" id="pagination"></ul>
            </center>
        </div> <!-- fin col-sm-10 -->

</div>
</div> <!-- FIN C-->





</div> <!-- FIN DE CONTAINER-->





   <script src="../bootstrap4/js/bootstrap.min.js"></script>
    
  </body>


</html>