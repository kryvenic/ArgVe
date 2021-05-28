<div class="jumbotron text-center">
    <h1 class="text-center p-3">Editar Usuario id: <?php echo $id ?></h1>
</div>
<div class="container p-5">
    <div class="w-70 mx-auto">
    <?php echo form_open_multipart("usuario_controller/actualizar_usuario/$id"); ?>
        <div class="form-group">
            <label for="curso_nombre">Ingrese nombre</label>
            <input type="text" name="nombre" id="curso_nombre" class="form-control" placeholder="Nombre" autofocus="autofocus" value="<?php echo $nombre ?>">
        </div> <span class="text-danger"><?php echo form_error('nombre'); ?> </span>
        <div class="form-group">
            <label for="curso_nombre">Ingrese apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido" autofocus="autofocus" value="<?php echo $apellido ?>">
        </div> <span class="text-danger"><?php echo form_error('apellido'); ?> </span>
        <div class="form-group">
            <label for="mail">Ingrese email</label>
            <input type="text" name="mail" id="mail" class="form-control" placeholder="Email" autofocus="autofocus" value="<?php echo $mail ?>">
        </div> <span class="text-danger"><?php echo form_error('mail'); ?> </span>
        <div class="form-group">
            <label for="precio">Ingrese contraseña nueva</label>
            <input type="text" name="password" id="password" class="form-control" placeholder="password" autofocus="autofocus" value="<?php echo $password ?>">
        </div> <span class="text-danger"><?php echo form_error('password'); ?> </span>
        <div class="form-group">
            <label for="perfil">Seleccione tipo de perfil</label>
            <?php
            $lista['0'] = 'Seleccionar perfil';
            foreach ($perfil as $row) {
                $lista[$row->id_perfil] = $row->perfil_descripcion;
            }
            echo form_dropdown('perfil', $lista, $perfil_id, 'class="form_control"');
            ?>
        </div> <span class="text-danger"><?php echo form_error('perfil'); ?> </span>
        <div class="form-group">
            <input type="submit" name="Modificar" value="Modificar" class="btn btn-success">
        </div>
        <?php echo form_close() ?>
    </div>
</div>