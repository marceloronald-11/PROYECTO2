<?php
if (!isset($_SESSION)) {session_start();}
$_SESSION['detalle'] = array();

$nombre_u=$_SESSION['nomb_usu'];
$fotito=$_SESSION['fotousu'];
$nombresuc=$_SESSION['nomb_suc'];
$codsucx=$_SESSION['codsuc'];
$area=$_SESSION['id_area'];
$id_usu=$_SESSION['id_usu'];

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>ADM</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
        
       <!-- <script src="../js/script/jquery-3.3.1.min.js"></script>  -->      
		<script src="../assets/js/jquery-2.1.4.min.js"></script>
		<script src="../assets/js/bootstrap.min.js"></script>

		<script src="../assets/js/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="../assets/css/jquery-ui.min.css" />
        
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />
		<script src="../assets/js/ace-extra.min.js"></script>
		<!-- java personal -->
        <!--<script src="../js_raos/ff_java1.js"></script>-->
        <script src="../js_raos/myjavaVentasfac.js"></script>
<!-- Alertyfy -->
	<link rel="stylesheet" href="../libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="../libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../libs/js/alertify/lib/alertify.min.js"></script>
<!-- Alertyfy -->

        
                        
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
<?php
	
date_default_timezone_set('America/La_Paz');
$fecha = date('Y-m-d');

//$objProducto = new Producto1();
//$re = $objProducto->getUsuarios($id_usu);
//		foreach($re as $usu):
//			$fotito= $usu['fotousu'];
//		endforeach;
//
//$paimprimirvta= $objProducto->getImprimirvv();
//
//$gsuc = $objProducto->getSucursalx();
//
//	
	
	
require_once '../Config/conexion.php';
require_once '../Model/modelo1.php';
$objProducto = new Producto();

//$nitems= $objProducto->VerificarVtas();
$itt=$objProducto-> VerificarVtas();
$paimprimirvta= $objProducto->getImprimirvta2();
//$gsuc = $objProducto->getSucursalx();
//echo $tt;	
?>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="../index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Ace Admin
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
					

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo $fotito; ?>" alt="Raul" />
								<span class="user-info">
									<small>Hola,</small>
									 <?php echo $nombre_u ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										CONFIGURACIONES
									</a>
								</li>

								<li>
									<a href="../profile.html">
										<i class="ace-icon fa fa-user"></i>
										PERFIL
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="#">
										<i class="ace-icon fa fa-power-off"></i>
										CERRAR SESION
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				

	
		<ul class="nav nav-list">
					<li class="">
						<a href="logout.php">
							<i class="menu-icon fa fa-power-off"></i>
							<span class="menu-text"> Cerrar Sesion</span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> GRUPOS</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="coa_productos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									ARTICULOS
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="moises_grupo.php">
									<i class="menu-icon fa fa-caret-right"></i>
									GRUPOS
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="moises_marca.php">
									<i class="menu-icon fa fa-caret-right"></i>
									MARCAS
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="moises_tipo.php">
									<i class="menu-icon fa fa-caret-right"></i>
									TIPOS
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="far_proveedor.php">
									<i class="menu-icon fa fa-caret-right"></i>
									PROVEEDOR
								</a>

								<b class="arrow"></b>
							</li>							
							
						<!--	<li class="">
								<a href="coa_productos2.php">
									<i class="menu-icon fa fa-caret-right"></i>
									SALDO TOTAL
								</a>

								<b class="arrow"></b>
							</li>-->
							
							
<!--							<li class="">
								<a href="far_sucursal.php">
									<i class="menu-icon fa fa-caret-right"></i>
									SUCURSALES
								</a>

								<b class="arrow"></b>
							</li>							
--><!--							<li class="">
								<a href="crm_grupos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									CLASIFICACION
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="#far_proveedor.php">
									<i class="menu-icon fa fa-caret-right"></i>
									PROVEEDOR
								</a>

								<b class="arrow"></b>
							</li>
-->
							
							<li class="">
								<a href="crm_personal.php">
									<i class="menu-icon fa fa-caret-right"></i>
									PERSONAL
								</a>

								<b class="arrow"></b>
							</li>
<!--							<li class="">
								<a href="crm_clientes.php">
									<i class="menu-icon fa fa-caret-right"></i>
									CLIENTES
								</a>

								<b class="arrow"></b>
							</li>
--><!--							<li class="">
								<a href="crm_zonas.php">
									<i class="menu-icon fa fa-caret-right"></i>
									ZONAS
								</a>

								<b class="arrow"></b>
							</li>
