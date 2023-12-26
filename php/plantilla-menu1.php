<?php
//if (!isset($_SESSION)) {session_start();}
//
//include('../php/conexion.php');
//if(isset($_SESSION['usuario'])==false or isset($_SESSION['id_area'])==false){
//	header('Location: ../php/index.php');
//}else{
//	if($_SESSION['id_area'] == 'usuario'){
//		header('Location:php/almacen.php');
//	}else{
//		$nombre = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '".$_SESSION['usuario']."'");
//		$nombre2 = mysqli_fetch_array($nombre);
//	}
//}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PLANTILLA</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
   	<link rel="stylesheet" href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" />
   	<script src="../js/jquery.js"> </script>
   	<script type="text/javascript" src="../js/script/jqueryui.js"></script>    





</head>

<body>
</br>
<div class="container"> <!--A-->
<header>
    <div class="row">
    	<div class="col-md-12 r1l1 col-xs-12">
    	<img src="../recursos/logintit.png" class="img-responsive" width="60px" height="60px" alt="Responsive image">
        </div>
    </div>
</header>

<div class="row"> <!--B-->
<div class="col-md-12 col-xs-12">
	<nav class="navbar navbar-default  navbar-inverse" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">GoGo</a>
  </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">INICIO</a></li>
      <li><a href="#">NOSOTROS</a></li>
      <li><a href="#">MISION VISION</a></li>
      <li><a href="#">QUIENES SOMOS</a></li>
      <li><a href="#">CONTACTENOS</a></li>

<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">SERVICIOS<span class="caret"></span></a>
                                		<ul class="dropdown-menu">
                                        	<li> <a href="#">TURISMO</a></li>
                                            <li class="divider"></li>
                                            <li> <a href="#">AGENCIAS</a></li>
                                        </ul>
                                
                                </li>
    </ul>
  </div>
</nav>
</div> <!--md12 fin -->
</div> <!--B-->

</div> <!-- FIN CONTAINER --->
<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
