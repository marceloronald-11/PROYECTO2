
<?php
if (!isset($_SESSION)) {session_start();}

if(isset($_SESSION['usuario'])==false or isset($_SESSION['id_area'])==false){
	header('Location:../index.php');
}else{
	if($_SESSION['id_area'] == 'usuarios'){
		header('Location: a_usuario.php');
	}else{
		$usuarios=$_SESSION['usuario'];
		$id_usu= $_SESSION['id_usu'];
		$nombre_u= $_SESSION['nomb_usu'];
		//$coddepx= $_SESSION['depto'];
		$idper=$_SESSION['id_per'];
			//	$nomdepto=$_SESSION['nomdepto'];

	}
}


require_once '../Config/conexion.php';
require_once '../Model/Producto.php';
$objProducto = new Producto();
$re = $objProducto->getpersonas($idper);
		foreach($re as $usu):
			$fotito= $usu['foto'];
//			$id_usu= $usu['id_usu'];
//			$codde=$usu['coddep'];
		endforeach;

// $foto = $objProducto->getById($id);
//$depto = $objProducto->getdeptounico($coddepx);
$umx = $objProducto->getUmed();
$provx = $objProducto->getProveedor();
$grupx = $objProducto->getGrupo();
$grupx2 = $objProducto->getGrupo();

?>
<!doctype html>
<html>
<head>


<meta charset="utf-8">
<title>SISADAL</title>
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
<script src="../js/si_javaproducto.js"></script>
<script src="../js/jquery.numeric.js"></script>
<!-- JS JAVAS PERSONALIZADO -->

