<?php
if (!isset($_SESSION)) {session_start();}
$nombre_u=$_SESSION['nomb_usu'];
$fotito=$_SESSION['fotousu'];
$nombresuc=$_SESSION['nomb_suc'];
$codsucx=$_SESSION['codsuc'];
$area=$_SESSION['id_area'];

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
		<title>SOFT | Valen</title>

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
        <script src="../js_raos/myjavaCoaPrecios.js"></script>
        
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
					<!--	<li class="grey dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-tasks"></i>
								<span class="badge badge-grey">4</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-check"></i>
									4 Tasks to complete
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Software Update</span>
													<span class="pull-right">65%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:65%" class="progress-bar"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Hardware Upgrade</span>
													<span class="pull-right">35%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:35%" class="progress-bar progress-bar-danger"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Unit Testing</span>
													<span class="pull-right">15%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:15%" class="progress-bar progress-bar-warning"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Bug Fixes</span>
													<span class="pull-right">90%</span>
												</div>

												<div class="progress progress-mini progress-striped active">
													<div style="width:90%" class="progress-bar progress-bar-success"></div>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See tasks with details
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="purple dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									8 Notifications
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														New Comments
													</span>
													<span class="pull-right badge badge-info">+12</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<i class="btn btn-xs btn-primary fa fa-user"></i>
												Bob just signed up as an editor ...
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														New Orders
													</span>
													<span class="pull-right badge badge-success">+8</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
														Followers
													</span>
													<span class="pull-right badge badge-info">+11</span>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See all notifications
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="green dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									5 Messages
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#" class="clearfix">
												<img src="../assets/images/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Alex:</span>
														Ciao sociis natoque penatibus et auctor ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>a moment ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="../assets/images/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Susan:</span>
														Vestibulum id ligula porta felis euismod ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>20 minutes ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="../assets/images/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Bob:</span>
														Nullam quis risus eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>3:15 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="../assets/images/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Kate:</span>
														Ciao sociis natoque eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>1:33 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="../assets/images/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Fred:</span>
														Vestibulum id penatibus et auctor  ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>10:09 am</span>
													</span>
												</span>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="../inbox.html">
										See all messages
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>  -->

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
								<a href="far_sucursal.php">
									<i class="menu-icon fa fa-caret-right"></i>
									SUCURSALES
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
								<a href="far_proveedor.php">
									<i class="menu-icon fa fa-caret-right"></i>
									PROVEEDOR
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
								<a href="far_compras.php">
									<i class="menu-icon fa fa-caret-right"></i>
									COMPRAS
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
							
							
							<li class="">
								<a href="far_envios.php">
									<i class="menu-icon fa fa-caret-right"></i>
									ENVIOS SUCURSAL
								</a>

								<b class="arrow"></b>
							</li>
							
							
							<!--<li class="">
								<a href="far_ventas.php">
									<i class="menu-icon fa fa-caret-right"></i>
									VENTAS
								</a>

								<b class="arrow"></b>
							</li>-->
							
							<li class="">
								<a href="crm_pagosCreditos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									PAGO CREDITOS
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
								<a href="crm_usuarios_adm.php">
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
							
							<li class="">
								<a href="crm_saldosGral.php">
									<i class="menu-icon fa fa-caret-right"></i>
									SALDOS GENERALES
								</a>

								<b class="arrow"></b>
							</li>
							
							<li class="">
								<a href="crm_rep_pedido.php">
									<i class="menu-icon fa fa-caret-right"></i>
									NOTAS DE COMPRA
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
							
							<li class="">
								<a href="crm_rep_vta1.php">
									<i class="menu-icon fa fa-caret-right"></i>
									VENTAS POR PERSONAL
								</a>

								<b class="arrow"></b>
							</li>							

							<li class="">
								<a href="crm_rep_vta2.php">
									<i class="menu-icon fa fa-caret-right"></i>
									VENTAS POR INSTITUCIONES
								</a>

								<b class="arrow"></b>
							</li>							
							
							
							<li class="">
								<a href="coa_kardex.php">
									<i class="menu-icon fa fa-caret-right"></i>
									KARDEX
								</a>

								<b class="arrow"></b>
							</li>
							

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
							<!--<form class="form-search">
								<span class="input-icon">
									<input type="text" id="bs-prod" placeholder="Buscar ..." class="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>-->
							<a class="btn btn-danger btn-sm articulosPdf ">Exportar a PDF</a>
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


										
	<div id="agrega-registros" style="width:100%;" class="table-responsive"></div>
    <center>
        <ul class="pagination justify-content-end" id="pagination"></ul>
    </center>
                                        



    <!-- MODAL USUARIOS ORIGINAL-->
    <div class="modal fade" id="sucu-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>FORM.PRODUCTOS</b></h4>
            </div>
            <form id="formulario" class="form-horizontal " onsubmit="return agregaArticulos();">
            <div class="modal-body">
					 <input type="hidden"   id="idper" name="idper" />
                   	<input type="hidden" required readonly id="pro" name="pro" value="0"/>
                   	<input type="hidden" required readonly id="neto" name="neto" value="0"/>
                   	<input type="hidden" required readonly id="pcre" name="pcre" value="0"/>


			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="nomprod">Producto :</label>
                    <div class="col-xs-9">
        			<input type="text" class="form-control" id="nomprod" name="nomprod" required placeholder="Producto">
                    </div>
    			</div>


		


			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="cla">Grupo :</label>
                    <div class="col-xs-6">

        			<select name="cla" id="cla" class="form-control" >
                         		<option value="0">Ninguno</option>
                            		<?php foreach($clasix as $cla):?>
                        		<option value="<?php echo $cla['codcla']?>"><?php echo $cla['descripcla']?></option>
                            		<?php endforeach;?>
                         </select>
                    </div>
    			</div>

			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="prov">Proveedor :</label>
                    <div class="col-xs-6">
        			<select name="prov" id="prov" class="form-control" >
                         		<option value="0">Ninguno</option>
                            		<?php foreach($provee as $lb):?>
                        		<option value="<?php echo $lb['codpv']?>"><?php echo $lb['nombrepv']?></option>
                            		<?php endforeach;?>
                         </select>
                    </div>
    			</div>

			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="ume">U.Medida :</label>
                    <div class="col-xs-4">
        			<input type="text" class="form-control" id="ume" name="ume" required placeholder="U.Medida">
                    </div>
    			</div>	
			    <!--<div class="form-group">
        			<label class="control-label col-xs-3 titi" for="neto">Precio Neto :</label>
                    <div class="col-xs-4">
        			<input type="text" readonly class="form-control" id="neto" name="neto" required value="0" disabled placeholder="Precio Neto">
                    </div>
    			</div>-->	
			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="pvp">Precio Venta:</label>
                    <div class="col-xs-4">
        			<input type="text" value="0" class="form-control" id="pvp" name="pvp" required placeholder="Precio Venta">
                    </div>
    			</div>	
			    <!--<div class="form-group">
        			<label class="control-label col-xs-3 titi" for="pcre">Precio Credito:</label>
                    <div class="col-xs-4">
        			<input type="text" value="0" class="form-control" id="pcre" name="pcre" required placeholder="Precio Credito">
                    </div>
    			</div>	-->

				<div class="form-group">
				<label  class="control-label col-xs-3 titi" for="observ">Detalles:</label>
				<div class="col-xs-9">
				<textarea class="form-control" rows="3" id="observ" required name="observ" placeholder="Detalles del Producto"></textarea>
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

<!--- fin modal -->   





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
