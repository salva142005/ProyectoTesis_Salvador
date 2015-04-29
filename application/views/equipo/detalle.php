<?php $this->load->view('template/header'); ?>


<!-- Seccion dinamica -->
<section class="content-header">
    <h1>
        <small>Publicación: </small>
        <?php echo htmlentities($equipo->descripcion_equipo); ?>
    </h1>
    <a href="<?php echo base_url(); ?>" class="btn btn-success"> <i class="fa fa-arrow-left"></i>Regresar</a>

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
                            <td class="text-blue">Marca / Modelo </td><td> <?php echo htmlentities($equipo->marca . ' / ' . $equipo->modelo); ?> </td>
                        </tr>
                        <tr>
                            <td class="text-blue">Estado </td><td> <?php echo htmlentities($equipo->estado_equipo); ?> </td>
                        </tr>
                        <tr class="alert alert-warning">
                            <td >Publicado por </td><td> <?php echo htmlentities($equipo->nombre_usuario); ?> </td>
                        </tr>
                        <tr class="alert alert-warning">
                            <td >Telefono / Email </td><td> <?php echo htmlentities($equipo->usuario_telefono . ' / ' . $equipo->usuario_email); ?> </td>
                        </tr>
                    </table>
                    <br/>
                    <br/>
                    <a href="<?php echo base_url(); ?>" class="btn btn-success"> <i class="fa fa-arrow-left"></i>Regresar</a>
                    <?php $usuario_actual = $this->session->userdata('id'); ?>
                    <?php if ($equipo->usuario_id==$usuario_actual): ?>
                        <a href="<?php echo base_url("index.php/equipo_controller/modificar/" . $equipo->id) ?>" class="btn btn-info"><i class="fa fa-edit"></i>Editar producto</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php if (isset($comprador_id) and ! empty($comprador_id) and ( $comprador_id != $equipo->usuario_id) and ($equipo->cantidad>0)): ?>
                <form role="form" method="post" action="<?php echo base_url("index.php/venta_controller/registrar_venta") ?>">
                    <input type="hidden" name="comprador_id" value="<?php echo $comprador_id; ?>">
                    <input type="hidden" name="vendedor_id" value="<?php echo $equipo->usuario_id; ?>">
                    <input type="hidden" name="equipo_id" value="<?php echo $equipo->id; ?>">

                    <button type="submit" class="btn btn-warning btn-lg">
                        <i class="fa fa-shopping-cart"></i> Comprar
                    </button>
                </form>
            <?php elseif ($comprador_id != $equipo->usuario_id): ?>
                
                    <button type="submit" class="btn btn-default btn-lg disabled">
                        <i class="fa fa-shopping-cart"></i>Comprar
                    </button>
                    <br>
                    <br>
                    <?php if($equipo->cantidad>0): ?>
                    <div class="callout callout-warning">
                        <h4><i class="fa fa-warning"></i> Información</h4>
                        <p>Para comprar debe registrarse</p>
                        <a href="<?php echo base_url('index.php/login_controller') ?>"> Haga click aquí</a>
                    </div>
                    <?php else:?>
                    <div class="callout callout-danger">
                        <h4><i class="fa fa-warning"></i> Equipo agotado</h4>
                        <p>Pongase en contacto con el proveedor</p>
                    </div>
                    <?php endif;?>
                <?php else: ?>
                    <h2>Este producto es suyo</h2>
                

            <?php endif; ?>
        </div>
    </div>
</section>
<?php $this->load->view('template/footer'); ?>