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
        <script src="../js_raos/myjavaRepu.js"></script>
        
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

$costosx = $objProducto->getCostos();
$medida = $objProducto->getMedida();
//$nroMae = $objProducto->nroMaestro();

$datos = $objProducto->nroMaestro2();
$ite=0;
$salx=0;
$valorx=0;

foreach($datos as $nn):
	$ite+=1;
	$saldo3= $nn['saldo'];
	$vax= $nn['costo']*$nn['saldo'];

	$salx+=$saldo3;
	$valorx+=$vax;

endforeach;


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
							<!-- <i class="fa fa-leaf"></i>
							Ace Admin -->
							<!-- <i class="fa fa-eyedropper"></i> -->
                            <img src="../recursos/jachalogo1.jpg" alt="Jacha Inti" />
                             JACHA INTI


						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

					<li class="grey dropdown-modal">

							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-cubes"></i>
								Soctk:<span class="badge badge-black"><?php echo $salx ?></span>
							</a>
					</li>

					<li class="grey dropdown-modal">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<i class="ace-icon fa fa-dollar"></i>
							Valor:<span class="badge badge-black"><?php echo number_format($valorx,2) ?></span>
						</a>
					</li>
					<li class="grey dropdown-modal">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<i class="ace-icon fa fa-hashtag"></i>
							Items:<span class="badge badge-black"><?php echo $ite ?></span>
						</a>
					</li>


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
							<img class="nav-user-photo" src="<?php echo $fotito; ?>" alt="" />
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

					<!-- <li class="">
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
					</li> -->






					<!-- <li class="">
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
					</li> -->

					<!-- <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cart-plus"></i>
							<span class="menu-text"> MOV.DIARIO </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="#far_compras.php">
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
					</li> -->

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cart-plus"></i>
							<span class="menu-text"> MOV.DIARIO </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="jc_vales.php">
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
							<span class="menu-text"> REQUER. COMPRAS </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						
							<li class="">
								<a href="jc_repuesto1.php">
									<i class="menu-icon fa fa-caret-right"></i>
									REPUESTOS MAESTRO
								</a>
								<b class="arrow"></b>
							</li>



							 <li class="">
								<!-- <a href="jc_entregaCompra.php"> -->
									<a href="jc_almacen1.php">
									<i class="menu-icon fa fa-caret-right"></i>
									REQ.DE SALDO-CR
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<!-- <a href="jc_entregaCompra.php"> -->
									<a href="jc_modelo2.php">
									<i class="menu-icon fa fa-caret-right"></i>
									SOLICITUD REPUESTOS
								</a>

								<b class="arrow"></b>
							</li>

							<!-- <li class="">
								<a href="jc_entregaCompra2.php">
									<i class="menu-icon fa fa-caret-right"></i>
									NOTA ENTREGA DE COMPRA
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="jc_entregaCompra3.php">
									<i class="menu-icon fa fa-caret-right"></i>
									CONFIR.COMPRAS USUARIOS
								</a>
								<b class="arrow"></b>
							</li>  -->
			

						</ul>
					</li>                    



		
		
					<!-- <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> REQ.GESTORES </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

						<li class="">
								<a href="#jca_personal.php">
									<i class="menu-icon fa fa-caret-right"></i>
									RECEPCION DE REQ.
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#jca_usuarios_adm.php">
									<i class="menu-icon fa fa-caret-right"></i>
									ENVIO DE REQ.
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li> -->
				


					<!-- <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-print"></i>
							<span class="menu-text"> REPORTES </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="#far_kardexx.php">
									<i class="menu-icon fa fa-caret-right"></i>
									KARDEX
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="far_graficoCompra.php">
									<i class="menu-icon fa fa-caret-right"></i>
									GRAFICO VENTAS-MES
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li> -->

				
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
								<a href="jc_almacen.php">Inicio</a>
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
									<input type="text" placeholder="Buscar ..." class="nav-search-input bs-prod" id="nav-search-input" autocomplete="off" />
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
											<button class="btn btn-white btn-info btn-bold" id="nuevo-labo">
												<i class="ace-icon fa fa-folder-open-o bigger-50 blue"></i>
												NUEVO
											</button>
											<button class="btn btn-white btn-info btn-bold" id="expoPdf">
												<i class="ace-icon fa fa-file-pdf-o bigger-50 red"></i>
												PDF
											</button>
										<!--	<button class="btn btn-white btn-info btn-bold" id="expoExcel">
												<i class="ace-icon fa fa-file-excel-o bigger-50 green"></i>
												EXCEL
											</button>
