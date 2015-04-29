<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Tu celular</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url('assets/css');?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="<?php echo base_url('assets/css');?>/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url('assets/css');?>/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url('assets');?>/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?php echo base_url('assets');?>/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?php echo base_url('assets');?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="<?php echo base_url('assets');?>/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?php echo base_url('assets');?>/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="<?php echo base_url('assets');?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css');?>/styles.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
      <span style="display: none" id="base_url"><?php echo base_url(); ?></span>
    <div class="wrapper">
        <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url("index.php/home_controller")?>" class="logo"><b>Tu Celular</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- Notifications: style can be found in dropdown.less -->
              <?php $id = $this->session->userdata('id');?>
              <?php if (!empty($id)):?>
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-money"></i>
                  <span class="label label-warning"><?php echo $this->session->userdata('nro_ventas')?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Usted tiene <?php echo $this->session->userdata('nro_ventas');?> venta(s)</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <?php $ventas = $this->session->userdata('ventas');?>
                      <?php foreach($ventas as $v):?>
                      <li>
                        <a href="<?php echo base_url('index.php/venta_controller/ver_venta/'.$v->id);?>">
                            <i class="fa fa-dollar text-aqua"></i> <?php echo htmlentities($v->comprador.' -> '.$v->equipo);?>
                        </a>
                      </li>
                      <?php endforeach; ?>
                      
                    </ul>
                  </li>
                  <li class="footer"><a href="#">Ver todas las ventas</a></li>
                </ul>
              </li>
<!--              compras-->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-info"></i>
                  <span class="label label-info"><?php echo $this->session->userdata('nro_compras')?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Usted tiene <?php echo $this->session->userdata('nro_compras');?> Compras Exitosas</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <?php $compras = $this->session->userdata('compras');?>
                      <?php foreach($compras as $c):?>
                      <li>
                        <a href="<?php echo base_url('index.php/venta_controller/ver_compra/'.$c->id);?>">
                            <?php if ($c->estatus==VENTA_CANCELADA):?>
                            <i class="fa fa-times-circle text-red"></i> 
                             <?php echo htmlentities('Cancelada -> '.$c->equipo);?>
                             <?php else:?>   
                            <i class="fa fa-check-circle text-green"></i>
                            <?php echo htmlentities('Aprobada -> '.$c->equipo);?>
                             <?php endif;?>   
                               
                        </a>
                      </li>
                      <?php endforeach; ?>
                      
                    </ul>
                  </li>
                  <li class="footer"><a href="#">Ver todas las compras</a></li>
                </ul>
              </li>
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-info"></i>
                  <span class="label label-info"><?php echo $this->session->userdata('nro_compras_canceladas');?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Usted tiene <?php echo $this->session->userdata('nro_compras_canceladas');?> Compras Canceladas</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <?php $compras_canceladas = $this->session->userdata('compras_canceladas');?>
                      <?php foreach($compras_canceladas as $c):?>
                      <li>
                        <a href="<?php echo base_url('index.php/venta_controller/ver_compra/'.$c->id);?>">
                            <?php if ($c->estatus==VENTA_CANCELADA):?>
                            <i class="fa fa-times-circle text-red"></i> 
                             <?php echo htmlentities('Cancelada -> '.$c->equipo);?>
                             <?php else:?>   
                            <i class="fa fa-check-circle text-green"></i>
                            <?php echo htmlentities('Aprobada -> '.$c->equipo);?>
                             <?php endif;?>   
                               
                        </a>
                      </li>
                      <?php endforeach; ?>
                      
                    </ul>
                  </li>
                  <li class="footer"><a href="#">Ver todas las compras</a></li>
                </ul>
              </li>
              <?php endif;?>
              <!-- Tasks: style can be found in dropdown.less -->
              
              <!-- User Account: style can be found in dropdown.less -->
              <?php $id = $this->session->userdata('id');?>
              <?php if (!empty($id)):?>
              <li class="dropdown user user-menu">
               
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url('assets');?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo htmlentities($this->session->userdata('nombre')); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url('assets');?>/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo htmlentities($this->session->userdata('nombre')); ?> - <?php echo htmlentities($this->session->userdata('email')); ?>
                      
                    </p>
                  </li>
                  
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                        <?php $id = $this->session->userdata('id')?>
                      <a href="<?php echo base_url("index.php/usuario_controller/modificar/".$id); ?>" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                        <a href="<?php echo base_url("index.php/login_controller/out"); ?>" class="btn btn-default btn-flat">Salir</a>
                    </div>
                  </li>
                </ul>
              </li>
              <?php else:?>
              <li>
              <a class="btn btn-info" href="<?php echo base_url("index.php/login_controller"); ?>">Ingresar</a>
              </li>
              <?php endif;?>
            </ul>
          </div>
        </nav>
      </header>
        <?php $this->load->view('template/sidebar');?>
<div class="content-wrapper">