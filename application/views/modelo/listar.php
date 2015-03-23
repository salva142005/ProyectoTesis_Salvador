<?php $this->load->view('template/header'); ?>


<!-- Seccion dinamica -->
<section class="content-header">
    <h1>
        Modelos
        <small><?php echo $titulo; ?></small>
    </h1>
    
    
</section>

<section class="content">
    <div class="row"> 
        <div class="col-md-2">
            <a class="btn btn-block btn-primary" href="<?php echo base_url('index.php/modelo_controller/crear');?>">Añadir nuevo modelo +</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Modelos</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($modelos as $modelo): ?>
                                <tr>
                                    <td><?php echo htmlentities($modelo->nombre); ?></td>
                                    <td><?php echo htmlentities($modelo->marca); ?></td>
                                    <td>
                                        <a href="<?php echo base_url('index.php/modelo_controller/modificar/' . $modelo->id); ?>">Editar</a> |
                                        <a href="<?php echo base_url('index.php/modelo_controller/eliminar/' . $modelo->id); ?>">Eliminar</a>
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


