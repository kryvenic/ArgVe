<div class="jumbotron text-center">
    <h3>Agregar Nuevo Curso <strong>ArgVE</strong></h3>

</div>
<div class="container p-5">
    <div class="w-70 mx-auto">
    
        <?php echo form_open_multipart('insertar_curso')?>
            <div class="form-group">
                <label for="nombre">Ingrese nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" autofocus="autofocus" value="<?php set_value('nombre') ?>">
            </div> <span class="text-danger"><?php echo form_error('nombre'); ?> </span>
            <div class="form-group">
            <label for="categoria">Categoria</label>
            <?php 
                $lista['0'] = 'Seleccionar categoria';
                foreach($categorias as $row){
                    $lista[$row->categoria_id] = $row->categoria_descripcion;
                }
                echo form_dropdown('categoria',$lista,'0', 'class="form_control"');
            ?>
            </div> <span class="text-danger"><?php echo form_error('categoria'); ?> </span>
            <div class="form-group">
                <label for="descripcion">Ingrese descripcion</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion" autofocus="autofocus" value="<?php set_value('descripcion') ?>">
            </div> <span class="text-danger"><?php echo form_error('descripcion'); ?> </span>
            <div class="form-group">
                <label for="precio">Ingrese precio</label>
                <input type="text" name="precio" id="precio" class="form-control" placeholder="Precio" autofocus="autofocus" value="<?php set_value('precio') ?>">
            </div> <span class="text-danger"><?php echo form_error('precio'); ?> </span>
            <div class="form-group">
                <label for="imagen">Seleccione una imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control" placeholder="Ingrese Imagen" autofocus="autofocus" value="<?php set_value('imagen') ?>">
            </div> <span class="text-danger"><?php echo form_error('imagen'); ?> </span>
            <div class="form-group">
                <input type="submit" name="insertar_curso" value="Agregar" class="btn  btn-success">
            </div>
        <?php echo form_close()?>
    </div>
</div>

