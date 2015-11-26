<?php $this->load->view('template/header'); ?>


<!-- Seccion dinamica -->
<section class="content-header">
    <h1>
        Cantidad de Visitas
        <small><?php echo $titulo; ?></small>
    </h1>
    
    
</section>

<section class="content">
    <h2 class="label-primary"><?php echo "El numero de visitas que ha recibido el site es: ". $nro_visitas;?></h2>
</section>


<?php $this->load->view('template/footer'); ?>
