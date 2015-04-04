<?php $this->load->view('template/header_login'); ?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Tu celular Login</b></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Indique los datos a continuación</p>
        <form action="<?php echo base_url('index.php/login_controller/guardar_usuario'); ?>" method="post">
            <?php echo validation_errors(); ?>
            <div class="form-group ">
                <input type="text" name="nombre" class="form-control" maxlength="150" placeholder="Nombre y Apellido"/>
            </div>
            <div class="form-group ">
                <input type="email" name="email" class="form-control" placeholder="Correo"/>
            </div>
            <div class="form-group ">
                <input type="text" name="telefono" class="form-control" placeholder="Teléfono"/>
            </div>
            <div class="form-group ">
                <input type="password" name="clave" class="form-control" placeholder="Clave"/>
            </div>
            <div class="row">
                <div class="col-xs-8">    

                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>
                </div><!-- /.col -->
            </div>
        </form>
        <a href="<?php echo base_url('index.php/login_controller'); ?>">Volver</a><br>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<?php $this->load->view('template/footer_login'); ?>

