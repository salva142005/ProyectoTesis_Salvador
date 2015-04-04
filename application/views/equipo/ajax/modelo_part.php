
<label for="modelo">Modelo</label>
<select class="form-control" name="modelo" id="modelo">
    <option value="">-Seleccione el modelo-</option>
    <?php $select =''; ?>
    <?php foreach ($modelos as $modelo): ?>
        <?php if(isset($equipo)):?> 
        <?php $select = ($equipo->modelo_id == $modelo->id)? 'selected="selected"' : '';?>
        <?php endif;?>
        <option <?php echo $select;?> value="<?php echo $modelo->id ?>"><?php echo htmlentities($modelo->nombre); ?></option>
    <?php endforeach; ?>
</select>
