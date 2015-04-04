<?php $this->load->view('template/header_login');?>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Tu celular Login</b></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Registrese para iniciar sesión</p>
        <form action="#" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Clave"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">    

                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                </div><!-- /.col -->
            </div>
        </form>



        <a href="#">Olvidé mi clave</a><br>
        <a href="<?php echo base_url('index.php/login_controller/registrar_usuario'); ?>" class="text-center">Registrar nuevo usuario</a>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<?php $this->load->view('template/footer_login');?>
