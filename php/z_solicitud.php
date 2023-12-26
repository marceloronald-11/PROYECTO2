
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
//$prov = $objProducto->getproveedor();
//CLASIFICACION
//$clasi = $objProducto->getclasifica();
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
.letra {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color:#00C;
	
}

.letritas {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	
}
.tam {
	font-size: 18px;
	color:#C00;
	
}

</style>
<script src="../js/myjavaSolicita.js"></script>
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
<center><h2>REGISTRO SOLICITUDES</h2></center>
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
<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-piggy-bank"></span> Activos</a>
<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Personal</a>
<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-briefcase"></span> Proveedores</a>
<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-pushpin"></span> Clasificacion</a>
<a href="#" class="btn btn-primary"> <span class="glyphicon glyphicon-thumbs-up"></span> Estado</a>
<a href="z_inicio1.php" class="btn btn-primary"> <span class="glyphicon glyphicon-home"></span> Salir</a>
<a href="../index.php" class="btn btn-primary"> <span class="glyphicon glyphicon-off"></span> Cerrar Session</a>

</div>

</div> <!-- fin col-sm-2 -->


<div class="col-sm-5" style="background-color:white;">
	<table border="0" width="100%" class="table">
    <tr><td width="90%">
<!--    <div class="input-group col-xs-6">
     <input type="text" class="form-control" placeholder="Buscar Articulo" id="bs-prod" >
      <span class="input-group-btn">
        <button class="btn btn-secondary" type="button"><span class="glyphicon glyphicon-search"></span></button>
      </span>
    </div>
-->	</td>
    <td>
    		    <div class="input-group col-xs-3">
                    <div class="col-xs-3">
				     	<!--<a target="_blank" href="javascript:reportexcelPDF();" class="btn btn-success btn-sm">Exportar a Excel</a>-->
                    </div>
    			</div>
	</td>    

<td>
    		    <div class="input-group col-xs-3">
                    <div class="col-xs-3">
				     	<!--<a target="_blank" href="javascript:reportePDF();" class="btn btn-danger btn-sm">Exportar a PDF</a>-->
                    </div>
    			</div>
	</td>    
    
    <td>
    		    <div class="input-group col-xs-3">
                    <div class="col-xs-3">
<!--				     	<button id="nuevo-producto" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-plus"></span> Nuevo</button>
-->                    </div>
    			</div>
	</td></tr>
    </table>
<div class="registros" id="agrega-registros" style="width:100%;"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>
</div> <!-- fin col-sm-5 -->


<div class="col-sm-5" style="background-color:white;">
	<div class="registros2" id="agrega-registros2" style="width:100%;">
    
    </div>
    <center>
        <ul class="pagination2" id="pagination2"></ul>
    </center>

</div> <!-- fin col-sm-5 -->




 
</div> <!-- fin row -->



</div> <!-- fin row -->
  




    <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-personas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registro de Aprobacion</b></h4>
            </div>
            <form id="formulario" class="form-horizontal " onsubmit="return agregaRegistroAp();">
            <div class="modal-body">
					 <input type="hidden"   id="idper" name="idper" />

                   	<input type="hidden" required readonly id="pro" name="pro"/>

                   	<input type="hidden" required readonly id="nordenaba" name="nordenaba"/>
					
			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="descrip">Descripcion:</label>
                    <div class="col-xs-9">
        			<input type="text" class="form-control" id="descri" name="descri" readonly required placeholder="Descripcion ">
                    </div>
    			</div>

			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="cant">Cantidad:</label>
                    <div class="col-xs-3">
        			<input type="text" class="form-control" id="cant" name="cant" readonly required placeholder="Cantidad">
                    </div>
    			</div>

                
			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="umed">U.Medida:</label>
                    <div class="col-xs-3">
        			<input type="text" class="form-control" id="umed" name="umed" readonly required placeholder="U.Medida">
                    </div>
    			</div>



				<div class = "form-group">
      			<label for = "usu" class="control-label col-xs-3 titi">Decision:</label>
                <div class="col-xs-5">
					<select name="est" id="est" class="form-control" >
                    	<option value="">ELIJA OPCION</option>
    	                <option value="APROBADO">APROBADO</option>
	                    <option value="REPROBADO">REPROBADO</option>
	                    <option value="REVISION">REVISION</option>

					</select>

   				</div>
                </div>



                    		<div class="form-group">
  								<label  class="control-label col-xs-3 titi" for="observ">Observaciones:</label>
                		    	<div class="col-xs-9">
 				 					<textarea class="form-control" rows="3" id="observ" required name="observ" placeholder="Observaciones"></textarea>
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
                <input type="submit" value="Confirmar" class="btn btn-warning"  id="edi"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            </div>
            </form>
          </div>
        </div>
        
        
</div>

<!--- fin modal -->    



  
    
</div> <!-- fin container -->

<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
