<?php $this->load->view('template/header'); ?>


<!-- Seccion dinamica -->
<section class="content-header">
    <h1>
        Modificar servicio
        <small>Actualización</small>
    </h1>


</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Servicio</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                <form role="form" method="post" action="<?php echo base_url('index.php/servicio_controller/request/'.$servicio->servicio_id); ?>">
                    <input type="hidden" name="usuario_id" value="<?php echo $this->session->userdata('id'); ?>">
                    <div class="box-body">
                        <?php echo validation_errors(); ?>
                        <?php $msj= $this->session->flashdata('mensaje');?> 
                        <?php if (isset($msj) and !empty($msj)):?>
                        <div class="alert alert-success alert-dismissable">
                            <i class="fa fa-check-circle"></i>
                            <?php echo $msj;?>
                        </div>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="descripcion">Descripción del servicio</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Escriba la descripción del servicio que ud. presta"><?php echo htmlentities($servicio->descripcion_serv);?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="text" class="form-control" name="precio" id="precio" value="<?php echo htmlentities($servicio->precio);?>" placeholder="Introduzca precio del servicio">
                           
                        </div>
                        
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a class="btn btn-info" href="<?php echo base_url('index.php/servicio_controller/')?>">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('template/footer'); ?>