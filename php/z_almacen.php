
<?php
if (!isset($_SESSION)) {session_start();}

if (!isset($_SESSION)) {session_start();}
include('../php/conexion.php');
	if(isset($_SESSION['usuario'])==false or isset($_SESSION['id_area'])==false){
				header('Location: ../index.php');
	}else{
	
			if ($_SESSION['id_area'] == 'admin') {
				header('Location:far_inicio1.php');
			} elseif ($_SESSION['id_area'] == 'admin1') {
				header('Location:z_inicio3.php');
			} elseif ($_SESSION['id_area'] == 'usuarios') {
				header('Location:z_inicio2.php');
			} else {
$nombre = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '".$_SESSION['usuario']."'");
				$nombre2 = mysqli_fetch_array($nombre);
			}	
	}



$nombre_u=$_SESSION['nomb_usu'];
$fotito=$_SESSION['fotousu'];
$nombresuc=$_SESSION['nomb_suc'];
$nomdepto=$_SESSION['nomdepto'];
//include('../php/conexion.php');
//if(isset($_SESSION['usuario'])==false or isset($_SESSION['id_area'])==false){
//	header('Location: ../index.php');
//}else{
//	if($_SESSION['id_area'] == 'usuario'){
//		header('Location:php/z_usuarios.php');
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
<title>ADM-VENTAS</title>

<link rel="shortcut icon" href="../recursos/sisadal.ico" type="image/x-icon" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- Bootstrap + Jquery.js -->
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="../js/script/jquery.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Bootstrap -->

<!-- Jquery-iu  JS CSS -->
    	<link rel="stylesheet" href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" />
		<script type="text/javascript" src="../js/script/jqueryui.js"></script>
<!-- Jquery-iu  JS CSS -->

<!-- Alertyfy -->
	<link rel="stylesheet" href="../libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="../libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../libs/js/alertify/lib/alertify.min.js"></script>
<!-- Alertyfy -->

<!-- JS JAVAS PERSONALIZADO -->
<script src="../js/myjava.js"></script>
<script src="../js/jquery.numeric.js"></script>
	<link rel="stylesheet" href="../css/estiloini2.css" />

<!-- JS JAVAS PERSONALIZADO -->

<style type="text/css">
	.tihead {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #006;
}
.cab {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
}

 </style>

</head>

<body>
<div class="container-fluid">

<div class="col-sm-4 hidden-xs" style="background-color:#82b1e9"> 
        <table class="table"><tr><td align="left"><img src="../recursos/login.png" class="img-responsive" width="50px" height="50px" alt="lebrai"></td>
        </tr></table>
 </div> 
<!-- fin col-sm-2 -->
<div class="col-sm-4 tit" style="background-color:82b1e9;">
<center><h4>ALMACENES</h4></center>
</div> <!-- fin col-sm-2 -->
<div class="col-sm-4 hidden-xs" style="background-color:82b1e9;">
<table border="0" width="100%" class="table cab"><tr><td width="50%" align="right" class="hidden-xs"> <img src="<?php echo $fotito; ?>"  class="img-circle" width="50px" height="50px"/></td><td align="left">
<?php echo 'Usuario :'.$nombre_u.'-Almacen'.'<br>'.$nomdepto; ?>
</td></tr>
</table>
</div> <!-- fin col-sm-2 -->
</div> <!--!fin de row -->

<div class="row-fluid"> <!--AAA -->
<div class="col-sm-12"> <!--A1 -->


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">MENU</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

  <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">GRUPOS <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="aa_productos_u.php">ARTICULOS</a></li>
            <li class="divider"></li>

            <li><a href="aa_proveedor.php">PROVEEDOR</a></li>
            <li class="divider"></li>

            <li><a href="aa_clientes.php">CLIENTES</a></li>
            <li class="divider"></li>

            <li><a href="aa_Clasifica.php">CLASIFICACION</a></li>
            <li class="divider"></li>

          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">MOVIMIENTOS <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="aa_ingresos_centralal.php">COMPRAS </a></li>
            <li class="divider"></li>

            <li><a href="aa_despacho1.php">DESPACHO A VENTAS</a></li>
            <li class="divider"></li>

            <li><a href="aa_despachoSuc.php">DESPACHO A SUCURSAL</a></li>
            <li class="divider"></li>

            <li><a href="#">DESPACHO DE VENDEDORES</a></li>
            <li class="divider"></li>

          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">TRANSFERENCIAS<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="aa_confirmSuc2.php">RECIBIR TRANSFERENCIAS</a></li>

          </ul>
        </li>
      </ul>


      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">CONSULTAS <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="aa_consulta2.php">CONSULTAS SUCURSAL</a></li>
            <li class="divider"></li>
            <li><a href="aa_KardexAlm.php">KARDEX ALMACEN</a></li>

          </ul>
        </li>
      </ul>

      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../php/logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesion</a></li>
      </ul>
    </div>
  </div>
</nav>


</div> <!-- FIN A1 -->
</div><!--FIN  AAA -->






</div> <!--FIN CONTAINER -->
</body>
</html>
