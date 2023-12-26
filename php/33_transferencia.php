<?php
//session_start();
if (!isset($_SESSION)) {session_start();}

$_SESSION['detalle'] = array();
require_once '../Config/conexion.php';
require_once '../Model/Producto.php';


if(isset($_SESSION['usuario'])==false or isset($_SESSION['id_area'])==false){
	header('Location:../index.php');
}else{
	if($_SESSION['id_area'] == 'usuarios'){
		header('Location: a_usuario.php');
	}else{
		$usuarios=$_SESSION['usuario'];
		$id_usu= $_SESSION['id_usu'];
		$nombre_u= $_SESSION['nomb_usu'];
		$coddepx= $_SESSION['depto'];
		$nomdepto=$_SESSION['nomdepto'];
	}
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<?php
$objProducto = new Producto();
$nroreg = $objProducto->getreg();
		foreach($nroreg as $nroreg2):
			$nregg= $nroreg2['nordenmv']+1;
			$nroprof= $nroreg2['nproforma']+1;
//			$id_usu= $usu['id_usu'];
		endforeach;
$buscadepto = $objProducto->getdepto();
// $foto = $objProducto->getById($id);


//$objgrupos = new Producto();
//$grupos = $objgrupos->getgrupo();



?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventarios</title>
<link href="../css/estiloa.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/jquery.numeric.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('#pventa').numeric(".");
    $('#dcto').numeric("."); 
    $('#nnota').numeric("."); 
    $('#cantidad').numeric("."); 

});
</script>

<script src="../js/33_myjavatransfe.js"></script>

	 <!-- Alertity -->
    <link rel="stylesheet" href="../libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="../libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../libs/js/alertify/lib/alertify.min.js"></script>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container-fluid">
<div class="row arriba">
	     <br />
     <table border="0" width="100%" >
     	<tr><td width="33%" align="center"> <?php echo 'BIENVENIDO :'.$nombre_u; ?></td><td width="33%" align="center"><h4>TRANSFERENCIA</h4></td><td width="33%" align="center"><a href="../php/z_inicio1.php" class="btn btn-md btn-danger" role="button"><span class="glyphicon glyphicon-home"></span> Salir</a></td></tr>
        <tr><td width="33%" align="center"> <?php echo $nomdepto; ?></td></tr>
     </table>
     
     
</div>
<div class="row medio">
<h3 align="center" class="fecha">  <?php $array=array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
echo "".$array[date("w")]." ".date("d-m-y"); ?> </h3>
</div>



<div class="row">
<div class="col-md-12">
<br>
<div class="bs-example">
    <ul class="nav nav-tabs">
        <li class="active"><a href="../php/z_inicio1.php">SALIR</a></li>

		<li><a href="logout.php">CERRAR SESION</a></li>
 
    </ul>
</div>

    
</div>
</div> <!--fin row-->
<br>















<div class="row lad1"> <!--inicio lad1 -->
<section class="col-md-6">
                 
    <table border="0" >
    
    	<tr>
        <td width="82"></td>
        	<td width="300">
                <div class="input-group">
     <input type="text" class="form-control" placeholder="Buscar Articulo" id="bs-prod" >
      <span class="input-group-btn">
        <button class="btn btn-secondary" type="button"><span class="glyphicon glyphicon-search"></span></button>
      </span>
    </div>

            </td>
     	</tr>
        
    </table>

<!--</section>-->
<div class="registros" id="agrega-registros"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>

</section>




<div class="panel panel-info col-md-6">
			 <div class="panel-heading">
		        <h1 class="panel-title">GENERANDO TRANSFERENCIA</h1><br>
                <button type="button" class="btn btn-sm btn-warning irmodal"><span class="glyphicon glyphicon-check"></span> Cerrar Nota</button>
                <button type="button" class="btn btn-sm btn-danger limpiacarro"><span class="glyphicon glyphicon-remove"></span> Cancelar Nota</button>
		      </div>
			<div class="panel-body detalle-producto">
				<?php if(count($_SESSION['detalle'])>0){?>
					<table class="table">
					    <thead>
					        <tr>
					            <th>Descripci&oacute;n</th>
					            <th>Cant.</th>
					            <th>Precio</th>
					            <th>Subtotal</th>
					            <th>Tipo</th>

					            <th></th>
					        </tr>
					    </thead>
					    <tbody>
					    	<?php 
					    	foreach($_SESSION['detalle'] as $det){ 
					    	?>
					        <tr>
					        	<td><?php echo $det['producto'];?></td>
					            <td><?php echo $det['cantidad'];?></td>
					            <td><?php echo $det['precio'];?></td>
					            <td><?php echo $det['subtotal'];?></td>
					            <td><?php echo $det['tipodoc'];?></td>

					            <td><button type="button" class="btn btn-sm btn-danger eliminar-producto" id="<?php echo $det['id'];?>">Eliminar</button></td>
					        </tr>
					        <?php }?>
					    </tbody>
					</table>
				<?php }else{?>
				<div class="panel-body">No existen Articulos en Proceso</div>
				<?php }?>
			</div>
</div>

</div>

</div>





