<?php $this->load->view('template/header'); ?>


<!-- Seccion dinamica -->
<section class="content-header">
    <h1>
        Colores
        <small><?php echo $titulo; ?></small>
    </h1>
    
    
</section>

<section class="content">
    <div class="row"> 
        <div class="col-md-2">
            <a class="btn btn-block btn-primary" href="<?php echo base_url('index.php/color_controller/crear');?>">Añadir nuevo color +</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Colores</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Color</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($colores as $color): ?>
                                <tr>
                                    <td><?php echo htmlentities($color->nombre); ?></td>
                                    <td>
                                        <a href="<?php echo base_url('index.php/color_controller/editar/' . $color->id); ?>">Editar</a> |
                                        <a href="<?php echo base_url('index.php/color_controller/eliminar/' . $color->id); ?>">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('template/footer'); ?>
