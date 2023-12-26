
<?php
if (!isset($_SESSION)) {session_start();}
date_default_timezone_set('America/La_Paz'); ///1 otro: date_default_timezone_set(‘America/La_Paz’);
$nousuario=$_SESSION['nomb_usu'];
$idper=$_SESSION['id_per'];
$idusu=$_SESSION['id_usu'];

require_once '../Config/conexion.php';
require_once '../Model/Producto.php';
$objProducto = new Producto();
$re = $objProducto->getpersonas($idper);

		foreach($re as $usu):
			$fotito= $usu['foto'];
//			$id_usu= $usu['id_usu'];
//			$codde=$usu['coddep'];
		endforeach;

//disiplina
$disi = $objProducto->getDisiplina();
//codnu
$norden = $objProducto->getCodnu();
		foreach($norden as $no):
			$nordenx= $no['nordengym']+1;
		endforeach;


//estado
//$estado = $objProducto->getestado();
//compra
//$compra = $objProducto->getcompra();


// $foto = $objProducto->getById($id);

?>
<!doctype html>
<html>
<head>


<meta charset="utf-8">
<title>Activos</title>
<link href="../css/estiloo.css" rel="stylesheet">
    	<link rel="stylesheet" href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" />
		<script type="text/javascript" src="../js/script/jquery.js"></script>
		<script type="text/javascript" src="../js/script/jqueryui.js"></script>
        
    <link rel="stylesheet" href="../libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="../libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../libs/js/alertify/lib/alertify.min.js"></script>


<!-- pluging Bootstrap -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">


<style type="text/css">
.titi {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
}
</style>
<script src="../js/myjavamovim1.js"></script>
<script src="../js/jquery.numeric.js"></script>

</head>

<body>
<div class="container-fluid">
<div class="row"> 

<div class="col-sm-4" style="background-color:white;">
<img src="../recursos/logo2.jpg" width="150" height="70">
 </div> 
<!-- fin col-sm-2 -->
<div class="col-sm-4 tit" style="background-color:white;">
<center><h3>REGISTRO GYM POR SESION</h3></center>
</div> <!-- fin col-sm-2 -->
<div class="col-sm-4" style="background-color:white;">
<table border="0" width="100%" class="table"><tr><td width="50%" align="right"> <img src="<?php echo $fotito; ?>"  class="img-circle" width="45" height="50"/></td><td align="left">
<?php echo 'Usuario :'.$nousuario; ?>
</td></tr>
</table>
</div> <!-- fin col-sm-2 -->
</div> <!--!fin de row -->

<br>

<div class="row"> 
<div class="col-sm-2" style="background-color:white;">

<div class="btn-group-vertical">
<a href="z_movim1.php" class="btn btn-primary"><span class="glyphicon glyphicon-piggy-bank"></span> GYM Clientes</a>
<a href="z_movim2.php" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> GYM Sesion</a>
<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-briefcase"></span> Proveedores</a>
<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-pushpin"></span> Clasificacion</a>
<a href="#" class="btn btn-primary"> <span class="glyphicon glyphicon-thumbs-up"></span> Estado</a>
<a href="z_inicio1.php" class="btn btn-primary"> <span class="glyphicon glyphicon-home"></span> Salir</a>
<a href="../index.php" class="btn btn-primary"> <span class="glyphicon glyphicon-off"></span> Cerrar Session</a>

</div>

</div> <!-- fin col-sm-2 -->


<div class="col-sm-10" style="background-color:white;">


            <form id="formulario" class="form-horizontal " onsubmit="return agregaRegistro();">
            <div class="modal-body">
					 <input type="hidden"   id="idper" name="idper" />

                   	<input type="hidden" readonly id="pro" name="pro" value="Registro"/>
                   	<input type="hidden" id="idu" name="idu" value="<?php echo $idusu;?>" />

					
			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="nnota">No Recibo:</label>
                    <div class="col-xs-2">
        			<input type="text" class="form-control" readonly id="nnota" name="nnota" value="<?php echo $nordenx;?>" required placeholder="No Recibo ">
                    </div>
    			</div>


			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="cli">Cliente:</label>
                    <div class="col-xs-4">
        			<input type="text" class="form-control" id="cli" name="cli" required placeholder="Cliente">
                    </div>
    			</div>

<div class = "form-group">
<label for = "usu" class="control-label col-xs-3 titi">Detalle:</label>
 <div class="col-xs-4">
<select name="cla" id="cla" class="form-control" >
 <option value="0">Ninguno</option>
	<?php foreach($disi as $dato1):?>
<option value="<?php echo $dato1['coddisi']?>"><?php echo $dato1['descripdici']?></option>
	<?php endforeach;?>
	</select>
</div>
</div>
                
			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="pre">Importe :</label>
                    <div class="col-xs-2">
        			<input type="text" class="form-control" id="pre" name="pre" required placeholder="Importe">
                    </div>
    			</div>
                



                    		<div class="form-group">
  								<label  class="control-label col-xs-3 titi" for="observ">Observaciones:</label>
                		    	<div class="col-xs-4">
 				 					<textarea class="form-control" rows="3" id="observ" required name="observ" placeholder="Observaciones"></textarea>
                     			</div>
							</div>                
       

                        	<div id="mensaje"></div>
            </div>

<!--            <div class="modal-footer">
-->            	<center><input type="submit" value="Registrar" class="btn btn-success" id="reg"/></center>
<!--                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/> -->
<!--                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
<!--           </div> --> 
          </form>



</div> <!-- fin col-sm-2 -->

</div> <!--!fin de row -->


    
</div> <!-- fin container -->

<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
