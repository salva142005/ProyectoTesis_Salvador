<?php $this->load->view('template/header'); ?>


<!-- Seccion dinamica -->
<section class="content-header">
    <h1>
        Reporte de ventas
        <small><?php echo $titulo; ?></small>
    </h1>
    
    
</section>

<section class="content">
    
        <form role="form" method="post" action="<?php echo base_url('index.php/venta_controller/vista_reporte'); ?>">
            <div class="row">  
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                            <?php if($this->session->userdata('admin')):?>
                                <select class="form-control" name="usuario" id="usuario">
                                    <option value="">--Seleccione el usuario--</option>
                                    <?php foreach($usuarios as $u):?>
                                    <option value="<?php echo $u->email; ?>">
                                        <?php echo htmlentities($u->nombre . ' : '. $u->email);?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                            <?php else:?>
                                <select class="form-control" name="usuario" id="usuario">
                                    <option value="<?php echo $this->session->userdata('email'); ?>" >
                                        <?php echo htmlentities($this->session->userdata('nombre'). ' : '. $this->session->userdata('email'));?>
                                    </option>
                                </select>
                            <?php endif;?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="fecha_inicio">Fecha desde</label>
                        <input type="text" class="form-control datepicker" name="fecha_inicio" data-date-format="yyyy/mm/dd" id="fecha_inicio" placeholder="fecha desde">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="fecha_fin">Fecha hasta</label>
                        <input type="text" class="form-control datepicker" name="fecha_fin" data-date-format="yyyy/mm/dd"  id="fecha_fin" placeholder="fecha hasta">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="estatus">Estatus de ventas</label>
                        <select class="form-control" name="estatus_ventas" id="estatus_ventas">
                            <option value="">--Seleccione el usuario--</option>
                            <?php foreach($estatus_ventas as $key => $item):?>
                            <option value="<?php echo $key; ?>">
                                <?php echo htmlentities($item);?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">filtrar</button>
                </div>
            </div>
        </form>
       
    
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Ventas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Comprador</th>
                                <th>Vendedor</th>
                                <th>Equipo</th>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Precio</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($ventas)): ?>
                                <?php foreach ($ventas as $venta): ?>
                                    <tr>
                                        <td><?php echo htmlentities($venta->nombre_comprador . ' - ' .$venta->email_comprador); ?></td>
                                        <td><?php echo htmlentities($venta->nombre_vendedor . ' - ' .$venta->email_vendedor); ?></td>
                                        <td><?php echo htmlentities($venta->nombre_equipo); ?></td>
                                        <td><?php echo htmlentities($venta->nombre_modelo); ?></td>
                                        <td><?php echo htmlentities($venta->nombre_marca); ?></td>
                                        <td><?php echo htmlentities($venta->precio); ?></td>
                                        <td><?php echo htmlentities($venta->creado); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('template/footer'); ?>
