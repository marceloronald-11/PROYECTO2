
<?php
if (!isset($_SESSION)) {session_start();}
date_default_timezone_set('America/La_Paz');
$nousuario=$_SESSION['nomb_usu'];
$idusux=$_SESSION['id_usu'];
//$idper=$_SESSION['id_usu'];
$fotito=$_SESSION['fotou'];


//$nomdepto=$_SESSION['nomdepto'];

require_once '../Config/conexion.php';
require_once '../Model/Producto.php';
$objProducto = new Producto();
//$re = $objProducto->getpersonas($idper);

//		foreach($re as $usu):
//			$fotito= $usu['foto'];
//			$nousuario= $usu['nombre'];
//		endforeach;

$gru = $objProducto->getGrupos();
$tgasto = $objProducto->getTipog();

$costosx = $objProducto->getCostos();
$medida = $objProducto->getMedida();
//$maquinax = $objProducto->getMaquina();
//$elementox = $objProducto->getElemento();



$fecha = date('Y-m-d');

//proveedor
$saldox = $objProducto->getSaldomv($idusux);
		foreach($saldox as $usu):
			$descripx= $usu['descripmv'];
			$importex= $usu['importe'];
			$fechax= $usu['fechamv'];
			$horax= $usu['horamv'];
			$saldox= $usu['saldoact'];

		endforeach;

//$compra = $objProducto->getcompra();

// $foto = $objProducto->getById($id);
?>
<!doctype html>
<html>
<head>


<meta charset="utf-8">
<title>terri</title>
<link rel="shortcut icon" href="../recursos/nut1.ico" type="image/x-icon" />

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
<script src="../js/j_myjavaCaja.js"></script>
<script src="../js/jquery.numeric.js"></script>
<!-- JS JAVAS PERSONALIZADO -->



<style type="text/css">
.titi {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}


</style>

<script type="text/javascript">
$(document).ready(function(){
    $('#impo').numeric(".");
});
</script>
</head>

<body>
<div class="container-fluid">
<div class="row"> 
<div class="col-sm-4" style="background-color:white;">
        <table class="table"><tr><td align="left" class="hidden-xs"><img src="../recursos/login.png" class="img-responsive" width="80px" height="80px" alt="lebrai"></td>
         </tr></table>
 </div> 
<!-- fin col-sm-2 -->
<div class="col-sm-4 tit" style="background-color:white;">
<center><h4>REGISTRO</h4></center>
</div> <!-- fin col-sm-2 -->
<div class="col-sm-4" style="background-color:white;">
<table border="0" width="100%" class="table" ><tr><td width="50%" align="right" class="hidden-xs"> <img src="<?php echo $fotito; ?>"  class="img-circle" width="45" height="50"/></td><td align="left">
<?php echo 'Usuario :'.$nousuario; ?>

</td></tr>
</table>
</div> <!-- fin col-sm-2 -->
</div> <!--!fin de row -->


<div class="row"> <!-- ROW INICIO -->
<div class="col-sm-12" style="background-color:white;">

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
        
        
        <!-- <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-print"> </span> REPORTES <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="c_rep_hoydia.php">MOVIMIENTO DEL DIA</a></li>
            <li><a href="c_rep_hoy.php">POR RANGO DE FECHA</a></li>
            <li><a href="c_rep_tdoc.php">TIPO DE DOCUMENTO-FECHA</a></li>
            <li><a href="c_rep_cuentafe.php">CUENTA-FECHA</a></li>

            <li><a href="c_rep_usuariofe.php">POR USUARIO</a></li>
            <li><a href="c_grafico_ingresos.php">GRAFICOS INGRESOS</a></li>
            <li><a href="c_grafico_egresos.php">GRAFICOS EGRESOS</a></li>
          </ul>
        </li> -->

      
      </ul>
       <!-- <button  id="nuevo-producto" class="btn btn-danger navbar-btn btn-sm"> <span class="glyphicon glyphicon-plus"></span> Nuevo</button>-->

      <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.php"><span class="glyphicon glyphicon-off"></span> Cerrar Sesion</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>
</div><!-- nav bar -->

</div>
</div> <!-- ROW INICIO -->


<div class="row-fluid"> 

<div class="col-sm-3 ladoB hidden-xs" style="background-color:white;">
<div class="registros table-responsive" id="agrega-registros1" style="width:100%;" ></div>


    <center>
        <ul class="pagination" id="pagination1"></ul>
    </center>
</div> <!-- fin col-sm-6 B -->




<div class="col-sm-6 ladoA" style="background-color:yellowgreen;">

