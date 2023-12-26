<?php
if (!isset($_SESSION)) {session_start();}
$nombre_u=$_SESSION['nomb_usu'];
$fotito=$_SESSION['fotousu'];
$nombresuc=$_SESSION['nomb_suc'];
$codsucx=$_SESSION['codsuc'];
$area=$_SESSION['id_area'];
$idusu=$_SESSION['id_usu'];

date_default_timezone_set('America/La_Paz');
$fecha = date('Y-m-d');

$_SESSION['detalle'] = array();
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>SOFFA | Admin</title>

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
        <script src="../js_raos/myjavaSolici.js"></script>
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
require_once '../Model/modelo1.php';
$objProducto = new Producto();
$pper = $objProducto->getpersonasgral();
$sucur = $objProducto->getSucursalx();
$paimprimir = $objProducto->getSolicitudes();




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
							<!-- <i class="fa fa-eyedropper"></i> -->
                            <img src="../recursos/jachalogo1.jpg" alt="Jacha Inti" />
                             JACHA INTI


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
							<span class="menu-text"> MAESTRO PRINC.</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="jc_repuesto.php">
									<i class="menu-icon fa fa-caret-right"></i>
									REPUESTOS
								</a>
								<b class="arrow"></b>
							</li>
							
							<li class="">
								<a href="jc_herramientas.php">
									<i class="menu-icon fa fa-caret-right"></i>
									HERRAMIENTAS
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>






					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> TABLAS </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
					
							<li class="">
								<a href="jc_ccostos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									CENTRO COSTOS
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="jc_proceso.php">
									<i class="menu-icon fa fa-caret-right"></i>
									PROCESO
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="jc_maquina.php">
									<i class="menu-icon fa fa-caret-right"></i>
									MAQUINAS
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="jc_elemento.php">
									<i class="menu-icon fa fa-caret-right"></i>
									ELEMENTOS
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cart-plus"></i>
							<span class="menu-text"> MOV.DIARIO </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="jc_critico.php">
									<i class="menu-icon fa fa-caret-right"></i>
									SALDOS CRITICOS
								</a>
								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="jc_solicitud.php">
									<i class="menu-icon fa fa-caret-right"></i>
									CONF.COMPRAS
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="#far_compras.php">
									<i class="menu-icon fa fa-caret-right"></i>
									V.SALIDA C/CODIGO
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="#far_compras.php">
									<i class="menu-icon fa fa-caret-right"></i>
									V.SALIDA S/CODIGO
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="#far_compras.php">
									<i class="menu-icon fa fa-caret-right"></i>
									DEVOLUCION
								</a>
								<b class="arrow"></b>
							</li>


						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-shopping-bag"></i>
							<span class="menu-text"> TABLAS INTERNAS </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
				

							<li class="">
								<a href="jc_supervisor.php">
									<i class="menu-icon fa fa-caret-right"></i>
									SUPERVISORES
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="jc_tecnicos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									TECNICOS
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="jc_profesiones.php">
									<i class="menu-icon fa fa-caret-right"></i>
									PROFESIONES
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
							<!-- <li class="">
								<a href="far_personal.php">
									<i class="menu-icon fa fa-caret-right"></i>
									PERFIL PROPIETARIO
								</a>

								<b class="arrow"></b>
							</li> -->

							<li class="">
								<a href="jca_personal.php">
									<i class="menu-icon fa fa-caret-right"></i>
									PERSONAL
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="jca_usuarios_adm.php">
									<i class="menu-icon fa fa-caret-right"></i>
									USUARIOS
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
								<a href="#proceso-links.php">
									<i class="menu-icon fa fa-caret-right"></i>
									KARDEX
								</a>

								<b class="arrow"></b>
							</li>

							<!-- <li class="">
								<a href="proceso-dos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									PROCESANDO.....
								</a>

								<b class="arrow"></b>
							</li> -->






							<li class="">
								<a href="far_graficoCompra.php">
									<i class="menu-icon fa fa-caret-right"></i>
									GRAFICO VENTAS-MES
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
								<a href="far_inicio1.php">Inicio</a>
							</li>

							<li>
								<!--<a href="#">Other Pages</a>-->
							<?php echo 'Area :'.$area; ?>
							<li><?php //echo 'Sucursal:'.$nombresuc; ?></li>
							
							
							</li>
							<!--<li class="active">Blank Page</li>-->
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Buscar ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
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
											<!-- <button class="btn btn-white btn-info btn-bold" id="nuevo-labo">
												<i class="ace-icon fa fa-folder-open-o bigger-50 blue"></i>
												NUEVO
											</button> -->



