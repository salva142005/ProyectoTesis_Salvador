<?php $this->load->view('template/header'); ?>


<!-- Seccion dinamica -->
<section class="content-header">
    <h1>
        Nuevo equipo
        <small>Equipo</small>
    </h1>


</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <?php echo validation_errors(); ?>
                <div class="box-header">
                    <h3 class="box-title">Datos del equipo</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" role="form" method="post" action="<?php echo base_url('index.php/equipo_controller/request'); ?>">
                    <input type="hidden" name="usuario_id" value="<?php echo $this->session->userdata('id'); ?>" />
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nombre">Descripcion del equipo</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Introduzca una descripcion del equipo">
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio $$</label>
                            <input type="text" class="form-control" name="precio" id="precio" placeholder="Introduzca el precio del equipo">
                        </div>


                        <div class="form-group">
                            <label for="nombre">Marca</label>
                            <select class="form-control" name="marca" id="marca">
                                <option value="">-Seleccione la marca-</option>
                                <?php foreach ($marcas as $marca): ?>
                                    <option value="<?php echo $marca->id ?>"><?php echo htmlentities($marca->nombre); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div id="wrapper_modelos" class="form-group">

                        </div>
                        <div class="form-group">
                            <label for="operadora">Operadora</label>
                            <select class="form-control" name="operadora" id="operadora">
                                <option value="">-Seleccione la operadora-</option>
                                <?php foreach ($operadoras as $operadora): ?>
                                    <option value="<?php echo $operadora->id ?>"><?php echo htmlentities($operadora->nombre); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Color</label>
                            <select class="form-control" name="color" id="color">
                                <option value="">-Seleccione el color-</option>
                                <?php foreach ($colores as $color): ?>
                                    <option value="<?php echo $color->id ?>"><?php echo htmlentities($color->nombre); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control" name="estado" id="estado">
                                <option value="">-Seleccione el estado-</option>
                                <?php foreach ($estados as $key => $item): ?>
                                    <option value="<?php echo $key; ?>"><?php echo htmlentities($item); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="cantidad">Cantidad en existencia</label>
                            <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Introduzca la cantidad en existencia del producto">
                        </div>
                        
                        <div class="form-group">
                            <label for="update">Foto para el equipo</label>
                            <input type="file" id="userfile" name="userfile">
                            <p class="help-block">Suba una imagen para su equipo</p>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('template/footer'); ?>