
<?php
if (!isset($_SESSION)) {session_start();}
if (!isset($_SESSION)) {session_start();}
$nombre_u=$_SESSION['nomb_usu'];
$fotito=$_SESSION['fotousu'];
$nombresuc=$_SESSION['nomb_suc'];
date_default_timezone_set('America/La_Paz');

require_once '../Config/conexion.php';
require_once '../Model/Producto.php';
$objProducto = new Producto();

?>
<!doctype html>
<html>
<head>


<meta charset="utf-8">
<title>ADMIN</title>
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
<script src="../js/myjavaSin2.js"></script>
<script src="../js/jquery.numeric.js"></script>
<!-- JS JAVAS PERSONALIZADO -->

<style type="text/css">
	.titi {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #006;
}
.tipe {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 29px;
	color: #b33c0d;
}

	ul.ui-autocomplete {
    z-index: 1100;
}

 </style>
</head>

<body>
<div class="container-fluid">
<div class="row"> 

<div class="col-sm-4 hidden-xs" style="background-color:white;"> 
        <table class="table"><tr><td align="left"><img src="../recursos/login.png" class="img-responsive" width="50px" height="50px" alt="lebrai"></td>
        </tr></table>
 </div> 
<!-- fin col-sm-2 -->
<div class="col-sm-4 tit" style="background-color:white;">
<center><h4>VERIFICACION DE CODIGO DE CONTROL</h4></center>
</div> <!-- fin col-sm-2 -->
<div class="col-sm-4 hidden-xs" style="background-color:white;">
<table border="0" width="100%" class="table"><tr><td width="50%" align="right"> <img src="<?php echo $fotito; ?>"  class="img-circle" width="50" height="50"/></td><td align="left">
<?php echo 'Usuario :'.$nombre_u; ?>
</td></tr>
</table>
</div> <!-- fin col-sm-2 -->
</div> <!--!fin de row -->

<br>

<div class="row">
<div class="col-sm-12">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="z_inicio1.php">Menu</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
<!--        <li class="active"><a href="z_inicio1.php"><span class="glyphicon glyphicon-home"></span> Salir</a></li>
-->      </ul>
    <form class="navbar-form navbar-left">


<!--      <div class="input-group">
        <input type="text" class="form-control" id="bs-prod" placeholder="Buscar">
        <div class="input-group-btn">
          <button class="btn btn-default" type="button">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
--><hr class="hidden-lg hidden-md hidden-sm">
      <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#registra-artis">Nuevo</button>
    </form>
      
      
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.php"><span class="glyphicon glyphicon-off"></span> Cerrrar Sesion</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>
</div>

<br>
    
<div class="row">    
    
<div class="col-sm-12 tipe">    
<div class="registros table-responsive" id="agrega-registros" style="width:100%;"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>

</div> <!-- fin col-sm-12 -->
</div> <!-- fin row -->
 



</div> <!-- fin container -->
  




    <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-artis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registro de Control</b></h4>
            </div>
            <form id="formulario" class="form-horizontal " onsubmit="return agregaRegistroSin();">
            <div class="modal-body">
                   	<input type="hidden" required readonly id="pro" name="pro" value="Registro"/>
                   	<input type="hidden"  readonly id="codi" name="codi" />

                                    <div class="form-group">
                                    <label class="control-label col-xs-3 titi" for="nauto">No Autorizacion:</label>
                                    <div class="col-xs-6">
                                    <input type="text" class="form-control" id="nauto" name="nauto" required placeholder="No Autorizacion">
                                     </div>
                                    </div>

                                    <div class="form-group">
                                    <label class="control-label col-xs-3 titi" for="nfa">No Factura:</label>
                                    <div class="col-xs-6">
                                    <input type="text" class="form-control" id="nfa" name="nfa" required placeholder="No Factura">
                                     </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label col-xs-3 titi" for="nitt">Nit:</label>
                                    <div class="col-xs-6">
                                    <input type="text" class="form-control" id="nitt" name="nitt" required placeholder="Nit">
                                     </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label col-xs-3 titi" for="fe">Fecha:</label>
                                    <div class="col-xs-6">
                                    <input type="date" class="form-control" id="fe" name="fe" required placeholder="Fecha">
                                     </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label col-xs-3 titi" for="impo">Importe:</label>
                                    <div class="col-xs-6">
                                    <input type="text" class="form-control" id="impo" name="impo" required placeholder="Importe">
                                     </div>
                                    </div>
                                    <div class="form-group">
                                    <label  class="control-label col-xs-3 titi" for="lla">Llave:</label>
                                    <div class="col-xs-9">
                                    <textarea class="form-control" rows="3" id="lla" required name="lla" placeholder="Llave"></textarea>
                                    </div>
                                    </div>                


     

                        	<div id="mensaje"></div>
            </div>
<?php            
//$obj = json_decode($json1);
//echo $obj.nombre;
?>
            <div class="modal-footer">
            	<input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            </div>
            </form>
          </div>
        </div>
        
        
</div>

<!--- fin modal -->    

     
    
</div> <!-- fin container -->

<!--<script src="../bootstrap/js/bootstrap.min.js"></script>
-->
</body>
</html>
