<?php $this->load->view('template/header'); ?>


<!-- Seccion dinamica -->
<section class="content-header">
    <h1>
        Equipos
        <small>Inicio</small>
    </h1>


</section>

<section class="content">
    <?php 
    $new_row = TRUE;
    $column = 0;
    $max_columns = 3; 
    ?>
<?php foreach ($equipos as $e): ?>
    
    <?php if ($new_row) {echo "<div class='row'>";$new_row = FALSE;}  ?>
    
        <div class="col-md-<?php echo $max_columns;?>">
            <?php if ($e->cantidad == 0):?>
            <div class="box box-solid box-danger">
            <?php else:?>
            <div class="box box-solid box-success">
            <?php endif;?>
                <div class="box-header">
                    <h3 class="box-title"><?php echo htmlentities($e->descripcion_equipo) ?></h3> 
                     <?php if ($e->cantidad == 0):?>
                        <span>(Agotado)</span>
                    <?php endif;?>
                </div>
                <div class="box-body">
                    <span class="image">
                        <img style="  max-width: 150px;max-height: 150px;"class="img-thumbnail" src="<?php echo $e->imagen; ?>" />
                    </span>
                    <ul>
                        <li>Precio: <span> <?php echo number_format($e->precio_equipo, 2, ',', '.'); ?> </span></li>
                        <li>Publicado por: <span> <?php echo htmlentities($e->nombre_usuario);?> </span></li>
                        <li> <span <?php if ($e->cantidad == 0) echo "style='color:red;'";?>> Cantidad: <?php echo $e->cantidad; ?> </span></li>
                    </ul>
                   <div class="box-tools" >
                        <a href="#" class="btn btn-warning">Ver detalles</a>
                        <?php if ($e->usuario_id == $this->session->userdata('id')) :?>
                        <a href="#" class="btn btn-success">Editar producto</a>
                        <?php endif;?>
                    </div>
                </div><!-- /.box-body -->
            </div>
        </div>
       <?php if ($column > $max_columns) $new_row = true; ?>
       <?php if ($new_row) echo "</div>"; $column++; ?>
        
    
  
<?php endforeach; ?>
</section>

<?php $this->load->view('template/footer'); ?>