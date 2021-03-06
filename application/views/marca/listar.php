<?php $this->load->view('template/header'); ?>


<!-- Seccion dinamica -->
<section class="content-header">
    <h1>
        Marcas
        <small><?php echo $titulo; ?></small>
    </h1>
    
    
</section>

<section class="content">
    <div class="row"> 
        <div class="col-md-2">
            <a class="btn btn-block btn-primary" href="<?php echo base_url('index.php/marca_controller/crear');?>">Añadir nueva marca +</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Marcas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Marcas</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($marcas as $marca): ?>
                                <tr>
                                    <td><?php echo htmlentities($marca->nombre); ?></td>
                                    <td>
                                        <a href="<?php echo base_url('index.php/marca_controller/modificar/' . $marca->id); ?>">Editar</a> |
                                        <a href="<?php echo base_url('index.php/marca_controller/eliminar/' . $marca->id); ?>">Eliminar</a>
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
