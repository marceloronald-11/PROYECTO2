<?php
if (!isset($_SESSION)) {session_start();}
$nombre_u=$_SESSION['nomb_usu'];
$fotito=$_SESSION['fotousu'];
$nombresuc=$_SESSION['nomb_suc'];
$codsucx=$_SESSION['codsuc'];
$area=$_SESSION['id_area'];

$_SESSION['detalle'] = array();



date_default_timezone_set('America/La_Paz');
$fecha = date('Y-m-d');
$tadm='';
if ($area=='admin'){$tadm='Administrador del Sistema';}
if ($area=='almac'){$tadm='Almacen de Mantenimiento';}
if ($area=='compra'){$tadm='Compras Generales';}
if ($area=='gestor'){$tadm='Gestor de Mantenimiento';}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>SOFT | CRM</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
        
       <!-- <script src="../js/script/jquery-3.3.1.min.js"></script>  -->      
		<script src="../assets/js/jquery-2.1.4.min.js"></script>

		<script src="../assets/js/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="../assets/css/jquery-ui.min.css" />

		<script src="../assets/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />


		
		
<!--		<script src="../dist/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../dist/css/bootstrap.min.css" />
-->


		<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />
		<script src="../assets/js/ace-extra.min.js"></script>
		<!-- java personal -->
        <script src="../js_raos/myjavaCoaPreventa.js"></script>
		
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
require_once '../Config/conexion.php';
require_once '../Model/modelo_coa1.php';
$objProducto = new Producto();
$clasix = $objProducto->getClasifica();
$provee = $objProducto->getProveedor();
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
									<a href="#../profile.html">
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
									PRODUCTOS
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="crm_grupos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									CLASIFICACION
								</a>

								<b class="arrow"></b>
							</li>

							
							<li class="">
								<a href="crm_personal.php">
									<i class="menu-icon fa fa-caret-right"></i>
									PERSONAL
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="crm_clientes.php">
									<i class="menu-icon fa fa-caret-right"></i>
									CLIENTES
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="crm_zonas.php">
									<i class="menu-icon fa fa-caret-right"></i>
									ZONAS
								</a>

								<b class="arrow"></b>
							</li>
							
							
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
								<a href="coa_preeventa.php">
									<i class="menu-icon fa fa-caret-right"></i>
									PREVENTA
								</a>

								<b class="arrow"></b>
							</li>
				

	
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
								<a href="#logindatos.php">
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
							
							<li class="">
								<a href="crm_rep_pedido.php">
									<i class="menu-icon fa fa-caret-right"></i>
									PEDIDOS
								</a>

								<b class="arrow"></b>
							</li>
					<!--		<li class="">
								<a href="#coa_pedidogral.php">
									<i class="menu-icon fa fa-caret-right"></i>
									PEDIDO GENERAL
								</a>

								<b class="arrow"></b>
							</li>-->
							

							<li class="">
								<a href="coa_precios.php">
									<i class="menu-icon fa fa-caret-right"></i>
									LISTA DE PRECIOS
								</a>

								<b class="arrow"></b>
							</li>
<!--							<li class="">
								<a href="crm_rep_comision.php">
									<i class="menu-icon fa fa-caret-right"></i>
									COMISIONES
								</a>

								<b class="arrow"></b>
							</li>
-->
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
							<?php echo 'Area :'.$tadm; ?>
							<li><?php //echo 'Sucursal:'.$nombresuc; ?></li>
							
							
							</li>
							<!--<li class="active">Blank Page</li>-->
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" id="bs-prod" placeholder="Buscar ..." class="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
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
											<!--<button class="btn btn-white btn-info btn-bold" id="nuevo-labo">
												<i class="ace-icon fa fa-folder-open-o bigger-50 blue"></i>
												NUEVO
											</button>-->
<!--											<button class="btn btn-white btn-info btn-bold" id="expoPdf">
												<i class="ace-icon fa fa-file-pdf-o bigger-50 red"></i>
												PDF
											</button>
											<button class="btn btn-white btn-info btn-bold" id="expoExcel">
												<i class="ace-icon fa fa-file-excel-o bigger-50 green"></i>
												EXCEL
											</button>
-->


								
<div class="row">
<div class="col-xs-12">								
<form class="form-horizontal" >
	<input type="hidden" class="form-control" id="codclix" >
	
  <div class="form-group">
    <label class="control-label col-sm-2" for="nomclie">Cliente:</label>
    <div class="col-sm-10 col-md-4 ">
      <input type="text" class="form-control" id="nomclie" placeholder="Nombre Cliente">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="nci">No Carnet:</label>
    <div class="col-sm-10 col-md-4">
      <input type="text" class="form-control" id="nci" placeholder="No Carnet">
    </div>
  </div>
	
  <div class="form-group">
    <label class="control-label col-sm-2" for="dire">Direccion:</label>
    <div class="col-sm-10 col-md-4">
      <input type="text" class="form-control" id="dire" placeholder="Direccion">
    </div>
  </div>
  
 <!-- <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Enviar</button>
    </div>
  </div>-->
	
</form>
	
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Añadir Articulos</button>

	
</div>								
</div>								
								
								
										
	<div id="agrega-registros" style="width:100%;" class="table-responsive"></div>
    <!--<center>
        <ul class="pagination justify-content-end" id="pagination"></ul>
    </center>-->
                                        
 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Añadir Productos</h4>
        </div>
        <div class="modal-body">
          <!--<p>Some text in the modal.</p>-->
			<form class="form-horizontal" >
	<input type="hidden" class="form-control" id="codarx" >
	<input type="hidden" class="form-control" id="porcx" >
	<input type="hidden" class="form-control" id="porcx2" >
				
	
  <div class="form-group">
    <label class="control-label col-sm-2" for="produ">Producto:</label>
    <div class="col-sm-10 col-md-10 ">
      <input type="text" class="form-control" id="produ" placeholder="Producto">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="ume">U.Med.:</label>
    <div class="col-sm-10 col-md-3 ">
      <input type="text" class="form-control" id="ume" placeholder="U.med.">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pre">Precio:</label>
    <div class="col-sm-10 col-md-3 ">
      <input type="text" class="form-control" id="pre" placeholder="Precio">
    </div>
  </div>
				
  <div class="form-group">
    <label class="control-label col-sm-2" for="cantt">Cantidad:</label>
    <div class="col-sm-10 col-md-3 ">
      <input type="text" class="form-control" id="cantt" placeholder="Cantidad">
    </div>
  </div>				
				
	 <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <!--<button type="submit" class="btn btn-default " >Agregar</button>--> 
		<input type="button"  value="Agregar" class="btn btn-info btn-md btn-agregar-cuenta titu"/>
    </div>
  </div>
	
</form>
			
			
			
			
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        </div>
      </div>
      
    </div>
  </div>
								
								
								
								
								
								
								


 





<!-- ventana modal de la imagen -->
<div class="modal fade" id="modalfoto" data-backdrop="static", data-keyboard="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--header cabecera -->
				<div class="modal-header">
						<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">IMAGEN </h4>
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
						<span class="blue bolder">CRM</span>
							Software &copy; 2021
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
