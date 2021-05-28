<div class="formulario-wrapper container p-5">
    <h1 class="text-center p-3">Registrarse</h1>
    <div class="form formulario-registrar ">
        <?php echo form_open('registrar'); ?>
        <div class="form-group">
            <label for="apellido">Ingrese su apellido</label>
            <?php echo form_input(['name' => 'apellido', 'id' => 'apellido', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese Apellido', 'autofocus' => 'autofocus', 'value' => set_value('apellido')]); ?>
        </div> <span class="text-danger"><?php echo form_error('apellido'); ?> </span>

        <div class="form-group">
            <label for="nombre">Ingrese su nombre</label>
            <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'value' => set_value('nombre')]); ?>
        </div> <span class="text-danger"><?php echo form_error('nombre'); ?> </span>
        <div class="form-group">
            <label for="mail">Ingrese su correo electrónico</label>
            <?php echo form_input(['name' => 'mail', 'id' => 'mail', 'type' => 'email', 'class' => 'form-control', 'placeholder' => 'Ingrese Email', 'value' => set_value('mail')]); ?>
        </div> <span class="text-danger"><?php echo form_error('mail'); ?> </span>

        <div class="form-group">
            <label for="password">Ingrese contraseña</label>
            <?php echo form_input(['name' => 'password', 'id' => 'password', 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Ingrese Password', 'value' => set_value('password')]); ?>
        </div> <span class="text-danger"><?php echo form_error('password'); ?> </span>


        <div class="form-group">
            <label for="passconf">Repetir Contraseña</label>
            <?php echo form_input(['name' => 'passconf', 'id' => 'passconf', 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Repetir contraseña', 'value' => set_value('passconf')]); ?>
        </div> <span class="text-danger"><?php echo form_error('passconf'); ?> </span>

        <div class="form-group">
            <?php echo form_submit('registrar', 'Registrarme', "class='btn  btn-success'"); ?>
        </div>

        <?php echo form_close(); ?>

    </div>
</div>