-->
										
	<div id="agrega-registros" style="width:100%;" class="table-responsive"></div>
    <center>
        <ul class="pagination justify-content-end" id="pagination"></ul>
    </center>
                                        



    <!-- MODAL USUARIOS ORIGINAL-->
    <div class="modal fade" id="labo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>REGISTRO</b></h4>
            </div>
            <form id="formulario" class="form-horizontal " onsubmit="return agregaRegistroar();">
            <div class="modal-body">
					 <input type="hidden"   id="idrep" name="idrep" />
                   	<input type="hidden" required readonly id="pro" name="pro"/>
					   <input type="hidden" class="form-control input-sm" id="npar" name="npar" />	 <input type="hidden" class="form-control input-sm" id="sw" name="sw" />
					   <input type="hidden" class="form-control input-sm" id="nrox" name="nrox" />					   
				   
				   

	<div class="row">
         		<div class="col-md-8">
                  <span class="help-block text-muted small-font tipe" > Centro de Costos:</span>
				  				<select id="lb1" name="lb1" class="form-control lb" >
                                    <?php
                                        echo '<option selected="selected" disabled="disabled">Elija el Tipo</option>';
                                        foreach($costosx as $nn): 
                                            echo '<option value="'.$nn['codcc'].'">'.$nn['detcostos'].'</option>';
                                        endforeach;
                                    ?>
                                </select>  
              	</div>
    
         		<div class="col-md-4">
                  <span class="help-block text-muted small-font tipe" >....</span>
                  <input type="text" class="form-control input-sm" id="ccosto1" name="ccosto1" placeholder="Codigo" />
              	</div>
      </div>

<div class="row">
         		<div class="col-md-8">
                  <span class="help-block text-muted small-font tipe" > Proceso:</span>
				  <select  id="lb2" name="lb2" class="form-control" required>
                  </select>
              	</div>
    
         		<div class="col-md-4">
                  <span class="help-block text-muted small-font tipe" >....</span>
                  <input type="text" class="form-control input-sm" id="procc1" name="procc1" placeholder="Codigo" />
              	</div>
</div>

<div class="row">
         		<div class="col-md-8">
                  <span class="help-block text-muted small-font tipe" > Maquinas:</span>
				  <select  id="lb3" name="lb3" class="form-control" required>
                  </select>
              	</div>
    
         		<div class="col-md-4">
                  <span class="help-block text-muted small-font tipe" >.... </span>
                  <input type="text" class="form-control input-sm" id="maqq1" name="maqq1" placeholder="Codigo" />
              	</div>
</div>

<div class="row">
         		<div class="col-md-8">
                  <span class="help-block text-muted small-font tipe" > Elementos:</span>
				  <select  id="lb4" name="lb4" class="form-control" required>
                  </select>
              	</div>
    
         		<div class="col-md-4">
                  <span class="help-block text-muted small-font tipe" >... </span>
                  <input type="text" class="form-control input-sm" id="ele1" name="ele1" placeholder="Codigo" />
              	</div>
</div>

<div class="row">
   
         		<div class="col-md-8">
                  <span class="help-block text-muted small-font tipe" >Codigo: </span>
                  <input type="text" class="form-control input-sm" id="codauto" name="codauto" placeholder="Codigo" />
              	</div>

				<div class="col-md-4">
				<span class="help-block text-muted small-font tipe" >... </span>
				<button type="button" class="btn btn-danger btn-sm genera" >Generar Codigo</button>
				</div>

</div>

<div class="row">
   
         		<div class="col-md-12">
                  <span class="help-block text-muted small-font tipe" >Detalle: </span>
                  <input type="text" class="form-control input-sm" id="det" name="det" placeholder="Detalle" />
              	</div>