<style type="text/css">
	.titi {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #006;
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
<center><h4>MODULO DE PRODUCTOS</h4></center>
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
      <a class="navbar-brand" href="#">Menu</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="z_inicio1.php"><span class="glyphicon glyphicon-home"></span> Salir</a></li>
      </ul>
    <form class="navbar-form navbar-left">

      <div class="form-group">
        <select name="grubu" id="grubu" class="form-control" >
             <option value="0">Todos los Grupos</option>
                <?php foreach($grupx2 as $dtt):?>
            <option value="<?php echo $dtt['codgru']?>"><?php echo $dtt['descripgru']?></option>
                <?php endforeach;?>
		</select>

      </div>

      <div class="input-group">
        <input type="text" class="form-control" id="bs-prod" placeholder="Buscar">
        <div class="input-group-btn">
          <button class="btn btn-default" type="button">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
<hr class="hidden-lg hidden-md hidden-sm">
      <button id="nuevo-producto" type="button" class="btn btn-warning  btn-sm"><span class="glyphicon glyphicon-plus"></span> Nuevo</button>
      <a target="_blank" href="javascript:reportePDF();" class="btn btn-danger btn-sm">a PDF</a>
      <a target="_blank" href="javascript:reportexcelPDF();" class="btn btn-success btn-sm">a Excel</a>
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
    
<div class="col-sm-12 ">    
<div class="registros table-responsive" id="agrega-registros" style="width:100%;"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>

</div> <!-- fin col-sm-12 -->
</div> <!-- fin row -->
 



</div> <!-- fin container -->
  




    <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-personas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Ficha del Producto</b></h4>
            </div>
            <form id="formulario" class="form-horizontal " onsubmit="return agregaRegistro();">
            <div class="modal-body">
					 <input type="hidden"   id="idper" name="idper" />

                   	<input type="hidden" required readonly id="pro" name="pro"/>



     <div class="row">
         		<div class="col-md-4">
                  <span class="help-block text-muted small-font" >  Producto:</span>
                  <input type="text" class="form-control input-sm" name="prod" id="prod" placeholder="Producto"   />
              	</div>
              	<div class="col-md-2">
                  <span class="help-block text-muted small-font" > U.Medida:</span>
                        <select name="um" id="um" class="form-control" >
                         		<option value="0">Ninguno</option>
                            		<?php foreach($umx as $umm):?>
                        		<option value="<?php echo $umm['codme']?>"><?php echo $umm['desmed']?></option>
                            		<?php endforeach;?>
                         </select>
              	</div>
         		<div class="col-md-2">
                  <span class="help-block text-muted small-font" >  Cont.grs/cc:</span>
                  <input type="text" class="form-control input-sm" id="cont" name="cont" placeholder="Contenido" />
              	</div>
          		<div class="col-md-2">
                  <span class="help-block text-muted small-font" >  Precio:</span>
                  <input type="text" class="form-control input-sm" id="pre" name="pre" placeholder="Precio" />
              	</div>

          		<div class="col-md-2">
                  <span class="help-block text-muted small-font" >  % Comest.:</span>
                  <input type="text" class="form-control input-sm" id="porco" name="porco" placeholder="% Comest." />
              	</div>
      </div>

     <div class="row">

              	<div class="col-md-4">
                  <span class="help-block text-muted small-font" > Grupo:</span>
                        <select name="gru" id="gru" class="form-control" >
                         		<option value="0">Ninguno</option>
                            		<?php foreach($grupx as $gr):?>
                        		<option value="<?php echo $gr['codgru']?>"><?php echo $gr['descripgru']?></option>
                            		<?php endforeach;?>
                         </select>
              	</div>

         		<div class="col-md-4">
                  <span class="help-block text-muted small-font" >  Proveedor:</span>
                        <select name="pvv" id="pvv" class="form-control" >
                         	<option value="0">Ninguno</option>
                            	<?php foreach($provx as $pv):?>
                        	<option value="<?php echo $pv['codprov']?>"><?php echo $pv['nombrepv']?></option>
                            	<?php endforeach;?>
                      	</select>
              	</div>


         		<div class="col-md-4">
                  <span class="help-block text-muted small-font" >  Observaciones:</span>
 					<textarea class="form-control" rows="3" id="observ" required name="observ" placeholder="Observaciones"></textarea>
              	</div>

      </div>

     <div class="row">
         		<div class="col-md-2">
                  <span class="help-block text-muted small-font" >  Kcal:</span>
                  <input type="text" class="form-control input-sm" id="cal" name="cal" placeholder="Calorias"   />
              	</div>
              	<div class="col-md-2">
                  <span class="help-block text-muted small-font" > Proteina:</span>
                  <input type="text" class="form-control input-sm" id="prot" name="prot" placeholder="Proteina" />
              	</div>
         		<div class="col-md-2">
                  <span class="help-block text-muted small-font" >  Grasas:</span>
                  <input type="text" class="form-control input-sm" id="gra" name="gra" placeholder="Grasas" />
              	</div>
          		<div class="col-md-2">
                  <span class="help-block text-muted small-font" >  Carbohid.:</span>
                  <input type="text" class="form-control input-sm" id="carb" name="carb" placeholder="Carbohid." />
              	</div>

          		<div class="col-md-2">
                  <span class="help-block text-muted small-font" >  Fe:</span>
                  <input type="text" class="form-control input-sm" id="fe" name="fe" placeholder="FE" />
              	</div>
          		<div class="col-md-2">
                  <span class="help-block text-muted small-font" >  P:</span>
                  <input type="text" class="form-control input-sm" id="p" name="p" placeholder="P" />
              	</div>

      </div>
     <div class="row">
         		<div class="col-md-2">
                  <span class="help-block text-muted small-font" >  NA:</span>
                  <input type="text" class="form-control input-sm" id="na" name="na" placeholder="NA"   />
              	</div>
              	<div class="col-md-2">
                  <span class="help-block text-muted small-font" > K:</span>
                  <input type="text" class="form-control input-sm" id="k" name="k" placeholder="K" />
              	</div>
         		<div class="col-md-2">
                  <span class="help-block text-muted small-font" >  ZN:</span>
                  <input type="text" class="form-control input-sm" id="zn"  name="zn" placeholder="ZN" />
              	</div>
          		<div class="col-md-2">
                  <span class="help-block text-muted small-font" >  VitA:</span>
                  <input type="text" class="form-control input-sm" id="vit" name="vit" placeholder="Vit. A" />
              	</div>

          		<div class="col-md-2">
                  <span class="help-block text-muted small-font" >  B1:</span>
                  <input type="text" class="form-control input-sm" id="b1" name="b1" placeholder="B1" />
              	</div>
          		<div class="col-md-2">
                  <span class="help-block text-muted small-font" >  B2:</span>
                  <input type="text" class="form-control input-sm" id="b2" name="b2" placeholder="B2" />
              	</div>

      </div>
     <div class="row">
         		<div class="col-md-2">
                  <span class="help-block text-muted small-font" >  NC:</span>
                  <input type="text" class="form-control input-sm" id="nc" name="nc" placeholder="NC"   />
              	</div>
              	<div class="col-md-2">
                  <span class="help-block text-muted small-font" > C:</span>
                  <input type="text" class="form-control input-sm" id="c" name="c" placeholder="C" />
              	</div>
         		<div class="col-md-2">
                  <span class="help-block text-muted small-font" >  Fibra:</span>
                  <input type="text" class="form-control input-sm" id="fib" name="fib" placeholder="Fibra" />
              	</div>
          		<div class="col-md-2">
                  <span class="help-block text-muted small-font" >  Saldo:</span>
                  <input type="text" class="form-control input-sm" id="sal" name="sal" placeholder="Saldo" />
              	</div>

          		<div class="col-md-2">
                  <span class="help-block text-muted small-font" >  Stock Min.:</span>
                  <input type="text" class="form-control input-sm" id="stm" name="stm" placeholder="Stock Min." />
              	</div>
          		<div class="col-md-2">
                  <span class="help-block text-muted small-font" >  Habilitado:</span>
                    <input type="radio"  name="hab" CHECKED id="sii" value="SI">SI
                    <input type="radio"  name="hab" id="noo" value="NO"> NO 
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
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            </div>
            </form>
          </div>
        </div>
        
        
</div>

<!--- fin modal -->    

<!-- ventana modal de la imagen -->
<div class="modal fade" id="modalfoto" data-backdrop="static", data-keyboard="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--header cabecera -->
				<div class="modal-header">
						<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">IMAGEN PRODUCTO</h4>
				</div>
				<!--header cuerpo -->
					<div class="modal-body img-responsive" id="espacio-foto"> </div>
				<!--header footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button> 
					
				</div>
			</div>
		</div>

</div>     
<!-- fin foto -->

<!-- ventana modal de la imagen -->
<div class="modal fade" id="modalcargafoto" data-backdrop="static", data-keyboard="true">

		<div class="modal-dialog">
			<div class="modal-content">
				<!--header cabecera -->
				<div class="modal-header">
						<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">PRODUCTO IMAGEN</h4>
				</div>
				<!--header cuerpo -->
					<div class="modal-body img-responsive" id="espacio-carga" >
                    
                    </div>
				<!--header footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button> 
				</div>
			</div>
		</div>
</div>
<!-- fin foto -->     
    
</div> <!-- fin container -->

<!--<script src="../bootstrap/js/bootstrap.min.js"></script>
-->
</body>
</html>
