<?php
if (!isset($_SESSION)) {session_start();}

include('../php/conexion.php');
//require_once '../Model/Producto.php';
date_default_timezone_set('America/La_Paz'); 



if(isset($_SESSION['usuario'])==false or isset($_SESSION['id_area'])==false){
	header('Location:../index.php');
}else{
	if($_SESSION['id_area'] == 'usuarios'){
		header('Location: a_usuario.php');
	}else{
		$usuarios=$_SESSION['usuario'];
		$id_usu= $_SESSION['id_usu'];
		$nombre_u= $_SESSION['nomb_usu'];
		$coddepx= $_SESSION['nomdepto'];
		$idper=$_SESSION['id_per'];
	//	$nomdepto=$_SESSION['nomdepto'];
	}
}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Adm-Ventas</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!--    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
-->
	<link rel="stylesheet" href="../css/estiloini.css" />
   	<link rel="stylesheet" href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" />
   	<script src="../js/jquery.js"> </script>
   	<script type="text/javascript" src="../js/script/jqueryui.js"></script>    

<link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">
<script src="../bootstrap4/js/bootstrap.min.js"></script>

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
-->
<style type="text/css">
	.titi {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #fcf9fa;
}

 
</style>

</head>

<body>

</br>
<div class="container"> <!--A-->
    <div class="row">
    	<div class="col-md-2 col-xs-12 hidden-sm-down">
    	<img src="../recursos/logintit.png" class="img-responsive" width="60px" height="60px" alt="Responsive image">
        </div>
    	<div class="col-md-8 titi col-xs-12">
	<table align="left" border="0" height="100%" width="100%">
    	<tr>
            <td align="center"><label>Bienvenido/a: <?php echo $nombre_u; ?></label></td>
        </tr>
    </table>


        </div>
    	<div class="col-md-2 titi col-xs-12 hidden-sm-down" align="right" >
			<div  class="d-inline-block bg-default">
 			<h5>Administrador</h5>
		</div>        
    	<!--<img src="../recursos/logintit.png" class="img-responsive" width="60px" height="60px" alt="Responsive image">-->
        </div>
        
    </div>

<div class="row"> <!--B-->
<div class="col-md-12 col-xs-12">
	
<nav class="navbar navbar-toggleable-md navbar-light bg-faded navbar-light" style="background-color: #fadb98;">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Menu</a>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    
	<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          GRUPOS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
         <a class="dropdown-item" href="aa_productos.php">ARTICULOS</a>
         <a class="dropdown-item" href="aa_proveedor.php">PROVEEDOR</a>
         <a class="dropdown-item" href="aa_clientes.php">CLIENTES</a>
         <a class="dropdown-item" href="aa_personal.php">PERSONAL</a>
         <a class="dropdown-item" href="aa_Clasifica.php">CLASIFICACION</a>
         <a class="dropdown-item" href="aa_Sucursal.php">SUCURSALES</a>
         <a class="dropdown-item" href="aa_dosifica.php">DOSIFICACION</a>
         <!--<a class="dropdown-item" href="aa_sin.php">VERIFICACION CODIGO CONTROL</a>-->
         <a class="dropdown-item" href="aa_sin2.php">VERIFICACION CODIGO CONTROL</a>
<!--          <a class="dropdown-item" href="#">Moviles</a>
          <a class="dropdown-item" href="z_departamentos.php">Departamentos</a>
          <a class="dropdown-item" href="logindatos.php">Datos en Cero</a>
-->
        </div>
      </li>

	<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          MOVIMIENTOS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
<!--         <a class="dropdown-item" href="aa_ingresos_central.php">COMPRAS</a>
--><a class="dropdown-item" href="aa_comprass_central.php">COMPRAS</a>         
         <a class="dropdown-item" href="aa_ventas_central.php">VENTAS</a>
<!--         <a class="dropdown-item" href="aa_KardexAlm.php">KARDEX</a>
-->        </div>
    </li>	    




	<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          CONSULTAS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
         <a class="dropdown-item" href="aa_ConsultaVentas.php">VENTAS</a>
<!--        <a class="dropdown-item" href="#">SALDOS SUCURSALES</a>
-->
         <a class="dropdown-item" href="logindatos.php">RESETEAR DATOS</a>

        </div>
    </li>	    


      <li class="nav-item">
        <!--<a class="nav-link" href="usuarios3.php">Usuarios</a>-->
        <a class="nav-link" href="aa_usuarios_adm.php">USUARIOS</a>

      </li>

      <li class="nav-item">
        <!--<a class="nav-link" href="usuarios3.php">Usuarios</a>-->
        <a class="nav-link" href="../php/logout.php">CERRAR SESION</a>

      </li>

    </ul>
  </div>
</nav>
    
    
    
    
</div> <!--md12 fin -->
</div> <!--B-->

</div> <!-- FIN CONTAINER --->
<!--<script src="../bootstrap/js/bootstrap.min.js"></script>
-->
</body>
</html>
