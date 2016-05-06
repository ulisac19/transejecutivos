a:7:{i:0;s:2166:"<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=1">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <link rel="icon" type="image/x-icon" href="<?php echo $this->url->get(''); ?>images/favicons/favicon.ico">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <?php echo $this->tag->stylesheetLink('vendors/nifty-template/template/css/bootstrap.min.css'); ?>
    <!--Nifty Stylesheet [ REQUIRED ]-->
    <?php echo $this->tag->stylesheetLink('vendors/nifty-template/template/css/nifty.min.css'); ?>
    <!--Font Awesome [ OPTIONAL ]-->
    <?php echo $this->tag->stylesheetLink('vendors/nifty-template/template/plugins/font-awesome/css/font-awesome.min.css'); ?>
    <!--Animate.css [ OPTIONAL ]-->
    <?php echo $this->tag->stylesheetLink('vendors/nifty-template/template/plugins/animate-css/animate.min.css'); ?>
    <!--Morris.js [ OPTIONAL ]-->
    <?php echo $this->tag->stylesheetLink('vendors/nifty-template/template/plugins/morris-js/morris.min.css'); ?>
    <!--Switchery [ OPTIONAL ]-->
    <?php echo $this->tag->stylesheetLink('vendors/nifty-template/template/plugins/switchery/switchery.min.css'); ?>
    <!--Bootstrap Select [ OPTIONAL ]-->
    <?php echo $this->tag->stylesheetLink('vendors/nifty-template/template/plugins/bootstrap-select/bootstrap-select.min.css'); ?>
    <!--Demo script [ DEMONSTRATION ]-->
    <?php echo $this->tag->stylesheetLink('vendors/nifty-template/template/css/demo/nifty-demo.min.css'); ?>
    <!--SCRIPT-->
    <!--=================================================-->

    <!--Page Load Progress Bar [ OPTIONAL ]-->
    <?php echo $this->tag->stylesheetLink('vendors/nifty-template/template/plugins/pace/pace.min.css'); ?>
    <?php echo $this->tag->javascriptInclude('vendors/nifty-template/template/plugins/pace/pace.min.js'); ?>
    
    <!-- Custom CSS -->
    <?php echo $this->tag->stylesheetLink('css/adjustments.css'); ?>

    <!-- CSS added with volt-->
    ";s:3:"css";N;i:1;s:81:"
  </head>
 <body class=" nifty-ready pace-done" cz-shortcut-listen="true">

    ";s:7:"content";N;i:2;s:34410:"
    
    
    <div class="pace  pace-inactive">
<div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
	<div id="container" class="effect mainnav-sm">
		
		<!--NAVBAR-->
		<!--===================================================-->
		<header id="navbar">
			<div id="navbar-container" class="boxed">

				<!--Brand logo & name-->
				<!--================================-->
				<div class="navbar-header">
					<a href="http://www.transportesejecutivos.com/admin/main.php" class="navbar-brand">
						<img src="<?php echo $this->url->get(''); ?>images/logos/logo.png" alt="Nifty Logo" class="brand-icon">
						<div class="brand-title">
							<span class="brand-text">Administración</span>
						</div>
					</a>
				</div>
				<!--================================-->
				<!--End brand logo & name-->


				<!--Navbar Dropdown-->
				<!--================================-->
				<div class="navbar-content clearfix">
					<ul class="nav navbar-top-links pull-left">

						<!--Navigation toogle button-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li class="tgl-menu-btn">
							<a class="mainnav-toggle" href="#">
								<i class="fa fa-navicon fa-lg"></i>
							</a>
						</li>
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End Navigation toogle button-->


						<!--Mega dropdown-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li class="mega-dropdown">
							<a href="#" class="mega-dropdown-toggle">
								<i class="fa fa-bar-chart-o fa-lg"></i>
							</a>
							<div class="dropdown-menu mega-dropdown-menu">
								<div class="clearfix">
								  <div class="col-sm-12 col-md-3">

										<!--Mega menu widget-->
										<div class="text-center bg-success pad-all">
											<h3 class="text-thin mar-no">Informes a la Mano</h3>
											<div class="pad-ver box-inline">
												<span class="icon-wrap icon-wrap-lg icon-circle bg-trans-light">
													<i class="fa fa-bar-chart fa-4x"></i>
												</span>
											</div>
											<p><a href="http://www.transportesejecutivos.com/admin/informes/" class="btn btn-success">Ver todos los informes</a></p>
                                          
										</div>

									</div>
									<div class="col-sm-4 col-md-3">

										<!--Mega menu list-->
										<ul class="list-unstyled">
											<li class="dropdown-header">Órdenes</li>
											<li><a href="http://www.transportesejecutivos.com/admin/informes/hoy.php"><span class="pull-right badge badge-success">189</span>de Hoy</a></li>
											<li><a href="http://www.transportesejecutivos.com/admin/informes/manana.php"><span class="pull-right badge badge-success">29</span>de Mañana</a></li>
											<li class="divider"></li>
											<li><a href="http://www.transportesejecutivos.com/admin/informes/dia_conductor.php">Conductor x Día</a></li>
											<li><a href="http://www.transportesejecutivos.com/admin/informes/dia_pasajero.php">Pasajero x Día</a></li>
                                            <li><a href="http://www.transportesejecutivos.com/admin/informes/dia_ciudad.php">Ciudad x Día</a></li>
                                            <li><a href="http://www.transportesejecutivos.com/admin/informes/dia_empresa.php">Empresa x Día</a></li>
                                   
										</ul>
									

									</div>
									<div class="col-sm-4 col-md-3">

										<!--Mega menu list-->
									  <ul class="list-unstyled">
											<li class="dropdown-header">en Excell</li>
											
											<li><a href="http://www.transportesejecutivos.com/admin/informes/informes_xls.php?informe=4&amp;fecha_s=05/06/2016">Hoy</a></li>
                                            <li><a href="http://www.transportesejecutivos.com/admin/informes/informes_xls.php?informe=4&amp;fecha_s=05/07/2016">Mañana</a></li>
											<li><a href="http://www.transportesejecutivos.com/admin/informes/informes_xls.php?informe=5">Todas </a></li>
											<li class="divider"></li>
											<li><a href="http://www.transportesejecutivos.com/admin/informes/excel.php">Todos los Informes de Excell</a></li>
											<li class="divider"></li>
											<li>
                                            <form action="http://www.transportesejecutivos.com/admin/informes/informes_xls_completo.php" method="get" name="form5" target="new" id="form5" class="form">
            
            <select name="mes" required="" id="mes">
              <option value="">Seleccione un mes</option>
              <option value="01">Enero</option>
              <option value="02">Febrero</option>
              <option value="03">Marzo</option>
              <option value="04">Abril</option>
              <option value="05">Mayo</option>
              <option value="06">Junio</option>
              <option value="07">Julio</option>
              <option value="08">Agosto</option>
              <option value="09">Septiembre</option>
              <option value="10">Octubre</option>
              <option value="11">Noviembre</option>
              <option value="12">Diciembre</option>
            </select>
           
            <input name="year" type="text" required="required" id="year" value="2015" size="5" maxlength="4">
            
            <input type="submit" class="btn btn-primary btn-block" value="Informe Completo del Mes en Excel">
            <input name="informe" type="hidden" id="informe" value="6">
            </form>
                                            </li><li class="divider"></li>
										</ul>
										<p>
                                         <!-- Button trigger modal -->
                                      </p><p><br>
                                        <br>                                      
                                      </p><p><a style=" cursor:pointer" type="button" data-toggle="modal" data-target="#myModal_solitud_" class="btn btn-default btn-rounded">Crear Manualmente  Solicitud de Cotizacion</a>
                                        
                                        <!-- Modal -->
                                      </p><div class="modal fade" id="myModal_solitud_" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog  modal-lg" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                <h4 style="color:#C1C1C1" class="modal-title" id="myModal_solitud_">Crear una solicitud de cotizacion manualmente</h4>
                                              </div>
                                              <div class="modal-body">
                                                
                                                <object type="text/html" data="http://www.transportesejecutivos.com/solicitudes.php" width="100%" height="400"> </object>
                                              </div> 
                                              
                                              <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                
                                              </div></div>
                                      </div> </div>
                                        <p></p>

									</div>
									<div class="col-sm-4 col-md-3">

										<!--Mega menu list-->
									  <ul class="list-unstyled">
										  <li>
										    <form action="http://www.transportesejecutivos.com/admin/informes/dia.php" method="get" class="form" role="form">
										      <div class="form-group">
										        <label class="dropdown-header" for="demo-megamenu-input">Por Fecha</label>
										        <input name="fecha_s" type="date" required="required" class="form-control" id="demo-megamenu-input" placeholder="Enter email" value="MM/DD/YYYY">
									          </div><input name="informe" type="hidden" id="informe" value="4"><input name="informe" type="hidden" id="formato" value="date"><input name="nuevafecha" type="hidden" id="nuevafecha" value="si">
										      <button class="btn btn-primary btn-block" type="submit">Ver Informe por Fecha</button>
									        </form>
								        </li>
									  </ul>
										<ul class="list-unstyled">
										  <li>
										    <form action="http://www.transportesejecutivos.com/admin/buscar_orden.php" method="GET" class="form" role="form">
										      <div class="form-group">
										        <label class="dropdown-header" for="demo-megamenu-input2">Orden Exacta</label>
										        <input name="orden" type="text" required="required" class="form-control" id="demo-megamenu-input2" placeholder="Número de Orden Exacta">
									          </div>
											  <input type="hidden" value="main.php?" name="back">
										      <button class="btn btn-primary btn-block" type="submit">Ver Orden Exacta</button>
									        </form>
									      </li>
									  </ul>
                                        <ul class="list-unstyled">
										  <li>
										    <form action="http://www.transportesejecutivos.com/admin/dia_graficos.php" method="get" class="form" role="form">
										      <div class="form-group">
										        <label class="dropdown-header" for="demo-megamenu-input">Graficos Fecha</label>
										        <input name="fecha_s" type="date" required="required" class="form-control" id="demo-megamenu-input" placeholder="Enter email" value="MM/DD/YYYY">
									          </div><input name="informe" type="hidden" id="informe" value="4"><input name="informe" type="hidden" id="formato" value="date"><input name="nuevafecha" type="hidden" id="nuevafecha" value="si">
										      <button class="btn btn-primary btn-block" type="submit">Ver Informe por Fecha</button>
									        </form>
								        </li>
									  </ul>
									</div>
								</div>
							</div>
						</li>						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End mega dropdown-->

					</ul>
					<ul class="nav navbar-top-links pull-right">

			
						<!--User dropdown-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li id="dropdown-user" class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
								<span class="pull-right">
									<img class="img-circle img-user media-object" src="http://www.transportesejecutivos.com/admin/nuevo_admin_2015/template/img/av1.png" alt="Profile Picture">
								</span>
								<div class="username hidden-xs"><strong>William Montiel</strong></div>
							</a>


							<div class="dropdown-menu dropdown-menu-md dropdown-menu-right with-arrow panel-default">

								<!-- Dropdown heading Barra de Completado 
								<div class="pad-all bord-btm">
									<p class="text-lg text-muted text-thin mar-btm">750Gb of 1,000Gb Used</p>
									<div class="progress progress-sm">
										<div class="progress-bar" style="width: 70%;">
											<span class="sr-only">70%</span>
										</div>
									</div>
								</div>-->


								<!-- User dropdown menu -->
								<ul class="head-list">
									<li>
										<a>
											<i class="fa fa-user fa-fw fa-lg"></i> Usuario: willmontiel										</a>
									</li>
                                    <li>
										<a>
											<i class="fa fa-lock fa-fw fa-lg"></i> Nivel de Acceso: superadministrador										</a>
									</li>
                                    <!-- Item con numerito al lado 
									<li>
										<a href="#">
											<span class="badge badge-danger pull-right">9</span>
											<i class="fa fa-envelope fa-fw fa-lg"></i> Messages
										</a>
									</li>
                                    -->
									<li>
										<a href="#">
											<span class="label label-success pull-right">Próximamente</span>
											<i class="fa fa-gear fa-fw fa-lg"></i> Mi Cuenta
										</a>
									</li>
								</ul>

								<!-- Dropdown footer -->
								<div class="pad-all text-right">
									<a href="http://www.transportesejecutivos.com/admin/logout.php" class="btn btn-primary">
										<i class="fa fa-sign-out fa-fw"></i> Salir
									</a>
								</div>
							</div>
						</li>						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End user dropdown-->

					</ul>
				</div>
				<!--================================-->
				<!--End Navbar Dropdown-->

			</div>
		</header>
		<!--===================================================-->
		<!--END NAVBAR-->

		<div class="boxed">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				
				<!--Barra del titulo y navegacion y buscar orden exacta -->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->


				<!--Breadcrumb-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End breadcrumb-->


		

				<!--Page content-->
				<!--===================================================-->
                <!--===================================================-->
                <!--===================================================-->
                <!--===================================================-->
                <!--===================================================-->
                <!--===================================================-->
                <!--===================================================-->
                <!--===================================================-->
                <!--===================================================-->
                <!--===================================================-->
                
				

<!--Morris Charts -->
					<!--===================================================-->
					
					
					
					
					
					
						<!--===================================================-->
				<!--End page content-->


			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->


			
			<!--MAIN NAVIGATION-->
			<!--===================================================-->
			<nav id="mainnav-container">
				<div id="mainnav">


					<!--Menu-->
					<!--================================-->
					<div id="mainnav-menu-wrap">
						<div class="nano has-scrollbar">
							<div class="nano-content" tabindex="0" style="right: -17px;">
								<ul id="mainnav-menu" class="list-group">
						
									
									<!--Menu list item-->
									<li class="active-link">
										<a href="http://www.transportesejecutivos.com/admin/main.php" data-original-title="" title="" class="">
											<i class="fa fa-dashboard"></i>
											<span class="menu-title">
												<strong>Dashboard</strong>
												<span class="label label-success pull-right">Inicio</span>
											</span>
										</a>
									</li>
                                    
                                    <!--Category name-->
									<li class="list-header">Operación</li>
						
						
									<!--Menu list item-->
                                    
                                     <li class="">
										<a href="#" data-original-title="" title="" class="">
											<i class="fa fa-bar-chart-o"></i>
											<span class="menu-title">
												Informes
											</span>
											<i class="arrow"></i>
										</a>
						
										<!--Submenu-->
										
								  <ul class="collapse pop-in">
											<li><a href="http://www.transportesejecutivos.com/admin/informes/hoy.php">Ordenes de Hoy<span class="pull-right badge badge-warning">189</span></a></li>
											<li><a href="http://www.transportesejecutivos.com/admin/informes/manana.php">Ordenes de Mañana<span class="pull-right badge badge-warning">29</span></a></li>
											<!-- <li><a href="http://www.transportesejecutivos.com/admin/informes/dia.php">Ordenes de un Día</a></li> -->
											<li><a href="http://www.transportesejecutivos.com/admin/informes/mes.php">Ordenes de un Mes</a></li>
											<li class="list-divider"></li>
											<li><a href="http://www.transportesejecutivos.com/admin/informes/conductor.php">Ordenes de un Conductor</a></li>
											<li><a href="http://www.transportesejecutivos.com/admin/informes/pasajero.php">Ordenes de un Pasajero</a></li>
                                            <li><a href="http://www.transportesejecutivos.com/admin/informes/empresa.php">Ordenes de una Empresa</a></li>
                                            <li><a href="http://www.transportesejecutivos.com/admin/informes/ciudad.php">Ordenes de un Ciudad</a></li>
                                            <li class="list-divider"></li>
                                            <li><a href="http://www.transportesejecutivos.com/admin/informes/dia_conductor.php"> Conductor x Día</a></li>
                                            <li><a href="http://www.transportesejecutivos.com/admin/informes/dia_pasajero.php">Pasajero x Día</a></li>
                                            <li><a href="http://www.transportesejecutivos.com/admin/informes/dia_ciudad.php?r=Bogota&amp;r2=Cali&amp;r3=Barranquilla&amp;fecha_s=00/15/2014&amp;informe=4">Ciudad x Día</a></li>
                                            <li class="list-divider"></li>
											<li><a href="#">Todas las Ordenes<span class="label label-success pull-right">Próx.</span></a></li>
                                            <li><a href="http://www.transportesejecutivos.com/admin/informes/una.php">Orden Específica</a></li>
											<li class="list-divider"></li>
											<li><a href="http://www.transportesejecutivos.com/admin/informes/excel.php">Informes en Excel</a></li>
											
											
									   </ul></li>
						
									<!--Menu list item-->
									<li>
										<a href="#" data-original-title="" title="" class="">
											<i class="fa fa-list-alt"></i>
											<span class="menu-title">
												<strong>Ordenes</strong>
											</span>
											<i class="arrow"></i>
										</a>
						
										<!--Submenu-->
										
									<ul class="collapse pop-in">
											<li><a href="http://www.transportesejecutivos.com/admin/ordenes/crear.php">Crear Nueva Orden</a></li>
											<li class="list-divider"></li>
											<li><a href="http://www.transportesejecutivos.com/admin/ordenes/ver.php">Ver Orden</a></li>
											<li><a href="http://www.transportesejecutivos.com/admin/ordenes/editar.php">Editar Orden</a></li>
                                            
                                            <li class="list-divider"></li>
											<li><a href="http://www.transportesejecutivos.com/admin/informes/">Reportes e Informes</a></li>
											
											
										</ul></li>
						
									<!--Menu list item
									<li>
										<a href="">
											<i class="fa fa-road"></i>
											<span class="menu-title">
												FUEC
                                                <span class="label label-primary pull-right">Nuevo</span>
												
											</span>
										</a>
									</li>-->
									<li class="">
										<a href="#" data-original-title="" title="">
											<i class="fa fa-road"></i>
											<span class="menu-title">
												FUEC
                                               <i class="arrow"></i>
												
											</span>
										</a>
										
										
									<ul class="collapse">
											<li><a href="http://www.transportesejecutivos.com/admin/fuec/crear_manual.php">Crear FUEC</a></li>
											<li><a href="http://www.transportesejecutivos.com/admin/fuec/ver.php">Mantener Rutas</a></li>
											<li><a href="http://www.transportesejecutivos.com/admin/fuec/verCiudades.php">Ciudades</a></li>
										</ul></li>
									
									<li> <a href="http://www.transportesejecutivos.com/admin/fuec/contrato_manual.php" data-original-title="" title=""> <i class="fa fa-road"></i> <span class="menu-title"> Crear Contrato  </span> </a> </li>
						
									<li class="list-divider"></li>
						
									<!--Category name-->
									<li class="list-header">Administración</li>
						
									<!--Menu list item-->
									<li>
										<a href="#" data-original-title="" title="">
											<i class="fa fa-child"></i>
											<span class="menu-title">Pasajeros</span>
											<i class="arrow"></i>
										</a>
						
										<!--Submenu-->
										
									<ul class="collapse">
											<li><a href="http://www.transportesejecutivos.com/admin/pasajeros/crear.php">Crear Nuevo Pasajero</a></li>
                                            <li class="list-divider"></li>
                                            <li><a href="http://www.transportesejecutivos.com/admin/pasajeros/ver.php">Ver / editar Pasajero</a></li>
<!--                                            <li><a href="http://www.transportesejecutivos.com/admin/pasajeros/editar.php">Editar Pasajero</a></li> -->
											
										</ul></li>
						
									<!--Menu list item-->
									<li>
										<a href="#" data-original-title="" title="">
											<i class="fa fa-user-md"></i>
											<span class="menu-title">Conductores</span>
											<i class="arrow"></i>
										</a>
						
										<!--Submenu-->
										
									<ul class="collapse">
											<li><a href="http://www.transportesejecutivos.com/admin/conductores/crear.php">Crear Nuevo Conductor</a></li>
                                            <li class="list-divider"></li>
                                            <li><a href="http://www.transportesejecutivos.com/admin/conductores/ver.php">Ver /editar Conductor</a></li>
											
										</ul></li>
						
									<!--Menu list item-->
									<li>
										<a href="#" data-original-title="" title="">
											<i class="fa fa-car"></i>
											<span class="menu-title">Vehículos</span>
											<i class="arrow"></i>
										</a>
						
										<!--Submenu-->
										
									<ul class="collapse">
										  <li><a href="http://www.transportesejecutivos.com/admin/vehiculos/crear.php">Crear Nuevo Vehículo</a></li>
                                          <li class="list-divider"></li>
                                          <li><a href="http://www.transportesejecutivos.com/admin/vehiculos/ver.php">Ver / editar vehículo</a></li>
                                        <!--  <li><a href="http://www.transportesejecutivos.com/admin/vehiculos/editar.php">Editar Vehículo</a></li>-->
                                          <li class="list-divider"></li>
                                          <li><a href="http://www.transportesejecutivos.com/admin/vehiculos/vencimiento_excell.php">Vencimiento Excel</a></li>
											
										</ul></li>
                                    
                                    <!--Menu list item-->
									<li>
										<a href="#" data-original-title="" title="">
											<i class="fa fa-university"></i>
											<span class="menu-title">Empresas</span>
											<i class="arrow"></i>
										</a>
						
										<!--Submenu-->
										
									<ul class="collapse">
										  <li><a href="http://www.transportesejecutivos.com/admin/empresas/crear.php">Crear Nueva Empresa</a></li>
                                          <li class="list-divider"></li>
                                          <li><a href="http://www.transportesejecutivos.com/admin/empresas/ver.php">Ver / editar Empresa</a></li>
                                          <li class="list-divider"></li>
                                          <li><a href="http://www.transportesejecutivos.com/admin/vehiculos/vencimiento_excell.php">Vencimiento Excel</a></li>
											
										</ul></li>
									
									<!--Menu list item-->
									<li>
										<a href="#" data-original-title="" title="">
											<i class="fa fa-bus"></i>
											<span class="menu-title">Tipo de Vehiculo</span>
											<i class="arrow"></i>
										</a>
						
										<!--Submenu-->
										
									<ul class="collapse">
										  <li><a href="http://www.transportesejecutivos.com/admin/tipovehiculos/crear.php">Crear Nueva tipo de vehiculo</a></li>
                                          <li class="list-divider"></li>
                                          <li><a href="http://www.transportesejecutivos.com/admin/tipovehiculos/ver.php">Ver / editar tipo de vehiculo</a></li>
											
										</ul></li>
                                    <li class="list-divider"></li>
						
									<!--Menu list item-->
									
									<li> <a href="#" data-original-title="" title=""> <i class="fa fa-user"></i> <span class="menu-title">Usuarios</span> <i class="arrow"></i> </a>
                                      <!--Submenu-->
                                      
									<ul class="collapse">
                                        <li><a href="http://www.transportesejecutivos.com/admin/usuarios/crear.php">Crear Nuevo Usuario</a></li>
                                        <li class="list-divider"></li>
                                        <li><a href="http://www.transportesejecutivos.com/admin/usuarios/ver.php">Ver / editar Usuario</a></li>
                                      </ul></li>
						
									<!--Category name-->
									<li class="list-header">Comercial</li>
						
									
									<li>
										<a href="http://www.transportesejecutivos.com/admin/solicitudes/" data-original-title="" title="">
											<i class="fa fa-hand-o-up"></i>
											<span class="menu-title">Solicitudes<span class="pull-right badge badge-warning">189</span></span>
                                            
											
										</a>
						
										
									</li>
						
									<!--Menu list item-->
									<li>
										<a href="#" data-original-title="" title="">
											<i class="fa fa-usd"></i>
											<span class="menu-title">Cotizaciones</span>
											<i class="arrow"></i>
										</a>
						
										<!--Submenu-->
										
									<ul class="collapse">
										  <li><a href="http://www.transportesejecutivos.com/admin/cotizaciones/crear.php">Crear Nueva Cotización</a></li>
                                          <li class="list-divider"></li>
                                          <li><a href="http://www.transportesejecutivos.com/admin/cotizaciones/ver.php">Ver / editar Cotización</a></li>
                                          <li class="list-divider"></li>
                                          <li><a href="http://www.transportesejecutivos.com/admin/cotizaciones/precios/ver.php">Administrar Precios</a></li>
                                          <li><a href="http://www.transportesejecutivos.com/admin/cotizaciones/precios/crear.php">Crear precios</a></li>
                                          
											
										</ul></li>

									<!--Menu list item
									<li>
										<a href="#">
											<i class="fa fa-plus-square"></i>
											<span class="menu-title">Menu Level</span>
											<i class="arrow"></i>
										</a>

										<!--Submenu--
										<ul class="collapse">
											<li><a href="#">Second Level Item</a></li>
											<li><a href="#">Second Level Item</a></li>
											<li><a href="#">Second Level Item</a></li>
											<li class="list-divider"></li>
											<li>
												<a href="#">Third Level<i class="arrow"></i></a>

												<!--Submenu--
												<ul class="collapse">
													<li><a href="#">Third Level Item</a></li>
													<li><a href="#">Third Level Item</a></li>
													<li><a href="#">Third Level Item</a></li>
													<li><a href="#">Third Level Item</a></li>
												</ul>
											</li>
											<li>
												<a href="#">Third Level<i class="arrow"></i></a>

												<!--Submenu--
												<ul class="collapse">
													<li><a href="#">Third Level Item</a></li>
													<li><a href="#">Third Level Item</a></li>
													<li><a href="#">Third Level Item</a></li>
													<li class="list-divider"></li>
													<li><a href="#">Third Level Item</a></li>
													<li><a href="#">Third Level Item</a></li>
												</ul>
											</li>
										</ul>
									</li><!--fin menu multilevel-->

								</ul>


								<!--Widget-->
								<!--================================-->
								<div class="mainnav-widget">

									<!-- Show the button on collapsed navigation -->
									<div class="show-small">
										<a href="#" data-toggle="menu-widget" data-target="#demo-wg-server" data-original-title="" title="">
											<i class="fa fa-desktop"></i>
										</a>
									</div>

									<!-- Hide the content on collapsed navigation -->
									
								<div id="demo-wg-server" class="hide-small mainnav-widget-content">
										<ul class="list-group"><!--
											<li class="list-header pad-no pad-ver">Server Status</li>
											<li class="mar-btm">
												<span class="label label-primary pull-right">15%</span>
												<p>CPU Usage</p>
												<div class="progress progress-sm">
													<div class="progress-bar progress-bar-primary" style="width: 15%;">
														<span class="sr-only">15%</span>
													</div>
												</div>
											</li>
											<li class="mar-btm">
												<span class="label label-purple pull-right">75%</span>
												<p>Bandwidth</p>
												<div class="progress progress-sm">
													<div class="progress-bar progress-bar-purple" style="width: 75%;">
														<span class="sr-only">75%</span>
													</div>
												</div>
											</li><!--================================-->
											<li class="pad-ver"><a href="http://www.transportesejecutivos.com/admin/logout.php" class="btn btn-warning btn-bock">Salir del Sistema</a></li>
										</ul>
									</div></div>
								
								<!--End widget-->

							</div>
						<div class="nano-pane" style="display: none;"><div class="nano-slider" style="height: 20px; transform: translate(0px, 0px);"></div></div></div>
					</div>
					<!--================================-->
					<!--End menu-->

				</div>
			</nav>			<!--===================================================-->
			<!--END MAIN NAVIGATION-->
			
			<!--ASIDE-->
			<!--===================================================-->
			
			<!--===================================================-->
			<!--END ASIDE-->

		</div>

		

		<!-- FOOTER -->
		<!--===================================================-->
		<footer id="footer">

			<!-- Visible when footer positions are fixed -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<div class="show-fixed pull-right">
				<ul class="footer-list list-inline">
					<li>
						<p class="text-sm">Ordenes Confirmadas  Hoy </p>
						<div class="progress progress-sm progress-light-base">
							<div style="width: 80%" class="progress-bar progress-bar-danger"></div>
						</div>
					</li>

					<li>
						<p class="text-sm">Ordenes Condirmadas  Mañana</p>
						<div class="progress progress-sm progress-light-base">
							<div style="width: 40%" class="progress-bar progress-bar-primary"></div>
						</div>
					</li>
					<li>
						<a href="http://www.transportesejecutivos.com/admin/logout.php">
						<button class="btn btn-sm btn-dark btn-active-success">Salir</button></a>	
									</li>
				</ul>
			</div>



			<!-- Visible when footer positions are static -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			



			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

			<p class="pad-lft">© 2015 Transportes Ejecutivos. Módulo de Administración Versión 4.1. Powered by <a href="http://zonaenlinea.com">zonaenlinea.com</a></p>



		</footer>
    
    <!--jQuery [ REQUIRED ]-->
    <?php echo $this->tag->javascriptInclude('vendors/nifty-template/template/js/jquery-2.1.1.min.js'); ?>
    <!--BootstrapJS [ RECOMMENDED ]-->
    <?php echo $this->tag->javascriptInclude('vendors/nifty-template/template/js/bootstrap.min.js'); ?>
    <!--Fast Click [ OPTIONAL ]-->
    <?php echo $this->tag->javascriptInclude('vendors/nifty-template/template/plugins/fast-click/fastclick.min.js'); ?>	
    <!--Nifty Admin [ RECOMMENDED ]-->
    <?php echo $this->tag->javascriptInclude('vendors/nifty-template/template/js/nifty.min.js'); ?>
    <!--Morris.js [ OPTIONAL ]-->
    <?php echo $this->tag->javascriptInclude('vendors/nifty-template/template/plugins/morris-js/morris.min.js'); ?>
    <?php echo $this->tag->javascriptInclude('vendors/nifty-template/template/plugins/morris-js/raphael-js/raphael.min.js'); ?>
    <!--Sparkline [ OPTIONAL ]-->
    <?php echo $this->tag->javascriptInclude('vendors/nifty-template/template/plugins/sparkline/jquery.sparkline.min.js'); ?>
    <!--Skycons [ OPTIONAL ]-->
    <?php echo $this->tag->javascriptInclude('vendors/nifty-template/template/plugins/skycons/skycons.min.js'); ?>
    <!--Switchery [ OPTIONAL ]-->
    <?php echo $this->tag->javascriptInclude('vendors/nifty-template/template/plugins/switchery/switchery.min.js'); ?>
    <!--Bootstrap Select [ OPTIONAL ]-->
    <?php echo $this->tag->javascriptInclude('vendors/nifty-template/template/plugins/bootstrap-select/bootstrap-select.min.js'); ?>
    <!--Demo script [ DEMONSTRATION ]-->
    <?php echo $this->tag->javascriptInclude('vendors/nifty-template/template/js/demo/nifty-demo.min.js'); ?>
    <!--Specify page [ SAMPLE ]-->
    <?php echo $this->tag->javascriptInclude('vendors/nifty-template/template/js/demo/dashboard.js'); ?>
    
    <!-- JS added with volt -->
    ";s:2:"js";N;i:3;s:19:"
  </body>
</html>
";}