-->							
							
						</ul>
					</li>
	
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-shopping-bag"></i>
							<span class="menu-text"> MOVIMIENTOS </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="far_compras.php">
									<i class="menu-icon fa fa-caret-right"></i>
									INGRESOS
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="far_ventas.php">
									<i class="menu-icon fa fa-caret-right"></i>
									VENTAS
								</a>

								<b class="arrow"></b>
							</li>
							
		<!--					<li class="">
								<a href="crm_devVentas.php">
									<i class="menu-icon fa fa-caret-right"></i>
									DEVOL.VENTAS
								</a>

								<b class="arrow"></b>
							</li>
							
							
							
							<li class="">
								<a href="far_envios.php">
									<i class="menu-icon fa fa-caret-right"></i>
									ENVIOS SUCURSAL
								</a>

								<b class="arrow"></b>
							</li>
							
							<li class="">
								<a href="crm_pagosCreditos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									PAGO CREDITOS
								</a>

								<b class="arrow"></b>
							</li>-->
							
							
							
							
						</ul>
					</li>                    



					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> ACCESOS </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">


							<li class="">
								<a href="#crm_usuarios_adm.php">
									<i class="menu-icon fa fa-caret-right"></i>
									USUARIOS
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="logindatos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									RESETEAR DATOS
								</a>

								<b class="arrow"></b>
							</li>



						</ul>
					</li>
					

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-print"></i>
							<span class="menu-text"> REPORTES </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							
<!--							<li class="">
								<a href="crm_saldosGral.php">
									<i class="menu-icon fa fa-caret-right"></i>
									SALDOS GENERALES
								</a>

								<b class="arrow"></b>
							</li>
-->							
							<li class="">
								<a href="crm_rep_pedido.php">
									<i class="menu-icon fa fa-caret-right"></i>
									NOTAS DE INGRESO
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="crm_rep_pedido2.php">
									<i class="menu-icon fa fa-caret-right"></i>
									NOTAS DE VENTA
								</a>

								<b class="arrow"></b>
							</li>	
							
						<!--	<li class="">
								<a href="crm_rep_pedido3.php">
									<i class="menu-icon fa fa-caret-right"></i>
									NOTAS DE ENVIO
								</a>

								<b class="arrow"></b>
							</li>	
							
							
							
							
							<li class="">
								<a href="coa_productosMinimo.php">
									<i class="menu-icon fa fa-caret-right"></i>
									REP.STOCK MINIMO
								</a>

								<b class="arrow"></b>
							</li>-->	
							
							
	
							<li class="">
								<a href="coa_kardex.php">
									<i class="menu-icon fa fa-caret-right"></i>
									KARDEX
								</a>

								<b class="arrow"></b>
							</li>
							


					</ul>
					</li>

				
	</ul><!-- /.nav-list -->





                
                
                
                
                
                <!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
            
            
            
            
            
            
            
            
            
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="crm_inicio1.php">Inicio</a>
							</li>

							<li>
								<!--<a href="#">Other Pages</a>-->
							<?php echo 'Area :'.$area; ?>
							<li><?php echo 'Sucursal:'.$nombresuc; ?></li>
							
							
							</li>
							<!--<li class="active">Blank Page</li>-->
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<!--<span class="input-icon">
									<input type="text" placeholder="Buscar ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>-->
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
                                
                                
                                
                                
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Elige Color</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fijar Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fijar Barra Lateral</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fijar Migas de Pan</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> De derecha a Izquierda</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Contenedor
											<b>.Interior</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu Flotante</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Barra Lat.Compacta</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Item Activo</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS ///////////////////////////////////////////////////////////// -->

<div class="row"><!-- row AA --> 
<div class="col-sm-6" style="background-color:white;"> 
 <div class="panel-group coli3">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse4">DETALLE DE VENTAS</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse in">
        <div class="panel-body">
        	 <form  id="formulario">
 <input type="hidden" class="form-control" id="idcodx" />
				 
				 
<div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Factura</label>
      	<input type="radio"  name="tpg1" CHECKED id="p11" value="NO"> NO
		<input type="radio"  name="tpg1" id="p22" value="SI"> SI
    </div>
    
    
  </div>				 
				 
<div class="form-row">
     
    <div class="form-group col-md-12">
      <label for="desart">Articulo :</label>
      <input type="text" class="form-control" id="desart"  placeholder="Articulo">
    </div>
  
  </div>				 
				 
					 

 <!-- <div class="form-row">
    <div class="form-group col-md-11 ">
      <label for="desart">Articulo :</label>
      <input type="text" class="form-control" id="desart"  placeholder="Articulo">
    </div>
  </div>-->

  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputEmail4">Cant.</label>
      <input type="text" class="form-control" id="cant" onKeyPress="return solonumeros(event);" placeholder="Cantidad">
    </div>
    
    <div class="form-group col-md-3">
      <label for="inputPassword4">Precio Venta</label>
      <input type="text" class="form-control" id="pneto" onKeyPress="return solonumeros(event);" placeholder="P.Ventas">
    </div>
	  
