<?php $this->load->view('template/header'); ?>


<!-- Seccion dinamica -->
<section class="content-header">
    <h1>
        Nueva marca
        <small>Marca</small>
    </h1>


</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Marca</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?php echo base_url('index.php/marca_controller/request'); ?>">
                    
                    <div class="box-body">
                        <?php echo validation_errors(); ?>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo set_value('nombre'); ?>" placeholder="Introduzca el nombre de la marca">
                        </div>
                        
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('template/footer'); ?>