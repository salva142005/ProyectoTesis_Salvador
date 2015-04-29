<?php $this->load->view('template/header'); ?>


<!-- Seccion dinamica -->
<section class="content-header">
    <h1>
        <small>Servicio: </small>
        <?php echo htmlentities($servicio->descripcion_serv); ?>
    </h1>
    <a href="<?php echo base_url('index.php/servicio_controller'); ?>" class="btn btn-success"> <i class="fa fa-arrow-left"></i>Regresar</a>

</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-9">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Datos del servicio</h3>
                </div><!-- /.box-header -->
                
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2"><h4>Detalles </h4></th>
                        </tr>
                        </thead>
                        <tr>
                            <td class="text-blue">Precio </td><td> <?php echo number_format($servicio->precio, 2, ',', '.'); ?> </td>
                        </tr>

                       
                        <tr class="alert alert-warning">
                            <td >Publicado por </td><td> <?php echo htmlentities($servicio->nombre_usuario); ?> </td>
                        </tr>
                        <tr class="alert alert-warning">
                            <td >Telefono / Email </td><td> <?php echo htmlentities($servicio->telefono . ' / ' . $servicio->email); ?> </td>
                        </tr>
                    </table>
                    <br/>
                    <br/>
                    <a href="<?php echo base_url('index.php/servicio_controller/'); ?>" class="btn btn-success"> <i class="fa fa-arrow-left"></i>Regresar</a>
                    <?php $usuario_actual = $this->session->userdata('id'); ?>
                    <?php if ($servicio->usuario_id==$usuario_actual): ?>
                        <a href="<?php echo base_url("index.php/servicio_controller/modificar/" . $servicio->servicio_id) ?>" class="btn btn-info"><i class="fa fa-edit"></i>Editar Servicio</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
    </div>
</section>
<?php $this->load->view('template/footer'); ?>