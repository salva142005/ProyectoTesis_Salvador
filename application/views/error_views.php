<?php $this->load->view('template/header'); ?>


<!-- Seccion dinamica -->
<section class="content-header">
    <h1>
        Error
        <small><?php echo $titulo; ?></small>
    </h1>
    
    
</section>

<section class="content">
    <div class="row"> 
        <div class="col-md-2">
            <a class="btn btn-block btn-primary" href="<?php echo base_url('index.php/'.$actionRedirect);?>">Volver</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Error de aplicaci&oacute;n</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="alert alert-danger">
                        <?php echo $mensaje;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('template/footer'); ?>
