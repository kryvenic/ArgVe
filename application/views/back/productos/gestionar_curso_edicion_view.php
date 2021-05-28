<div class="jumbotron text-center">
    <h1 class="text-center p-3">Editar Curso id: <?php echo $curso_id ?></h1>
</div>
<div class="container p-5">
    <div class="w-70 mx-auto">
        <?php echo form_open_multipart("curso_controller/actualizar_curso/$curso_id"); ?>
        <div class="form-group">
            <label for="curso_nombre">Ingrese nombre</label>
            <input type="text" name="curso_nombre" id="curso_nombre" class="form-control" placeholder="Nombre" autofocus="autofocus" value="<?php echo $curso_nombre ?>">
        </div> <span class="text-danger"><?php echo form_error('curso_nombre'); ?> </span>
        <div class="form-group">
            <label for="descripcion">Ingrese descripcion</label>
            <textarea  type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion" autofocus="autofocus" rows="4" cols="50" ><?php echo $descripcion ?></textarea>
        </div> <span class="text-danger"><?php echo form_error('descripcion'); ?> </span>
        <div class="form-group">
            <label for="categoria">Seleccione categoria</label>
            <?php
            $lista['0'] = 'Seleccionar categoria';
            foreach ($categorias as $row) {
                $lista[$row->categoria_id] = $row->categoria_descripcion;
            }
            echo form_dropdown('categoria', $lista, $categoria, 'class="form_control"');
            ?>
        </div> <span class="text-danger"><?php echo form_error('categoria'); ?> </span>
        <div class="form-group">
            <label for="precio">Ingrese precio</label>
            <input type="text" name="precio" id="precio" class="form-control" placeholder="Precio" autofocus="autofocus" value="<?php echo $precio ?>">
        </div> <span class="text-danger"><?php echo form_error('precio'); ?> </span>
        <div class="form-group ">
            <label for="imagen">Seleccione una imagen</label>
            <div class="text-center">
                <input type="file" name="imagen" id="imagen" class="form-control" placeholder="Ingrese Imagen" autofocus="autofocus" value="<?php echo $imagen ?>">
                <img src="<?php echo base_url('/uploads/') . $imagen ?>" class="p-2 m-5 border border-dark" alt="Imagen producto" height="200" width="200">
            </div>
        </div> <span class="text-danger"><?php echo form_error('imagen'); ?> </span>
        <div class="form-group">
            <input type="submit" name="Actualizar" value="Modificar" class="btn  btn-success">
        </div>
        <?php echo form_close() ?>
    </div>
</div>