<?php $this->load->view('template/header'); ?>


<!-- Seccion dinamica -->
<section class="content-header">
    <h1>
        Modifique el equipo
        <small>Equipo</small>
    </h1>


</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Datos del equipo</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" role="form" method="post" action="<?php echo base_url('index.php/equipo_controller/request/'.$equipo->id); ?>">
                    <input type="hidden" name="usuario_id" value="<?php echo $equipo->usuario_id; ?>" />
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo htmlentities($equipo->nombre); ?>" placeholder="Introduzca el nombre del color">
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio $$</label>
                            <input type="text" class="form-control" name="precio" id="precio" value="<?php echo $equipo->precio; ?>" placeholder="Introduzca el precio del equipo">
                        </div>


                        <div class="form-group">
                            <label for="nombre">Marca</label>
                            <select class="form-control" name="marca" id="marca">
                                <option value="">-Seleccione la marca-</option>
                                
                                <?php foreach ($marcas as $marca): ?>
                                <?php $select = ($modelo->marca_id == $marca->id)? 'selected="selected"' : '';?>
                                    <option <?php echo $select; ?> value="<?php echo $marca->id ?>"><?php echo htmlentities($marca->nombre); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div id="wrapper_modelos" class="form-group">
                             <?php $this->load->view('equipo/ajax/modelo_part'); ?>
                        </div>
                        <div class="form-group">
                            <label for="operadora">Operadora</label>
                            <select class="form-control" name="operadora" id="operadora">
                                <option value="">-Seleccione la operadora-</option>
                                <?php foreach ($operadoras as $operadora): ?>
                                <?php $select = ($equipo->operadora_id == $operadora->id)? 'selected="selected"' : '';?>
                                    <option  <?php echo $select; ?> value="<?php echo $operadora->id ?>"><?php echo htmlentities($operadora->nombre); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Color</label>
                            <select class="form-control" name="color" id="color">
                                <option value="">-Seleccione el color-</option>
                                <?php foreach ($colores as $color): ?>
                                <?php $select = ($equipo->color_id == $color->id)? 'selected="selected"' : '';?>
                                    <option <?php echo $select; ?> value="<?php echo $color->id ?>"><?php echo htmlentities($color->nombre); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control" name="estado" id="estado">
                                <option value="">-Seleccione el estado-</option>
                                <?php foreach ($estados as $key => $item): ?>
                                <?php $select = ($equipo->estado == $key)? 'selected="selected"' : '';?>
                                    <option <?php echo $select; ?> value="<?php echo $key; ?>"><?php echo htmlentities($item); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="estado">Imagen del equipo</label>
                            <span style=" text-align: center;background-color: #e7e7e7; padding: 10px; border: 3px solid #ccc; display: block">
                                <img src="<?php echo $equipo->imagen; ?>">
                                <input type="hidden" name="imagen_url" value="<?php echo $equipo->imagen; ?>"/>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="update">Foto para el equipo</label>
                            <input type="file" id="userfile" name="userfile">
                            <p class="help-block">Suba o cambie la imagen para su equipo</p>
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