<?php $this->load->view('template/header'); ?>


<!-- Seccion dinamica -->
<section class="content-header">
    <h1>
        Usuario
        <small>Datos del usuario</small>
    </h1>


</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Usuario</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?php echo base_url('index.php/usuario_controller/request/'.$usuario->id); ?>">
                    
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
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo htmlentities($usuario->nombre); ?>" placeholder="Introduzca el nombre de la marca">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo htmlentities($usuario->email); ?>" placeholder="Introduzca el nombre de la marca">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo htmlentities($usuario->telefono); ?>" placeholder="Introduzca el nombre de la marca">
                        </div>
                        <div class="form-group">
                            <label for="clave">Clave</label>
                            <input type="text" class="form-control" name="clave" id="clave" value="<?php echo htmlentities($usuario->clave); ?>" placeholder="Introduzca el nombre de la marca">
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