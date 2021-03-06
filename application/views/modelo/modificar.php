<?php $this->load->view('template/header'); ?>


<!-- Seccion dinamica -->
<section class="content-header">
    <h1>
        Editar modelo
        <small>Modelo</small>
    </h1>


</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Marca</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?php echo base_url('index.php/modelo_controller/request/'.$modelo->id); ?>">
                    <div class="box-body">
                        <?php echo validation_errors(); ?>
                        <?php echo validation_errors(); ?>
                        <?php $msj= $this->session->flashdata('mensaje');?> 
                        <?php if (isset($msj) and !empty($msj)):?>
                        <div class="alert alert-success alert-dismissable">
                            <i class="fa fa-check-circle"></i>
                            <?php echo $msj;?>
                        </div>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Introduzca el nombre del modelo" value="<?php echo htmlentities($modelo->nombre);?>">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Marca</label>
                            <select class="form-control" name="marca" id="marca">
                                <option value="">--Seleccione la marca--</option>
                                <?php foreach($marcas as $marca):?>
                                <?php $select = ($marca->id == $modelo->marca_id) ? 'selected="selected"':'';?>
                                <option <?php echo $select?> value="<?php echo $marca->id; ?>" <?php echo set_select('marca', $marca->id); ?>>
                                    <?php echo htmlentities($marca->nombre);?>
                                </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="alert alert-info">
                                Si no encuentra la marca puede agregarla aqui<br/> 
                                <a class="btn btn-primary" href="<?php echo base_url('index.php/marca_controller/crear'); ?>">
                                    Agregar nueva marca
                                </a>
                            </div>
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