<form id="formulario" class="form-horizontal " onsubmit="return agregaRegistro();">
            <div class="modal-body">
					 <input type="hidden"   id="idper" name="idper" />

                   	<input type="hidden" readonly id="pro" name="pro"  value="Registro"/>

                         <div class="form-group">
                            <label class="control-label col-xs-3 titi" for="fe">Fecha:</label>
                            <div class="col-xs-9 col-sm-8 col-lg-5">
                            <input type="date" class="form-control"  value="<?php echo $fecha ?>" id="fech" name="fech" required >
                            </div>
                        </div>




                        <div class = "form-group">
                        <label for = "ggru" class="control-label col-xs-3 titi">costos:</label>
                         <div class="col-xs-9 col-sm-8 col-lg-5">
                                <select id="lb1" name="lb1" class="form-control" >
                                    <?php
                                        echo '<option selected="selected" disabled="disabled">Elija el Tipo</option>';
                                        foreach($costosx as $nn): 
                                            echo '<option value="'.$nn['codcc'].'">'.$nn['detcostos'].'</option>';
                                        endforeach;
                                    ?>
                                </select>  
                      </div>
                        </div>

                        <div class = "form-group">
                        <label for = "ggru" class="control-label col-xs-3 titi">Proceso:</label>
                         <div class="col-xs-9 col-sm-8 col-lg-5">
                                    <select  id="lb2" name="lb2" class="form-control" required>
                                    </select>
                      	</div>
                        </div>

                        <div class = "form-group">
                        <label for = "gr" class="control-label col-xs-3 titi">Maquinas:</label>
                         <div class="col-xs-9 col-sm-8 col-lg-5">
                                    <select  id="lb3" name="lb3" class="form-control" required>
                                    </select>
                      	</div>
                        </div>
					
                        <div class = "form-group">
                        <label for = "gsr" class="control-label col-xs-3 titi">Elementos:</label>
                         <div class="col-xs-9 col-sm-8 col-lg-5">
                                    <select  id="lb4" name="lb4" class="form-control" required>
                                    </select>
                      	</div>
                        </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3 titi" for="det">Detalle:</label>
                                <div class="col-xs-9 col-sm-9 col-lg-9">
                                <input type="text" class="form-control" id="det" name="det" required placeholder="Detalle">
                                </div>
                            </div>

<div class = "form-group">
<label for = "med" class="control-label col-xs-3 titi">U.Medida:</label>
 <div class="col-xs-3">
<select name="med" id="med" class="form-control" >
 <option value="0">Ninguno</option>
	<?php foreach($medida as $dato1):?>
<option value="<?php echo $dato1['codmd']?>"><?php echo $dato1['detmedida']?></option>
	<?php endforeach;?>
	</select>
</div>
</div>


                            <div class="form-group">
                                <label class="control-label col-xs-3 titi" for="npar">No Parte:</label>
                                <div class="col-xs-9 col-sm-9 col-lg-9">
                                <input type="text" class="form-control" id="npar" name="npar" required placeholder="No Parte">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3 titi" for="ubi">Ubicacion:</label>
                                <div class="col-xs-9 col-sm-9 col-lg-9">
                                <input type="text" class="form-control" id="ubi" name="ubi" required placeholder="Ubicacion">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3 titi" for="espe">Especificacion:</label>
                                <div class="col-xs-9 col-sm-9 col-lg-9">
                                <input type="text" class="form-control" id="espe" name="espe" required placeholder="Especificacion">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-xs-3 titi" for="cos">Costo:</label>
                                <div class="col-xs-9 col-sm-8 col-lg-5">
                                <input type="text" class="form-control" id="cos" name="cos" required placeholder="Costo">
                                </div>
                            </div>
                
                            <!-- <div class="form-group">
                            <label class="control-label col-xs-3 titi" for="ttip">Doc:</label>
                             <div class="col-xs-9 col-sm-8 col-lg-9">
                            <label class="titi"><input type="radio"  name="ttip" CHECKED id="FACX" value="X" >Ninguno</label>
                            <label class="titi"><input type="radio"  name="ttip" id="RECX" value="REC"> Recibo</label> 
                            <label class="titi"><input type="radio"  name="ttip" id="NINX" value="FAC"> Factura</label> 
                            </div>
                            </div> -->

                            <div class="form-group">
                                <label class="control-label col-xs-3 titi" for="sal">Saldo:</label>
                                <div class="col-xs-9 col-sm-8 col-lg-5">
                                <input type="text" class="form-control" id="sal" name="sal"  placeholder="Saldo">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3 titi" for="salm">Saldo Min:</label>
                                <div class="col-xs-9 col-sm-8 col-lg-5">
                                <input type="text" class="form-control" id="salm" name="salm"  placeholder="Saldo Minimo">
                                </div>
                            </div>


                    		<!-- <div class="form-group">
  								        <label  class="control-label col-xs-3 titi" for="observ">Observ:</label>
                		    	<div class="col-xs-9">
 				 					        <textarea class="form-control" rows="3" id="observ" name="observ" placeholder="Observaciones"></textarea>
                     			</div>
							          </div>                 -->

                        	<div id="mensaje"></div>
            </div>

            <div class="modal-footer">
            	<span class="glyphicon glyphicon-save"> </span> <input type="submit"  value=" Guardar Registro" class="btn btn-danger btn-lg" id="regxx"/>
				<!-- <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/> -->
				<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button> --> 
           </div>
            </form>

<div class="registros table-responsive" id="agrega-registros" style="width:100%;" ></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>
</div> <!-- fin col-sm-6 A -->




<div class="col-sm-3 ladoB hidden-xs" style="background-color:white;">
<div class="registros table-responsive" id="agrega-registros2" style="width:100%;" ></div>
    <center>
        <ul class="pagination" id="pagination2"></ul>
    </center>
</div> <!-- fin col-sm-6 B -->





 
</div> <!-- fin row -->



</div> <!-- fin container row -->
  




    <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-personas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>FORMULARIO</b></h4>
            </div>
            <form id="formulario" class="form-horizontal " onsubmit="return agregaRegistro();">
            <div class="modal-body">
					 <input type="hidden"   id="idperxx" name="idperxx" />

                   	<input type="hidden" required readonly id="proxx" name="proxx"/>
					
			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="nombxx">Grupos :</label>
                    <div class="col-xs-9">
        			<input type="text" class="form-control" id="nombxx" name="nombxx" required placeholder="Grupos ">
                    </div>
    			</div>

                        	<div id="mensajexx"></div>
            </div>
<?php            
//$obj = json_decode($json1);
//echo $obj.nombre;
?>
            <div class="modal-footer">
            	<input type="submit" value="Registrar" class="btn btn-success" id="regxx"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edixx"/>
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
