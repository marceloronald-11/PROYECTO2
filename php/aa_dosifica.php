
<?php
if (!isset($_SESSION)) {session_start();}
$nombre_u=$_SESSION['nomb_usu'];
$fotito=$_SESSION['fotousu'];
$nombresuc=$_SESSION['nomb_suc'];
//if(isset($_SESSION['usuario'])==false or isset($_SESSION['id_area'])==false){
//	header('Location:../index.php');
//}else{
//	if($_SESSION['id_area'] == 'usuarios'){
//		header('Location: a_usuario.php');
//	}else{
//		$usuarios=$_SESSION['usuario'];
//		$id_usu= $_SESSION['id_usu'];
//		$nombre_u= $_SESSION['nomb_usu'];
//		//$coddepx= $_SESSION['depto'];
//		$idper=$_SESSION['id_per'];
//			//	$nomdepto=$_SESSION['nomdepto'];
//
//	}
//}


require_once '../Config/conexion.php';
require_once '../Model/Producto.php';
$objProducto = new Producto();
//$re = $objProducto->getpersonas($idper);
//		foreach($re as $usu):
//			$fotito= $usu['foto'];
////			$id_usu= $usu['id_usu'];
////			$codde=$usu['coddep'];
//		endforeach;
//
//// $foto = $objProducto->getById($id);
////$depto = $objProducto->getdeptounico($coddepx);
//$umx = $objProducto->getUmed();
$provx = $objProducto->getProveedor();
$grupox = $objProducto->getClasifica();
$suc = $objProducto->getSucursalxfa();

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
<script src="../js/myjavaDosi.js"></script>
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
	font-size: 12px;
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
<center><h4>DOSIFICACION</h4></center>
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
      <button id="nuevo-producto" type="button" class="btn btn-warning  btn-sm"><span class="glyphicon glyphicon-plus"></span> Nuevo</button>
<!--      <a target="_blank" href="javascript:reportePDF();" class="btn btn-danger btn-sm">a PDF</a>
      <a target="_blank" href="javascript:reportexcelPDF();" class="btn btn-success btn-sm">a Excel</a>
-->    </form>
      
      
      
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
    
<div class="col-sm-12 ">    
<div class="registros table-responsive" id="agrega-registros" style="width:100%;"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>

</div> <!-- fin col-sm-12 -->
</div> <!-- fin row -->
 



</div> <!-- fin container -->
  


<!-- Modal -->
  <div class="modal fade"  id="registra-artis"  role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Formulario Datos</h4>
        </div>
   			<form id="formulario" class="form-horizontal " onsubmit="return agregaRegistroDosi77();">
            <div class="modal-body">
					 <input type="hidden"   id="idcod" name="idcod" />
                   	<input type="hidden" required readonly id="pro" name="pro"/>


						<div class = "form-group">
						<label for = "usu" class="control-label col-xs-3 titi">Sucursal:</label>
						 <div class="col-xs-6">
						<select name="cosuc" id="cosuc" class="form-control" >
						 <option value="0">Ninguno</option>
							<?php foreach($suc as $dato1):?>
						<option value="<?php echo $dato1['codsuc']?>"><?php echo $dato1['nombresuc']?></option>
							<?php endforeach;?>
							</select>
						</div>
						</div>
										
						<div class="form-group">
							<label class="control-label col-xs-3 titi" for="nauto">No Autorizacion :</label>
							<div class="col-xs-6">
							<input type="text" class="form-control" id="nauto" name="nauto" required placeholder="No Autorizacion ">
							 </div>
						</div>

         				<div class="form-group">
							<label class="control-label col-xs-3 titi" for="nnit">Nit :</label>
							<div class="col-xs-6">
							<input type="text" class="form-control" id="nnit" name="nnit" required placeholder="Nit ">
							 </div>
						</div>


							<div class="form-group">
							<label  class="control-label col-xs-3 titi" for="observ">Llave:</label>
							<div class="col-xs-9">
							<textarea class="form-control" rows="3" id="llav" required name="llav" placeholder="Llave"></textarea>
							</div>
							</div>                
        				
         				<div class="form-group">
							<label class="control-label col-xs-3 titi" for="felim">Fecha limite :</label>
							<div class="col-xs-4">
							<input type="date" class="form-control" id="felim" name="felim" required placeholder="Fecha limite">
							 </div>
						</div>
         
							<div class="form-group">
							<label  class="control-label col-xs-3 titi" for="ley">Leyenda:</label>
							<div class="col-xs-9">
							<textarea class="form-control" rows="3" id="ley" required name="ley" placeholder="Leyenda"></textarea>
							</div>
							</div>                
          
						<div class = "form-group">
						<label for = "est" class="control-label col-xs-3 titi">Habilitado:</label>
						 <div class="col-xs-3">
	                        <select name="est" id="est" class="form-control" >
                         		<option value="SI">SI</option>
                         		<option value="NO">NO</option>
                         </select>
						</div>
						</div>
                    
                              
                                                  
			
          
          			<div id="mensaje"></div>
        </div>
        <div class="modal-footer">
            	<input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        </div>
		  </form>
        
      </div>
      
    </div>
  </div>
    


    
</div> <!-- fin container -->

<!--<script src="../bootstrap/js/bootstrap.min.js"></script>
-->
</body>
</html>
