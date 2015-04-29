<?php $this->load->view('template/header'); ?>


<!-- Seccion dinamica -->
<section class="content-header">
    <h1>
        Servicios
        <small>Listado de servicios</small>
    </h1>
    
    
</section>

<section class="content">
    <div class="row"> 
        <div class="col-md-2">
            <?php $id = $this->session->userdata('id');?>
             <?php if (!empty($id)):?>
            <a class="btn btn-block btn-primary" href="<?php echo base_url('index.php/servicio_controller/crear');?>">Añadir nuevo servicio +</a>
             <?php endif;?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Servicios</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($servicios as $s): ?>
                                <tr>
                                    <td><?php echo htmlentities($s->nombre_usuario); ?></td>
                                    <td><?php echo htmlentities($s->descripcion_serv); ?></td>
                                    
                                    <td>
                                        <a class="btn btn-info" href="<?php echo base_url('index.php/servicio_controller/ver_detalle/' . $s->servicio_id); ?>">Ver mas detalles</a>
                                        <?php $usuario_actual = $this->session->userdata('id'); ?>
                                        <?php if ($s->usuario_id==$usuario_actual): ?>
                                             
                                            <a class="btn btn-warning" href="<?php echo base_url('index.php/servicio_controller/modificar/' . $s->servicio_id); ?>">Modificar</a>
                                            <a class="btn btn-danger" href="<?php echo base_url('index.php/servicio_controller/eliminar/' . $s->servicio_id); ?>">Eliminar</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('template/footer'); ?>
