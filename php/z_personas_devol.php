
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

// $foto = $objProducto->getById($id);

?>
<!doctype html>
<html>
<head>


<meta charset="utf-8">
<title>GyM</title>
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
<script src="../js/myjava.js"></script>
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
<center><h2>PERSONAL</h2></center>
</div> <!-- fin col-sm-2 -->
<div class="col-sm-4" style="background-color:white;">
<table border="0" width="100%" class="table"><tr><td width="50%" align="right"> <img src="<?php echo $fotito; ?>"  class="img-circle" width="50" height="70"/></td><td align="left">
<?php echo 'Usuario :'.$nousuario; ?>
</td></tr>
</table>
</div> <!-- fin col-sm-2 -->
</div> <!--!fin de row -->

<br>

<div class="row"> 
<div class="col-sm-2" style="background-color:white;">

<div class="btn-group-vertical">
<a href="z_inicio1.php" class="btn btn-primary"> <span class="glyphicon glyphicon-home"></span> Salir</a>
<a href="../index.php" class="btn btn-primary"> <span class="glyphicon glyphicon-off"></span> Cerrar Session</a>

</div>

</div> <!-- fin col-sm-2 -->


<div class="col-sm-10" style="background-color:white;">
	<table border="0" width="100%" class="table">
    <tr><td width="90%">
    <div class="input-group col-xs-4">
     <input type="text" class="form-control" placeholder="Nombre" id="bs-prod" >
      <span class="input-group-btn">
        <button class="btn btn-secondary" type="button"><span class="glyphicon glyphicon-search"></span></button>
      </span>
    </div>
	</td>
    <td>
    		    <div class="input-group col-xs-3">
                    <div class="col-xs-3">
<!--				     	<a target="_blank" href="javascript:reportexcelPDF();" class="btn btn-success btn-sm">Exportar a Excel</a>
-->                    </div>
    			</div>
	</td>    

<td>
    		    <div class="input-group col-xs-3">
                    <div class="col-xs-3">
<!--				     	<a target="_blank" href="javascript:reportePDF();" class="btn btn-danger btn-sm">Exportar a PDF</a>
-->                    </div>
    			</div>
	</td>    
    
    <td>
    		    <div class="input-group col-xs-3">
                    <div class="col-xs-3">
				     	<button id="nuevo-producto" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-plus"></span> Nuevo</button>
                    </div>
    			</div>
	</td></tr>
    </table>
<div class="registros" id="agrega-registros" style="width:100%;"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>
</div> <!-- fin col-sm-10 -->

 
</div> <!-- fin row -->



</div> <!-- fin row -->
  




    <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-personas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Formulario Personal</b></h4>
            </div>
            <form id="formulario" class="form-horizontal " onsubmit="return agregaRegistro();">
            <div class="modal-body">
					 <input type="hidden"   id="idper" name="idper" />

                   	<input type="hidden" required readonly id="pro" name="pro"/>
					
			    <div class="form-group">
        			<label class="control-label col-xs-3" for="nombre">Nombre:</label>
                    <div class="col-xs-9">
        			<input type="text" class="form-control" id="nomb" name="nomb" required placeholder="Nombre Completo">
                    </div>
    			</div>


			    <div class="form-group">
        			<label class="control-label col-xs-3" for="ci">No CI:</label>
                    <div class="col-xs-9">
        			<input type="text" class="form-control" id="ci" name="ci" required placeholder="No Carnet">
                    </div>
    			</div>
			    <div class="form-group">
        			<label class="control-label col-xs-3" for="dire">Direccion:</label>
                    <div class="col-xs-9">
        			<input type="text" class="form-control" id="dire" name="dire" required placeholder="Direccion">
                    </div>
    			</div>
			    <div class="form-group">
        			<label class="control-label col-xs-3" for="cel">Telf/Celular:</label>
                    <div class="col-xs-9">
        			<input type="text" class="form-control" id="cel" name="cel" required placeholder="Telf-Celular">
                    </div>
    			</div>
			    <div class="form-group">
        			<label class="control-label col-xs-3" for="email">E-mail:</label>
                    <div class="col-xs-9">
        			<input type="email" class="form-control" id="email" name="email" required placeholder="Correo Electronico">
                    </div>
    			</div>


                    		<div class="form-group">
  								<label  class="control-label col-xs-3" for="observ">Observaciones:</label>
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
					<h4 class="modal-title">IMAGEN PERSONAL</h4>
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
					<h4 class="modal-title">PERSONAL IMAGEN</h4>
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

<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
