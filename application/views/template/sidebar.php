<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                 <?php $id = $this->session->userdata('id');?>
                <?php if (!empty($id)):?>
                <!--<img src="<?php echo base_url('assets'); ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image" />-->
                 <?php endif;?>
            </div>
            <div class="pull-left info">
                <?php $id = $this->session->userdata('id');?>
              <?php if (!empty($id)):?>
                <p><?php echo $this->session->userdata('nombre');?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                <?php else:?>
                <p>Sin conexión</p>
                <a href="#"><i class="fa fa-circle text-danger"></i> Offline</a>
                <?php endif;?>
            </div>
        </div>
        <!-- search form -->
        <form action="<?php echo base_url("index.php/home_controller/search");?>" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" <?php if(isset($busqueda_string))echo "value='$busqueda_string'";?> class="form-control" placeholder="Buscar..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENÚ</li>
            <li >
                <a href="<?php echo base_url('index.php/servicio_controller');?>">
                    <i class="fa fa-circle-o"></i> <span>Ver Servicios</span> 
                </a>
                 
            </li>
            <?php $id = $this->session->userdata('id');?>
              <?php if (!empty($id)):?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Gestionar equipos</span>  <i class="fa fa-angle-left pull-right"></i>
                </a>
                 <ul class="treeview-menu">
                    <li class=""><a href="<?php echo base_url('index.php/equipo_controller/crear') ?>"><i class="fa fa-circle-o"></i> Nuevo equipo</a></li>
                    <li class=""><a href="<?php echo base_url('index.php/home_controller/listar_equipos_del_usuario') ?>"><i class="fa fa-circle-o"></i> Mis equipos</a></li>
                    
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Gestionar servicios</span>  <i class="fa fa-angle-left pull-right"></i>
                </a>
                 <ul class="treeview-menu">
                    <li class=""><a href="<?php echo base_url('index.php/servicio_controller/crear') ?>"><i class="fa fa-circle-o"></i> Nuevo servicio</a></li>
                    <li class=""><a href="<?php echo base_url('index.php/servicio_controller/listar') ?>"><i class="fa fa-circle-o"></i> Mis servicios</a></li>
                    
                </ul>
            </li>
            <?php endif;?>
            <?php $admin = $this->session->userdata('admin');?>
              <?php if (!empty($admin)):?>
            
            <li class="treeview">
                <a href="#">
<!--                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>-->
                        <i class="fa fa-cog"></i> <span>Mantenimiento</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="<?php echo base_url('index.php/color_controller/') ?>"><i class="fa fa-circle-o"></i> Mantenimiento de Colores</a></li>
                    <li class=""><a href="<?php echo base_url('index.php/marca_controller/') ?>"><i class="fa fa-circle-o"></i> Mantenimiento de Marcas</a></li>
                    <li class=""><a href="<?php echo base_url('index.php/modelo_controller/') ?>"><i class="fa fa-circle-o"></i> Mantenimiento de Modelos</a></li>
                    <li class=""><a href="<?php echo base_url('index.php/operadora_controller/') ?>"><i class="fa fa-circle-o"></i> Mantenimiento de Operadoras</a></li>
                    <!--<li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>-->
                </ul>
            </li>
            <?php endif;?>
            <?php $id = $this->session->userdata('id');?>
            <?php if (!empty($id)):?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Reportes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (!empty($admin)):?>
                        <li><a href="<?php echo base_url('index.php/venta_controller/vista_reporte') ?>"><i class="fa fa-circle-o"></i> Reporte de ventas generales</a></li>
                        <li><a href="<?php echo base_url('index.php/visitas_controller') ?>"><i class="fa fa-circle-o"></i> Reporte de visitas</a></li>
                        <?php else: ?>
                        <li><a href="<?php echo base_url('index.php/venta_controller/vista_reporte') ?>"><i class="fa fa-circle-o"></i> Reporte de ventas</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
<!--            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Layout Options</span>
                    <span class="label label-primary pull-right">4</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                    <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                    <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                    <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                </ul>
            </li>
            <li>
                <a href="pages/widgets.html">
                    <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">new</small>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Charts</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                    <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>UI Elements</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                    <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                    <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                    <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                    <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                    <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Forms</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                    <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                    <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Tables</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                    <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                </ul>
            </li>
            <li>
                <a href="pages/calendar.html">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <small class="label pull-right bg-red">3</small>
                </a>
            </li>
            <li>
                <a href="pages/mailbox/mailbox.html">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <small class="label pull-right bg-yellow">12</small>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Examples</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                    <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                    <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                    <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                    <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                    <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                    <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Multilevel</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
            </li>-->
<!--            <li><a href="documentation/index.html"><i class="fa fa-book"></i> Documentation</a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-danger"></i> Important</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-warning"></i> Warning</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li>-->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>