<!-- modal de CERRAR NOTA -->
<div id="myModal" class="modal fade bs-example-modal-lg" data-backdrop="static", data-keyboard="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">DATOS DEL REGISTRO</h4>
                    <br />
                     <?php $array=array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
echo "".$array[date("w")]." ".date("d-m-y"); ?>
                </div>
                
                <div class="modal-body">
                
        			<div class="row">
                	<form class="form-horizontal">
	           	
            <input type="hidden" readonly id="idusu" name="idusu" value="<?php echo $id_usu;?>" style="visibility:hidden;height:5px;">
             <input type="hidden"  id="clasemov" name="clasemov" value="Transferencia" style="visibility:hidden;height:5px;">
           	<input type="hidden" class="form-control" readonly id="coddepx" name="coddepx" value="<?php echo $coddepx;?>" >

			<div class="form-group">
        		<label for="nproff" class="control-label col-xs-3">Nro Nota:</label>
        		<div class="col-xs-6">
            	<input type="text" class="form-control" readonly id="nnota" name="nnota" value="<?php echo $nregg;?>" placeholder="Nro Nota">
        		</div>
    		</div>  
            
            
            
            
            
				<div class="form-group">
  						<label  class="control-label col-xs-3" for="observ">Señor(es):</label>
                    <div class="col-xs-6">
 				 		<textarea class="form-control" rows="2" id="observ" name="observ" placeholder="Señores"></textarea>
                     </div>
				</div>          
                
                
                
                
				<div class="form-group">
					<label for="codigo" class="control-label col-xs-3">Departamento:</label>
					<div class="col-xs-8">            
					<select  class = "form-control"  name="iidepto" id="iidepto">
						<?php
							echo '<option selected="selected" disabled="disabled">Departamento</option>';
							foreach($buscadepto as $nn): 
							echo '<option value="'.$nn['coddep'].'">'.$nn['descripdepto'].'</option>';
							endforeach;
							?>
					</select>
					</div>    
				</div>

            		</form>                     
                 </div>  <!-- fin row -->
                                
                 </div>



                <div class="modal-footer">

                    <button type="button" class="btn btn-primary btn-default btn-sm" data-dismiss="modal">SALIR</button>
                    <button type="button" class="btn btn-primary guardar-transf btn-sm">Guardar Transferencia</button>
                </div>
            </div>
            
        </div>
      
</div>
<!-- FIN DE CERRAR NOTA -->

<!-- ventana modal de la imagen -->
<div class="modal fade" id="modalfoto" data-backdrop="static", data-keyboard="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--header cabecera -->
				<div class="modal-header">
						<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">IMAGEN DEL ARTICULO</h4>
				</div>
				<!--header cuerpo -->
					<div  id="espacio-foto"> </div>
				<!--header footer -->
				<div class="modal-footer">

					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button> 
					
				</div>
			</div>
		</div>

</div>     
<!-- fin foto -->    
    
    
 <!--INICIO MODAL -->
    <div class="modal fade" id="registra-producto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">DATOS DEL ARTICULO</h4>
            </div>
            <div class="modal-body">

            <form id="formulario" class="form-horizontal formulario" >

 <input type="hidden" required readonly id="id-prod" name="id-prod" >
 <input type="hidden" required readonly id="saldo" name="saldo" >
<input type="hidden" class="form-control" id="dcto" name="dcto"  value="0.00" placeholder="Descuento %">
           
  
        			<input type="hidden" class="form-control" id="pro" name="pro"  readonly style="visibility:hidden;height:5px;">
                
			    <div class="form-group">
        			<label class="control-label col-xs-4" for="codigo">CODIGO:</label>
                    <div class="col-xs-6">
        			<input type="text" class="form-control" id="codigo"  readonly name="codigo" placeholder="Codigo">
                    </div>
    			</div>
                
				<div class="form-group">
  						<label  class="control-label col-xs-4" for="descrip">DESCRIPCION:</label>
                    <div class="col-xs-6">
 				 		<textarea class="form-control" rows="3" id="descrip" name="descrip" readonly placeholder="Descripcion"></textarea> 
                     </div>
				</div>                

			<div class="form-group">
        		<label for="pventa" class="control-label col-xs-4">PRECIO:</label>
        		<div class="col-xs-4">
            		<input type="text" class="form-control" id="pventa" name="pventa"  placeholder="Precio">
        		</div>
    		</div>   
            
			<div class="form-group">
        		<label for="cantidad" class="control-label col-xs-4">CANTIDAD:</label>
        		<div class="col-xs-4">
            		<input type="number" class="form-control" id="cantidad" name="cantidad" value="1" placeholder="cantidad">
        		</div>
    		</div>     
            
					<input type="radio"  name="arch" CHECKED id="ALQ" value="ALQ" style="visibility:hidden;height:5px;">
                	<input type="radio"  name="arch" id="VTA" value="VTA" style="visibility:hidden;height:5px;">
	</form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">SALIR</button>
                <button type="button" class="btn btn-primary btn-sm btn-agregar-producto"><span class="glyphicon glyphicon-plus-sign"></span> AGREGAR A LA NOTA</button>
            </div>
        </div>
    </div>
</div> <!-- FIN MODAL --->
    
    
    
 




</div> <!--fin container -->
<div class="row bajo"></div>

<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