<form  class="form-horizontal" id="formulario">
				<!--<h3 class="bg-primary text-center pad-basic no-btm">REGISTRO DIARIO </h3>-->
				<table width="100%" class="table table-responsive table-bordered" " >
					<tr><td rowspan="3" align="center"> <img class="img-responsive" src="../recursos/jachalogo.jpg" alt="Jacha Inti" width="140px" Height="140px"></td><td rowspan="3" align="center"><h2>Registro</h2></td><td>Cod.Documento</td><td><input type="text" class="form-control" id="coddoc" name="coddoc" required placeholder="Cod.Documento" readonly value="M-TIOF-FR-SC0.0"></td></tr>
					<tr><td>Version:</td><td><input type="text" class="form-control" id="vver" name="vver" required placeholder="Version " value="1" readonly></td></tr>
					<tr><td>Fecha:</td><td><input type="date" class="form-control" id="fea" name="fea" value="<?php echo $fecha;?>"  required placeholder="Fecha "></td></tr>

					<tr><td colspan="4" align="center"><h3>SOLICITUD DE REPUESTOS</h3></td></tr>
					
					<tr><td >Nombre :</td><td><input type="text" class="form-control" id="nomb" name="nomb" required placeholder="Nombre"></td><td align="right">Fecha Solic.</td><td><input type="date" class="form-control" value="<?php echo $fecha;?>"  id="fesol" name="fesol" required placeholder="Fecha "></td></tr>
					<tr><td>Area :</td><td><input type="text" class="form-control" id="areaa" name="areaa" required placeholder="Area"></td><td colspan="1" align="right">No Solic.</td><td colspan="2"><input type="text" class="form-control" id="nsol" name="nsol" required placeholder="No Solicitud" value="MNT-19.10-1" readonly></td></tr>
					<tr><td>Cargo :</td><td><input type="text" class="form-control" id="carg" name="carg" required placeholder="Cargo "></td></tr>
					</table>				


<div class="row">
<input type="hidden" class="form-control" id="codrepx" name="codrepx">
<input type="hidden" class="form-control" id="codareax" name="codareax">
<input type="hidden" class="form-control" id="codcargox" name="codcargox">
<input type="hidden" class="form-control" id="codsolix" name="codsolix">


		<div class="col-md-4">
            <span class="help-block text-muted small-font" > Detalle:</span>
           <input type="text" class="form-control" id="detar" name="detar" required placeholder="Detalle ">
       </div>
	   <div class="col-md-2">
            <span class="help-block text-muted small-font" > Codigo:</span>
           <input type="text" class="form-control" id="codd" name="codd" required placeholder="Codigo ">
       </div>

        <div class="col-md-1">
            <span class="help-block text-muted small-font" > U.Med:</span>
           <input type="text" class="form-control" id="ume" name="ume" required placeholder="U.Med.">
       </div>
	   <div class="col-md-1">
            <span class="help-block text-muted small-font" > Cant:</span>
           <input type="number" class="form-control" id="cantt" name="cantt" value="1"  required placeholder="Cant. ">
       </div>

	   <div class="col-md-2">
        	<span class="help-block text-muted small-font" > Prioridad</span>
              <select name="tpri" id="tpri" class="form-control" >
                    <option value="AL">ALTA</option>
                    <option value="MD">MEDIA</option>
               <option value="BJ">BAJA</option>
          </select>
		</div>  

		<div class="col-md-2">
        	<span class="help-block text-muted small-font" > ..</span>
		<input type="button"  value="Agregar" class="btn btn-info btn-sm btn-agregar-cuenta titu"/>
		<button type="button" class="btn btn-danger btn-sm" id="btn-GuardaSoli">Guardar Nota</button>

		</div> 
    
</div>
         
             

	</form>
<hr>
	<div class="registros" id="agrega-solicitud" style="width:100%;"></div>
    <!-- <center>
        <ul class="pagination" id="pagination"></ul>
    </center> -->

	<div class="registros" id="impresion-datos" style="width:100%;"></div>

										




<div class="row-fluid"><!-- row bb --> 
 <div class="panel-group coli3">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse3">IMPRESION DE SOLICITUDES..</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse table-responsive">
        <div class="panel-body">
					<table class="table titi" width="100%">
					        <tr>
					            <td align="center">Fecha</td>
					            <td align="center">No Doc.</td>
					            <td align="center">Responsable</td>
					            <td align="center">No Solicit.</td>
  					            <td align="center">Items</td>
					            <td>Opcion</td>
					        </tr>
					    <tbody>
					    	<?php 
				    	foreach($paimprimir as $dett2){ 
								$fexx= date("d-m-Y", strtotime($dett2['fechasol']) );
								$tmmx=$dett2['tmm'];
									?>
										<tr>
											<td width="20%" align="center"><?php echo $fexx;?></td>
											<td width="7%" align="center"><?php echo $dett2['norden'];?></td>
											<td width="15%" align="center"><?php echo $dett2['afavor'];?></td>
												<td width="15%" align="center"><?php echo $dett2['nrosol'];?></td>
																	<td width="5%" align="center"><?php echo $dett2['itm'];?></td>
		<td align="center" width="5%"><a href="javascript:mostrarSolicitud(<?php echo $dett2['norden']; ?>)"><img src="../recursos/impresora.png" data-toggle="tooltip" title="Ticket"></a></td>                               
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







    <!-- MODAL USUARIOS ORIGINAL-->
    <div class="modal fade" id="labo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>COSTOS</b></h4>
            </div>
            <form id="formulario" class="form-horizontal " onsubmit="return agregaRegistroCoss();">
            <div class="modal-body">
					 <input type="hidden"   id="idcoss" name="idcoss" />
                   	<input type="hidden" required readonly id="pro" name="pro"/>


			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="nomcoss">Detalle :</label>
                    <div class="col-xs-9">
        			<input type="text" class="form-control" id="nomcoss" name="nomcoss" required placeholder="Detalle ">
                    </div>
    			</div>

			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="codcossi">Codigo :</label>
                    <div class="col-xs-4">
        			<input type="text" class="form-control" id="codcossi" name="codcossi" required placeholder="Codigo ">
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
						<span class="blue bolder">JACHA INTI</span>
							Software &copy; 2019 
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