</div>
<div class="row">
   
         		<div class="col-md-4">
                  <span class="help-block text-muted small-font tipe" >U.Medida: </span>
				  <select name="med" id="med" class="form-control" >
				 <option value="0">Ninguno</option>
					<?php foreach($medida as $dato1):?>
				<option value="<?php echo $dato1['codmd']?>"><?php echo $dato1['detmedida']?></option>
					<?php endforeach;?>
				</select>
              	</div>
</div>





<div class="row">
   
         		<div class="col-md-8">
                  <span class="help-block text-muted small-font tipe" >Ubicacion: </span>
                  <input type="text" class="form-control input-sm" id="ubi" name="ubi" placeholder="Ubicacion" />
              	</div>
</div>
<div class="row">
   
         		<div class="col-md-4">
                  <span class="help-block text-muted small-font tipe" >Especificacion: </span>
                  <input type="text" class="form-control input-sm" id="espe" name="espe" placeholder="Especificacion" />
              	</div>
</div>
<div class="row">
   
         		<div class="col-md-4">
                  <span class="help-block text-muted small-font tipe" >Costo: </span>
                  <input type="text" class="form-control input-sm" id="cos" name="cos" placeholder="Costo" />
              	</div>
</div>
<div class="row">
   
         		<div class="col-md-4">
                  <span class="help-block text-muted small-font tipe" >Saldo: </span>
                  <input type="text" class="form-control input-sm" id="sal" name="sal" placeholder="Saldo" />
              	</div>
</div>
<div class="row">
   
         		<div class="col-md-4">
                  <span class="help-block text-muted small-font tipe" >Saldo_CR: </span>
                  <input type="text" class="form-control input-sm" id="salm" name="salm" placeholder="Saldo Critico" />
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


<!-- Modal -->

    <!-- MODAL USUARIOS ORIGINAL-->
    <div class="modal fade" id="Modal-repu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>FORM.REPUESTOS</b></h4>
            </div>
            <form id="formulariore" class="form-horizontal " onsubmit="return agregaRegistroRep();">
            <div class="modal-body">
					 <input type="hidden"   id="idrep1" name="idrep1" />
                   	<input type="hidden" required readonly id="pro1" name="pro1"/>
					<input type="hidden" class="form-control" id="npar1" name="npar1">

			    <div class="form-group">
        			<label class="control-label col-xs-2 titi" for="nomrep">Detalle :</label>
                    <div class="col-xs-10">
					<textarea class="form-control input-sm" rows="2" id="nomrep" name="nomrep" placeholder="Repuesto"></textarea>				  
                    </div>
    			</div>
			    <div class="form-group">
        			<label class="control-label col-xs-2 titi" for="umm">U.Med.:</label>
                    <div class="col-xs-3">
        			<input type="text" class="form-control" id="umm" name="umm"  placeholder="U.Med.">
                    </div>
    			</div>
		
			    <div class="form-group">
        			<label class="control-label col-xs-2 titi" for="ubi1">Ubicacion:</label>
                    <div class="col-xs-3">
        			<input type="text" class="form-control" id="ubi1" name="ubi1"  placeholder="Ubicacion">
                    </div>
    			</div>
			    <div class="form-group">
        			<label class="control-label col-xs-2 titi" for="espe1">Especif:</label>
                    <div class="col-xs-3">
        			<input type="text" class="form-control" id="espe1" name="espe1"  placeholder="Especificacion">
                    </div>
    			</div>
			    <div class="form-group">
        			<label class="control-label col-xs-2 titi" for="cossto1">Costo:</label>
                    <div class="col-xs-3">
        			<input type="text" class="form-control" id="cossto1" name="cossto1"  placeholder="Costo">
                    </div>
    			</div>
			    <div class="form-group">
        			<label class="control-label col-xs-2 titi" for="sal1">Stock:</label>
                    <div class="col-xs-3">
        			<input type="text" class="form-control" id="sal1" name="sal1"  placeholder="Stock">
                    </div>
    			</div>
			    <div class="form-group">
        			<label class="control-label col-xs-2 titi" for="salcr">Stock-CR:</label>
                    <div class="col-xs-3">
        			<input type="text" class="form-control" id="salcr" name="salcr"  placeholder="Saldo Critico">
                    </div>
    			</div>

                
                        	<div id="mensaje1"></div>
            </div>
            <div class="modal-footer">
            	<input type="submit" value="Registrar" class="btn btn-success" id="reg1"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi1"/>
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
