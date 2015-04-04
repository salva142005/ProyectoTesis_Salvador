<?php $this->load->view('template/header_login'); ?>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Error!</b></a>
    </div><!-- /.login-logo -->
    
    <div class="login-box-body">
        <div class = "callout callout-danger">
            <h4>Usuario no existente</h4>
            <p>
                <a href="<?php echo base_url('index.php/login_controller/registrar_usuario'); ?>">Haga click aqui para crear nuevo usuario</a>
                <br/> 
                o <a href="<?php echo base_url('index.php/login_controller'); ?>">Regresar</a>
            </p>
        </div>
    </div>
</div>
<?php $this->load->view('template/footer_login'); ?>