<div class="form-group col-md-3">
      <label for="inputPassword4">Precio Factura</label>
      <input type="text" class="form-control" id="pfacc" onKeyPress="return solonumeros(event);" placeholder="P.Factura">
    </div>	  
	  
	  

    <div class="form-group col-md-3">
      <label for="inputPassword4">Saldo</label>
      <input type="text" class="form-control" id="sal" readonly placeholder="Saldo">
    </div>
   
  </div>
		 
  
				 

             </form>
                 <div id="resultados"></div>  
        
        </div>
        <div class="panel-footer">
  <button type="button" class="btn btn-primary btn-agregar-producto2" accesskey="a"><span class="glyphicon glyphicon-plus-sign"></span> <u>A</u>gregar Item</button>
       
        </div>
      </div>
    </div>
  </div>
</div>


<div class="col-sm-6" style="background-color:white;"> 
  <div class="panel-group coli3">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1"> ORDEN DE VENTA</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
          	<form class="form-horizontal">
            <input type="hidden" readonly id="idusu" name="idusu" value="<?php echo $id_usu;?>">
				
			<input type="hidden" readonly id="codclix" name="codclix" value="0">				

                           
                                    
            	     <div class="row">
              			<div class="col-md-4">
                  		<span class="help-block text-muted small-font" > Fecha</span>
                  		<input type="date" class="form-control input-sm coli2" id="fecha"  value="<?php echo $fecha;?>" placeholder="Fecha" />
              			</div>

              			<div class="col-md-8">
                  		<span class="help-block text-muted small-font" >Cliente Nombre </span>
                  		<input type="text" class="form-control input-sm coli2" id="respo" placeholder="Cliente Nombre" />
              			</div>
              			
					</div>
            	     <div class="row">
              			
              			<div class="col-md-4">
                  		<span class="help-block text-muted small-font" >No Carnet </span>
                  		<input type="text" class="form-control input-sm coli2" id="carnet" placeholder="No Carnet" value="0" />
              			</div>
              			
					</div>
				
				
 			<!--		<div class="row">
    					<div class="col-md-8">
                  		<span class="help-block text-muted small-font" >Factura : </span>
                  		<input type="radio"  name="tpg" CHECKED id="p1" value="NO"> NO
						<input type="radio"  name="tpg" id="p2" value="SI"> SI
              			</div>
					</div>-->
				
				
          </form>
        <div id="resultados"></div>  
        </div>
        <div class="panel-footer"><button type="button" class="btn btn-success guardar-ventafac" accesskey="g"> <span class="glyphicon glyphicon-save"></span> <u>G</u>rabar Nota</button>
          <button type="button" class="btn btn-success limpiaNota" accesskey="n"> <span class="glyphicon glyphicon-remove"></span> A<u>n</u>ular Nota</button>
        </div>
        
      </div>
    </div>
  </div>
</div> <!---col-sm-6 -->

</div><!-- row AA -->



<div class="row-fluid"><!-- row bb --> 
 <div class="panel-group coli3">
    <div class="panel panel-danger">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse2">DETALLE DE LA NOTA</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse table-responsive" >
        <div class="panel-body">
				<div class="detalle-producto"></div>
        </div>
        <!--<div class="panel-footer">Panel Footer</div>-->
      </div>
    </div>
  </div>
</div> <!-- row bb -->



<div class="row-fluid"><!-- row bb --> 
 <div class="panel-group coli3">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse3">IMPRESION DE VENTA</a> <span class="badge badge-danger"><?php echo $itt ?></span>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse table-responsive">
        <div class="panel-body">
					<table class="table table-bordered titi" width="100%">
					        <tr>
					            <td align="center">Fecha</td>
					            <td align="center">Cliente</td>
					            <td align="center">Total Bs.-</td>
  					            <td align="center">Items</td>
					            <td>Opcion</td>
					        </tr>
					    <tbody>
					    	<?php 
					    	foreach($paimprimirvta as $dett2){ 
							$fexx= date("d-m-Y", strtotime($dett2['fechato']) );
					    	?>
					        <tr>
					        	
					        	<td width="20%" align="center"><?php echo $fexx;?></td>
					        	
					        	<td width="15%" align="center"><?php echo $dett2['afavor'];?></td>
					            <td width="15%" align="center"><?php echo $dett2['totimporte'];?></td>
                              	 <td width="5%" align="center"><?php echo $dett2['itm'];?></td>

	<td align="center" width="5%"><a href="javascript:mostrarIngreso(<?php echo $dett2['norden']; ?>)"><img src="../recursos/impresora.png" data-toggle="tooltip" title="Impresion de Nota"></a></td>                               
					        </tr>
					        <?php }?>
					    </tbody>
					</table>
        </div>
        <!--<div class="panel-footer">Panel Footer</div>-->
      </div>
    </div>
  </div>
</div> <!-- row bb -->





                                        
                                        
                                        
                                        
                                        
 <!-- PAGE CONTENT ENDS /////////////////////////////////////////////////////////// --> 
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->








			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Sistema</span>
							Software &copy; 2023
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

						<!--<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a> -->
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<!--<script src="../assets/js/jquery-2.1.4.min.js"></script>-->
          

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<!--<script src="../assets/js/bootstrap.min.js"></script>-->

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
	</body>
</html>
