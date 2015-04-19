<?php $this->load->view('template/header_login'); ?>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Usuario Creado!</b></a>
    </div><!-- /.login-logo -->
    
    <div class="login-box-body">
        <div class = "callout callout-info">
            <h4>Su usuario ha sido creado con éxito</h4>
            <p><a href="<?php echo base_url("index.php/login_controller"); ?>">Haga click aqui para ingresar</a></p>
        </div>
    </div>
</div>
<?php $this->load->view('template/footer_login'); ?>
