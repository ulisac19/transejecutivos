<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=1">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <link rel="icon" type="image/x-icon" href="{{url('')}}public/images/favicons/favicon.ico">
    <title>Transportes Ejecutivos</title>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    {{ stylesheet_link('/public/vendors/nifty-template/template/css/bootstrap.min.css') }}
    <!--Nifty Stylesheet [ REQUIRED ]-->
    {{ stylesheet_link('/public/vendors/nifty-template/template/css/nifty.min.css') }}
    <!--Font Awesome [ OPTIONAL ]-->
    {{ stylesheet_link('/public/vendors/nifty-template/template/plugins/font-awesome/css/font-awesome.min.css') }}
    
    <!--SCRIPT-->
    <!--=================================================-->

    <!--Page Load Progress Bar [ OPTIONAL ]-->
    {{ stylesheet_link('/public/vendors/nifty-template/template/plugins/pace/pace.min.css') }}
    {{ javascript_include('/public/vendors/nifty-template/template/plugins/pace/pace.min.js') }}

    <!-- Custom CSS -->
    {{ stylesheet_link('css/adjustments.css') }}

    <!-- CSS added with volt-->
  {% block css %}{% endblock %}
</head>
<body class=" nifty-ready pace-done" cz-shortcut-listen="true">
  <div id="container" class="effect mainnav-sm">
    <header id="navbar">
      <div id="navbar-container" class="boxed">
        <!--Brand logo & name-->
        <!--================================-->
        <div class="navbar-header">
          <a href="{{url('')}}" class="navbar-brand">
            <img src="{{url('')}}public/images/logos/logo.png" alt="Nifty Logo" class="brand-icon">
            <div class="brand-title">
              <span class="brand-text">Menú Principal</span>
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
                      <p><a href="#" class="btn btn-success">Ver todos los informes</a></p>
                    </div>
                  </div>

                  <div class="col-sm-4 col-md-3">
                    <!--Mega menu list-->
                    <ul class="list-unstyled">
                      <li class="dropdown-header">Órdenes</li>
                      <li><a href="#"><span class="pull-right badge badge-success">189</span>de Hoy</a></li>
                      <li><a href="#"><span class="pull-right badge badge-success">29</span>de Mañana</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Conductor x Día</a></li>
                      <li><a href="#">Pasajero x Día</a></li>
                      <li><a href="#">Ciudad x Día</a></li>
                      <li><a href="#">Empresa x Día</a></li>
                    </ul>
                  </div>

                  <div class="col-sm-4 col-md-3">
                    <!--Mega menu list-->
                    <ul class="list-unstyled">
                      <li class="dropdown-header">en Excell</li>
                      <li><a href="#">Hoy</a></li>
                      <li><a href="#">Mañana</a></li>
                      <li><a href="#">Todas </a></li>
                      <li class="divider"></li>
                      <li><a href="#">Todos los Informes de Excell</a></li>
                      <li class="divider"></li>
                    </ul>
                  </div>
                </div>

                <div class="col-sm-4 col-md-3">
                  <!--Mega menu list-->
                  <ul class="list-unstyled">
                    <li>
                      <form action="#" method="get" class="form" role="form">
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
                      <form action="#" method="GET" class="form" role="form">
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
                      <form action="#" method="get" class="form" role="form">
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
            </li>
          </ul>

          <ul class="nav navbar-top-links pull-right">
            <!--User dropdown-->
            <li id="dropdown-user" class="dropdown">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                <span class="pull-right">
                  <img class="img-circle img-user media-object" src="{{url('')}}public/images/logos/av1.png" alt="Profile Picture">
                </span>
                <div class="username hidden-xs"><strong>William Montiel</strong></div>
              </a>
              <div class="dropdown-menu dropdown-menu-md dropdown-menu-right with-arrow panel-default">
                <!-- User dropdown menu -->
                <ul class="head-list">
                  <li>
                    <a><i class="fa fa-user fa-fw fa-lg"></i> willmontiel</a>
                  </li>

                  <li>
                    <a><i class="fa fa-lock fa-fw fa-lg"></i> Role: superadministrador </a>
                  </li>
                  <li>
                    <a href="#">
                      <span class="label label-success pull-right">Próximamente</span>
                      <i class="fa fa-gear fa-fw fa-lg"></i> Mi Cuenta
                    </a>
                  </li>
                </ul>

                <!-- Dropdown footer -->
                <div class="pad-all text-right">
                  <a href="#" class="btn btn-primary">
                    <i class="fa fa-sign-out fa-fw"></i> Salir
                  </a>
                </div>
              </div>
            </li>
        </div>
      </div>
    </header>
    <!--===================================================-->
    <!--END NAVBAR-->
    <div class="boxed">
      <!--MAIN NAVIGATION-->
      <!--===================================================-->
      <nav id="mainnav-container">
        <div id="mainnav">
          <!--Menu-->
          <!--================================-->
          <div id="mainnav-menu-wrap">
            <div class="nano has-scrollbar">
              <div class="nano-content">
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
                      <li><a href="#">Ordenes de Hoy<span class="pull-right badge badge-warning">189</span></a></li>
                      <li><a href="#">Ordenes de Mañana<span class="pull-right badge badge-warning">29</span></a></li>
                      <li><a href="#">Ordenes de un Mes</a></li>
                      <li class="list-divider"></li>
                      <li><a href="#">Ordenes de un Conductor</a></li>
                      <li><a href="#">Ordenes de un Pasajero</a></li>
                      <li><a href="#">Ordenes de una Empresa</a></li>
                      <li><a href="#">Ordenes de un Ciudad</a></li>
                      <li class="list-divider"></li>
                      <li><a href="#"> Conductor x Día</a></li>
                      <li><a href="#">Pasajero x Día</a></li>
                      <li><a href="#">Ciudad x Día</a></li>
                      <li class="list-divider"></li>
                      <li><a href="#">Todas las Ordenes<span class="label label-success pull-right">Próx.</span></a></li>
                      <li><a href="#">Orden Específica</a></li>
                      <li class="list-divider"></li>
                      <li><a href="#">Informes en Excel</a></li>
                    </ul>
                  </li>

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
                      <li><a href="#">Crear Nueva Orden</a></li>
                      <li class="list-divider"></li>
                      <li><a href="#">Ver Orden</a></li>
                      <li><a href="#">Editar Orden</a></li>
                      <li class="list-divider"></li>
                      <li><a href="#">Reportes e Informes</a></li>
                    </ul>
                  </li>

                  <li class="">
                    <a href="#" data-original-title="" title="">
                      <i class="fa fa-road"></i>
                      <span class="menu-title">
                        FUEC
                        <i class="arrow"></i>
                      </span>
                    </a>

                    <ul class="collapse">
                      <li><a href="#">Crear FUEC</a></li>
                      <li><a href="#">Mantener Rutas</a></li>
                      <li><a href="#">Ciudades</a></li>
                    </ul>
                  </li>

                  <li> 
                    <a href="#" data-original-title="" title=""> 
                      <i class="fa fa-road"></i> <span class="menu-title">Crear Contrato</span>
                    </a>
                  </li>
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
                      <li><a href="#">Crear Nuevo Pasajero</a></li>
                      <li class="list-divider"></li>
                      <li><a href="#">Ver / editar Pasajero</a></li>
                    </ul>
                  </li>

                  <!--Menu list item-->
                  <li>
                    <a href="#" data-original-title="" title="">
                      <i class="fa fa-user-md"></i>
                      <span class="menu-title">Conductores</span>
                      <i class="arrow"></i>
                    </a>

                    <!--Submenu-->
                    <ul class="collapse">
                      <li><a href="#">Crear Nuevo Conductor</a></li>
                      <li class="list-divider"></li>
                      <li><a href="#">Ver /editar Conductor</a></li>
                    </ul>
                  </li>

                  <!--Menu list item-->
                  <li>
                    <a href="#" data-original-title="" title="">
                      <i class="fa fa-car"></i>
                      <span class="menu-title">Vehículos</span>
                      <i class="arrow"></i>
                    </a>
                    <!--Submenu-->
                    <ul class="collapse">
                      <li><a href="#">Crear Nuevo Vehículo</a></li>
                      <li class="list-divider"></li>
                      <li><a href="#">Ver / editar vehículo</a></li>
                      <li class="list-divider"></li>
                      <li><a href="#">Vencimiento Excel</a></li>
                    </ul>
                  </li>

                  <!--Menu list item-->
                  <li>
                    <a href="#" data-original-title="" title="">
                      <i class="fa fa-university"></i>
                      <span class="menu-title">Empresas</span>
                      <i class="arrow"></i>
                    </a>

                    <!--Submenu-->
                    <ul class="collapse">
                      <li><a href="#">Crear Nueva Empresa</a></li>
                      <li class="list-divider"></li>
                      <li><a href="#">Ver / editar Empresa</a></li>
                      <li class="list-divider"></li>
                      <li><a href="#">Vencimiento Excel</a></li>
                    </ul>
                  </li>

                  <!--Menu list item-->
                  <li>
                    <a href="#" data-original-title="" title="">
                      <i class="fa fa-bus"></i>
                      <span class="menu-title">Tipo de Vehiculo</span>
                      <i class="arrow"></i>
                    </a>

                    <!--Submenu-->
                    <ul class="collapse">
                      <li><a href="#">Crear Nueva tipo de vehiculo</a></li>
                      <li class="list-divider"></li>
                      <li><a href="#">Ver / editar tipo de vehiculo</a></li>
                    </ul>
                  </li>
                  <li class="list-divider"></li>

                  <!--Menu list item-->
                  <li>
                    <a href="#" data-original-title="" title="">
                      <i class="fa fa-user"></i> <span class="menu-title">Usuarios</span> <i class="arrow"></i>
                    </a>
                    <!--Submenu-->
                    <ul class="collapse">
                      <li><a href="#">Crear Nuevo Usuario</a></li>
                      <li class="list-divider"></li>
                      <li><a href="#">Ver / editar Usuario</a></li>
                    </ul>
                  </li>

                  <!--Category name-->
                  <li class="list-header">Comercial</li>
                  <li>
                    <a href="#" data-original-title="" title="">
                      <i class="fa fa-hand-o-up"></i>
                      <span class="menu-title">
                        Solicitudes<span class="pull-right badge badge-warning">189</span>
                      </span>
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
                      <li><a href="#">Crear Nueva Cotización</a></li>
                      <li class="list-divider"></li>
                      <li><a href="#">Ver / editar Cotización</a></li>
                      <li class="list-divider"></li>
                      <li><a href="#">Administrar Precios</a></li>
                      <li><a href="#">Crear precios</a></li>
                    </ul>
                  </li>
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
                    <ul class="list-group">
                      <li class="pad-ver">
                        <a href="#" class="btn btn-warning btn-bock">Salir del Sistema</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="nano-pane"><div class="nano-slider"></div></div>
            </div>
          </div>
        </div>
      </nav>
      
      <div id="content-container">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              {% block content %}
              
              {% endblock %}
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- FOOTER -->
    <!--===================================================-->
    <footer id="footer">
      <!-- Visible when footer positions are fixed -->
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
            <a href="#">
              <button class="btn btn-sm btn-dark btn-active-success">Salir</button></a>	
          </li>
        </ul>
      </div>
      <p class="pad-lft">© 2015 Transportes Ejecutivos. Módulo de Administración Versión 5.0</p>
    </footer>
  </div>

  <!--jQuery [ REQUIRED ]-->
  {{ javascript_include('/public/vendors/nifty-template/template/js/jquery-2.1.1.min.js') }}
  <!--BootstrapJS [ RECOMMENDED ]-->
  {{ javascript_include('/public/vendors/nifty-template/template/js/bootstrap.min.js') }}
  <!--Nifty Admin [ RECOMMENDED ]-->
  {{ javascript_include('/public/vendors/nifty-template/template/js/nifty.min.js') }}
 
  <!-- JS added with volt -->
  {% block js %}{% endblock %}
  </body>
</html>
