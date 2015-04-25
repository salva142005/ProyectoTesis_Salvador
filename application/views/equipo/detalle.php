<?php $this->load->view('template/header'); ?>


<!-- Seccion dinamica -->
<section class="content-header">
    <h1>
        <small>Publicación: </small>
        <?php echo htmlentities($equipo->descripcion_equipo); ?>
    </h1>
 <a href="<?php echo base_url();?>" class="btn btn-success"> <i class="fa fa-arrow-left"></i>Regresar</a>

</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-9">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Datos del equipo</h3>
                </div><!-- /.box-header -->
                <span class="image">
                    <img class="img-thumbnail img-responsive" src="<?php echo $equipo->imagen; ?>" />
                </span>
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2"><h3>Detalles del equipo</h3></th>
                            </tr>
                        </thead>
                        <tr>
                            <td class="text-blue">Precio </td><td> <?php echo number_format($equipo->precio_equipo, 2, ',', '.'); ?> </td>
                        </tr>
                        
                        <tr>
                            <td class="text-blue">Cantidad </td><td> <?php echo $equipo->cantidad; ?> </td>
                        </tr>
                        <tr>
                            <td class="text-blue">Operadora </td><td> <?php echo htmlentities($equipo->operadora); ?> </td>
                        </tr>
                        <tr>
                            <td class="text-blue">Marca / Modelo </td><td> <?php echo htmlentities($equipo->marca .' / '.$equipo->modelo); ?> </td>
                        </tr>
                        <tr>
                            <td class="text-blue">Estado </td><td> <?php echo htmlentities($equipo->estado_equipo); ?> </td>
                        </tr>
                        <tr class="alert alert-warning">
                            <td >Publicado por </td><td> <?php echo htmlentities($equipo->nombre_usuario); ?> </td>
                        </tr>
                        <tr class="alert alert-warning">
                            <td >Telefono / Email </td><td> <?php echo htmlentities($equipo->usuario_telefono.' / '.$equipo->usuario_email); ?> </td>
                        </tr>
                    </table>
                    <br/>
                    <br/>
                    <a href="<?php echo base_url();?>" class="btn btn-success"> <i class="fa fa-arrow-left"></i>Regresar</a>
                    <a href="<?php echo base_url("index.php/equipo_controller/modificar/".$equipo->id) ?>" class="btn btn-info"><i class="fa fa-edit"></i>Editar producto</a>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('template/footer'); ?>